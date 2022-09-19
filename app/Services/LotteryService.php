<?php

namespace App\Services;

use App\Core\Services\CoreService;
use App\Models\Lottery;
use App\Models\User;
use App\Repositories\LotteryRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * @property LotteryRepository $repository
 */
class LotteryService extends CoreService
{

    public function __construct(public User $user)
    {
        $this->repository = app(LotteryRepository::class);
    }

    public function start(): ?Lottery
    {
        try {
            DB::beginTransaction();

            $rand = rand(1, 1000);

            $lottery = $this->repository->create([
                'user_id' => $this->user?->id,
                'result' => $rand % 2 === 0,
                'random_value' => $rand,
                'percent' => $this->getPercent($rand),
                'win_amount' => $rand * $this->getPercent($rand) / 100
            ]);

            Db::commit();

            return $lottery;
        } catch (Exception|Throwable $exception) {
            $this->logError($exception, 'method start() is down');
        }

        return null;
    }

    private function getPercent(int $randValue)
    {
        switch ($randValue) {
            case in_array($randValue, range(900, 1000)):
                return 70;
            case in_array($randValue, range(600, 1000)):
                return 50;
            case in_array($randValue, range(300, 1000)):
                return 30;
            default:
                return 10;

        }
    }

}

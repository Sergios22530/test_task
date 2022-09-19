<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UserRequest;
use App\Http\ResponseFormatters\HistoryResource;
use App\Repositories\LotteryRepository;
use App\Repositories\UserRepository;
use App\Services\LotteryService;
use Illuminate\Routing\Controller as BaseController;

/**
 * @property LotteryRepository $repository
 * @property UserRepository $userRepository
 */
class LotteryController extends BaseController
{

    public function __construct()
    {
        $this->repository = app(LotteryRepository::class);
        $this->userRepository = app(UserRepository::class);
    }

    public function start(UserRequest $request)
    {
        $user = $this->userRepository->getById($request->validated('user_id'));

        $lottery = (new LotteryService($user))->start();

        return response()->json([
            'result' => $lottery->result ? 'WIN' : 'LOSE',
            'random_value' => $lottery->random_value,
            'win_amount' => $lottery->win_amount,

        ]);
    }

    public function history(int $userId)
    {
        return new HistoryResource(
            $this->repository->getLastHistory($this->userRepository->getById($userId))
        );
    }


}

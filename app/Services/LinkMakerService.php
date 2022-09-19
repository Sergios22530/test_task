<?php

namespace App\Services;

use App\Core\Services\CoreService;
use App\Models\Link;
use App\Models\User;
use App\Repositories\LinkRepository;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

/**
 * @property User $user
 * @property LinkRepository $repository
 */
class LinkMakerService extends CoreService
{

    public function __construct(public User $user)
    {
        $this->repository = app(LinkRepository::class);
    }

    public function make(): ?Link
    {
        try {
            DB::beginTransaction();
            $link = $this->repository->create([
                'user_id' => $this->user?->id,
                'uuid' => Str::uuid()->toString(),
                'expired_at' => Carbon::now()->addDays(7)
            ]);

            Db::commit();
            return $link;
        } catch (Exception|Throwable $exception) {
            $this->logError($exception, 'method makeLink() is down');
        }

        return null;
    }

    public function getActiveLink(): ?Link
    {
        return $this->user->links->filter(fn($link) => !$this->isExpired($link))->last();
    }

    public function isExpired(?Link $link = null): bool
    {
        return $link ? $link->expired_at->lt(Carbon::now()) : true;
    }


}

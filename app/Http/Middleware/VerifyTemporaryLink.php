<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Repositories\LinkRepository;
use App\Services\LinkMakerService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class VerifyTemporaryLink
{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var ?User $user */
        $user = $request->user();

        $link = (new LinkRepository())->getByUUID(Arr::last(explode('/', $request->path())));

        abort_if((new LinkMakerService($user))->isExpired($link),404);

        return $next($request);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\DeleteLinkRequest;
use App\Http\Requests\UserRequest;
use App\Models\Link;
use App\Repositories\LinkRepository;
use App\Repositories\UserRepository;
use App\Services\LinkMakerService;
use Illuminate\Routing\Controller as BaseController;

/**
 * @property LinkRepository $repository
 * @property UserRepository $userRepository
 */
class LinkController extends BaseController
{

    public function __construct()
    {
        $this->repository = app(LinkRepository::class);
        $this->userRepository = app(UserRepository::class);
    }

    public function store(UserRequest $request)
    {
        $user = $this->userRepository->getById($request->validated('user_id'));

        $link = (new LinkMakerService($user))->make();

        return response()->json([
            'url' => ($link) ? route('home.task', ['link' => $link->uuid]) : null,
        ]);
    }

    public function delete(DeleteLinkRequest $request)
    {
        $user = $this->userRepository->getById($request->validated('user_id'));

        /** @var ?Link $link*/
        $link = $this->repository->getByUUID($request->validated('uuid'));

        abort_if($link?->user_id != $user->id,403);

        return response()->json(['success' => $this->repository->delete($link)]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * @property  UserRepository $repository
 */
class LoginController extends Controller
{

    public function __construct()
    {
        $this->repository = app(UserRepository::class);
    }

    /**
     * Display login page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
        return view('auth.login');
    }


    /**
     * Handle account login request
     *
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function login(LoginRequest $request)
    {
        /** @var User $user*/
        $user = $this->repository->findUser(
            $request->validated('name'),
            $request->validated('phone_number')
        );

        Auth::login($user);

        return $this->authenticated($request, $user);
    }



    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param Auth $user
     *
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }
}

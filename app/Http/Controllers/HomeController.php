<?php

namespace App\Http\Controllers;

use App\Services\LinkMakerService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        $link = null;
        if ($user = $request->user()) {
            $linkMaker = (new LinkMakerService($user));
            $link = ($linkMaker->getActiveLink()) ?: $linkMaker->make();
        }

        return view('home.index', ['link' => $link]);
    }

    public function task(string $link, Request $request)
    {
        return view('home.temporary');
    }




}

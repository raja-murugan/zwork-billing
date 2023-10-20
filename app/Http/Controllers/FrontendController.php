<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('page.frontend.index');
    }

    public function about()
    {
        return view('page.frontend.about');
    }

    public function service()
    {
        return view('page.frontend.service');
    }

    public function project()
    {
        return view('page.frontend.project');
    }

    public function contactus()
    {
        return view('page.frontend.contact');
    }
}

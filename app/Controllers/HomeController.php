<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index(): string
    {
        $data = array(
            'title' => 'Home Page',
        );
        return view('home',$data);
    }
}

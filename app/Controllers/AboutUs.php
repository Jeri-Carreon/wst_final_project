<?php

namespace App\Controllers;

class AboutUs extends BaseController
{
    public function index(): string
    {
        return view('AboutUs');
    }
}

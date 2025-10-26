<?php

namespace App\Controllers;

class ContactUs extends BaseController
{
    public function index(): string
    {
        return view('ContactUs');
    }
}

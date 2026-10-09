<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function say(string $message = 'Привіт')
    {
        return view('site.say', ['message' => $message]);
    }
}

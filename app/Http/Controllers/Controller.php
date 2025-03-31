<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    public $isAdminUser = false;

    public function __construct()
    {
        app()->call(function () {
            $this->isAdminUser = Auth::check() && Auth::user()->isAdmin();
        });
    }
}

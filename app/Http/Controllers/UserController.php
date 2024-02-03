<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'role:user']);
    }

    public function products()
    {
        return view('livewire.main.user.products');
    }
}

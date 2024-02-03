<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function products()
    {
        // Add your user products page logic here
        return view('livewire.main.user.products');
    }
}

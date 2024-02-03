<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function inventory()
    {
        return view('livewire.main.admin.inventory');
    }
}

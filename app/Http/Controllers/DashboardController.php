<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('dashboard.admin');
    }

    public function cuidador()
    {
        return view('dashboard.cuidador');
    }

    public function veterinario()
    {
        return view('dashboard.veterinario');
    }
}

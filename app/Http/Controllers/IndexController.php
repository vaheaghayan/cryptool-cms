<?php

namespace App\Http\Controllers;

use App\Models\Algorithm;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function edit()
    {
        return view('edit');
    }

    public function store(Request $request)
    {
        dd($request);
    }
}

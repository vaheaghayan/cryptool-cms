<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlgorithmRequest;
use App\Models\Algorithm\AlgorithmContract;
use Illuminate\Http\File;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private AlgorithmContract $manager;

    public function __construct(AlgorithmContract $manager)
    {
        $this->manager = $manager;
    }

    public function index()
    {
        return view('dashboard');
    }

    public function edit(Request $request)
    {
        dd($request, csrf_token());
        return view('edit');
    }

    public function store(AlgorithmRequest $request)
    {
        $validatedData = $request->validated();
        $this->manager->store($validatedData['data'], $validatedData['ml']);

        return response()->json([
            'message' => 'successfully stored'
        ],200);
    }
}

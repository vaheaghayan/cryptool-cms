<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlgorithmRequest;
use App\Models\Algorithm\AlgorithmContract;
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

    public function edit()
    {
        return view('edit');
    }

    public function store(AlgorithmRequest $request)
    {
        $data = $request->only('data')['data'];
        $ml = $request->only('ml')['ml'];
        $this->manager->store($data, $ml);

        return response()->json([
            'message' => 'successfully stored'
        ],200);
    }
}

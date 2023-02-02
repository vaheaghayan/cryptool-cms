<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlgorithmRequest;
use App\Models\Cypher\Cypher;
use App\Models\Cypher\CypherContract;
use Illuminate\Http\File;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private CypherContract $manager;

    public function __construct(CypherContract $manager)
    {
        $this->manager = $manager;
    }

    public function index()
    {
        $cyphers = Cypher::all();

        return view('dashboard')->with(['cyphers' => $cyphers]);
    }

    public function edit(Request $request)
    {
        $id = $request->route()->parameter('id');
        $cypher = null;

        if ($id) {
            $cypher = Cypher::query()->find($id);
        }

        return view('edit')->with(['cypher' => $cypher]);
    }

    public function store(AlgorithmRequest $request)
    {
        $validatedData = $request->validated();
        $this->manager->store($validatedData['data'], $validatedData['ml']);

        return redirect()->route('dashboard', ['locale' => cLng()]);
    }

    public function update(AlgorithmRequest $request)
    {
        dd($request->input('id'));
        $validatedData = $request->validated();
        $this->manager->update($validatedData['data'], $validatedData['ml']);


    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlgorithmRequest;
use App\Models\Cypher\Cypher;
use App\Models\Cypher\CypherContract;
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
        $id = $request->get('id');

        if ($request->get('id')) {
            $this->manager->update($validatedData['data'], $validatedData['ml'], $id);
        } else {
            $this->manager->store($validatedData['data'], $validatedData['ml']);
        }

        return redirect()->route('dashboard', ['locale' => cLng()]);
    }

    public function delete(Request $request)
    {
        $id = $request->route()->parameter('id');
        $this->manager->delete($id);

        return redirect()->route('dashboard', ['locale' => cLng()]);
    }
}

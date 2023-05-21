<?php

namespace App\Http\Controllers;

use App\Models\CypherCategory;
use App\Models\CypherCategoryMl;
use Illuminate\Http\Request;

class AlgorithmCategoryController extends Controller
{
    public function index()
    {
        $cypherCategories = CypherCategory::get();

        return view('cypher_categories.index')->with([
            'categories' => $cypherCategories
        ]);
    }

    public function editPage(Request $request)
    {
        $category = new CypherCategory();
        $category->show_status = CypherCategory::STATUS_ACTIVE;
        $saveMode = 'add';

        if ($request->id) {
            $category = CypherCategory::query()->find($request->id);

            if (!$category) {
                abort(404);
            }

            $saveMode = 'edit';
        }

        return view('cypher_categories.edit')->with([
            'category' => $category,
            'saveMode' => $saveMode
        ]);
    }

    public function edit(Request $request)
    {

        $validatedData = $request->validate([
            'data.name' => 'required|string',
            'data.show_status' => 'required|in:' . CypherCategory::STATUS_ACTIVE . ',' . CypherCategory::STATUS_INACTIVE,
            'ml.en.body' => 'string|nullable',
            'ml.am.body' => 'string|nullable',
            'id' => 'integer|nullable'
        ]);

        $alias = preg_replace('/\s+/', '_', strtolower($validatedData['data']['name']));
        $validatedData['data']['alias'] = $alias;

        if ($validatedData['id']) {
            $cypherCategory = CypherCategory::where('id', $validatedData['id'])->first();
            $cypherCategory->update($validatedData['data']);

            foreach ($validatedData['ml'] as $code => $mlData) {
                dump($mlData);
                CypherCategoryMl::where('cypher_category_id', $cypherCategory->id)->where('lng_code', $code)->update([
                    'body' => $mlData['body']
                ]);
            }
        } else {
            $cypherCategory = CypherCategory::create($validatedData['data']);

            foreach ($validatedData['ml'] as $code => $mlData) {
                CypherCategoryMl::insert([
                    'cypher_category_id' => $cypherCategory->id,
                    'lng_code' => $code,
                    'body' => $mlData['body']
                ]);
            }
        }

        return redirect(url(cLng() . '/cypher/categories'));
    }

    public function delete(Request $request)
    {
        CypherCategory::where('id', $request->id)->delete();

        return redirect()->back();
    }
}

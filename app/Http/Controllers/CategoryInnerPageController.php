<?php

namespace App\Http\Controllers;

use App\Models\CypherCategory;
use App\Models\CypherCategoryMl;
use Illuminate\Http\Request;

class CategoryInnerPageController extends Controller
{
    public function index(Request $request)
    {
        $categoryName = $request->route()->parameter('category');

        $cypherCategory = CypherCategory::where('name', $categoryName)->first();

        if (!$cypherCategory) {
            $cypherCategory =new CypherCategory([
                'name' => $categoryName
            ]);

            $cypherCategory->save();
        }

        return view('cypher_category')->with([
            'cypherCategory' => $cypherCategory
        ]);
    }

    public function store(Request $request)
    {
        foreach ($request->ml as $lngCode => $info) {
            CypherCategoryMl::updateOrCreate([
                'cypher_category_id' => $request->id,
                'lng_code' => $lngCode
            ],[
                'body' => $info['info']
            ]);
        }

        dd(CypherCategoryMl::where('cypher_category_id', $request->id)->get());

    }

}

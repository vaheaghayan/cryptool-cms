<?php

namespace App\Models\Cypher;


use Illuminate\Support\Facades\DB;

class CypherManager implements CypherContract
{
    public function store(array $data, array $ml): void
    {
        if (isset($data['icon'])) {
            $icon = $data['icon'];
            $imageName = now()->timestamp . '_' . $data['icon']->getClientOriginalName();
            $icon->move('/vagrant/content/images', $imageName);
//            $data['icon']->storeAs('images/cyphers/icon', $imageName, 'public');

            unset($data['icon']);
            $data['icon'] = $imageName;
        }

        $data['cypher_category_id'] = $data['category_id'];
        unset($data['category_id']);

        DB::transaction(function () use ($data, $ml) {
            $algorithm = Cypher::create($data);

            foreach ($ml as $code => $cypherMl) {
                CypherMl::insert(array_merge(['lng_code' => $code, 'cypher_id' => $algorithm->id], $cypherMl));
            }

            $algorithm->save();
        });
    }

    public function update(array $data, array $ml, int $id)
    {
        if (isset($data['icon'])) {
            $icon = $data['icon'];
            $imageName = now()->timestamp . '_' . $data['icon']->getClientOriginalName();
            $icon->move('/vagrant/content/images', $imageName);

            unset($data['icon']);
            $data['icon'] = $imageName;
        }

        $data['cypher_category_id'] = $data['category_id'];
        unset($data['category_id']);


        DB::transaction(function () use ($data, $ml, $id) {

            Cypher::where('id', $id)->update($data);
            foreach ($ml as $code => $cypherMl) {
                CypherMl::where('cypher_id', $id)->where('lng_code', $code)->update($cypherMl);
            }
        });
    }

    public function delete($id)
    {
        Cypher::destroy($id);
    }

}

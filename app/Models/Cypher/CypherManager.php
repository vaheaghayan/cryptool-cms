<?php

namespace App\Models\Cypher;


use Illuminate\Support\Facades\DB;

class CypherManager implements CypherContract
{
    public function store(array $data, array $ml): void
    {
        $images = [];

        foreach ($data['img'] as $key => $image) {
            $imageName = now()->timestamp . '_' . $image->getClientOriginalName();
            $image->storeAs('images/cyphers/' . $key, $imageName, 'public');
            $images[$key] = $imageName;
        }

        unset($data['img']);
        $data = array_merge($images, $data);

        DB::transaction(function () use ($data, $ml) {
            $algorithm = Cypher::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'icon' => $data['icon'],
                'image_1' => $data['image_1'] ?? null,
                'image_2' => $data['image_2'] ?? null,
                'image_3' => $data['image_3'] ?? null,
                'show_status' => $data['show_status']
            ]);

            foreach ($ml as $code => $cypherMl) {
                CypherMl::insert(array_merge(['lng_code' => $code, 'cypher_id' => $algorithm->id], $cypherMl));
            }

            $algorithm->save();
        });
    }

    public function update(array $data, array $ml)
    {
        $images = [];

        foreach ($data['img'] as $key => $image) {
            $imageName = now()->timestamp . '_' . $image->getClientOriginalName();
            $image->storeAs('images/cyphers/' . $key, $imageName, 'public');
            $images[$key] = $imageName;
        }

        unset($data['img']);
        $data = array_merge($images, $data);

        DB::transaction(function () use ($data, $ml) {
            $algorithm = Cypher::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'icon' => $data['icon'],
                'image_1' => $data['image_1'] ?? null,
                'image_2' => $data['image_2'] ?? null,
                'image_3' => $data['image_3'] ?? null,
                'show_status' => $data['show_status']
            ]);

            foreach ($ml as $code => $cypherMl) {
                CypherMl::insert(array_merge(['lng_code' => $code, 'cypher_id' => $algorithm->id], $cypherMl));
            }

            $algorithm->save();
        });
        dd(1);
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

}

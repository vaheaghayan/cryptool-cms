<?php

namespace App\Models\Algorithm;

use App\Models\Algorithm\Algorithm;
use Illuminate\Support\Facades\DB;

class AlgorithmManager implements AlgorithmContract
{
    public function store(array $data, array $ml): void
    {
        foreach ($data['img'] as $image) {
            $image->store('image');
        }

        DB::transaction(function () use ($data, $ml) {
            $algorithm = Algorithm::create($data);

            foreach ($ml as $code => $algorithmMl) {
                AlgorithmMl::insert(array_merge(['lng_code' => $code, 'algorithm_id' => $algorithm->id], $algorithmMl));
            }
        });
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

}

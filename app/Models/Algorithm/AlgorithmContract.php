<?php

namespace App\Models\Algorithm;

interface AlgorithmContract
{
    public function store(array $data, array $ml);

    public function update();

    public function delete();

}

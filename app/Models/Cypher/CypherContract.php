<?php

namespace App\Models\Cypher;

interface CypherContract
{
    public function store(array $data, array $ml);

    public function update(array $data, array $ml, int $id);

    public function delete($id);

}

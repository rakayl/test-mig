<?php

namespace App\Repositories;

use App\Models\Transform;

class TransformRepository
{

    public function create(array $data)
    {
        return Transform::create($data);
    }

    public function getHistory($limit = 10)
    {
        return Transform::latest()->paginate($limit);
    }

}
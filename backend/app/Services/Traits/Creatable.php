<?php

namespace App\Services\Traits;

use Illuminate\Database\Eloquent\Model;

trait Creatable
{
    function create($array)
    {
        return $this->model::create($array);
    }
}
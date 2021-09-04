<?php

namespace App\Services\Traits;

use Illuminate\Database\Eloquent\Model;

trait Gettable
{
    function get() {
        return $this->model::get();
    }
}
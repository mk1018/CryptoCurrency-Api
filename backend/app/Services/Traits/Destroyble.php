<?php

namespace App\Services\Traits;

use Illuminate\Database\Eloquent\Model;

trait Destroyble
{
    function destroy($id)
    {
        return $this->model::destroy($id);
    }
}
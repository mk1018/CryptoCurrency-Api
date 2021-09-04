<?php

namespace App\Services\Traits;

use Illuminate\Database\Eloquent\Model;

trait Patchable
{
    function modify($id, $data)
    {
        $item = $this->model::find($id);
        foreach ($item->toArray() as $key => $val) {
            if(array_key_exists($key, $data)){
                $item[$key] = $data[$key];
            }
        }
        $item->save();
        return $item;
    }
}
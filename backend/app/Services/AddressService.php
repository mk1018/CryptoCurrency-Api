<?php

namespace App\Services;

use App\Services\Traits\Gettable;
use App\Services\Traits\Creatable;
use App\Services\Traits\Destroyble;
use App\Services\Traits\Patchable;
use App\Models\Address;

class AddressService extends Service
{
    use Gettable;
    use Creatable;
    use Destroyble;
    use Patchable;

    var $model = Address::class;

    public function model()
    {
        return $this->model;
    }

    public function get($user_id=null)
    {
        if ($user_id) {
            return $this->model::where('user_id', $user_id)->get();
        } else {
            return $this->model::get();
        }
    }

}
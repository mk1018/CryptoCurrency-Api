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
        return $this->model::when($user_id, function ($query, $user_id) {
            return $query->where('user_id', $user_id);
        })->get();
    }

    public function checkUserIdDelete($id)
    {
        $address = $this->model::find($id);
        if ($address->getuserInfo->id == \Auth::id()) {
            $address->delete();
        }
    }
}
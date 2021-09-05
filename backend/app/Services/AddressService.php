<?php

namespace App\Services;

use Illuminate\Auth\Access\AuthorizationException;
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
        })->with('getBlockChainInfo')->get();
    }

    public function checkLoginIdDelete($id)
    {
        $address = $this->model::find($id);
        if ($address->getuserInfo->id == \Auth::id()) {
            $address->delete();
        } else {
            throw new AuthorizationException('ユーザーが違う！');
        }
    }

    public function checkLoginIdModify($id, $data)
    {
        $item = $this->model::find($id);
        if ($item->user_id == \Auth::id()) {
            foreach ($item->toArray() as $key => $val) {
                if(array_key_exists($key, $data)){
                    $item[$key] = $data[$key];
                }
            }
            $item->save();
        } else {
            throw new AuthorizationException('ユーザーが違う！');
        }
        return $item;
    }
}
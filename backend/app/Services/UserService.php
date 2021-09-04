<?php

namespace App\Services;

use App\Services\Traits\Gettable;
use App\Services\Traits\Creatable;
use App\Services\Traits\Destroyble;
use App\Services\Traits\Patchable;
use App\Models\User;

class UserService extends Service
{
    use Gettable;
    use Creatable;
    use Destroyble;
    use Patchable;

    var $model = User::class;

    public function model()
    {
        return $this->model;
    }

    public function first($code)
    {
        return $this->model::where('user_code', $code)->orWhere('screen_name', $code)->first();
    }

    public function codeFind($code)
    {
        $user = $this->model::where('user_code', $code)->orWhere('screen_name', $code)->first();
        return ($user) ? $this->model::find($user->id) : false;
    }
}
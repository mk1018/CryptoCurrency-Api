<?php

namespace App\Services;

use App\Services\Traits\Gettable;
use App\Services\Traits\Creatable;
use App\Services\Traits\Destroyble;
use App\Services\Traits\Patchable;
use App\Models\BlockChain;

class BlockChainService extends Service
{
    use Gettable;
    use Creatable;
    use Destroyble;
    use Patchable;

    var $model = BlockChain::class;


    public function pluck($column)
    {
        return $this->model::pluck($column);
    }

    public function model()
    {
        return $this->model;
    }
}
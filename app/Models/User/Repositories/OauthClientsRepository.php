<?php

namespace App\Models\User\Repositories;

use App\Models\OauthClients;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\Model;

class OauthClientsRepository
{
    /**
     * @param int $id
     * @return Builder|Builder[]|Collection|Model|null
     */
    public function getClient(int $id)
    {
        return OauthClients::query()->find(['id' => $id])->first();
    }
}

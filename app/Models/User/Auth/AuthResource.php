<?php

namespace App\Models\User\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}

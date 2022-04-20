<?php


namespace App\Models\Resource;


use Illuminate\Http\Resources\Json\JsonResource;

class SuccessResource extends JsonResource
{
    public function __construct($resource)
    {
        $resource['status'] = 'success';
        $resource['status_code'] = 200;

        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}

<?php


namespace App\Models\Resource;


use Illuminate\Http\Resources\Json\JsonResource;

class ErrorResource extends JsonResource
{
    public function __construct($resource)
    {
        $resource['status'] = 'error';
        $resource['status_code'] = 500;

        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}

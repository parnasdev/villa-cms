<?php


namespace PrsModules\Vila\src\Resources\Admin;

use App\Http\Resources\Admin\StatusResource;
use App\Http\Resources\UserPost;
use Illuminate\Http\Resources\Json\JsonResource;
use PrsModules\Country\src\Resource\{CityResource, ProvinceResource};

class ResidenceDateResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'price' => $this->price,
        ];
    }
}

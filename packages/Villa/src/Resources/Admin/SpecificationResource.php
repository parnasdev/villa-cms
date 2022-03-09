<?php


namespace PrsModules\Vila\src\Resources\Admin;

use App\Http\Resources\Admin\StatusResource;
use App\Http\Resources\UserPost;
use Illuminate\Http\Resources\Json\JsonResource;
use PrsModules\Country\src\Resource\{CityResource, ProvinceResource};

class SpecificationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'icon' => $this->icon
        ];
    }
}

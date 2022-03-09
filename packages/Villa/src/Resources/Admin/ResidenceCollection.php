<?php


namespace PrsModules\Vila\src\Resources\Admin;


use App\Http\Resources\Admin\StatusResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use PrsModules\Country\src\Models\City;
use PrsModules\Country\src\Resource\CityResource;
use PrsModules\Country\src\Resource\ProvinceResource;

class ResidenceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'slug' => $item->slug,
                'province' => new ProvinceResource($item->province),
                'city' => new CityResource($item->city),
                'status' => new StatusResource($item->status),
            ];
        });
    }
}

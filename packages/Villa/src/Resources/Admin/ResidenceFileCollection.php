<?php


namespace PrsModules\Vila\src\Resources\Admin;

use App\Http\Resources\Admin\StatusResource;
use App\Http\Resources\UserPost;
use Illuminate\Http\Resources\Json\JsonResource;
use PrsModules\Country\src\Resource\{CityResource, ProvinceResource};
use Illuminate\Http\Resources\Json\ResourceCollection;

class ResidenceFileCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function ($item) {
            return [
                'id' => $item->id,
                'url' => $item->url,
                'alt' => $item->alt,
                'type' => $item->type,
            ];
        });
    }
}

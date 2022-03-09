<?php


namespace PrsModules\Vila\src\Resources\Admin;

use App\Http\Resources\Admin\CategoryResource;
use App\Http\Resources\Admin\StatusResource;
use App\Http\Resources\UserPost;
use Illuminate\Http\Resources\Json\JsonResource;
use PrsModules\Country\src\Resource\{CityResource, ProvinceResource};
use PrsModules\Vila\src\Models\ResidenceSpecification;

class ResidenceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'province' => new ProvinceResource($this->province),
            'city' => new CityResource($this->city),
            'status' => new StatusResource($this->status),
            'user' => new UserPost($this->user),
            'residence_owner' => $this->residence_owner,
            'mobile' => $this->mobile,
            'description' => $this->description,
            'address' => $this->address,
            'coordinates' => $this->coordinates,
            'building_area' => $this->building_area,
            'land_area' => $this->land_area,
            'max' => $this->max,
            'room_count' => $this->room_count,
            'rules' => $this->rules,
            'specifications' => SpecificationResource::collection(ResidenceSpecification::query()->whereIn('id' , $this->specifications ?? [])->get()),
            'files' => new ResidenceFileCollection($this->residenceFiles()->get()),
            'prices' => ResidenceDateResource::collection($this->residenceDates()->get()),
            'categories' => CategoryResource::collection($this->categories()->get())
        ];
    }
}

<?php

namespace packages\Villa\src\Models;

use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PrsModules\Country\src\Models\City;
use PrsModules\Country\src\Models\Province;

class ResidenceDate extends Model
{
    use HasFactory , SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'residence_id',
        'price'
    ];

    public function residence()
    {
        return $this->belongsTo(Residence::class);
    }

}

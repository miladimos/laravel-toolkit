<?php

namespace Miladimos\Toolkit\Models;

use Miladimos\Toolkit\Traits\HasUUID;
use App\Scope\ActiveScope;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use Sluggable,
        HasUUID,
        SoftDeletes;

    protected $table = 'banks';

    // protected $fillable = ['title'];

    protected $guarded = [];


    // public static function booted()
    // {
    //     static::addGlobalScope(new ActiveScope());
    // }


    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

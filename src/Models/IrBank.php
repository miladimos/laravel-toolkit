<?php

namespace Miladimos\Toolkit\Models;

use Miladimos\Toolkit\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class IrBank extends Model
{
    use Sluggable,
        HasUUID,
        SoftDeletes;

    protected $table = 'ir_banks';

    // protected $fillable = ['title', 'type', 'slug', 'uuid'];

    protected $guarded = [];


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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function landImages() : Attribute {
        return Attribute::get(get: function ($value) {
            if ($value !== null) {
                return url($value);
            }
            return [];
        }
        );
    }
}

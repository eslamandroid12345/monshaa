<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function user(): BelongsTo
    {

        return $this->belongsTo(User::class,'user_id','id');
    }

    public function company(): BelongsTo
    {

        return $this->belongsTo(Company::class,'company_id','id');
    }


    public function images(): HasMany
    {
        return $this->hasMany(StateImage::class,'state_id','id');
    }

    public function stateImages() : Attribute {
        return Attribute::get(
            get: function () {
                $images = [];
                foreach ($this->images()->select('image')->get() as $image){
                    $images[] = $image->image;
                }
                return $images;
            }
        );
    }


}

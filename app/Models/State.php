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
    protected $appends = ['real_state_type_label'];



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

    public function realStateTypeLabel() : Attribute {
        return Attribute::get(
            get: function () {
                return match ($this->real_state_type) {
                    'furnished_apartment' => 'شقة مفروشة',
                    'empty_apartment'     => 'شقة فارغة',
                    'furnished_villa'     => 'فيلا مفروشة',
                    'empty_villa'         => 'فيلا فارغة',
                    'shop'                => 'محل',
                    'empty_office'        => 'مكتب فارغ',
                    'furnished_office'    => 'مكتب مفروش',
                    default               => 'غير محدد',
                };
            }
        );
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
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

    public function departmentLabel() : Attribute {
        return Attribute::get(
            get: function () {
                if ($this->department == 'state_sale') {
                    return 'عقار بيع';
                }elseif ($this->department == 'state_rent'){
                    return 'عقار ايجار';
                }else{
                    return 'ارض بيع';
                }
            }
        );
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TenantContract extends Model
{
    use HasFactory;


    protected $guarded = [];


    public function tenant(): BelongsTo
    {

        return $this->belongsTo(Tenant::class,'tenant_id','id');
    }

    public function user(): BelongsTo
    {

        return $this->belongsTo(User::class,'user_id','id');

    }


    public function company(): BelongsTo
    {

        return $this->belongsTo(Company::class,'company_id','id');

    }

    public function receipts(): HasMany
    {

        return $this->hasMany(Receipt::class,'tenant_contract_id','id');
    }


    public function cashes(): HasMany
    {

        return $this->hasMany(Cash::class,'tenant_contract_id','id');
    }


    public function cashTypeText() : Attribute {
        return Attribute::get(
            get: function () {
                return $this->cash_type == 'company' ? 'تحصيل الايجار من خلال الشركه' : 'تحصيل الايجار من خلال المالك';

            }
        );
    }
}

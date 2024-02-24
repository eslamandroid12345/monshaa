<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Receipt extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tenant_contract(): BelongsTo
    {

        return $this->belongsTo(TenantContract::class,'tenant_contract_id','id');
    }

    public function user(): BelongsTo
    {

        return $this->belongsTo(User::class,'user_id','id');
    }

    public function company(): BelongsTo
    {

        return $this->belongsTo(Company::class,'company_id','id');
    }

}

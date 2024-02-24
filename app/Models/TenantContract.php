<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
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

}

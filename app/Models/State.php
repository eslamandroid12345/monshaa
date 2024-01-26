<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class State extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {

        return $this->belongsTo(User::class,'user_id','id');
    }


    public function employee(): BelongsTo
    {

        return $this->belongsTo(Employee::class,'employee_id','id');
    }

    public function realStateImages() : Attribute {
        return Attribute::get(get: function ($value) {
                if ($value !== null) {
                    return url($value);
                }
                return [];
            }
        );
    }
}

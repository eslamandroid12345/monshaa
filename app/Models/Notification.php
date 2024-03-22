<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class,'company_id','id');
    }


    public function notificationViews(): HasMany
    {
        return $this->hasMany(NotificationView::class,'notification_id','id');
    }


}

<?php

namespace App\Repository\Eloquent;

use App\Models\Notification;
use App\Repository\NotificationRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NotificationRepository extends Repository implements NotificationRepositoryInterface
{

    protected Model $model;

    public function __construct(Notification $model)
    {
        parent::__construct($model);
    }

    public function getAllNotifications(): LengthAwarePaginator
    {

        DB::table('notification_views')
            ->where('user_id','=',employeeId())
            ->update(['is_view' => 1]);

        return $this->model::query()
            ->latest()
            ->where('company_id','=',companyId())
            ->whereRelation('notificationViews','user_id','=',employeeId())
            ->paginate(16);
    }
}

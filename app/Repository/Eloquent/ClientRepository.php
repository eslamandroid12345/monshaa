<?php

namespace App\Repository\Eloquent;

use App\Models\Client;
use App\Repository\ClientRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class ClientRepository  extends Repository implements ClientRepositoryInterface
{

    protected Model $model;

    public function __construct(Client $model)
    {
        parent::__construct($model);
    }

    public function getAllClients(): LengthAwarePaginator
    {

        $query = $this->model::query();

        $query->when(request()->has('phone') && request('phone') != null, function ($q)  {
            $q->where('phone', '=',request()->input('phone'));
        });


        $query->when(request()->has('status') && request('status') != null, function ($q)  {
            $q->where('status', '=',request()->input('status'));
        });

        $query->when(request()->has('user_id') && request('user_id') != null, function ($q)  {
            $q->where('user_id', '=',request()->input('user_id'));
        });


        $query->when(request()->has('inspection_date') && request('inspection_date') != null, function ($q)  {
            $q->whereDate('inspection_date', '=',request()->input('inspection_date'));
        });

        return $query
            ->latest()
            ->select(['*'])
            ->with(['user','company'])
            ->where('company_id','=',companyId())
            ->paginate(16);

    }


    public function getAllClientsInspectionToday()
    {

        return  $this->model::query()
            ->select(['*'])
            ->with(['user','company'])
            ->where('company_id','=',companyId())
            ->where('status','=','inspection')
            ->where('inspection_notification_send',0)
            ->whereDate('inspection_date','=',Carbon::now()->format('Y-m-d'))
            ->get();


    }
}

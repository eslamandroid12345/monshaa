<?php

namespace App\Repository\Eloquent;
use App\Models\TenantContract;
use App\Repository\TenantContractRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TenantContractRepository extends Repository implements TenantContractRepositoryInterface
{

    protected Model $model;

    public function __construct(TenantContract $model)
    {
        parent::__construct($model);
    }

    public function allTenantContracts(): LengthAwarePaginator
    {

        $query = $this->model::query();

        $query->when(request()->has('owner_phone') && request('owner_phone') != null, function ($q)  {
            $q->where('owner_phone', '=', request()->input('owner_phone'));
        });

        $query->when(request()->has('owner_card_number') && request('owner_card_number') != null, function ($q)  {
            $q->where('owner_card_number', '=', request()->input('owner_card_number'));
        });

        $query->when(request()->has('tenant_phone') && request('tenant_phone') != null, function ($q)  {
            $q->whereRelation('tenant','phone','=',request()->input('tenant_phone'));
        });

        $query->when(request()->has('tenant_card_number') && request('tenant_card_number') != null, function ($q)  {
            $q->whereRelation('tenant','card_number','=',request()->input('tenant_card_number'));
        });

        return $query
            ->latest()
            ->select(['*'])
            ->with(['company'])
            ->where('company_id','=',companyId())
            ->paginate(16);
    }


    public function TenantContractsByFinancialBonds(): LengthAwarePaginator
    {

        $query = $this->model::query();

        $query->when(request()->has('owner_phone') && request('owner_phone') != null, function ($q)  {
            $q->where('owner_phone', '=', request()->input('owner_phone'));
        });

        $query->when(request()->has('owner_card_number') && request('owner_card_number') != null, function ($q)  {
            $q->where('owner_card_number', '=', request()->input('owner_card_number'));
        });

        $query->when(request()->has('tenant_phone') && request('tenant_phone') != null, function ($q)  {
            $q->whereRelation('tenant','phone','=',request()->input('tenant_phone'));
        });

        $query->when(request()->has('tenant_card_number') && request('tenant_card_number') != null, function ($q)  {
            $q->whereRelation('tenant','card_number','=',request()->input('tenant_card_number'));
        });

        return $query
            ->latest()
            ->select(['*'])
            ->with(['company'])
            ->where('company_id','=',companyId())
            ->where('cash_type','=','company')
            ->paginate(16);
    }

    public function tenantContractsExpired(): LengthAwarePaginator
    {
       return TenantContract::query()
           ->latest()
           ->select(['*'])
           ->where('company_id','=',companyId())
            ->where('is_expired','=',1)
            ->where('is_show','=',1)
            ->with(['company'])
            ->paginate(16);
    }


    public function tenantContractsReports(): LengthAwarePaginator
    {

        $query = $this->model::query();


        $query->when(request()->has('date_from') && request()->has('date_to') && request('date_from') != null&& request('date_to') != null, function ($q) {
            $q->whereBetween('contract_date', [request()->input('date_from'), request()->input('date_to')]);
        });


        return $query
            ->latest()
            ->select(['*'])
            ->with(['user','company'])
            ->where('company_id','=',companyId())
            ->paginate(16);


    }

    public function getAllContractsExpiredCount($companyId): int
    {
        return $this->model::query()
            ->where('is_expired','=',0)
            ->where('company_id','=',$companyId)
            ->whereBetween('contract_date_to', [Carbon::now()->format('Y-m-d'), Carbon::now()->addDays(90)->format('Y-m-d')])
            ->count();
    }

    public function getAllContractsExpired($companyId)
    {
        return $this->model::query()
            ->select('id','company_id','contract_date_to','is_expired')
            ->where('is_expired','=',0)
            ->where('company_id','=',$companyId)
            ->whereBetween('contract_date_to', [Carbon::now()->format('Y-m-d'), Carbon::now()->addDays(90)->format('Y-m-d')])
            ->get();
    }

}

<?php

namespace App\Repository\Eloquent;
use App\Models\TenantContract;
use App\Repository\TenantContractRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

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
            ->where('company_id','=',companyId())
            ->whereDate('contract_date_to','=',Carbon::now()->addDays(90)->format('Y-m-d'))
            ->latest()
            ->select(['*'])
            ->with(['company'])
            ->where('company_id','=',companyId())
            ->paginate(16);
    }

}

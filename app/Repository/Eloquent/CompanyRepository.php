<?php

namespace App\Repository\Eloquent;

use App\Models\Company;
use App\Models\FcmToken;
use App\Models\User;
use App\Repository\CompanyRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CompanyRepository extends Repository implements CompanyRepositoryInterface
{

    protected Model $model;

    public function __construct(Company $model)
    {
        parent::__construct($model);
    }

    public function getAllCompanies()
    {

        $query = $this->model::query();

        $query->when(request()->has('company_phone') && request('company_phone') != null, function ($q)  {
            $q->where('company_phone', '=',request()->input('company_phone'));
        });


        $companies = $this->model::query()
            ->select('id','date_start_subscription','date_end_subscription','is_active','is_package')
            ->pluck('id')
            ->toArray();

        foreach ($companies as $companyId){

            $company = $this->model::query()->find($companyId);

            if(Carbon::now()->format('Y-m-d') >= $company->date_end_subscription){

                $company->update(['is_active' => 0]);

                $users = User::query()
                    ->select('id','company_id','is_active')
                    ->where('company_id','=',$companyId)
                    ->get();

                foreach ($users as $user) {
                    $user->update(['is_active' => 0,]);
                }

                $fcmTokens = FcmToken::query()
                    ->whereHas('user', function ($q) use($companyId){
                        $q->where('company_id','=',$companyId);
                    })
                    ->get();

                foreach ($fcmTokens as $token){
                    $token->delete();
                }
            }
        }

        return $query
            ->with(['admin'])
            ->latest()
            ->paginate(16);

    }

    public function countEmployees(): int
    {
        return User::query()
            ->where('company_id','=',companyId())
            ->where('is_admin','=',0)
            ->count();
    }

    public function checkCompanyLimit(): int
    {
        return auth('user-api')->user()->company->number_of_employees;
    }
}

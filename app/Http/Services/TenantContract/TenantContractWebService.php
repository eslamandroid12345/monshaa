<?php

namespace App\Http\Services\TenantContract;

use App\Http\Requests\StoreTenantContractRequest;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantContractRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Http\Resources\TenantContractResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class TenantContractWebService extends TenantContractService
{
    public function allTenantContracts(){

        try {

            $contracts = $this->tenantContractRepository->allTenantContracts();
            return view('admin.contracts.index', compact('contracts'));

        }catch (\Exception $e) {
            toastr()->error('يوجد خطاء اثناء عرض بيانات عقود الايجار ');
            return redirect()->back();
        }
    }

    public function tenantContractsExpired(){

        try {

            $contracts =  $this->tenantContractRepository->tenantContractsExpired();
            return view('admin.contracts.expired',compact('contracts'));

        } catch (\Exception $e) {
            toastr()->error('يوجد خطاء اثناء عرض بيانات عقود الايجار المنتهيه');
            return redirect()->back();
        }
    }

    public function  removeFromScreen($id)
    {
        $tenantContract = $this->tenantContractRepository->getById($id);
        if($tenantContract->is_expired == 0){
            toastr()->error('هذ العقد غير منتهي!');
            return redirect()->back();
        }

        $this->tenantContractRepository->update($tenantContract->id,['is_show' => 0]);
        toastr()->success('تم حذف العقد المنتهي من القائمه!');
        return redirect()->back();
    }

    public function create(StoreTenantRequest $tenantRequest,StoreTenantContractRequest $request){

        DB::beginTransaction();
        try {

            $inputs = $this->storeTenantContract($request);
            if (!is_null($request->input('tenant_id'))) {
                $this->tenantRepository->getById($request->input('tenant_id'));
                $this->setExistingTenantInputs($inputs);
            } else {
                $tenant = $this->createNewTenant($tenantRequest);
                $inputs['tenant_id'] = $tenant->id;
            }

            $tenantContract = $this->tenantContractRepository->create($inputs);
            $this->expenseRepository->create([
                'real_state_address' => $tenantContract->real_state_address,
                'owner_name' => $tenantContract->owner_name,
                'type' => 'revenue',
                'company_id' => companyId(),
                'user_id' => employeeId(),
                'tenant_contract_id' => $tenantContract->id,
                'total_money' => $tenantContract->commission,
                'description' => 'عقد ايجار',
                'transaction_date' => $tenantContract->contract_date,
            ]);

            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم اضافه بيانات عقد ايجار لديك بواسطه ' . employee() ],userId: employeeId(),permission: 'tenant_contracts');
            DB::commit();

            toastr()->success('تم اضافه بيانات عقد الايجار بنجاح');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('يوجد خطاء اثناء تسجيل عقد الايجار!');
            return redirect()->back();

        }
    }

    protected function storeTenantContract(StoreTenantContractRequest $request): array{

        $inputs = $request->validated();
        $inputs['user_id'] = employeeId();
        $inputs['company_id'] = companyId();
        return $inputs;
    }

    protected function setExistingTenantInputs(array &$inputs): void{
        $inputs['tenant_id'] = request('tenant_id');
    }


    protected function createNewTenant(StoreTenantRequest $request): ?Model{
        $tenantRequests = $request->validated();
        $tenantRequests['company_id'] = companyId();

        return $this->tenantRepository->create($tenantRequests);
    }


    public function update($id,UpdateTenantRequest $tenantRequest,UpdateTenantContractRequest $request){

        DB::beginTransaction();
        try {

            $tenantContract = $this->tenantContractRepository->getById($id);
            Gate::authorize('check-company-auth',$tenantContract);

            $tenantRequests =  $tenantRequest->validated();
            $tenantContractRequests =  $request->validated();
            $this->tenantRepository->update($tenantContract->tenant_id,$tenantRequests);//update tenant
            $this->tenantContractRepository->update($tenantContract->id,$tenantContractRequests);//update tenant contract

            $tenantContract = $this->tenantContractRepository->getById($id);//tenant contract last update

            $revenue = $this->expenseRepository->first('tenant_contract_id',$tenantContract->id);//get revenue belongs to tenant contract
            $this->expenseRepository->update($revenue->id,[
                'real_state_address' => $tenantContract->real_state_address,
                'owner_name' => $tenantContract->owner_name,
                'total_money' => $tenantContract->commission
            ]);//update revenue

            DB::commit();

            toastr()->success('تم تحديث بيانات عقد الايجار بنجاح');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('يوجد خطاء اثناء تحديث عقد الايجار!');
            return redirect()->back();

        }
    }

    public function show($id){

        $contract = $this->tenantContractRepository->getById($id);
        Gate::authorize('check-company-auth',$contract);
        return view('admin.contracts.show',compact('contract'));

    }

    public function delete($id){

        DB::beginTransaction();
        try {

            $tenantContract = $this->tenantContractRepository->getById($id);
            Gate::authorize('check-company-auth',$tenantContract);
            $this->tenantContractRepository->delete($tenantContract->id);

            DB::commit();
            toastr()->success('تم حذف بيانات عقد الايجار بنجاح');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('يوجد خطاء اثناء حذف عقد الايجار!');
            return redirect()->back();
        }
    }
}

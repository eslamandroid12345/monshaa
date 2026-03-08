<?php

namespace App\Http\Services\State;

use App\Http\Requests\StateRequest;
use App\Http\Resources\StateResource;
use Illuminate\Support\Facades\Gate;

class StateWebService extends StateService
{
    public function getAllStates()
    {
        try {
            $states = $this->stateRepository->getAllStatusQuery();
            $employees = $this->userRepository->usersSelect();

            return view('admin.states.index', compact('states', 'employees'));
        } catch (\Exception $e) {
            return redirect()->back()->with('state_index_error','يوجد خطاء اثناء عرض بيانات العقارات!');

        }
    }

    public function create(StateRequest $request)
    {
        try {
            $inputs = $request->validated();
            $inputs['user_id'] = employeeId();
            $inputs['company_id'] = companyId();
            $inputs['real_state_space_price'] = $inputs['department'] == 'sale' ? ($inputs['real_state_price'] / $inputs['real_state_space']) : 0;

            $state = $this->stateRepository->create($inputs);
            $this->uploadImages($request,$state);
            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم اضافه بيانات عقار جديد لديك بواسطه ' . employee() ],userId: employeeId(),permission: 'states');

            return redirect()->back()->with('state_create','تم اضافه بيانات العقار بنجاح!');
        } catch (\Exception $e) {
            return redirect()->back()->with('state_create_error','حدث خطاء اثناء اضافه بيانات العقار!');
        }
    }


    public function update($id,StateRequest $request)
    {
        try {
            $state = $this->stateRepository->getById($id);
            Gate::authorize('check-company-auth',$state);
            Gate::authorize('check-user-auth',$state);
            $inputs = $request->validated();
            $inputs['real_state_space_price'] = $inputs['department'] == 'sale' ? ($inputs['real_state_price'] / $inputs['real_state_space']) : 0;
            $this->stateRepository->update($state->id,$inputs);

            $this->updateImages($request,$state);

            return redirect()->back()->with('state_update','تم تعديل بيانات العقار  بنجاح');

        }catch (\Exception $e) {
            return redirect()->back()->with('state_update_error','حدث خطاء اثناء تعديل بيانات العقار!');
        }
    }

    public function show($id)
    {
        $state = $this->stateRepository->getById($id);
        Gate::authorize('check-company-auth',$state);
        $state = $this->getService->handle(resource: StateResource::class,repository: $this->stateRepository,method: 'getById',parameters: [$id],is_instance: true,message:'تم عرض بيانات العقار  بنجاح' );
        return view('admin.states.show', compact('state'));

    }

    public function delete($id)
    {
        $state = $this->stateRepository->getById($id);
        Gate::authorize('check-company-auth',$state);
        Gate::authorize('check-user-auth',$state);
        $this->deleteExistingImages($state);
        $this->stateRepository->delete($state->id);
        $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم حذف عقار لديك بواسطه ' . employee() ],userId: employeeId(),permission: 'states');

        return redirect()->back()->with('state_delete','تم حذف بيانات العقار  بنجاح');

    }

}

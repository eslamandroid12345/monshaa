<?php

namespace App\Http\Services\State;

use App\Http\Requests\StateRequest;
use App\Http\Resources\StateResource;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Gate;

class StateWebService extends StateService
{
    public function getAllStates()
    {
        try {
            $states = $this->stateRepository->getAllStatusQuery();

            $employees = $this->userRepository->usersSelect();

            return view('admin.states.index', compact('states','employees'));
        }  catch (AuthorizationException $exception){
            toastr()->error('غير مصرح لك للدخول لذلك الصفحه');
        } catch (\Exception $e) {
            toastr()->error('يوجد خطاء ما في بيانات الارسال بالسيرفر');
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

            toastr()->success('تم اضافه البيانات بنجاح' );
            return redirect()->back();

        } catch (AuthorizationException $exception){
            toastr()->error('غير مصرح لك للدخول لذلك الصفحه');
            return redirect()->back();
        } catch (\Exception $e) {
            toastr()->error('حصل خطاء اثناء اضافه بيانات العقار');
            return redirect()->back();
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

            toastr()->success('تم تعديل بيانات العقار  بنجاح');
            return redirect()->back();

        } catch (ModelNotFoundException $exception) {
            toastr()->error('بيانات العقار غير موجوده');
            return redirect()->back();
        } catch (AuthorizationException $exception){
            toastr()->error('ليس لديك صلاحيه علي هذا');
            return redirect()->back();
        } catch (\Exception $e) {
            toastr()->error('يوجد خطاء ما في بيانات الارسال بالسيرفر');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        try {
            $state = $this->stateRepository->getById($id);
            Gate::authorize('check-company-auth',$state);
            $state = $this->getService->handle(resource: StateResource::class,repository: $this->stateRepository,method: 'getById',parameters: [$id],is_instance: true,message:'تم عرض بيانات العقار  بنجاح' );
            return view('admin.states.show', compact('state'));

        } catch (ModelNotFoundException $exception){
            toastr()->error('بيانات العقار غير موجوده');
            return redirect()->back();
        }
    }

    public function changeStatus($id)
    {
        try {
            $state = $this->stateRepository->getById($id);
            Gate::authorize('check-company-auth',$state);

            $this->stateRepository->update($state->id,['status' => $state->department]);

            toastr()->success('تم تغيير حاله العقار  بنجاح');
            return redirect()->back();
        } catch (ModelNotFoundException $exception){
            toastr()->error('بيانات العقار غير موجوده');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            $state = $this->stateRepository->getById($id);
            Gate::authorize('check-company-auth',$state);
            Gate::authorize('check-user-auth',$state);
            $this->deleteExistingImages($state);
            $this->stateRepository->delete($state->id);
            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم حذف عقار لديك بواسطه ' . employee() ],userId: employeeId(),permission: 'states');

            toastr()->success('تم حذف بيانات العقار  بنجاح');
            return redirect()->back();

        } catch (AuthorizationException $exception){
            toastr()->error('ليس لديك صلاحيه علي هذا');
            return redirect()->back();
        } catch (ModelNotFoundException $exception){
            toastr()->error('بيانات العقار غير موجوده');
            return redirect()->back();
        }
    }

}

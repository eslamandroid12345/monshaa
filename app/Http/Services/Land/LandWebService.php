<?php

namespace App\Http\Services\Land;

use App\Http\Requests\LandRequest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Gate;

class LandWebService extends LandService
{

    public function getAllLands()
    {
        try {
            $lands = $this->landRepository->getAllLandsQuery();
            $employees = $this->userRepository->usersSelect();
            return view('admin.lands.index', compact('lands','employees'));
        } catch (AuthorizationException $exception){
            toastr()->error('غير مصرح لك للدخول لذلك الصفحه');
            return redirect()->back();
        } catch (\Exception $e) {
            toastr()->error('يوجد خطاء اثناء عرض بيانات الاراضي يرجي اعاده المحاوله!');
            return redirect()->back();
        }
    }

    public function create(LandRequest $request)
    {
        try {
            $inputs = $request->validated();
            $inputs['user_id'] = employeeId();
            $inputs['company_id'] = companyId();

            $land = $this->landRepository->create($inputs);
            $this->uploadImages($request,$land);
            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم اضافه بيانات ارض جديده لديك بواسطه ' . employee() ],userId: employeeId(),permission: 'lands');

            toastr()->success('تم تسجيل بيانات الارض بنجاح');
            return redirect()->back();
        } catch (\Exception $e) {
            toastr()->error('يوجد خطاء اثناء اضافه بيانات الارض يرجي اعاده المحاوله!');
            return redirect()->back();
        }
    }


    public function update($id,LandRequest $request)
    {
        try {

            $land = $this->landRepository->getById($id);
            Gate::authorize('check-company-auth',$land);
            Gate::authorize('check-user-auth',$land);
            $inputs = $request->validated();
            $this->landRepository->update($land->id, $inputs);
            $this->updateImages($request,$land);

            toastr()->success('تم تعديل بيانات الارض بنجاح');
            return redirect()->back();
        }catch (\Exception $e) {
            toastr()->error('يوجد خطاء اثناء تعديل بيانات الارض يرجي اعاده المحاوله!');
            return redirect()->back();
        }
    }

    public function show($id)
    {

        $land = $this->landRepository->getById($id);
        Gate::authorize('check-company-auth',$land);

        return view('admin.lands.show',compact('land'));

    }

    public function changeStatus($id)
    {
        try {
            $land = $this->landRepository->getById($id);
            Gate::authorize('check-company-auth',$land);
            $this->landRepository->update($land->id, ['status' => 'sale']);

            toastr()->success('تم تغيير حاله الارض بنجاح');
            return redirect()->back();
        }  catch (\Exception $e) {
            toastr()->error('يوجد خطاء اثناء تعديل بيانات الارض يرجي اعاده المحاوله!');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            $land = $this->landRepository->getById($id);
            Gate::authorize('check-company-auth',$land);
            Gate::authorize('check-user-auth',$land);
            $this->deleteExistingImages($land);

            $this->landRepository->delete($land->id);
            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم حذف ارض لديك بواسطه ' . employee() ],userId: employeeId(),permission: 'lands');
            toastr()->success('تم حذف بيانات الارض بنجاح');
            return redirect()->back();

        }  catch (\Exception $e) {
            toastr()->error('يوجد خطاء اثناء تعديل بيانات الارض يرجي اعاده المحاوله!');
            return redirect()->back();
        }
    }
}

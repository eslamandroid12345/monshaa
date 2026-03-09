<?php

namespace App\Http\Services\Land;

use App\Http\Requests\LandRequest;
use Illuminate\Support\Facades\Gate;

class LandWebService extends LandService
{

    public function getAllLands()
    {
        try {
            $lands = $this->landRepository->getAllLandsQuery();
            $employees = $this->userRepository->usersSelect();
            return view('admin.lands.index', compact('lands','employees'));
        } catch (\Exception $e) {
            return redirect()->back()->with('land_index_error','يوجد خطاء اثناء عرض بيانات الاراضي يرجي اعاده المحاوله!');

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

            return redirect()->back()->with('land_create','تم تسجيل بيان الارض بنجاح!');

        } catch (\Exception $e) {
            return redirect()->back()->with('land_create_error','يوجد خطاء اثناء تسجيل بيانات الاراضي يرجي اعاده المحاوله!');

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

            return redirect()->back()->with('land_update','تم تعديل بيان الارض بنجاح!');

        }catch (\Exception $e) {
            return redirect()->back()->with('land_update_error','يوجد خطاء اثناء تعديل بيانات الاراضي يرجي اعاده المحاوله!');

        }
    }

    public function show($id)
    {

        $land = $this->landRepository->getById($id);
        Gate::authorize('check-company-auth',$land);
        return view('admin.lands.show',compact('land'));

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
            return redirect()->back()->with('land_delete','تم حذف بيان الارض بنجاح!');

        }  catch (\Exception $e) {
            return redirect()->back()->with('land_delete_error','حدث خطاء اثناء حذف بيان الارض يرجي اعاده المحاوله!');

        }
    }
}

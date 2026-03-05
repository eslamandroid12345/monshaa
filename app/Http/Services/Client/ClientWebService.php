<?php

namespace App\Http\Services\Client;

use App\Http\Requests\Client\ClientRequest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ClientWebService extends ClientService
{

    public function getAllClients(){

        try {
            $clients = $this->clientRepository->getAllClients();
            $employees = $this->userRepository->usersSelect();
            return view('admin.clients.index', compact('clients','employees'));
        }catch (AuthorizationException $exception){
            toastr()->error('غير مصرح لك للدخول لذلك الصفحه');
            return redirect()->back();
        } catch (\Exception $e) {
            toastr()->error('يوجد خطاء بعرض بيانات العملاء!');
            return redirect()->back();
        }
    }

    public function create(ClientRequest $request){

        try {
            $inputs = $request->validated();
            $inputs['company_id'] = companyId();
            $inputs['user_id'] = employeeId();
            $client = $this->clientRepository->create($inputs);
            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم اضافه عميل لمعاينه لديك بواسطه ' . employee() ],userId: employeeId(),permission: 'clients');

            toastr()->success('تم تسجيل بيانات العميل بنجاح');
            return redirect()->back();
        }catch (AuthorizationException $exception){
            toastr()->error('غير مصرح لك للدخول لذلك الصفحه');
            return redirect()->back();
        } catch (\Exception $e) {
            toastr()->error('يوجد خطاء  بيانات العميل!');
            return redirect()->back();
        }
    }

    public function update($id,ClientRequest $request){

        DB::beginTransaction();
        try {
            $client = $this->clientRepository->getById($id);
            Gate::authorize('check-company-auth',$client);
            $inputs = $request->validated();
            $this->clientRepository->update($client->id,$inputs);

            DB::commit();
            toastr()->success('تم تعديل بيانات العميل بنجاح');
            return redirect()->back();

        }catch (ModelNotFoundException $exception) {
            DB::rollBack();
            toastr()->error('بيانات العميل غير موجوده');
            return redirect()->back();
        } catch (AuthorizationException $exception){
            DB::rollBack();
            toastr()->error('غير مصرح لك بالدخول لهذه الصفحه');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('حدث خطاء اثناء تحديث بيانات العميل');
            return redirect()->back();
        }
    }

    public function show($id){

        $client = $this->clientRepository->getById($id);
        Gate::authorize('check-company-auth',$client);

        return view('admin.clients.show', compact('client'));
    }

    public function delete($id){

        try {

            $client = $this->clientRepository->getById($id);
            Gate::authorize('check-company-auth',$client);
            $this->clientRepository->delete($client->id);
            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم حذف عميل معاينه بواسطه ' . employee() ],userId: employeeId(),permission: 'clients');

            toastr()->error('تم حذف بيانات العميل بنجاح');
            return redirect()->back();
        } catch (ModelNotFoundException $exception) {
            toastr()->error('بيانات العميل غير موجوده');
            return redirect()->back();
        }catch (AuthorizationException $exception){
            toastr()->error('غير مصرح لك بالدخول لهذه الصفحه');
            return redirect()->back();
        }catch (\Exception $e) {
            toastr()->error('حدث خطاء اثناء حذف بيانات العميل');
            return redirect()->back();
        }
    }
}

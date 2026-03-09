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
        } catch (\Exception $e) {
            return redirect()->back()->with('client_index_error','يوجد خطاء اثناء عرض بيانات العملاء يرجي اعاده المحاوله!');

        }
    }

    public function create(ClientRequest $request){

        try {
            $inputs = $request->validated();
            $inputs['company_id'] = companyId();
            $inputs['user_id'] = employeeId();
            $this->clientRepository->create($inputs);
            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم اضافه عميل لمعاينه لديك بواسطه ' . employee() ],userId: employeeId(),permission: 'clients');

            return redirect()->back()->with('client_create','تم تسجيل بيانات العميل بنجاح!');

        }catch (\Exception $e) {
            return redirect()->back()->with('client_create_error','يوجد خطاء اثناء تسجيل بيانات العميل يرجي اعاده المحاوله!');

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
            return redirect()->back()->with('client_update','تم تعديل بيانات العميل بنجاح!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('client_update_error','يوجد خطاء اثناء تعديل بيانات العميل يرجي اعاده المحاوله!');
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

            return redirect()->back()->with('client_delete','تم حذف بيانات العميل بنجاح!');
        } catch (\Exception $e) {
            return redirect()->back()->with('client_delete_error','يوجد خطاء اثناء حذف بيانات العميل يرجي اعاده المحاوله!');

        }
    }
}

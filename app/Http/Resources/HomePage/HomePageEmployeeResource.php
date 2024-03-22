<?php

namespace App\Http\Resources\HomePage;

use Illuminate\Http\Resources\Json\JsonResource;

class HomePageEmployeeResource extends JsonResource
{


    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'logo' => $this->company->logo,
            'name' => $this->name,
            'user_type' => 'employee',
            'company_name' => $this->company->company_name,
            'permissions' => $this->getAllPermissions(),
            'home' => $this->checkHomePage(),

        ];
    }

    private function getAllPermissions(): array
    {

        $sidebars = $this->getHomePageSidebar();

        $permissions = [];

        foreach ($sidebars as $sidebar){
            if(in_array($sidebar['key'],json_decode($this->employee_permissions,true) )){
                $permissions[] = $sidebar;
            }else if($sidebar['key'] === 'home_page' || $sidebar['key'] === 'setting'){
                $permissions[] = $sidebar;
            }
        }

        return $permissions;

    }


    private function getHomePageSidebar(): array
    {

        return [

            [
                'key' => 'home_page',
                'name' => 'الصفحه الرئيسيه',
                'icon' => 'home',
                'count' => 0
            ],

            [
                'key' => 'states',
                'name' => 'العقارات',
                'icon' => 'holiday_village_outlined',
                'count' => 0
            ],


            [
                'key' => 'lands',
                'name' => 'الاراضي',
                'icon' => 'landscape_outlined',
                'count' => 0
            ],


            [
                'key' => 'tenants',
                'name' => 'المستاجرين',
                'icon' => 'verified_user_outlined',
                'count' => 0
            ],

            [
                'key' => 'tenant_contracts',
                'name' => 'عقود الايجار',
                'icon' => 'book',
                'count' => 0
            ],


            [
                'key' => 'expired_contracts',
                'name' => 'العقود المنتهيه',
                'icon' => 'book',
                'count' => 0
            ],

            [
                'key' => 'financial_cash',
                'name' => 'سندات القبض',
                'icon' => 'receipt_long_outlined',
                'count' => 0
            ],

            [
                'key' => 'financial_receipt',
                'name' => 'سندات الصرف',
                'icon' => 'long_receipt',
                'count' => 0
            ],

            [
                'key' => 'revenue',
                'name' => 'الايردات',
                'icon' => 'price_change_outlined',
                'count' => 0
            ],

            [
                'key' => 'expenses',
                'name' => 'المصروفات',
                'icon' => 'monetization_on_outlined',
                'count' => 0
            ],


            [
                'key' => 'employees',
                'name' => 'الموظفين',
                'icon' => 'supervised_user_circle_rounded',
                'count' => 0
            ],

            [
                'key' => 'clients',
                'name' => 'العملاء',
                'icon' => 'people_alt_outlined',
                'count' => 0
            ],



            [
                'key' => 'notifications',
                'name' => 'الاشعارات',
                'icon' => 'notification_add',
                'count' => $this->company->notifications_count,
            ],


            [
                'key' => 'reports',
                'name' => 'التقارير',
                'icon' => 'leaderboard_outlined',
                'count' => 0
            ],

            [
                'key' => 'setting',
                'name' => 'الاعدادات',
                'icon' => 'settings',
                'count' => 0
            ],
            [
                'key' => 'technical_support',
                'name' => 'الدعم الفني',
                'icon' => 'mail_contact',
                'count' => 0
            ],




        ];//end sidebar
    }


    public function checkHomePage(): array
    {

        $array = [];

        $tabs = $this->getHomePageTabs();


        $getAllPermissions = json_decode($this->employee_permissions,true);

        foreach ($tabs as $tab){

            if(in_array($tab['key'],$getAllPermissions)){

                $array[] = $tab;
            }
        }
        return $array;

    }


    private function getHomePageTabs(): array
    {

        return [

            [
                'key' => 'selling_states',
                'name' => 'عقارات البيع',
                'icon' => 'images/building.png',
                'count' =>  $this->company->selling_states_count
            ],

            [
                'key' => 'tenant_states',
                'name' => 'عقارات الايجار',
                'icon' => 'images/house.png',
                'count' => $this->company->tenant_states_count,
            ],

            [
                'key' => 'clients',
                'name' => 'العملاء',
                'icon' => 'images/people.png',
                'count' =>  $this->company->clients_count
            ],

            [
                'key' => 'lands',
                'name' => 'الاراضي',
                'icon' => 'images/land.png',
                'count' =>  $this->company->lands_count
            ],

            [
                'key' => 'tenants',
                'name' => 'المستاجرين',
                'icon' => 'images/person.png',
                'count' => $this->company->tenants_count
            ],

            [
                'key' => 'tenant_contracts',
                'name' => 'عقود الايجار',
                'icon' => 'images/lease.png',
                'count' => $this->company->tenant_contracts_count
            ],

            [
                'key' => 'employees',
                'name' => 'الموظفين',
                'icon' => 'images/people.png',
                'count' => $this->company->employees_count
            ],
            [
                'key' => 'revenue',
                'name' => 'الايردات',
                'icon' => 'images/hu.png',
                'count' => $this->company->revenues_count,
            ],

            [
                'key' => 'expenses',
                'name' => 'المصروفات',
                'icon' => 'images/give.png',
                'count' => $this->company->expenses_count
            ],


            [
                'key' => 'profits',
                'name' => 'الارباح',
                'icon' => 'images/mo.png',
                'count' => $this->company->profitsCount
            ],

        ];

    }
}

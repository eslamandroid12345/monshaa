<?php

namespace App\Http\Resources\HomePage;

use Illuminate\Http\Resources\Json\JsonResource;

class HomePageAdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

        public function toArray($request){
        return [

            'id' => $this->id,
            'logo' => $this->company->logo,
            'name' => $this->name,
            'user_type' => 'admin',
            'company_name' => $this->company->company_name,
            'sidebar' => $this->sidebarPermissions(),
            'home' =>  [

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
                    'key' => 'shops',
                    'name' => 'العملاء',
                    'icon' => 'images/employees.png',
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

            ],//end home

        ];

    }


    public function sidebarPermissions(): array
    {

     $permissions =    [
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
                 'key' => 'employee_commission',
                 'name' => 'عموله الموظفين',
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
                'count' => $this->company->notifications_count
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

             [
                 'key' => 'companies',
                 'name' => 'الشركات',
                 'icon' => 'people_alt_outlined',
                 'count' => 0
             ],

             [
                 'key' => 'messages',
                 'name' => 'جميع الرسائل',
                 'icon' => 'mail_contact',
                 'count' => $this->company->messages_count,
             ],

        ];


        $array = [];

        foreach ($permissions as $sidebar) {
            if (auth('user-api')->user()->is_administrator === 0 && ($sidebar['key'] === 'companies' || $sidebar['key'] === 'messages')) {
                continue;
            }

            $array[] = $sidebar;
        }
        return $array;

    }
}

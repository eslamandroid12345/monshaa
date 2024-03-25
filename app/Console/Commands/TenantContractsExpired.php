<?php

namespace App\Console\Commands;

use App\Http\Traits\FirebaseNotification;
use App\Models\Company;
use App\Models\TenantContract;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TenantContractsExpired extends Command
{

    use FirebaseNotification;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'contracts:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'TenantContracts:expired';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        $companies = Company::query()->pluck('id')->toArray();

        foreach ($companies as $companyId){

            $tenantContractsExpired = TenantContract::query()
                ->where('company_id','=',$companyId)
                ->whereDate('contract_date_to','=',Carbon::now()->addDays(90)->format('Y-m-d'))
                ->count();

            if($tenantContractsExpired > 0){
                DB::table('tenant_contracts')
                    ->where('company_id','=',$companyId)
                    ->whereDate('contract_date_to','=',Carbon::now()->addDays(90)->format('Y-m-d'))
                    ->update(['is_expired' => 1]);
                $this->sendFirebaseForCompany(data: ['title' => 'اشعار جديد لديك','body' => ' يجب عليك الاطلاع علي جميع العقود المنتهيه ' ],companyId: $companyId,permission: 'expired_contracts');

            }

        }

    }
}

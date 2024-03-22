<?php

namespace App\Console\Commands;

use App\Http\Traits\FirebaseNotification;
use App\Http\Traits\Responser;
use App\Models\Notification;
use App\Models\TenantContract;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

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
    protected $description = 'TenantContracts expired';

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


        $tenantContracts = TenantContract::query()
            ->where('company_id','=',companyId())
            ->whereDate('contract_date_to','=',Carbon::now()->format('Y-m-d'))
            ->count();


        $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' يجب عليك الاطلاع علي جميع العقود المنتهيه ' ],userId: $employeeId,permission: 'expired_contracts');

    }
}

<?php

namespace App\Console\Commands;

use App\Models\Company;
use App\Models\FcmToken;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Tymon\JWTAuth\Facades\JWTAuth;

class ExpireCompanies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expire:companies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check date_end_subscription to expire all companies and users belongs to this company';

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

        $companies = Company::query()
            ->where('date_end_subscription','=',Carbon::now()->format('Y-m-d'))
            ->pluck('id')
            ->toArray();

        foreach ($companies as $companyId){

            $company = Company::query()->findOrFail($companyId);
            $company->update(['is_active' => 0]);

            $users = User::query()
                ->where('company_id','=',$companyId)
                ->get();

            foreach ($users as $user) {
                if ($user->access_token) {
                    JWTAuth::setToken($user->access_token)->invalidate();
                }
                $user->update([
                    'access_token' => null,
                    'is_active' => 0,
                ]);
            }

            $fcmTokens = FcmToken::query()
                ->whereHas('user', function ($q) use($companyId){
                    $q->where('company_id','=',$companyId);
                })
                ->get();

            foreach ($fcmTokens as $token){
                $token->delete();
            }
        }

    }
}

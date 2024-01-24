<?php

namespace App\Repository\Eloquent;

use App\Http\Services\Mutual\AuthService;
use App\Models\State;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class StateRepository extends Repository implements StateRepositoryInterface
{

    protected Model $model;

    protected AuthService $authService;


    public function __construct(State $model,AuthService $authService)
    {
        $this->authService = $authService;
        parent::__construct($model);
    }

    public function getAllStatusQuery(): LengthAwarePaginator
    {

        return $this->model::query()
            ->latest()
            ->select(['*'])
            ->with(['user'])
            ->where('user_id','=',$this->authService->checkGuard())
            ->where('status','=','waiting')
            ->paginate(10);

    }


}

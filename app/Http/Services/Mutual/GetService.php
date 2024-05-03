<?php

namespace App\Http\Services\Mutual;

use App\Http\Traits\Responser;
use App\Repository\RepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;

class GetService
{
    use Responser;

    public function handle($resource,RepositoryInterface $repository, $method = 'getAll', $parameters = [], $is_instance = false,$message = 'Success',$dataType = 'pagination'): JsonResponse
    {
        try {

            $data = $repository->$method(...$parameters);

            $records = $is_instance ? new $resource($data) : ($dataType == 'pagination' ? $resource::collection($data)->response()->getData(true) : $resource::collection($data));
            return $this->responseSuccess(data: $records, code: 200, message: $message);
        }
        catch (Exception $exception) {
            return $this->responseFail([],500,$exception->getMessage(),500);
        }
    }

}

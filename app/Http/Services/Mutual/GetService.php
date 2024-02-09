<?php

namespace App\Http\Services\Mutual;

use App\Http\Traits\Responser;
use App\Repository\RepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class GetService
{
    use Responser;

    public function handle($resource,RepositoryInterface $repository, $method = 'getAll', $parameters = [], $is_instance = false,$message = 'Data Get Successfully'): JsonResponse
    {
        try {

            $data = $repository->$method(...$parameters);
            $records = $is_instance ? new $resource($data) : $resource::collection($data);
            return $this->responseSuccess($records,$message,200);
        } catch (ModelNotFoundException $exception) {
            return $this->responseFail([],404,"Data Not Found",404);
        }
        catch (Exception $exception) {
            return $this->responseFail([],500,$exception->getMessage(),500);
        }
    }

}

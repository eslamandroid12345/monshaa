<?php

namespace App\Repository\Eloquent;

use App\Http\Traits\FileManager;
use App\Repository\RepositoryInterface;
use Carbon\Carbon;
use Closure;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

abstract class Repository implements RepositoryInterface
{
    use FileManager;

    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->model->with($relations)->get($columns);
    }

    public function getActive(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->model->with($relations)->where('is_active', true)->get($columns);
    }

    public function getById(
        $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): ?Model {
        return $this->model->select($columns)->with($relations)->findOrFail($modelId)->append($appends);
    }


    public function getByColumn(
        $key,
        $value
    ) {
        return $this->model->where($key,$value)->first();
    }

    public function getByIdWithCondition(
        $modelId,
        $byColumn,
        $byValue,
        array $columns = ['*'],
        array $relations = [],
    ): ?Model {
        return $this->model->where($byColumn,'=',$byValue)->select($columns)->with($relations)->findOrFail($modelId);
    }

    public function get(
        $byColumn,
        $value,
        array $columns = ['*'],
        array $relations = [],
    ): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->model::query()->latest()->select($columns)->with($relations)->where($byColumn, $value)->paginate(16);
    }

    public function getByTwoColumns(
        $byColumn1,
        $value1,
        $byColumn2,
        $value2,
        array $columns = ['*'],
        array $relations = [],
    ): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->model::query()->latest()->select($columns)->with($relations)->where($byColumn1, $value1)->where($byColumn2, $value2)->paginate(10);
    }


    public function first(
        $byColumn,
        $value,
        array $columns = ['*'],
        array $relations = [],
    ): Builder|Model|null {
        return $this->model::query()->select($columns)->with($relations)->where($byColumn, $value)->first();
    }

    public function getFirst(): ?Model
    {
        return $this->model->first();
    }
    public function create(array $payload): ?Model
    {
        $model = $this->model->create($payload);
        return $model->fresh();
    }

    public function insert(array $payload): bool
    {
        $model = $this->model::query()->insert($payload);
        return $model;
    }

    public function createMany(array $payload): bool
    {
        try {
            foreach ($payload as $record) {
                $this->model::query()->create($record);
            }
            return true;
        } catch (Exception $e) {
            Log::error('CATCH: '. $e);
            return false;
        }
    }

    public function update($modelId, array $payload): bool
    {
        $model = $this->getById($modelId);
        return $model->update($payload);
    }

    public function updateOrCreate(array $keysUnique, array $payload)
    {
        return $this->model->updateOrCreate($keysUnique,$payload);
    }
    public function delete($modelId, array $filesFields = []): bool
    {
        $model = $this->getById($modelId);
        foreach ($filesFields as $field) {
            if ($model->$field !== null) {
                $this->deleteFile($model->$field);
            }
        }
        return $model->delete();
    }


    public function deleteWithMultipleFiles($modelId,$oldPath): bool
    {
        $model = $this->getById($modelId);
        $this->deleteFileMultiple($oldPath);
        return $model->delete();
    }

    public function forceDelete($modelId, array $filesFields = []): bool
    {
        $model = $this->getById($modelId);
        foreach ($filesFields as $field) {
            if ($model->$field !== null) {
                $this->deleteFile($model->$field);
            }
        }
        return $model->forceDelete();
    }

    public function paginate(int $perPage = 8, array $relations = [], $orderBy = 'ASC', $columns = ['*'])
    {
        return $this->model::query()->latest()->select($columns)->with($relations)->orderBy('id', $orderBy)->cursorPaginate($perPage);
    }

    public function paginateWithQuery(
        $query,
        int $perPage = 10,
        array $relations = [],
        $orderBy = 'ASC',
        $columns = ['*'],
    ) {
        return  $this->model::query()->select($columns)->where($query)->with($relations)->orderBy('id', $orderBy)->paginate($perPage);
    }

    public function whereHasMorph($relation, $class)
    {
        return $this->model::query()->whereHasMorph($relation, $class)->get();
    }




    public function getCountModel($column = null,$value = null): int
    {

        $query = $this->model::query();

        if (!empty($column) && !empty($value)) {
            $query->where($column, $value);
        }

        return $query->count();

    }


    public function getCountToday($column = null,$value = null): int
    {

        $query = $this->model::query()
            ->whereDate('created_at','=',Carbon::now()->format('Y-m-d'));

        if (!empty($column) && !empty($value)) {
            $query->where($column, $value);
        }

        return $query->count();
    }




    /**
     * @throws Exception
     */

}

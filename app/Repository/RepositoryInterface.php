<?php

namespace App\Repository;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

interface RepositoryInterface
{
    public function getAll(array $columns = ['*'], array $relations = []): Collection;

    public function getActive(array $columns = ['*'], array $relations = []): Collection;

    public function getById(
        $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): ?Model;

    public function getByColumn(
        $key,
        $value
    );
    public function getByIdWithCondition(
        $modelId,
        $byColumn,
        $byValue,
        array $columns = ['*'],
        array $relations = [],
    ): ?Model;

    public function get(
        $byColumn,
        $value,
        array $columns = ['*'],
        array $relations = [],
    ): \Illuminate\Contracts\Pagination\LengthAwarePaginator;

    public function getByTwoColumns(
        $byColumn1,
        $value1,
        $byColumn2,
        $value2,
        array $columns = ['*'],
        array $relations = [],
    ): \Illuminate\Contracts\Pagination\LengthAwarePaginator;


    public function getBy(
        $byColumn1,
        $value1,
        $byColumn2,
        $value2,
        array $columns = ['*'],
        array $relations = [],
    );

    public function first(
        $byColumn,
        $value,
        array $columns = ['*'],
        array $relations = [],
    ): Builder|Model|null;

    public function create(array $payload): ?Model;

    public function insert(array $payload): bool;

    public function getFirst(): ?Model;

    public function update($modelId, array $payload): bool;

    public function updateOrCreate(array $keysUnique, array $payload);

    public function delete($modelId, array $filesFields = []): bool;

    public function deleteWithMultipleFiles($modelId,$oldPath): bool;

    public function forceDelete($modelId, array $filesFields = []);

    public function paginate(int $perPage = 8, array $relations = [], $orderBy = 'ASC', $columns = ['*']);

    public function paginateWithQuery(
        $query,
        int $perPage = 10,
        array $relations = [],
        $orderBy = 'ASC',
        $columns = ['*'],
    );

    public function whereHasMorph($relation, $class);

    public function getCountModel($column = null,$value = null): int;

    public function getCountToday($column = null,$value = null): int;

    }

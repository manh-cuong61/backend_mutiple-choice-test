<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection as SupportCollection;

interface RepositoryInterface
{
    public function create(array $attributes = []): Model;

    public function insert(array $values): bool;

    public function update(Model|Builder $model, array $data): int|bool;

    public function delete(Model|Builder $model): mixed;

    public function destroy(SupportCollection|array|int|string $ids): mixed;

    public function find(mixed $id, array $columns = ['*']): Model|Collection|static|array|null;

    public function findByField(mixed $field, mixed $value): Builder;

    public function findByFields(array $conditions): Builder;

    public function buildWhere(array $conditions, Builder|Model $query = null): Builder|Model;

    public function buildWhereLike(array $conditions, Builder|Model $query = null): Builder|Model;

    public function buildWhereIn(array $conditions, Builder|Model $query = null): Builder|Model;

    public function buildWhereNotIn(array $conditions, Builder|Model $query = null): Builder|Model;

    public function buildWhereBetween(array $conditions, Builder|Model $query = null): Builder|Model;

    public function buildWhereNotBetween(array $conditions, Builder|Model $query = null): Builder|Model;

    public function buildPagination(int $page, int $perPage, Builder|Model $query = null): Builder|Model;

    public function getFirst(Builder|Model $query = null, bool $toArray = false): Model|Collection|array|null;

    public function getList(Builder $query = null, bool $toArray = false): Model|Collection|array|null;

    public function getCount(Collection $query = null, int $perPage): array;
}

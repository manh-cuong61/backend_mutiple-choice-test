<?php

namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function list(array $conditions, int|string $page, int|string $perPage): Collection|array|null;
    
    public function getTotal(array $conditions, int|string $perPage): array;

    public function updateByConditions(array $conditions, array $update): int|bool;

    public function findByConditions(array $conditions, bool $first = false, bool $toArray = false): Model|Collection|array|null;
}

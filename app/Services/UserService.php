<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserService
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    public function list(array $conditions, $page, $perPage): Collection|array|null
    {
        return $this->userRepository->list($conditions, $page, $perPage);
    }

    public function getTotal(array $conditions, $perPage): Collection|array|null
    {
        return $this->userRepository->getTotal($conditions, $perPage);
    }

    public function create(array $data): Model
    {
        return $this->userRepository->create($data);
    }

    public function update(User $user, array $data): int|bool
    {
        return $this->userRepository->update($user, $data);
    }

    public function updateByConditions(array $conditions, array $update): int|bool
    {
        return $this->userRepository->updateByConditions($conditions, $update);
    }

    public function findByConditions(array $conditions, bool $first = false, bool $toArray = false): Model|Collection|array|null
    {
        return $this->userRepository->findByConditions($conditions, $first, $toArray);
    }

    public function find(User $user): Model|Collection|static|array|null
    {
        return $this->userRepository->find($user->id);
    }

    public function destroy(mixed $id): mixed
    {
        return $this->userRepository->destroy($id);
    }
}

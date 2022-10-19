<?php

namespace App\Services;

use App\Repositories\ContactRepositoryInterface;

class ContactService {
    private $repository;

    public function __construct(ContactRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(array $payload)
    {
        return $this->repository->store($payload);
    }

    public function getContacts()
    {
        return $this->repository->getContacts(10);
    }

    public function get(int $id)
    {
        return $this->repository->get($id);
    }

    public function update(int $id,array $payload)
    {
        return $this->repository->update($id, $payload);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }
}

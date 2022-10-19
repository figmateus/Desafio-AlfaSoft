<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface ContactRepositoryInterface {
    public function __construct(Model $model);
    public function store(array $payload);
    public function getContacts();
    public function get(int $id);
    public function update(int $id, array $payload);
    public function destroy(int $id);
}

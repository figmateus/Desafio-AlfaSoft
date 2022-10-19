<?php

namespace App\Repositories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;

class ContactRepository implements ContactRepositoryInterface {

    public function __construct(Model $model)
    {
        $this->model = new Contact();
    }

    public function store(array $payload)
    {
        $this->model->create($payload);
    }

    public function getContacts()
    {
        return $this->model->paginate(5);
    }

    public function get(int $id)
    {
        return $this->model->find($id);
    }

    public function update(int $id, array $payload)
    {
        $contacts = $this->model->find($id);
        $contacts->update($payload);
        $contacts->save();
        return $contacts;
    }

    public function destroy(int $id)
    {
        $contacts = $this->model->find($id);
        $contacts->delete();
        return true;
    }
}

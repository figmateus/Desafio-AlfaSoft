<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactCreateRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $service;
    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }


    public function home()
    {
        $contacts = $this->service->getContacts();
        return view('welcome', compact('contacts'));
    }

    public function index()
    {
        $contacts = $this->service->getContacts();
        return view('dashboard', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(ContactCreateRequest $request)
    {
        $payload = $request->validated();
        $this->service->store($payload);
        return redirect('contacts')->with(['message' => 'Contact Created Successfuly', 'alert' => 'alert-success']);
    }

    public function show(int $id)
    {
        $contact = $this->service->get($id);
        return view('contacts.show', compact('contact'));
    }

    public function edit(int $id)
    {
        $contact = $this->service->get($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(int $id, ContactUpdateRequest $request)
    {
        $payload = $request->validated();
        $this->service->update($id, $payload);
        return redirect('contacts')->with(['message' => 'Contact Updated Successfully', 'alert'=>'alert-success']);
    }

    public function destroy(int $id)
    {
        $this->service->destroy($id);
        return redirect('contacts')->with(['message' => 'Contact Deleted Successfully']);
    }

}

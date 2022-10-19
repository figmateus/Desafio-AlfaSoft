<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container d-flex justify-content-center align-items-center flex-column">
                        <div class="pt-4">
                            <h2>Contacts</h2>
                        </div>
                        <div class="container-fluid">
            <span class="pb-12">
                <a class="btn btn-outline-primary" href="/contacts/create">
                    create
                </a>
            </span>
                            <div class="container">
                                <div class="d-flex justify-content-center align-items-center flex-column">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">email</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td>{{$contact->id}}</td>
                                                <td>{{$contact->name}}</td>
                                                <td>{{$contact->contact}}</td>
                                                <td>{{$contact->email}}</td>
                                                <td>
                                                    <div class="btn-group"  role="group">
                                                        <a class="btn btn-outline-primary" href="{{route('contacts.show',['id' => $contact->id])}}">Show Contact</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {{$contacts->links()}}
                                    </div>
                                    @if(session()->has('message'))
                                        <div class="alert {{session('alert') ?? 'alert-info'}} alert-dismissible" role="alert">
                                            {{ session('message') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if($errors->any())
                                        <div class="alert alert-warning">
                                            @foreach ($errors->all() as $error)
                                                <div>{{ $error }}</div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

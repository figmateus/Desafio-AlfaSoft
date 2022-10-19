
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container d-flex justify-content-center align-items-center flex-column">
                        <div class="pt-4">
                            <h1>Create Contacts</h1>
                        </div>
                        <div class="container-fluid">
                            <div class="container">
                                <div class="d-flex justify-content-center align-items-center flex-column">
                                    <form class="form" method="POST" action="{{ route('contacts.store') }}" autocomplete="off">
                                        @csrf
                                        <div class="row row-cols-1">
                                            <div class="col">
                                                <label class="form-label" for="nome">Name:</label><br/>
                                                <input class="form-control" class="field" type="text" name="name" id="name"/>
                                            </div>
                                            <div class="col">
                                                <label class="form-label" for="contacts">Contact:</label><br/>
                                                <input class="form-control" type="number" name="contact" id="contact"/>
                                            </div>
                                            <div class="col">
                                                <label class="form-label" for="email">E-mail:</label><br/>
                                                <input class="form-control" type="email" name="email" id="email"/>
                                            </div>
                                            <div class="col pt-2">
                                                <button type="submit" class="btn btn-outline-primary">create</button>
                                                <a type="button" class="btn btn-warning" href="{{route('contacts.index')}}">back</a>
                                            </div>
                                        </div>
                                    </form>
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




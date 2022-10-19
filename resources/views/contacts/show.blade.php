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
                            <h1>{{$contact->name}}</h1>
                        </div>
                        <div class="container-fluid">
                            <div class="container">
                                <div class=" d-flex justify-content-center align-items-center flex-column">
                                    <div class="row row-cols-1">
                                        <div class="col">
                                            <label class="form-label"  for="nome">Name:</label><br/>
                                            <input class="form-control" disabled type="text" value="{{$contact->name}}" name="name" id="name"/>
                                        </div>
                                        <div class="col">
                                            <label class="form-label"  for="contacts">Contact:</label><br/>
                                            <input class="form-control" disabled type="number" value="{{$contact->contact}}" name="contact" id="contact"/>
                                        </div>
                                        <div class="col">
                                            <label class="form-label"  for="email">E-mail:</label><br/>
                                            <input class="form-control" disabled type="email" value="{{$contact->email}}" name="email" id="email"/>
                                        </div>
                                        <div class="col pt-2">
                                            <div class="btn-group"  role="group">
                                                <a class="btn btn-outline-primary" href="{{route('contacts.edit',['id' => $contact->id])}}">Edit Contact</a>
                                                {{ Form::open(array('url' => 'contacts/' . $contact->id, 'class' => 'pull-right px-2')) }}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                {{ Form::submit('Delete Contact', array('class' => 'btn btn-outline-warning')) }}
                                                {{ Form::close() }}
                                                <a type="button" class="btn btn-outline-info" href="{{route('contacts.index')}}">back</a>
                                            </div>
                                        </div>
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





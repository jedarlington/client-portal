<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="container mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                     @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    </div>
    @endif

    <div class="container mx-auto bg-white max-w-3xl flex justify-center p-12 my-4">
        <form action="{{ route('clients.store') }}" method="POST" class="w-full">
            @csrf
            <div class="row mb-8 w-full">
                <input type="text" name="name" class="form-control w-full text-3xl border-0 border-b" placeholder="Name">
            </div>

            <div class="row text-center">
                <button type="submit" class="btn btn-primary bg-black text-white px-12 py-2">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>

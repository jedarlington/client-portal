<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $client->name }} {{ __('landing pages') }}
        </h2>
    </x-slot>

    @if ($message = Session::get('success'))
        <div class="container mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="success">
                <p>{{ $message }}</p>
            </div>
        </div>
    @endif

    <div class="container mx-auto p-4 my-4 lg:px-8">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <x-nav-link :href="route('client.create')" :active="request()->routeIs('client')" class="client">
                <div class="bg-white overflow-hidden shadow-sm cursor-pointer w-full sm:rounded-lg h-full">
                    <div class="p-6 bg-white border-b border-gray-200 py-12 h-full flex justify-center items-center">
                        <img src="{{ asset('/icons/plus.svg') }}" class="w-1/3 mx-auto" />
                    </div>
                </div>
            </x-nav-link>
            {{-- @foreach($client as $client)
            <x-nav-link :href="route('client.show', $client->id)" :active="request()->routeIs('client')" class="client">
                <div class="bg-white overflow-hidden shadow-sm cursor-pointer w-full h-full sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 h-full flex justify-center items-center text-3xl font-bold py-24">
                        {{ $client->name }}
                    </div>
                </div>
            </x-nav-link>
            @endforeach --}}
        </div>
    </div>
</x-app-layout>

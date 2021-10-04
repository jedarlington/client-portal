<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $client->name }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4 my-4 lg:px-8">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <!-- Delete client -->
            <x-nav-link :href="route('clients.destroy', $client->id)" :active="request()->routeIs('clients')" class="client">
                <div class="bg-white overflow-hidden shadow-sm cursor-pointer w-full sm:rounded-lg h-full">
                    <div class="p-6 bg-white border-b border-gray-200 h-full flex justify-center items-center text-3xl font-bold py-24">
                        <form action="{{ route('clients.destroy', $client->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit font-bold">Delete</button>
                        </form>
                    </div>
                </div>

            </x-nav-link>
            <!-- Landing pages link -->
            <x-nav-link :href="route('clients/landing-pages', $client->id)" :active="request()->routeIs('clients')" class="client">
                <div class="bg-white overflow-hidden shadow-sm cursor-pointer w-full sm:rounded-lg h-full">
                    <div class="p-6 bg-white border-b border-gray-200 h-full flex justify-center items-center text-3xl font-bold py-24">
                        Landing pages
                    </div>
                </div>
            </x-nav-link>
        </div>
    </div>
</x-app-layout>

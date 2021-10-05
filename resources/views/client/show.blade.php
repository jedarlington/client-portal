<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $client->name }}
        </h2>
    </x-slot>

    <div class="container client-show mx-auto p-4 my-4 lg:px-8">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <!-- Edit client -->
              <x-nav-link :href="route('client.edit', $client->id)" :active="request()->routeIs('client')" class="client">
                <div class="bg-white overflow-hidden shadow-sm cursor-pointer w-full sm:rounded-lg h-full">
                    <div class="p-6 bg-white border-b border-gray-200 h-full flex justify-center items-center text-3xl font-bold py-24">
                       Edit {{ $client->name }}
                    </div>
                </div>
            </x-nav-link>

            <!-- Delete client -->
            <x-nav-link :href="route('client.destroy', $client->id)" :active="request()->routeIs('client')" class="client">
                <div class="bg-white overflow-hidden shadow-sm cursor-pointer w-full sm:rounded-lg h-full">
                    <div class="p-6 bg-white border-b border-gray-200 h-full flex justify-center items-center text-3xl font-bold py-24">
                        <form action="{{ route('client.destroy', $client->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit button" class="button" onclick="return confirm('Are you sure?')">Delete {{ $client->name }}</button>
                        </form>
                    </div>
                </div>
            </x-nav-link>

            <!-- Landing pages link -->
            <x-nav-link :href="route('client/landing-pages', $client->id)" :active="request()->routeIs('client')" class="client">
                <div class="bg-white overflow-hidden shadow-sm cursor-pointer w-full sm:rounded-lg h-full">
                    <div class="p-6 bg-white border-b border-gray-200 h-full flex justify-center items-center text-3xl font-bold py-24">
                        Landing pages
                    </div>
                </div>
            </x-nav-link>
        </div>
    </div>
</x-app-layout>

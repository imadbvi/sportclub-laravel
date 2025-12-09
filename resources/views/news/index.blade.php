<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuws
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <h1 class="text-3xl font-bold mb-4">Nieuws</h1>

                <a href="{{ route('news.create') }}" 
                   class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
                    Nieuw bericht maken
                </a>

                <ul class="mt-4 space-y-2">
                    @foreach ($news as $item)
                        <li>
                            <a href="{{ route('news.show', $item) }}" class="text-blue-600 hover:underline">
                                <strong>{{ $item->title }}</strong>
                            </a>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</x-app-layout>

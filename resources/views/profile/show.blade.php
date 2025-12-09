<x-guest-layout>
    <div class="max-w-2xl mx-auto py-8">

        <h1 class="text-2xl font-bold mb-4">
            {{ $user->username ?? $user->name }}
        </h1>

        <p class="text-gray-600 mb-2">Email: {{ $user->email }}</p>

        @if($user->birthday)
            <p class="mb-2">Verjaardag: {{ $user->birthday }}</p>
        @endif

        @if($user->about_me)
            <div class="mt-4">
                <h2 class="font-semibold mb-1">Over mij</h2>
                <p>{{ $user->about_me }}</p>
            </div>
        @endif

    </div>
</x-guest-layout>

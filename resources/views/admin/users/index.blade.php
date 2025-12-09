@extends('admin.layout')

@section('title', 'Gebruikers beheren')

@section('content')

<a href="{{ route('admin.users.create') }}"
   class="inline-block mb-4 px-4 py-2 bg-blue-600 text-white rounded">
   + Nieuwe gebruiker
</a>

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Naam</th>
                <th class="p-2 border">Email</th>
                <th class="p-2 border">Admin?</th>
                <th class="p-2 border">Acties</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="p-2 border">{{ $user->id }}</td>
                    <td class="p-2 border">{{ $user->name }}</td>
                    <td class="p-2 border">{{ $user->email }}</td>
                    <td class="p-2 border">{{ $user->is_admin ? 'Ja' : 'Nee' }}</td>
                    <td class="p-2 border">
                        <a class="text-blue-600" href="{{ route('admin.users.edit', $user) }}">Bewerken</a>

                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')

    <button class="text-red-600 ml-2"
            onclick="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?')">
        Verwijderen
    </button>
</form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">Inschrijvingen Beheren</h3>

        <div class="mt-8">
            <div class="flex flex-col">
                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div
                        class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Gebruiker</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Team</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Opmerkingen</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Actie</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($registrations as $registration)
                                                        <tr>
                                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                                <div class="text-sm leading-5 font-medium text-gray-900">
                                                                    {{ $registration->user->name }}</div>
                                                                <div class="text-sm leading-5 text-gray-500">{{ $registration->user->email }}</div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                                <div class="text-sm leading-5 text-gray-900">{{ $registration->team->name }}</div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                                <div class="text-sm leading-5 text-gray-900">
                                                                    {{ Str::limit($registration->remarks, 50) }}</div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                                <span
                                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                                            {{ $registration->status === 'approved' ? 'bg-green-100 text-green-800' :
                                    ($registration->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                                                    {{ ucfirst($registration->status) }}
                                                                </span>
                                                            </td>
                                                            <td
                                                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                                                                <form action="{{ route('admin.registrations.reply', $registration) }}" method="POST"
                                                                    class="flex flex-col gap-2">
                                                                    @csrf
                                                                    <select name="status" class="form-select text-sm rounded-md border-gray-300">
                                                                        <option value="pending" {{ $registration->status == 'pending' ? 'selected' : '' }}>In behandeling</option>
                                                                        <option value="approved" {{ $registration->status == 'approved' ? 'selected' : '' }}>Goedgekeurd</option>
                                                                        <option value="rejected" {{ $registration->status == 'rejected' ? 'selected' : '' }}>Afgewezen</option>
                                                                    </select>
                                                                    <textarea name="message" placeholder="Bericht aan gebruiker..."
                                                                        class="form-textarea text-sm rounded-md border-gray-300 h-20">{{ $registration->admin_reply }}</textarea>
                                                                    <button type="submit"
                                                                        class="text-indigo-600 hover:text-indigo-900 text-left">Update &
                                                                        Bericht</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                            {{ $registrations->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
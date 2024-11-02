<x-app-layout title="Dashboard">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <table class="table-auto w-full">
                            <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Role</th>
                                <th class="px-4 py-2">Change role</th>
                            </tr>
                            </thead>
                            @foreach ($users as $user)
                                <tbody>
                                <tr>
                                    <td class="border px-4 py-2">{{ $user->id }}</td>
                                    <td class="border px-4 py-2">{{ $user->name }}</td>
                                    <td class="border px-4 py-2">
                                        @if($user->is_admin)
                                            <span class="text-green-500">Admin</span>
                                        @else
                                            <span class="text-red-500">User</span>
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2">

                                        <form action="{{ route('dashboard.adminToggle', $user->id) }}" method="POST" class="inline space">
                                            @csrf

                                            <label class="switch">
                                                <input type="checkbox" {{ $user->is_admin ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                                <span class="switch-text">{{ $user->is_admin ? 'Remove as admin' : 'Change to admin' }}</span>
                                            </label>
                                            <x-primary-button type="submit">Submit</x-primary-button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

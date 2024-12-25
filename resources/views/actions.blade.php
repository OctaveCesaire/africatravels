<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Events') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-3 px-2">
        <div class="card shadow">
            <x-table-responsive :fields='$fields' :type='$type' :res='$data'/>
        </div>
    </div>
</x-app-layout>

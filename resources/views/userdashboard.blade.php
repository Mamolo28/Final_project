<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('  HOME') }}
            
        </h1>
        <style>
            h2
            {
              font-family: "Times New Roman", Times, serif;
              
            }
        
        </style>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged user!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Reset my password
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border-b border-gray-200">

                    @include('layouts.succes')
                    <form method="POST" action="{{ route('users.storePassword') }}">
                        @csrf
                    
                        <!-- Current Password -->
                        <div class="mt-4">
                            <x-label for="current_password" :value="__('Current password')" />
                    
                            <x-input id="current_password" class="block mt-1 w-full" type="password" name="current_password" required />
                        </div>
                    
                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('New password')" />
                    
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                        </div>
                    
                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="confirm_password" :value="__('Confirm new Password')" />
                    
                            <x-input id="confirm_password" class="block mt-1 w-full"
                                                type="password"
                                                name="confirm_password" required />
                        </div>
                    
                        <div class="flex items-center justify-end mt-4">
                            <x-button>
                                {{ __('Reset Password') }}
                            </x-button>
                        </div>
                    </form>
                    @include('layouts.errors')
            </div>
        </div>
    </div>
</x-app-layout>

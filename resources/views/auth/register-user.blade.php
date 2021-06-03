<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('სალაროს დამატება') }}
            </h2>
        </x-slot>

    <div class="p-6 bg-white border-b border-gray-200">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register.user.store') }}">
        @csrf

        <!-- Name -->
            <div>
                <x-label for="name" :value="__('სახელი')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('იმეილი')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Cash Register -->
            @isset($cashRegisters)
                <div>
                    <x-label for="cash_register_number" class="mt-1" :value="__('სალაროს #')" />
                    <x-select name="cash_register_id" >
                        <option value="">{{__('აირჩიეთ...')}}</option>
                        @foreach($cashRegisters as $cashRegister)
                            <option value="{{$cashRegister->id}}">{{$cashRegister->number}}</option>
                        @endforeach
                    </x-select>
                </div>
        @endisset

        <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('პაროლი')" />

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('გაიმეორეთ პაროლი')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('რეგისტრაცია') }}
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>

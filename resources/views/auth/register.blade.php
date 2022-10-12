{{-- 原生的breeze註冊頁，目前沒在用，改用resources\views\auth\register-basic.blade.php --}}

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


{{-- 原生的breeze註冊頁，目前沒在用，改用三個取代resources\views\auth\register-basic.blade.php --}}
{{-- 原生的breeze註冊頁，目前沒在用，改用三個取代resources\views\auth\register-google.blade.php --}}
{{-- 原生的breeze註冊頁，目前沒在用，改用三個取代resources\views\auth\register-pair.blade.php --}}


{{-- form start --}}
{{-- form start --}}

        <form method="POST" action="{{ route('register') }}">
            @csrf
{{-- @if (false) --}}
{{-- @if (true) --}}

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            {{-- @endif --}}
@php
// use App\Models\Dislike;
// $dislikes =  Dislike::all();
$dislikes =  App\Models\Dislike::all();

$showDislike = 1;
@endphp
{{-- @foreach ( $dislikes as $dislike)
    <label><input type="checkbox" name="dislike[]" value={{$dislike->id}}>{{$dislike->foodName}} </label>
    @endforeach --}}
    @if ($showDislike)
    {{-- <span class="block text-gray-700 mt-4">我不愛吃</span> --}}
    <x-label for="password" :value="__('我不愛吃')" />
    <div class="flex flex-wrap justify-start mb-4">
        @foreach ($dislikes as $dislike)
        <label class="inline-flex items-center mr-6 my-2 text-sm" style="flex: 1 0 20%;">
            <input
            type="checkbox"
            class="form-checkbox h-4 w-4"
            name="dislike[]"
            value="{{$dislike->id}}"
            {{-- {!! $permission->assigned ? 'checked' : '' !!} --}}
            >
            <span class="ml-2">{{$dislike->foodName}}</span>
        </label>
        @endforeach
    </div>
    @endif
    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4" name="action" value="register">
                    {{ __('先完成註冊') }}
                </x-button>

                <x-button class="ml-4" name="action" value="register-pair">
                    {{ __('繼續填寫配對資料') }}
                </x-button>
                {{-- <button type="submit" name="action" value="save">Save</button> --}}
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

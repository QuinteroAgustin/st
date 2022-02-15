<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Pseudo -->
            <div>
                <x-label for="pseudo" :value="__('auth.pseudo')" />

                <x-input id="pseudo" class="block mt-1 w-full" type="text" name="pseudo" :value="old('pseudo')" required autofocus />
            </div>

            <!-- Nom -->
            <div>
                <x-label for="nom" :value="__('auth.nom')" />

                <x-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus />
            </div>

            <!-- Prénom -->
            <div>
                <x-label for="prenom" :value="__('auth.prenom')" />

                <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('auth.email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('auth.password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('auth.confirmpassword')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <!-- Telephone -->
            <div>
                <x-label for="telephone" :value="__('auth.telephone')" />

                <x-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="old('telephone')" autofocus />
            </div>

            <!-- portable -->
            <div>
                <x-label for="portable" :value="__('auth.portable')" />

                <x-input id="portable" class="block mt-1 w-full" type="text" name="portable" :value="old('portable')" autofocus />
            </div>

            <!-- adresse -->
            <div>
                <x-label for="adresse" :value="__('auth.adresse')" />

                <x-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" :value="old('adresse')" required autofocus />
            </div>

            <!-- cp -->
            <div>
                <x-label for="cp" :value="__('auth.cp')" />

                <x-input id="cp" class="block mt-1 w-full" type="text" name="cp" :value="old('cp')" required autofocus />
            </div>

            <!-- ville -->
            <div>
                <x-label for="ville" :value="__('auth.ville')" />

                <x-input id="ville" class="block mt-1 w-full" type="text" name="ville" :value="old('ville')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('auth.alreadysignup') }}
                </a>

                <x-button class="ml-4">
                    {{ __('auth.register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

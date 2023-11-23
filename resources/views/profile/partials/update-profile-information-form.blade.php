<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Інформація профіля
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Оновити профіль
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" value="Ім'я" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Surname -->
        <div class="mt-4">
            <x-input-label for="surname" value="Прізвище" />
            <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname', $user->surname)" required autofocus autocomplete="surname" />
            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" value="Стать" />
            <select class="block mt-1 w-full border border-gray-300 rounded-md form-control" name="gender" id="gender" required>
                <option value="male" {{ old('gender', $user->gender) === 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $user->gender) === 'female' ? 'selected' : '' }}>Female</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Nationality -->
        <div class="mt-4">
            <x-input-label for="nationality" value="Національність" />
            <select class="block mt-1 w-full border border-gray-300 rounded-md form-control" name="nationality" id="nationality" required>
                <option value="Ukraine" {{ old('nationality', $user->nationality) === 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                <option value="US" {{ old('nationality', $user->nationality) === 'US' ? 'selected' : '' }}>US</option>
                <option value="CA" {{ old('nationality', $user->nationality) === 'CA' ? 'selected' : '' }}>Canada</option>
                <option value="FR" {{ old('nationality', $user->nationality) === 'FR' ? 'selected' : '' }}>France</option>
                <option value="GE" {{ old('nationality', $user->nationality) === 'GE' ? 'selected' : '' }}>Germany</option>
            </select>
            <x-input-error :messages="$errors->get('nationality')" class="mt-2" />
        </div>

        <!-- Organization -->
        <div class="mt-4">
            <x-input-label for="organization" value="Організація" />
            <x-text-input id="organization" class="block mt-1 w-full" type="text" name="organization" :value="old('organization', $user->organization)" required />
            <x-input-error :messages="$errors->get('organization')" class="mt-2" />
        </div>

        <!-- Post -->
        <div class="mt-4">
            <x-input-label for="post" value="Посада" />
            <x-text-input id="post" class="block mt-1 w-full" type="text" name="post" :value="old('post', $user->post)" required />
            <x-input-error :messages="$errors->get('post')" class="mt-2" />
        </div>

        <!-- Birthdate -->
        <div class="mt-4">
            <x-input-label for="birthdate" value="Дата народження" />
            <input datepicker id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate', $user->birthdate )"/>
            <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

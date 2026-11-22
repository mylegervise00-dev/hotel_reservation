<section class="space-y-6">

    <!-- Section Heading -->
    <div class="border-b border-[#D9A85B]/30 pb-5">
        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-[#D9A85B]">
            Account Settings
        </p>

        <h2 class="mt-2 font-serif text-2xl text-[#F5F2EC]">
            Profile Information
        </h2>

        <p class="mt-2 text-sm leading-relaxed text-gray-400">
            Manage your personal information and contact details associated with your MHILLIANA GRAND HOTEL account.
        </p>
    </div>

    <!-- Email Verification Form -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Profile Update Form -->
    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Full Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" class="!text-gray-300" />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-2 block w-full !border-[#454545] !bg-[#171717] !text-[#F5F2EC] focus:!border-[#D9A85B] focus:!ring-[#D9A85B]"
                :value="old('name', $user->name)"
                required
                autofocus
                autocomplete="name"
            />

            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" class="!text-gray-300" />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-2 block w-full !border-[#454545] !bg-[#171717] !text-[#F5F2EC] focus:!border-[#D9A85B] focus:!ring-[#D9A85B]"
                :value="old('email', $user->email)"
                required
                autocomplete="username"
            />

            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 rounded-lg border border-yellow-600/30 bg-yellow-500/5 p-4">
                    <p class="text-sm text-yellow-200">
                        {{ __('Your email address is unverified.') }}
                    </p>

                    <button
                        form="send-verification"
                        class="mt-2 text-sm font-medium text-[#D9A85B] underline underline-offset-4 hover:text-[#F5F2EC] focus:outline-none"
                    >
                        {{ __('Click here to re-send the verification email.') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-3 text-sm text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Contact Information -->
        <div class="border-t border-[#454545] pt-6">
            <p class="mb-5 text-xs font-semibold uppercase tracking-[0.2em] text-[#D9A85B]">
                Contact Information
            </p>

            <!-- Phone Number -->
            <div class="mb-6">
                <x-input-label for="phone" :value="__('Phone Number')" class="!text-gray-300" />

                <x-text-input
                    id="phone"
                    name="phone"
                    type="tel"
                    class="mt-2 block w-full !border-[#454545] !bg-[#171717] !text-[#F5F2EC] focus:!border-[#D9A85B] focus:!ring-[#D9A85B]"
                    :value="old('phone', $guestProfile?->phone)"
                    autocomplete="tel"
                />

                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>

            <!-- Address -->
            <div>
                <x-input-label for="address" :value="__('Address')" class="!text-gray-300" />

                <textarea
                    id="address"
                    name="address"
                    rows="3"
                    class="mt-2 block w-full rounded-lg border border-[#454545] bg-[#171717] text-[#F5F2EC] shadow-sm focus:border-[#D9A85B] focus:ring-[#D9A85B]"
                >{{ old('address', $guestProfile?->address) }}</textarea>

                <x-input-error class="mt-2" :messages="$errors->get('address')" />
            </div>
        </div>

        <!-- Personal Information -->
        <div class="border-t border-[#454545] pt-6">
            <p class="mb-5 text-xs font-semibold uppercase tracking-[0.2em] text-[#D9A85B]">
                Personal Information
            </p>

            <!-- Date of Birth -->
            <div>
                <x-input-label for="date_of_birth" :value="__('Date of Birth')" class="!text-gray-300" />

                <x-text-input
                    id="date_of_birth"
                    name="date_of_birth"
                    type="date"
                    class="mt-2 block w-full !border-[#454545] !bg-[#171717] !text-[#F5F2EC] focus:!border-[#D9A85B] focus:!ring-[#D9A85B]"
                    :value="old('date_of_birth', $guestProfile?->date_of_birth)"
                />

                <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
            </div>
        </div>

        <!-- Save Button -->
        <div class="flex flex-wrap items-center gap-4 border-t border-[#454545] pt-6">

            <x-primary-button class="!border-[#D9A85B] !bg-[#D9A85B] !text-[#171717] hover:!bg-[#B58A4A]">
                {{ __('Save Changes') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-400"
                >
                    {{ __('Your profile has been saved.') }}
                </p>
            @endif

        </div>
    </form>
</section>

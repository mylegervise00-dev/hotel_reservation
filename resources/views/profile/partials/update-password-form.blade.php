<section class="space-y-6">

    <!-- Section Heading -->
    <div class="border-b border-[#D9A85B]/30 pb-5">
        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-[#D9A85B]">
            Account Security
        </p>

        <h2 class="mt-2 font-serif text-2xl text-[#F5F2EC]">
            Update Password
        </h2>

        <p class="mt-2 text-sm leading-relaxed text-gray-400">
            Keep your MHILLIANA GRAND HOTEL account protected by using a strong and unique password.
        </p>
    </div>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div>
            <x-input-label
                for="update_password_current_password"
                :value="__('Current Password')"
                class="!text-gray-300"
            />

            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-2 block w-full !border-[#454545] !bg-[#171717] !text-[#F5F2EC] focus:!border-[#D9A85B] focus:!ring-[#D9A85B]"
                autocomplete="current-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('current_password')"
                class="mt-2"
            />
        </div>

        <!-- New Password -->
        <div>
            <x-input-label
                for="update_password_password"
                :value="__('New Password')"
                class="!text-gray-300"
            />

            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-2 block w-full !border-[#454545] !bg-[#171717] !text-[#F5F2EC] focus:!border-[#D9A85B] focus:!ring-[#D9A85B]"
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('password')"
                class="mt-2"
            />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label
                for="update_password_password_confirmation"
                :value="__('Confirm New Password')"
                class="!text-gray-300"
            />

            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-2 block w-full !border-[#454545] !bg-[#171717] !text-[#F5F2EC] focus:!border-[#D9A85B] focus:!ring-[#D9A85B]"
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('password_confirmation')"
                class="mt-2"
            />
        </div>

        <!-- Save Button -->
        <div class="flex flex-wrap items-center gap-4 border-t border-[#454545] pt-6">

            <x-primary-button class="!border-[#D9A85B] !bg-[#D9A85B] !text-[#171717] hover:!bg-[#B58A4A]">
                {{ __('Update Password') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-400"
                >
                    {{ __('Your password has been updated.') }}
                </p>
            @endif

        </div>
    </form>
</section>

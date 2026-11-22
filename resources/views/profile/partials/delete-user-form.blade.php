<section class="space-y-6">

    <!-- Section Heading -->
    <div class="border-b border-red-500/20 pb-5">
        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-red-400">
            Danger Zone
        </p>

        <h2 class="mt-2 font-serif text-2xl text-[#F5F2EC]">
            Delete Account
        </h2>

        <p class="mt-2 text-sm leading-relaxed text-gray-400">
            Permanently remove your MHILLIANA GRAND HOTEL account and its associated information.
        </p>
    </div>

    <!-- Warning Box -->
    <div class="rounded-lg border border-red-500/30 bg-red-500/5 p-5">

        <div class="flex items-start gap-3">
            <div class="mt-1 text-red-400">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.5">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 9v3.75m9.303-3.376c.866 1.5-.217 3.376-1.95 3.376H4.647c-1.733 0-2.816-1.876-1.95-3.376l7.353-12.738c.866-1.5 3.034-1.5 3.9 0l7.353 12.738z"
                    />
                </svg>
            </div>

            <div>
                <h3 class="font-semibold text-red-300">
                    Important Notice
                </h3>

                <p class="mt-2 text-sm leading-relaxed text-gray-400">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                </p>
            </div>
        </div>

    </div>

    <!-- Delete Button -->
    <div>
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="!bg-red-600 hover:!bg-red-700 focus:!ring-red-500"
        >
            {{ __('Delete Account') }}
        </x-danger-button>
    </div>

    <!-- Confirmation Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>

        <form method="post" action="{{ route('profile.destroy') }}" class="space-y-6 bg-[#252525] p-6 sm:p-8">
            @csrf
            @method('delete')

            <!-- Modal Heading -->
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-red-400">
                    Final Confirmation
                </p>

                <h2 class="mt-2 font-serif text-2xl text-[#F5F2EC]">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="mt-3 text-sm leading-relaxed text-gray-400">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>
            </div>

            <!-- Password Confirmation -->
            <div>
                <x-input-label
                    for="password"
                    :value="__('Enter Your Password')"
                    class="!text-gray-300"
                />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-2 block w-full !border-[#454545] !bg-[#171717] !text-[#F5F2EC] focus:!border-red-500 focus:!ring-red-500"
                    placeholder="{{ __('Password') }}"
                    autocomplete="current-password"
                />

                <x-input-error
                    :messages="$errors->userDeletion->get('password')"
                    class="mt-2"
                />
            </div>

            <!-- Modal Actions -->
            <div class="flex flex-wrap justify-end gap-3 border-t border-[#454545] pt-5">

                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="!bg-red-600 hover:!bg-red-700 focus:!ring-red-500">
                    {{ __('Permanently Delete Account') }}
                </x-danger-button>

            </div>

        </form>

    </x-modal>

</section>

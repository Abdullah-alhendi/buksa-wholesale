<section class="space-y-6">
    <header>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('بمجرد حذف حسابك، سيتم حذف جميع موارده وبياناته نهائيًا. قبل حذف حسابك، يرجى تنزيل أي بيانات أو معلومات ترغب في الاحتفاظ بها.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 px-5"
    >{{ __('حذف الحساب') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <div class="p-6" dir="rtl">
            <h2 class="text-lg font-bold text-red-600 border-b border-gray-200 pb-3 mb-5 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                {{ __('هل أنت متأكد أنك تريد حذف حسابك؟') }}
            </h2>

            <div class="bg-red-50 border-r-4 border-red-500 p-4 mb-6">
                <div class="flex">
                    <div class="ml-3">
                        <p class="text-sm text-red-700">
                            {{ __('بمجرد حذف حسابك، سيتم حذف جميع موارده وبياناته نهائيًا. لن تتمكن من استعادة حسابك.') }}
                        </p>
                    </div>
                </div>
            </div>

            <form method="post" action="{{ route('profile.destroy') }}" class="mt-6">
                @csrf
                @method('delete')

                <div>
                    <x-input-label for="password" value="{{ __('كلمة المرور') }}" class="text-gray-700 font-medium" />
                    <div class="relative mt-1">
                        <x-text-input
                            id="password"
                            name="password"
                            type="password"
                            class="block w-full pr-10 border-gray-300 focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            placeholder="{{ __('أدخل كلمة المرور لتأكيد الحذف') }}"
                        />
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-between items-center">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('إلغاء') }}
                    </x-secondary-button>

                    <x-danger-button class="bg-red-600 hover:bg-red-700 focus:bg-red-700">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            {{ __('حذف الحساب') }}
                        </div>
                    </x-danger-button>
                </div>
            </form>
        </div>
    </x-modal>
</section>
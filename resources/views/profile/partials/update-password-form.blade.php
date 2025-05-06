<section>
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('كلمة المرور الحالية')" class="text-emerald-800 font-medium" />
            <div class="relative mt-1">
                <x-text-input id="current_password" name="current_password" type="password" 
                    class="block w-full pr-10 border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 rounded-md shadow-sm" 
                    autocomplete="current-password" />
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('كلمة المرور الجديدة')" class="text-emerald-800 font-medium" />
            <div class="relative mt-1">
                <x-text-input id="password" name="password" type="password" 
                    class="block w-full pr-10 border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 rounded-md shadow-sm" 
                    autocomplete="new-password" />
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            
            <div class="mt-2 text-sm text-gray-600">
                <ul class="list-disc list-inside space-y-1">
                    <li>{{ __('يجب أن تتكون من 8 أحرف على الأقل') }}</li>
                    <li>{{ __('يجب أن تحتوي على حرف كبير وحرف صغير ورقم ورمز') }}</li>
                </ul>
            </div>
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('تأكيد كلمة المرور')" class="text-emerald-800 font-medium" />
            <div class="relative mt-1">
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" 
                    class="block w-full pr-10 border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200 focus:ring-opacity-50 rounded-md shadow-sm" 
                    autocomplete="new-password" />
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 mt-6">
            <x-primary-button class="bg-emerald-700 hover:bg-emerald-800">{{ __('تحديث') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600"
                >{{ __('تم التحديث.') }}</p>
            @endif
        </div>
    </form>
</section>
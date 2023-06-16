<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')"/>
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username"/>
            <x-input-error class="mt-2" :messages="$errors->get('email')"/>

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

        <script>
          function previewImage (src = '{{$user->image ? Storage::url('public/images/' . $user->image) : ''}}') {
            return {
              url: src,
              imageSelected (event) {
                this.getDataUrl(event, src => this.url = src);
              },

              getDataUrl (event, callback) {
                if (!event.target.files.length) {
                  return;
                }

                const file = event.target.files[0];
                const reader = new FileReader();

                reader.readAsDataURL(file);
                reader.onload = (event => callback(event.target.result));
              },
            };
          }
        </script>

        <div x-data="previewImage">
            <p class="block font-medium text-sm text-gray-700">{{ __('Profile Photo') }}</p>

            <div class="flex flex-wrap items-center mt-1">
                <div class="w-auto">
                    <template x-if="url">
                        <img :src="url" class="shrink-0 object-cover rounded-full border border-gray-200 w-[80px] h-[80px]"
                        >
                    </template>

                    <template x-if="!url">
                        <div class="shrink-0 border rounded-full border-gray-200 bg-gray-100 w-[80px] h-[80px] flex items-center justify-center text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            </svg>
                        </div>
                    </template>
                </div>

                <div class="pl-5">
                    <label class="inline-block inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 cursor-pointer" for="image">
                        Profilbild ändern oder hinzufügen
                    </label>
                    <x-text-input @change="imageSelected" accept="image/*" id="image" name="image" type="file" class="hidden" :value="old('image', $user->image)"/>
                    <x-input-error class="mt-2" :messages="$errors->get('image')"/>
                </div>
            </div>
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

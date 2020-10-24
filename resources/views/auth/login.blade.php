   <x-layout>
   <form method="POST" action="{{ route('login') }}">
   @csrf
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
      <div
        class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
      >
        <div class="flex flex-col overflow-y-auto md:flex-row">
          <div class="h-32 md:h-auto md:w-1/2">

            <img
              aria-hidden="true"
              class="object-cover w-full h-full"
              src="{{ asset('img/login-fond.jpg') }}"
              alt="mongraphisme"
            />
          </div>


          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
              <h1
                class="mb-4 text-xl font-semibold text-gray-700"
              >
                {{ __('Login') }}
              </h1>
              <label for="email" class="block text-sm">
                <span class="text-gray-700">{{ __('E-Mail Address') }}</span>
                <input
                  id="email" type="email" name="email" value="{{ old('email') }}"
                  required autocomplete="email" autofocus
                  class="px-2 @error('email') border border-red-700 @enderror block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                  rounded border border-red-800 form-input h-12"
                  placeholder=" Votre E-Mail ici ..."
                />
                                @error('email')
                                    <span class="w-full px-2 py-2 mb-2 rounded border border-red-300 bg-red-100 h-12" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              </label>
              <label for="password" class="block mt-4 text-sm">
                <span class="text-gray-700">Mot de passe</span>

                <input
                  class="px-2 @error('password') border border-red-700 @enderror block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                  rounded border border-red-800 form-input h-12"
                  placeholder="***************"
                  type="password"
                  id="password" name="password" required autocomplete="current-password"                  
                />
                                @error('password')
                                    <span class="w-full px-2 py-2 mb-2 rounded border border-red-300 bg-red-100 h-12" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                
              </label>




              <!-- You should use a button here, as the anchor is only used for the example  -->
                                <button type="submit"
                                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                >
                                    {{ __('Connexion') }}
                                </button>              

              <hr class="my-8" />


              <p class="mt-4">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Mot de passe oublié ?
                                    </a>
                                @endif
              </p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

</x-layout>

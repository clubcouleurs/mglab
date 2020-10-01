<x-master>


<main class="h-full overflow-y-auto bg-blue-100">
<div class="container px-6 mx-auto">
            <div class="grid gap-6 mb-8 xl:grid-cols-4 mt-8 grid-rows-4 grid-flow-col">
             
              <div
                class="min-w-0 row-span-3 col-span-1 p-4 bg-white rounded-lg shadow-md"
              >
                <h4 class="mb-4 font-semibold text-gray-600">
                 Vous avez choisie cette proposition 
                </h4>
                <hr class="mb-4">
                <p>
                  <img src="{{asset('propals/' . $proposition->lien)}}" class="rounded-lg shadow-md">
                </p>
                <hr class="mt-4">

                <div class="mt-6">

                <p class="font-extrabold text-xl">
                  Vous avez encore droits à Modifications
                </p>
                </div>
              </div>

              <div
                class="min-w-0 row-span-1 col-span-2 p-4 bg-white rounded-lg shadow-md"
              >
                <h4 class="mb-4 font-semibold text-gray-600">
                  Avez vous des modification à appliquer ?
                </h4>
                <hr class="mb-0">
                <p>
                  <img src="" class="rounded-lg shadow-md">
                </p>
                <div class="mt-6">
                  <form method="POST" action="/propositions/{{$proposition->id}}/modifications">

                    @csrf

            <div class="mb-4">
              <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
                for="activities">
                Décrivez vos modifications
              </label>

                    <textarea
                      class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" 
                    name="explication"
                    placeholder="Quelle sont les modifications que vous voulez appliquer sur cette proposition"
                    required
                    rows="10"
                    >{{old('explication')}}</textarea>
                    @error('explication')
                      <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-4">
              <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
                for="texte_additionnel">
                Si vous avez un document, merci de l'uploader
              </label>

            <input
            class="block w-full mt-1 text-sm border border-gray-800 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"

            type="file"
            name="doc[]"
            id="doc"
            multiple
            >

                    @error('doc')
                      <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
                    @enderror
            </div>


                  <button
                    class="px-5 items-center w-full py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                  type="submit"
                  >
                    Je choisie cette proposition
                  </button>
                  </form>
                </div>
              </div>

              
                                                
             


            </div>
            </div>
           </main> 
</x-master>
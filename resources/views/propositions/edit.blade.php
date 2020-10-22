<x-master type='types' :value="$types">
  <main class="h-full overflow-y-auto bg-blue-100">
    <div class="container px-6 mx-auto">

      <div class="grid grid-rows-5 grid-flow-col gap-6 mt-8 mb-8">
        <div class="row-span-5 p-4 bg-white rounded-lg shadow-md">

          <main x-data="{ 'isDialogOpen': false }" @keydown.escape="isDialogOpen = false">
           <section class="flex flex-wrap">
            <h4 class="mb-4 font-semibold text-gray-600">
             Vous avez choisie cette proposition 
           </h4>
           <hr class="mb-4">
           <p>
            <button type="button" class="hover:border-gray-500" @click="isDialogOpen = true">
              <img src="{{asset('propals/' . $proposition->lien)}}" class="rounded-lg shadow-md">
            </button>
          </p>
          <hr class="mt-4">
          <div class="mt-2 justify-between">
            <p class="ml-2 inline-flex block">
            Vous avez encore droits à : </p>
            <p class="inline-flex block font-extrabold text-2xl px-1 py-2 bg-blue-100 rounded-md text-purple-600"> 0{{ $count }} </p><p class="ml-2 inline-flex block">
            Modifications </p>
          </div>

          <!-- overlay -->
          <div
          class="overflow-auto"
          style="background-color: rgba(0,0,0,0.5)"
          x-show="isDialogOpen"
          :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }"
          >
          <!-- dialog -->
          <div
          class="bg-white shadow-2xl m-4 sm:m-8 rounded-lg"
          x-show="isDialogOpen"
          @click.away="isDialogOpen = false"
          >

          <header class="flex justify-end">
            <button
            class="inline-flex items-center justify-center w-6 h-6 text-black transition-colors duration-150 rounded hover:text-gray-700"
            aria-label="close"
            @click="isDialogOpen = false"
            >
            <svg
            class="w-4 h-4"
            fill="currentColor"
            viewBox="0 0 20 20"
            role="img"
            aria-hidden="true"
            >
            <path
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"
            fill-rule="evenodd"
            ></path>
          </svg>
        </button>
      </header>


      <div class="relative flex justify-between items-center ">
        <img class="rounded-b-lg" src="{{asset('propals/' . $proposition->lien)}}">

      </div>

    </div><!-- /dialog -->
  </div><!-- /overlay -->

</section>
</main>
</div>


<div class="row-span-1 col-span-2 p-4 bg-white rounded-lg shadow-md">
  <label class="block uppercase itlaic font-bold text-2xl text-gray-700">
    Cette version vous convient-elle ?
  </label>
  <h4 class="mb-4 font-semibold text-gray-600">
    vous pouvez la valider pour recevoir
    le fichier final prêt pour l'impression
  </h4>
  <form
  method="POST"
  action="/conceptions/{{ $proposition->conception->id }}/propositions/{{$proposition->id}}"
  name="formEditModification"
  >@csrf

            @method('put')
            <input type="hidden" name="upgrade" value="3">

  <hr class="mb-4">
  <button
  class="px-5 items-center w-full py-3 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
  type="submit"
  >
  Valider cette version
</button>
</form>  
</div>



<div class="row-span-3 col-span-2 p-4 bg-white rounded-lg shadow-md">
<form
    method="POST"
    action="/propositions/{{$proposition->id}}/modifications"
    enctype="multipart/form-data"
    onsubmit="return validateFormModification(event)"
    name="formEditModification"
    >@csrf  
  <div class="mb-4">
             
    <h4 class="mb-4 font-semibold text-gray-600">
      Ou, si vous avez des modification à appliquer ?
    </h4>
    <hr class="mb-4" >

    
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
  <label id="labelDoc" class="block mb-2 uppercase font-bold text-2xl text-gray-700">
    Si vous avez un document, merci de l'uploader
  </label>

  <input
  class="block h-12 px-2 py-2 rounded-md w-full
  border border-gray-400 bg-gray-200
  focus:border-purple-600 focus:outline-none
  focus:shadow-outline-purple form-input"

  type="file"
  name="doc[]"
  id="doc"
  multiple
  >

  @error('doc')
  <p class="block h-10 px-2 py-2 rounded-md w-full mt-2
  bg-red-600 text-white font-bold"> Attention : {{ $message }}</p>
  @enderror
</div>
<button
class="px-5 items-center w-full py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
type="submit"
>
Soumettre ma modification
</button>
</form>
</div>

</div>

</div>

</main> 
</x-master>
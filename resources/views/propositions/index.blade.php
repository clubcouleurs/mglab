<x-master type='types' :value="$types">


  <main class="h-full overflow-y-auto bg-blue-100">
    <div class="container px-6 mx-auto grid gap-4 grid-cols-3 mb-8 mt-8">

      @foreach ($propositions as $propal)


      <main class="mx-auto" x-data="{ 'isDialogOpen': false }" @keydown.escape="isDialogOpen = false">
       <section class="flex flex-wrap">


        <div
        class="min-w-0 p-4 bg-white rounded-lg shadow-md"
        >
        <h4 class="mb-4 font-semibold text-gray-600">
          Proposition N°: {{$loop->iteration}}
        </h4>
        <hr class="mb-4">
        <p>
          <button type="button" class="hover:border-gray-500" @click="isDialogOpen = true">
          <img src="{{asset('/propals/' . $propal->lien )}}" class="rounded-lg shadow-md">
          </button>
        </p>
        <div class="flex mt-6 items-center text-center">
          <a href="/propositions/{{$propal->id}}/edit"
            class="mr-2 block items-center py-1 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            href="/propositions/{{$propal->id}}/edit"
            >
            Choisir avec modifications
          </a>

          <form action="/conceptions/{{$propal->conception->id}}/propositions/{{$propal->id}}"
            method="post">
            @csrf
            @method('put')
            <input type="hidden" name="upgrade" value="3">
            <button
            class="block items-center py-1 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-700 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple"
            type="submit" 
            >
            Valider sans modifications
          </button>
          </form>
        </div>
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
    <img class="rounded-b-lg" src="{{asset('/propals/' . $propal->lien )}}">

  </div>

</div><!-- /dialog -->
</div><!-- /overlay -->

</section>
</main>






@endforeach



</div>
</main> 
</x-master>
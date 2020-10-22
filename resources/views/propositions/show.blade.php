<x-master type='types' :value="$types">


  <main class="h-full overflow-y-auto bg-blue-100">

    <div class="sticky top-0 p-4 bg-red-100 shadow-md">
      <p class="font-bold text-red-700 italic">  
        @switch ($proposition->conception->status_id)
        @case (2)
        @case (3)
        @case (4)
        Cette conception est en cours de création.
        @break;

        @case (5)
        @case (8)
        @case (11)
        Cette conception est en attente de votre retour.
        @break;

        @case (6)
        @case (7)
        @case (9)
        @case (10)
        @case (12)
        @case (13)
        Cette conception est cours de modification.
        @break;

        @case (14)
        Nous sommes entraine de générer le fichier final de cette conception.
        @break;

        @case (15)
        Cette conception est finalisée est le fichier final prêt.
        @break;

        @endswitch
      </p>
    </div> 

    <div class="container px-6 mx-auto">
      <div class="grid gap-6 mb-8 grid-cols-3 mt-8">

        <main x-data="{ 'isDialogOpen': false }" @keydown.escape="isDialogOpen = false">
         <section class="flex flex-wrap">

          <div
          class="min-w-0 col-span-1 p-4 bg-white rounded-lg shadow-md"
          >
          <h4 class="mb-4 font-semibold text-gray-600">
           La proposition choisie
         </h4>
         <hr class="mb-4">
         <p>
          <button type="button" class="hover:border-gray-500" @click="isDialogOpen = true">
            <img src="{{asset('propals/' . $proposition->lien)}}" class="rounded-lg shadow-md">
          </button>
        </p>
        <hr class="mt-4">
        @empty(Auth::user()->graphiste)
        <div class="mt-6">
          @if ($count > 0 )
          <p class="ml-2 inline-flex block">
          Vous avez encore droits à : </p>
          <p class="inline-flex block font-extrabold text-2xl px-1 py-2 bg-blue-100 rounded-md text-purple-600"> 0{{ $count }} </p><p class="ml-2 inline-flex block">
          Modifications </p>
          @else
          <p class="inline-flex block">
            Vous avez atteint le nombre limite de modifications
          </p>                    
          @endif
        </div>
        @endempty

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


<div
class="min-w-0 col-span-2 p-4 bg-white rounded-lg shadow-md"
>
<h4 class="mb-2 font-semibold text-gray-600">
  Les Modifications demandées :
</h4>
<hr class="mb-0">
<p>
  <img src="" class="rounded-lg shadow-md">
</p>
<div class="mt-2">
  @foreach ($proposition->conception->modifications as $modification)
  <div class="w-64 py-2 px-2 bg-blue-100 mb-2">
    Modification {{$loop->remaining + 1}} : 
  </div>
  <div class="flex items-center py-4 px-4 bg-red-100 ">
    {{$modification->explication}}

  </div>
  <hr>


@if(count($modification->document) > 0 )
<h4 class="font-semibold text-gray-600">
  Les pièces jointes de la modification :
</h4>
  <div class="flex items-center py-4 px-4 bg-red-100 ">
    @foreach ($modification->document as $document)
      <a download="{{ $document->nomDocument }}" href="{{ Storage::url($document->lien) }}">
        <img class="h-12 shadow-md mr-2 rounded-lg border border-blue-400 bg-blue-100" src="{{ asset('img/doc.png') }}" alt="{{ $document->nomDocument }}"></a>
    @endforeach  
  </div>
@endif  


  <hr class="mb-2">



  @endforeach





</div>
</div>





</div>
</div>
</main> 
</x-master>
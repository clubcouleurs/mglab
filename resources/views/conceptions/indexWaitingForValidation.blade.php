<x-master>

  <main class="h-full overflow-y-auto">



    <div class="container mx-auto">




<!-- status 4/7/10/13  -->

@foreach ($conceptions as $conception)
<div class="grid gap-4 xl:grid-cols-12 grid-flow-col mb-8 mt-8">
  <div class="flex mx-auto items-center row-span-2 col-span-1 p-4 rounded-lg bg-white rounded-lg shadow-md">
    <div>
      <img
      class="object-cover w-full h-full rounded-full"
      src="{{ asset('img/icon.jpg') }}"
      alt=""
      loading="lazy"
      />
    </div>                
  </div>
  <div class="row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">
    <div>
      <div class="block flex items-center w-full">
        <span class="inline-block w-3 h-3 mr-1 bg-red-600 rounded-full">
        </span>

        <div class="w-64">
          <span class="font-bold bold text-xl">
            <a href="/conceptions/{{$conception->id}}">
              {{$conception->type}}
            </a>
          </span>
        </div>

      </div> 
          <div class="block flex items-center w-full">
            <div class="w-64">
              <span class="font-normal text-md">
                  {{$conception->nom_projet}}
              </span>          
            </div>
          </div>                                  

    </div>
  </div>
  <div class="row-span-1 col-span-4 p-4 bg-white rounded-lg shadow-md">

    <div class="block flex items-center w-full">
      <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full">
      </span>
      <div class="w-64">
        <span class="font-light text-sm">
          <a href="/conceptions/{{$conception->id}}">
           <p class="">Nom Client : {{$conception->user->display_name}}</p>
         </a>
       </span>
     </div>
   </div>  
   <div class="block flex items-center w-full">
    <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full">
    </span>
    <div class="w-64">
      <span class="font-light text-sm">
        <a href="/conceptions/{{$conception->id}}">
         <p class="">Organisme : {{$conception->rs_entreprise}}</p>
       </a>
     </span>
   </div>
 </div> 


</div>  
<div class="text-center justify-center flex items-center row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">

        @if($conception->status_id == 4 )
        <a
          class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
          href="/conceptions/{{$conception->id}}/propositions"
          >
          Voir les propositions
        </a>
        @else
        <a
          class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
          href="/propositions/{{$conception->propalModifiee()->id}}/edit"
          >
          Voir la modification
        </a>
        @endif



</div>


<div class="row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">
 <form action="/conceptions/{{$conception->id}}" method="POST" >
  @csrf
  @method('PATCH')
@switch($conception->status_id)
    @case(4)
        <input type="hidden" name="upgrade" value="0">
        @break
    @case(7)
        <input type="hidden" name="upgrade" value="1">
        @break
    @case(10)
        <input type="hidden" name="upgrade" value="2">
        @break
    @case(13)
        <input type="hidden" name="upgrade" value="3">
        @break                        
@endswitch
    <button class="block w-full px-4 py-2 text-sm flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white rounded-lg"
    type="submit">
    Valider
  </button>
</form>


@can('administrer')
<div class="mt-2">
 <form action="/conceptions/{{$conception->id}}" method="POST" >
  @csrf
    <button class="block w-full px-4 py-2 text-sm flex-shrink-0 bg-gray-500 hover:bg-gray-700 border-gray-500 hover:border-gray-700 text-sm border-4 text-white rounded-lg"
    type="submit">
    Downgrader
  </button>
</form>
</div>
@endcan



</div>


<div class="row-span-1 col-span-3 p-4 rounded-lg bg-white rounded-lg shadow-md">
  <div class="block flex items-center w-full">
    <span class="inline-block w-3 h-3 mr-1 bg-red-600 rounded-full">
    </span>
    <p class="text-xs">Date de commande</p>
  </div>  




  <span class="py-1 font-sm leading-tight text-green-700 bg-green-100 rounded-full "
  >
  {{ $conception->lancer_at->diffForHumans() }}
</span>

</div>  

<div class="row-span-1 col-span-3 p-4 rounded-lg bg-white rounded-lg shadow-md">
  <div class="block flex items-center w-full">
    <span class="inline-block w-3 h-3 mr-1 bg-red-600 rounded-full">
    </span>
    <p class="text-xs">Etat</p>
  </div>  



  <span
  class="py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-lg"
  >    
  {{ $conception->status->label }}
</span>


</div>              
</div>
@endforeach
<hr>
<!-- end status 4/7/10/13 -->


{{ $conceptions->links() }}




</div>
</main>

</x-master>
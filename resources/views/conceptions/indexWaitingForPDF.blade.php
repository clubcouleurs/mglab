<x-master>

  <main class="h-full overflow-y-auto">



    <div class="container mx-auto">



<!-- status 14  -->

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


        <a
        class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        href="/propositions/
        @isset($conception->propalModifiee()->id)
        {{$conception->propalModifiee()->id}}
        @else
        {{$conception->propalChoisie()->id}}
        @endif
        "
        >
        Voir la création finale
      </a>




</div>


<div class="row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">


<div class="ml-2">


  <form class="w-full max-w-sm" action="/conceptions/{{$conception->id}}" method="POST"
   enctype="multipart/form-data"
   onsubmit="return validateFormFinal()"
   name="formModifFinal">
   @csrf
   @method('PATCH')

     <div>
<p id="labelPropal" class="text-gray-700 text-sm mb-2">Uploader ici le fichier PDF Final de la création</p>
       <hr class="mb-2">
     </div>


   <div class="flex items-center">

    <input
    class="block w-full text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
    type="file"
    name="pdf_conception"
    id="pdf_conception"
    value="{{old('pdf_conception')}}" 
    required>

    <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-3 px-4 rounded"
    type="submit">
    Ok
  </button>


</div>

      <div>
        @error('pdf_conception')
        <p class="block h-10 px-4 py-2 rounded-md w-full mt-4
        bg-red-200 text-red-600"> Attention : {{ $message }}</p>
        @enderror
      </div>

</form>
</div>



<hr class="mb-2 mt-2">

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
<!-- end status 14 -->


{{ $conceptions->links() }}


</div>
</main>
</x-master>
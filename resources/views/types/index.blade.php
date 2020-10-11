<x-master type='types' :value="$types">

        <main class="h-full overflow-y-auto">


<div class="container px-6 mx-auto">
             


@if (count($conceptions) > 0)

<!-- status 15  -->
<h4 class="font-semibold text-gray-600 mb-2 mt-6">
 Vos conceptions validées et fichier final prêt pour la catégorie : {{ $type }} 
</h4>
@foreach ($conceptions as $conception)
<div class="grid gap-4 xl:grid-cols-12 grid-flow-col mb-8">
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
          <span class="font-bold bold text-2xl">
            <a href="/conceptions/{{$conception->id}}">
              {{$conception->type}}
            </a>
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

<div class="flex row-span-2 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">
        

          <div class="row-span-1 col-span-4 p-4 bg-white rounded-lg">

    <div class="block flex items-center w-full">

      <div class="w-full">
        <span class="font-light text-sm font-semibold">
          
           <p class="mb-4">Télécharger le fichier pdf finale de la création</p>

       </span>
     </div>
   </div>  
   <div class="block flex items-center w-full">

    <div class="w-full">
      <span class="font-light text-sm">

         <div class="w-full flex items-center rounded-lg border border-teal-500 py-2 px-2 bg-red-100">
                      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
          <img src="{{ asset('img/pdf.png') }}" class="h-8 mr-2">
          <a download="{{ $conception->pdf_conception }}" href="{{ Storage::url('creations/' . $conception->pdf_conception) }}" class="font-semibold text-red-600">
            Exe_{{ $conception->type }}_{{ $conception->user->user_login }}</a>
          
        </div>


     </span>
   </div>
 </div> 
</div> 


</div>



<div class="row-span-1 col-span-3 p-4 rounded-lg bg-white rounded-lg shadow-md">
  <div class="block flex items-center w-full">
    <span class="inline-block w-3 h-3 mr-1 bg-{{ $conception->status->color }}-700 rounded-full">
    </span>
    <p class="text-xs">Date de commande</p>
  </div>  




  <span class="py-1 font-sm leading-tight text-{{ $conception->status->color }}-700 bg-{{ $conception->status->color }}-100 rounded-full "
  >
  {{ $conception->lancer_at->diffForHumans() }}
</span>

</div>  

<div class="row-span-1 col-span-3 p-4 rounded-lg bg-white rounded-lg shadow-md">
  <div class="block flex items-center w-full">
    <span class="inline-block w-3 h-3 mr-1 bg-{{ $conception->status->color }}-700 rounded-full">
    </span>
    <p class="text-xs">Etat</p>
  </div>  



  <span
  class="py-1 font-semibold leading-tight text-{{ $conception->status->color }}-700 bg-{{ $conception->status->color }}-200 rounded-lg"
  >    
  {{ $conception->status->label }}
</span>


</div>              
</div>
@endforeach
<hr>
<!-- end status 15 -->


 @endif



          </div>
        </main>


</x-master>
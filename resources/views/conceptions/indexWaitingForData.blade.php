<x-master>

  <main class="h-full overflow-y-auto">



    <div class="container mx-auto">



      <!-- status 1  -->

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
   <div class="text-center justify-center flex items-center row-span-2 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">

    <a
    class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
    href="/conceptions/{{$conception->id}}/edit"
    >
    Cliquez-ici pour remplire vos données
  </a>


</div>



<div class="row-span-1 col-span-3 p-4 rounded-lg bg-white rounded-lg shadow-md">
  <div class="block flex items-center w-full">
    <span class="inline-block w-3 h-3 mr-1 bg-red-600 rounded-full">
    </span>
    <p class="text-xs">Date de commande</p>
  </div>  




  <span class="py-1 font-sm leading-tight text-green-700 bg-green-100 rounded-full "
  >
  {{ $conception->created_at->diffForHumans() }}
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
<!-- end status 1 -->

{{ $conceptions->links() }}



</div>
</main>
</x-master>
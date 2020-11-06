<x-master type='types' :value="$types">

        <main class="h-full overflow-y-auto">


<div class="container px-6 mx-auto">
             

            @if (count($conceptions1) > 0)

            @cannot('administrer')
            <span
              class="flex items-center justify-between p-4 mb-8 mt-8 text-2xl font-bold text-purple-100 bg-red-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
              
            >
              <div class="flex items-center">
                <svg
                  class="w-5 h-5 mr-2"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  ></path>
                </svg>
                <span>Merci de remplire les cahiers de charges pour lancer vos créations</span>
              </div>
              <span>&DownArrow;</span>
            </span>
           @endcannot



      <!-- status 1  -->
      <h4 class="font-semibold text-gray-600 mb-2 mt-6">
       Ces conceptions en attente de vos données
     </h4>
     @foreach ($conceptions1 as $conception)
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

<div class="row-span-1 col-span-3 p-4 rounded-lg bg-red-600 rounded-lg shadow-md">
  <div class="mb-2 block flex items-center w-full">
    <span class="inline-block w-3 h-3 mr-1 bg-white rounded-full">
    </span>
    <p class="text-xs text-white">Etat</p>
  </div>  
  <span
  class="text-xl uppercase font-semibold leading-tight text-white rounded-lg"
  >En attente de vos données
</span>
</div>  

</div>
@endforeach
<hr>
<!-- end status 1 -->
          
 @endif





@if (count($conceptions234) > 0)


<!-- status 2, 3, 4  -->
<h4 class="font-semibold text-gray-600 mb-2 mt-6">
 Ces conceptions sont en cours de création

 
</h4>
@foreach ($conceptions234 as $conception)
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
<div class="text-center justify-center items-center flex flex-col row-span-2 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">
<div class="h-12 w-full">
  <a
  class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
  href="/conceptions/{{$conception->id}}"
  >
  Voir le cahier de charges
</a>
</div>
<div class="h-12 w-full">
  <a
  class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
  href="/conceptions/{{$conception->id}}/pdf"
  download
  >
  Télécharger le cahier de charges en PDF
</a>
</div>
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

<div class="row-span-1 col-span-3 p-4 rounded-lg bg-red-600 rounded-lg shadow-md">
  <div class="mb-2 block flex items-center w-full">
    <span class="inline-block w-3 h-3 mr-1 bg-white rounded-full">
    </span>
    <p class="text-xs text-white">Etat</p>
  </div>  
  <span
  class="py-2 px-2 text-xl uppercase font-semibold leading-tight text-white rounded-lg"
  >    
  En cours de création
</span>
</div>              

</div>
@endforeach
<hr>
<!-- end status 3 -->

 @endif









@if (count($conceptions5811) > 0)



<!-- status 5  -->
<h4 class="font-semibold text-gray-600 mb-2 mt-6">
 Ces conceptions sont en attente de votre retour


</h4>
@foreach ($conceptions5811 as $conception)
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
<div class="text-center justify-center flex items-center row-span-2 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">

@switch ($conception->status_id)
    @case (5)
        <a
          class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
          href="/conceptions/{{$conception->id}}/propositions"
          >
          Voir les propositions
        </a>
        @break;

    @case (8)
        <a
          class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
          href="/propositions/{{$conception->propalModifiee(0)->id}}/edit"
          >
          Voir la conception modifiée
        </a> 
        @break;

    @case (11) 
        <a
          class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
          href="/propositions/{{$conception->propalModifiee(1)->id}}/edit"
          >
          Voir la conception modifiée
        </a> 
        @break;        

@endswitch



       




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


<div class="row-span-1 col-span-3 p-4 rounded-lg bg-red-600 rounded-lg shadow-md">
  <div class="mb-2 block flex items-center w-full">
    <span class="inline-block w-3 h-3 mr-1 bg-white rounded-full">
    </span>
    <p class="text-xs text-white">Etat</p>
  </div>  
  <span
  class="py-2 px-2 text-xl uppercase font-semibold leading-tight text-white rounded-lg"
  >    
  En attente de votre retour
</span>
</div>  


</div>
@endforeach
<hr>
<!-- end status 5 -->



 @endif






@if (count($conceptions691271013 ) > 0)

<!-- status 691271013  -->
<h4 class="font-semibold text-gray-600 mb-2 mt-6">
 Ces conceptions sont en cours de modification


</h4>
@foreach ($conceptions691271013  as $conception)
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
<div class="text-center justify-center flex items-center row-span-2 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">

@switch ($conception->status_id)
    @case (6)
    @case (7) 
          <a
          class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
          href="/propositions/{{$conception->propalChoisie()->id}}"
          >
          Voir la modification
        </a>
        @break;
  
    @case (9)
    @case (10)
          <a
          class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
          href="/propositions/{{$conception->propalModifiee(0)->id}}"
          >
          Voir la modification
        </a>
        @break;
  

    @case (12)
    @case (13)  
          <a
          class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
          href="/propositions/{{$conception->propalModifiee(1)->id}}"
          >
          Voir la modification
        </a>
        @break;
@endswitch






<!--
        @if($conception->status_id < 8)
          <a
          class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
          href="/propositions/{{$conception->propalChoisie()->id}}"
          >
          Voir la modification
        </a>  
        @else
          <a
          class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
          href="/propositions/{{$conception->propalModifiee()->id}}"
          >
          Voir la modification
        </a>        
        @endif

      -->




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


<div class="row-span-1 col-span-3 p-4 rounded-lg bg-red-600 rounded-lg shadow-md">
  <div class="mb-2 block flex items-center w-full">
    <span class="inline-block w-3 h-3 mr-1 bg-white rounded-full">
    </span>
    <p class="text-xs text-white">Etat</p>
  </div>  
  <span
  class="py-2 px-2 text-xl uppercase font-semibold leading-tight text-white rounded-lg"
  >    
  En cours de modification
</span>
</div>  

</div>
@endforeach
<hr>
<!-- end status 691271013 -->


 @endif

@if (count($conceptions14 ) > 0)

<!-- status 14  -->
<h4 class="font-semibold text-gray-600 mb-2 mt-6">
 Les fichiers finaux pour ces conceptions sont en cours de génération par nos soins


</h4>
@foreach ($conceptions14  as $conception)
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
<div class="text-center justify-center flex items-center row-span-2 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">


          <a
          class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
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
  <div class="mb-2 block flex items-center w-full">
    <span class="inline-block w-3 h-3 mr-1 bg-red-600 rounded-full">
    </span>
    <p class="text-xs">Etat</p>
  </div>  



  <span
  class="py-2 px-2 font-semibold leading-tight text-red-700 bg-red-100 rounded-lg"
  >    
  En cours de modification
</span>


</div>              
</div>
@endforeach
<hr>
<!-- end status 14 -->


 @endif

@if (count($conceptions15) > 0)

<!-- status 15  -->
<h4 class="font-semibold text-gray-600 mb-2 mt-6">
 Vos conceptions validées et fichier final prêt.
</h4>
@foreach ($conceptions15 as $conception)
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

<div class="row-span-1 col-span-3 p-4 rounded-lg bg-gray-800 rounded-lg shadow-md">
  <div class="mb-2 block flex items-center w-full">
    <span class="inline-block w-3 h-3 mr-1 bg-gray-100 rounded-full">
    </span>
    <p class="text-xs text-gray-100">Etat</p>
  </div>  



  <span
  class="py-2 px-2 font-semibold leading-tight text-gray-100 rounded-lg
  bg-gray-600"
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
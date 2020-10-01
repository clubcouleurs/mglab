<x-master>

  <main class="h-full overflow-y-auto">



    <div class="container mx-auto">



      <!-- status 1  -->
      <h4 class="font-semibold text-gray-600 mb-2 mt-6">
       Les projets en attente de données-client
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




<!-- status 2  -->
<h4 class="font-semibold text-gray-600 mb-2 mt-6">


 Les projets en attente d'affectation graphiste




</h4>
@foreach ($conceptions2 as $conception)
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
<div class="text-center justify-center flex items-center row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">

  <a
  class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
  href="/conceptions/{{$conception->id}}"
  >
  Voir le cahier de charges
</a>


</div>


<div class="row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">
  <form class="w-full max-w-sm" action="/conceptions/{{$conception->id}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="flex items-center">
      <select class="block w-full mr-3 appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="graphiste">

        <option value="Aucun">Aucun</option>
        @foreach ($graphistes as $graphiste)
        <option value="{{ $graphiste->id }}"
          @if ($graphiste->id == $conception->graphiste_id)
          selected
          @endif
          >{{ $graphiste->user->user_login }}</option>
          @endforeach
        </select>
        <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-3 px-4 pr-8 rounded" type="submit">
          Ok
        </button>

      </div>
    </form>
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
<!-- end status 2 -->




<!-- status 3  -->
<h4 class="font-semibold text-gray-600 mb-2 mt-6">
 Les conceptions en cours de création

 
</h4>
@foreach ($conceptions3 as $conception)
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
<div class="text-center justify-center flex items-center row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">

  <a
  class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
  href="/conceptions/{{$conception->id}}"
  >
  Voir le cahier de charges
</a>


</div>


<div class="row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">
  <div>

   <form class="w-full max-w-sm" action="/conceptions/{{$conception->id}}/propositions" method="POST"
     enctype="multipart/form-data"
     onsubmit="return validateForm()"
     name="myForm">
     @csrf
     <div class="flex items-center">

      <input
      class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
      type="file"
      name="propals[]"
      id="propals"
      value="{{old('propals')}}" 
      multiple
      required>
      @error('propals')
      <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
      @enderror


      <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-3 px-4 pr-8 rounded" type="submit">
        Ok
      </button>

    </div>
  </form>

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
<!-- end status 3 -->



<!-- status 4  -->
<h4 class="font-semibold text-gray-600 mb-2 mt-6">
Propositions prêtes et en attente de validation Manager 


</h4>
@foreach ($conceptions4 as $conception)
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
<div class="text-center justify-center flex items-center row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">


        <a
        class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        href="/conceptions/{{$conception->id}}/propositions"
        >
        Voir les propositions
      </a>



</div>


<div class="row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">
  <div>
 <form action="/conceptions/{{$conception->id}}" method="POST" >
  @csrf
  @method('PATCH')
  <input type="hidden" name="upgrade" value="0">

    <button class="block w-full px-4 py-2 text-sm flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white rounded-lg"
    type="submit">
    Valider
  </button>


</form>


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
<!-- end status 4 -->





<!-- status 5  -->
<h4 class="font-semibold text-gray-600 mb-2 mt-6">
 Création validée par Manager et en attente de choix client


</h4>
@foreach ($conceptions5 as $conception)
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
        href="/conceptions/{{$conception->id}}/propositions"
        >
        Voir les propositions
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
<!-- end status 5 -->





<!-- status 6  -->
<h4 class="font-semibold text-gray-600 mb-2 mt-6">
 Choix faite et 1ère modification reçue 


</h4>
@foreach ($conceptions6 as $conception)
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
<div class="text-center justify-center flex items-center row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">


        <a
        class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        href="/propositions/{{$conception->propalChoisie()->id}}"
        >
        Voir la modification
      </a>



</div>


<div class="row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">
  <div>
 <form class="w-full max-w-sm"
 action="conceptions/{{$conception->id}}/modifications/{{$conception->getModifications()[0]}}/propositions"
 method="POST"
 enctype="multipart/form-data"
 onsubmit="return validateFormModif()"
 name="formModif1">
 @csrf
 <div class="flex items-center">

  <input
  class="block w-full mt-1 text-sm dark:border-gray-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
  type="file"
  name="modif"
  id="modif"
  value="{{old('modif')}}" 
  multiple
  required>
  @error('modif')
  <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
  @enderror


  <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-3 px-4 pr-8 rounded" type="submit">
    Ok
  </button>

</div>
</form>


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
<!-- end status 6 -->







<!-- status 7  -->
<h4 class="font-semibold text-gray-600 mb-2 mt-6">
 En attente de validation de la Création après 1ère modification par le Manager

</h4>
@foreach ($conceptions7 as $conception)
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
<div class="text-center justify-center flex items-center row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">


        <a
        class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        href="/propositions/{{$conception->propalModifiee()->id}}"
        >
        Voir la proposition
      </a>



</div>


<div class="row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">
  <div>
 <form action="/conceptions/{{$conception->id}}" method="POST" >
  @csrf
  @method('PATCH')
  <input type="hidden" name="upgrade" value="1">
  <div class="flex items-center">
    <button class="block w-full px-4 py-2 text-sm flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white rounded-lg"
    type="submit">
    Valider
  </button>

  </div>
</form>


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
<!-- end status 7 -->






<!-- status 8  -->
<h4 class="font-semibold text-gray-600 mb-2 mt-6">

 Création après 1ère modification validée par le Manager et en attente de réponse client


</h4>
@foreach ($conceptions8 as $conception)
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
        href="/propositions/{{$conception->propalModifiee()->id}}/edit"
       
        >
        Voir la proposition
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
<!-- end status 8 -->










<!-- status 9  -->
<h4 class="font-semibold text-gray-600 mb-2 mt-6">
 2ème modification reçue 


</h4>
@foreach ($conceptions9 as $conception)
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
<div class="text-center justify-center flex items-center row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">


        <a
        class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        href="/propositions/{{$conception->propalModifiee()->id}}"
        >
        Voir la modification
      </a>


</div>


<div class="row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">
  <div>

 <form class="w-full max-w-sm"
 action="conceptions/{{$conception->id}}/modifications/{{$conception->getModifications()[0]}}/propositions"
 method="POST"
 enctype="multipart/form-data"
 onsubmit="return validateFormModif()"
 name="formModif1">
 @csrf
 <div class="flex items-center">

  <input
  class="block w-full text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
  type="file"
  name="modif"
  id="modif"
  value="{{old('modif')}}" 
  multiple
  required>
  @error('modif')
  <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
  @enderror


  <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-3 px-4 pr-8 rounded" type="submit">
    Ok
  </button>

</div>
</form>



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
<!-- end status 9 -->






<!-- status 10  -->
<h4 class="font-semibold text-gray-600 mb-2 mt-6">
 En attente de validation de la Création après 2ème modification par le Manager

</h4>
@foreach ($conceptions10 as $conception)
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
<div class="text-center justify-center flex items-center row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">


        <a
        class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        href="/propositions/{{$conception->propalModifiee()->id}}"
        >
        Voir la modification
      </a>


</div>


<div class="row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">
  <div>
 <form action="/conceptions/{{$conception->id}}" method="POST" >
  @csrf
  @method('PATCH')
  <input type="hidden" name="upgrade" value="2">
  <div class="flex items-center">
    <button class="block w-full px-4 py-2 text-sm flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white rounded-lg"
    type="submit">
    Valider
  </button>

  </div>
</form>


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
<!-- end status 10 -->









<!-- status 11  -->
<h4 class="font-semibold text-gray-600 mb-2 mt-6">

 Création après 2ème modification validée par DA et en attente de réponse client


</h4>
@foreach ($conceptions11 as $conception)
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



        @csrf

        <a
        class="w-full block px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        href="/propositions/{{$conception->propalModifiee()->id}}"

        >
        Voir la proposition
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
<!-- end status 11 -->




<!-- status 12  -->
<h4 class="font-semibold text-gray-600 mb-2 mt-6">
 3ème modification reçue


</h4>
@foreach ($conceptions12 as $conception)
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
<div class="text-center justify-center flex items-center row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">


        <a
        class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        href="/propositions/{{$conception->propalModifiee()->id}}"
        >
        Voir la modification
      </a>


</div>


<div class="row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">
  <div>

 <form class="w-full max-w-sm"
 action="conceptions/{{$conception->id}}/modifications/{{$conception->getModifications()[0]}}/propositions"
 method="POST"
 enctype="multipart/form-data"
 onsubmit="return validateFormModif()"
 name="formModif1">
 @csrf
 <div class="flex items-center">

  <input
  class="block w-full text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
  type="file"
  name="modif"
  id="modif"
  value="{{old('modif')}}" 
  multiple
  required>
  @error('modif')
  <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
  @enderror


  <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-3 px-4 pr-8 rounded" type="submit">
    Ok
  </button>

</div>
</form>



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
<!-- end status 12 -->









<!-- status 13  -->
<h4 class="font-semibold text-gray-600 mb-2 mt-6">
 En attente de validation de la Création après 3ème modification par le Manager


</h4>
@foreach ($conceptions13 as $conception)
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
<div class="text-center justify-center flex items-center row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">


        <a
        class="block w-full px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        href="/propositions/{{$conception->propalModifiee()->id}}"
        >
        Voir la proposition
      </a>



</div>


<div class="row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">
  <div>
 <form action="/conceptions/{{$conception->id}}" method="POST" >
  @csrf
  @method('PATCH')
  <input type="hidden" name="upgrade" value="3">
  <div class="flex items-center">
    <button class="block w-full px-4 py-2 text-sm flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white rounded-lg"
    type="submit">
    Valider
  </button>

  </div>
</form>


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
<!-- end status 13 -->







<!-- status 14  -->
<h4 class="font-semibold text-gray-600 mb-2 mt-6">
 Création après 3ème modification validée par le Manager et en attente d'upload du fichier final par le graphiste

</h4>
@foreach ($conceptions14 as $conception)
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
<div class="text-center justify-center flex items-center row-span-1 col-span-4 p-4 rounded-lg bg-white rounded-lg shadow-md">


        <a
        class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        href="/propositions/{{$conception->propalModifiee()->id}}"
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
   <div class="flex items-center">

    <input
    class="block w-full text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
    type="file"
    name="pdf_conception"
    id="pdf_conception"
    value="{{old('pdf_conception')}}" 
    required>
    @error('pdf_conception')
    <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
    @enderror




    <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-3 px-4 pr-8 rounded"
    type="submit">
    Ok
  </button>

</div>

</form>
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








<!-- status 15  -->
<h4 class="font-semibold text-gray-600 mb-2 mt-6">
 Conception validée et fichier final prêt
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



</div>
</main>

<script type="text/javascript">

  function validateForm() {

    var files = document.getElementById("propals").files;

    var l = files.length ;
    if (l === 3) {

      return true;

    }
    else
    {
      alert("Vous devez soumettre 3 propositions ! " );
      document.getElementById("propals").value = '' ;

      return false;
    }
  }

  function validateFormModif1() {

    var files = document.getElementById("modif").files;

    var l = files.length ;
    if (l === 1) {
      return true;

    }
    else
    {
      alert("Vous devez soumettre un seul fichier ! ");
      return false;
    }
  }

  function validateFormFinal() {
    var file = document.getElementById("pdf_conception").value;
    var l = file.split('.').pop();
    if (l == 'pdf') {
      return true;
    }
    else
    {
      alert("Vous devez soumettre un fichier PDF ! ");
      document.getElementById("pdf_conception").value = '' ;

      return false;
    }
  }
</script>
</x-master>
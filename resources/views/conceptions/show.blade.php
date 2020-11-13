<x-master type='types' :value="$types">
  <main class="h-full overflow-y-auto bg-blue-100">
    @if( $conception->status_id > 1 )
        <div class="sticky top-0 p-4 bg-green-100 shadow-md">
      <p class="font-bold text-green-700 italic">  

        @switch ($conception->status_id)
        @case (2)
        @case (3)
        @case (4)
        Cette conception est en cours de création.
        @break;

        @case (5)
        Cette conception est en attente de votre retour : 
          <a class="text-blue-700" href="/conceptions/{{$conception->id}}/propositions">Voir les propositions</a>
        @break;

        @case (8)
        Cette conception est en attente de votre retour.
          <a class="text-blue-700" href="/propositions/{{$conception->propalModifiee(0)->id}}/edit">
            Voir la modification
          </a> 
        @break;

        @case (11)
        Cette conception est en attente de votre retour.
          <a class="text-blue-700" href="/propositions/{{$conception->propalModifiee(1)->id}}/edit">
            Voir la modification
          </a> 
        @break;

        @case (6)
        @case (7)
        Cette conception est cours de modification :
        <a class="text-blue-700" href="/propositions/{{$conception->propalChoisie()->id}}">
          Voir la modification
        </a>
        @break;

        @case (9)
        @case (10)
        Cette conception est cours de modification :
        <a class="text-blue-700" href="/propositions/{{$conception->propalModifiee(0)->id}}">
          Voir la modification
          </a>
        @break;

        @case (12)
        @case (13)
        Cette conception est cours de modification :
        <a class="text-blue-700" href="/propositions/{{$conception->propalModifiee(1)->id}}">
          Voir la modification
          </a>
        @break;

        @case (14)
        Nous sommes entraine de générer le fichier final de cette conception :
          <a class="text-blue-700"
          href="/propositions/
            @isset($conception->propalModifiee()->id)
            {{$conception->propalModifiee()->id}}
            @else
            {{$conception->propalChoisie()->id}}
            @endif
            ">
          Voir la création finale
        </a> 
        @break;

        @case (15)
         <div class="w-full flex items-center">
           <p class="mr-2">Cette conception est finalisée est le fichier final prêt : </p>
         <a download="{{ $conception->pdf_conception }}" href="{{ Storage::url('creations/' . $conception->pdf_conception) }}" class="font-semibold text-red-600 flex">           
         <svg class="fill-current w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
         <img src="{{ asset('img/pdf.png') }}" class="h-8 mr-2">
         Exe_{{ $conception->type }}_{{ $conception->user->user_login }}</a>
        </div>
        @break;

        @endswitch
      </p>
    </div>
    @endif

    <div class="container px-6 mx-auto grid">
      <div class="">
       <h4
       class="mt-4 mb-4 text-2xl font-bold text-gray-700 uppercase font-semibold">
       Informations pour la conception du {{ $conception->type }}
     </h4>
     <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
      <div class="mb-4">
        <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-600">
        Nom de l'entreprise
      </h3>
      <p class="w-full mt-1 text-lg px-2 py-2 font-bold bg-blue-100 border rounded-lg">
      {{$conception->rs_entreprise}}
    </p>            
  </div>

  @if ($type == 'logo')
  <div class="mb-4">

    <hr>
    <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-600">
      L'age de votre entreprise
    </h3>

    <p class="w-full mt-1 text-lg px-2 py-2 font-bold bg-blue-100 border rounded-lg">
    {{$conception->ageEntreprise}}
  </p>
</div>

@else

  <div class="mb-4">
    <hr>
    <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-600">
      Votre logo
    </h3>

            @if (substr($conception->logo, -3) == 'pdf' )
            <a href="{{ asset($conception->logo) }}" download="mon-logo"
              class="text-blue-500 underline border px-4 py-4 bg-blue-100">Télécharger votre logo</a>
            @else
            <img src="{{asset($conception->logo)}}" width="250">
            @endif

    
  </div>

@endif

  <div class="mb-4">
    <hr>
    <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-600">
      Votre slogan
    </h3>

    <p
    class="w-full mt-1 text-lg px-2 py-2 font-bold bg-blue-100 border rounded-lg"
    >
    {{$conception->slogan}}
  </p>

</div>
</div>
     <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

<div class="mb-4">
  <hr>
  <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-600">
  Votre activités
</h3>
<p
class="w-full mt-1 text-lg px-2 py-2 bg-blue-100 border rounded-lg"
>
{{$conception->activities}}
</p>
</div>



@if ($type == 'logo')


<div class="mb-4">
  <hr>
  <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-600">
  Vos axes de développement
</h3>

<p class="w-full mt-1 text-lg px-2 py-2 bg-blue-100 border rounded-lg">
{{$conception->axeDeveloppement}}
</p>
</div>


@else

<div class="mb-4">
  <hr>
  <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-600">
  Votre positionnement
</h3>

<p
class="w-full mt-1 text-lg px-2 py-2 bg-blue-100 border rounded-lg"
>
{{$conception->positionnement}}
</p>
</div>

<div class="mb-4">
  <hr>
  <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-600">
  Vos objectifs
</h3>

<p
class="w-full mt-1 text-lg px-2 py-2 bg-blue-100 border rounded-lg"
>
{{$conception->objectif}}
</p>
</div>


@endif



<div class="mb-4">
  <hr>
  <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-600">
  Vos produits et services
</h3>

<p
class="w-full mt-1 text-lg px-2 py-2 bg-blue-100 border rounded-lg"
>
{{$conception->produitService}}
</p>
</div>


<div class="mb-4">
  <hr>


  <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-600">

  @if($type === 'logo')
  Vos informations de contact
  @else
  Les informations de contact qui doivent figurer sur la création
  @endif

  </h3>
<p class="w-full mt-1 text-lg px-2 py-2 bg-blue-100 border rounded-lg">
{{$conception->contacts}}
</p>


</div>
</div>


<!-- Div textes créa -->
@if ($type !== 'logo')
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
  <div class="mb-4">
    <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700">
    Les textes pour votre création
  </h3>
  <p class="w-full mt-1 text-lg">
  {{$conception->texte_additionnel}}
</p>
</div>
</div>
@endif
<!-- Div photos -->


@if(count($images) > 0 )
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
  <div class="mb-4">
    <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700">
@if($type === 'logo')
Les exemples de logos que vous avez aimez<hr>
@else
Les images pour votre création<hr>
@endif
</h3>
  @foreach ($images as $image)

      <!-- ici c'est pour la modal -->
<main
      class="inline-flex mx-auto max-w-4xl "
      x-data="{ 'isDialogOpen': false }"
      @keydown.escape="isDialogOpen = false"
>
       <section class="flex flex-wrap">
          <button type="button" class="hover:border-gray-500" @click="isDialogOpen = true">
            <img src="{{ asset('thumbs/'. substr($image->lien,8)) }}"
            class="px-2 py-2 border border-blue-400 shadow-lg rounded-lg mb-2">
          </button>


      <!-- overlay -->
      <div
      class="overflow-auto"
      style="background-color: rgba(0,0,0,0.5)"
      x-show="isDialogOpen"
      :class="{ 'absolute inset-0 z-30 flex items-start justify-center': isDialogOpen }"
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
    <img class="rounded-b-lg" src="{{ asset($image->lien) }}">

  </div>

</div><!-- /dialog -->
</div><!-- /overlay -->

</section>
</main>        
@endforeach
</div>
</div>
@endif

<!-- ici si le client à un document il peut le charger ici -->
@if ($document !== Null ) 
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
      <div class="mb-4">
        <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
        for="document">
        Le document que vous avez uploader
      </label>

                      <a
            class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
            type="button" href="{{ asset($document->lien) }}" download="{{$document->nomDocument}}"
            >
            <span
            aria-hidden="true"
            class="inline-block align-middle absolute text-md shadow-xs font-bold text-white top-0 right-0
            bg-blue-300 w-6 h-6 transform translate-x-2 -translate-y-2 rounded-full"
            ></span>
            <img src="{{ asset('img/doc.png') }}"
            class="block px-2 py-2 rounded-md w-full
          border border-gray-400 bg-gray-200 shadow-lg">
          </a>
      <a class="ml-4 text-blue-400 font-bold"> {{ $document->nomDocument }}</a>
  </div>
</div>
@endif
<!-- fin div chargement document -->    



<!-- Div produit/Services -->
@if ($type !== 'logo')
<section
x-data="{
todos:[],
newTodo:'',
addTodo(){
this.todos.push({
id: this.todos.length +1,

});
},

deleteTodo(todo){

this.todos.splice(this.todos.indexOf(todo), 1 );
}


}"
>

<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
  <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700"
  for="texte_additionnel">
  Avez des produits, services ou événement à mettre sur votre création
</h3>	
<div class="flex-1 text-center items-center">

  <hr class="mb-2">
</div>



<div class="grid grid-cols-3 gap-4 justify-items-auto">
  <div class="flex justify-center items-center px-4 py-2">

           <h3 class="block mb-2 uppercase font-bold text-xs text-gray-700"
           for="texte_additionnel">
           Image du produit
         </h3>
</div>
  <div class="flex justify-center items-center px-4 py-2">

       <h3 class="block mb-2 uppercase font-bold text-xs text-gray-700"
       for="">
       Description
     </h3>
</div>
  <div class="flex justify-center items-center px-4 py-2">

        <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700"
   for="">
   Prix
 </h3>
</div>
</div>

@foreach ($produits as $produit)


<div class="grid grid-cols-3 gap-4 justify-items-auto">
  <div class="flex justify-center items-center px-4 py-2">




      <!-- ici c'est pour la modal -->
<main
      class="inline-flex mx-auto max-w-4xl "
      x-data="{ 'isDialogOpen': false }"
      @keydown.escape="isDialogOpen = false"
>
       <section class="flex flex-wrap">
          <button type="button" class="hover:border-gray-500" @click="isDialogOpen = true">
            <img src="{{ asset($produit->image) }}"
            class="px-2 py-2 w-48 border border-blue-400 shadow-lg rounded-lg mb-2">
          </button>


      <!-- overlay -->
      <div
      class="overflow-auto"
      style="background-color: rgba(0,0,0,0.5)"
      x-show="isDialogOpen"
      :class="{ 'absolute inset-0 z-30 flex items-start justify-center': isDialogOpen }"
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
    <img class="rounded-b-lg" src="{{asset($produit->image)}}">

  </div>

</div><!-- /dialog -->
</div><!-- /overlay -->

</section>
</main>   

<!-- fin partie modal-->



  </div>
  <div class="flex justify-center items-center px-4 py-2">
     <p
     class="text-md text-justify"
     >{{$produit->description}}</p>
</div>

  <div class="flex justify-center items-center px-4 py-2">
     <p
     class="text-xl font-bold"
     >{{$produit->prix / 100 }} €</p>
</div>

</div>

<hr>
@endforeach



</div>
</section>
@endif


<div x-data="{ show:
@empty($Particuliers)
false
@else
true
@endempty
, b2b:
@empty($Entreprises)
false
@else
true
@endempty

}"
class="text-sm px-4 py-3 mb-8 bg-white rounded-lg shadow-md"
>

<div class="mb-4">
  <div class="mt-4 text-sm">
    <span class="block mb-2 uppercase font-bold text-2xl text-gray-600">
      Votre cible
    </span>
    <div class="mt-2">
      <div class="grid grid-cols-8 gap-4">        
        <div>
          <h3
          class="inline-flex items-center text-gray-600"
          >
          <input
          type="checkbox"
          class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-checkbox h-8 w-8"
          name="cible_b2c"
          value="Particuliers"
          @click="show =! show"
          @empty(!$Particuliers)
          checked
          @endempty
          disabled                       

          />
          <span class="ml-2">Particuliers
          </span>
        </h3>
      </div>
      <div>
        <h3
        class="inline-flex items-center ml-6 text-gray-600"
        >
        <input
        type="checkbox"
        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
        name="cible_b2b"
        value="Entreprise"
        @click="b2b =! b2b"
        @empty(!$Entreprises) 
        checked
        @endempty                        
        disabled
        />

        <span class="ml-2">Entreprise</span>
      </h3>
    </div>
  </div>
</div>
</div>

<div x-show="show" class="mb-4">
  <hr class="mb-2">                

  <h3 class="block mt-4 text-sm">
    <span class="block mb-2 uppercase font-bold text-md text-gray-700">
      Tranche d'age de votre cible
    </span>

  </h3>

  <div class="grid grid-cols-8 gap-4">
    <div>  
      <h3
      class="inline-flex items-center text-gray-600"
      >
      <input
      type="checkbox"
      class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
      name="Enfants"
      value="Enfants"
      @empty(!$Enfants) 
      checked
      @endempty
      disabled

      />
      <span class="ml-2">Enfants</span>
    </h3>
  </div>
  <div>
    <h3
    class="inline-flex items-center ml-6 text-gray-600"
    >
    <input
    type="checkbox"
    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
    name="Adolescents"
    value="Adolescents"
    @empty(!$Adolescents) 
    checked
    @endempty                        
    disabled                        
    />
    <span class="ml-2">Adolescents</span>
  </h3>
</div>
<div>
  <h3
  class="inline-flex items-center text-gray-600"
  >
  <input
  type="checkbox"
  class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
  name="Adultes"
  value="Adultes"
  @empty(!$Adultes) 
  checked
  @endempty                        
  disabled                           
  />
  <span class="ml-2">Adultes</span>
</h3>
</div>
<div>
  <h3
  class="inline-flex items-center ml-6 text-gray-600"
  >
  <input
  type="checkbox"
  class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
  name="Seniours"
  value="Seniours"
  @empty(!$Seniours) 
  checked
  @endempty                        
  disabled                         
  />
  <span class="ml-2">Seniours</span>
</h3>                               
</div>
</div>
<h3 class="block mt-4 text-sm">
  <span class="block mb-2 uppercase font-bold text-md text-gray-700">
    Sex de votre cible
  </span>

</h3>

<div class="grid grid-cols-8 gap-4">
  <div>

    <h3
    class="inline-flex items-center text-gray-600"
    >
    <input
    type="checkbox"
    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
    name="Hommes"
    value="Hommes"
    @empty(!$Hommes) 
    checked
    @endempty                        
    disabled                          
    />
    <span class="ml-2">Hommes</span>
  </h3>
</div>
<div>
  <h3
  class="inline-flex items-center ml-6 text-gray-600"
  >
  <input
  type="checkbox"
  class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
  name="Femmes"
  value="Femmes"
  @empty(!$Femmes) 
  checked
  @endempty                        
  disabled                          
  />
  <span class="ml-2 mr-2">Femmes</span>

</h3>
</div>
</div>
</div>    

<div x-show="b2b" class="mb-4">
  <hr class="mb-2">                
  <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-600"
  for="activities_cible">
  Les secteurs d'activités de vos clients
</h3>
<p class="w-full mt-1 text-lg px-2 py-2 bg-blue-100 border rounded-lg">
  {{$conception->activities_cible}}
</p>

</div>                            

</div>
</div>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

  <div class="mb-4">
    <div class="mt-4 text-sm">
      <span class="block mb-2 uppercase font-bold text-2xl text-gray-600">
        Vos préférences pour les couleurs
      </span>
      @empty ($conception->couleur_1 || $conception->couleur_2 || $conception->couleur_3)

      <p>Vous n'avez pas de préférences de couleurs, nos graphistes vont s'en occuper

      </p>
      @else

      <div class="flex mt-2">


        <span
        class="block w-full mt-1 text-sm border border-purple-400 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8"
        style="background-color: {{$conception->couleur_1}}">
      </span>

      <span
      class="block w-full mt-1 text-sm border border-purple-400 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8"
      style="background-color: {{$conception->couleur_2}}">
    </span>
    <span
    class="block w-full mt-1 text-sm border border-purple-400 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8"
    style="background-color: {{$conception->couleur_3}}">
  </span>            



</div>
@endempty
</div>
</div>
</div>
<!-- font -->
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
  <div class="mb-4">
    <div class="mt-4 text-sm">
      <span class="block mb-2 uppercase font-bold text-2xl text-gray-600">
        Vos préférences pour la police d'écriture
      </span>
      <div class="flex mt-2">
        @empty(!$Serif)
        <h3
        class="inline-flex items-center ml-6 text-gray-600"
        >
        <span
        class="inline-block w-4 h-4 mr-1 bg-red-600 rounded-full"
        ></span>

        <span class="ml-2 mr-2">Serif</span>
        <img src="{{ asset('img/font_types_serif.jpg') }}" width="100" class="rounded-lg">
      </h3>
      @endempty

      @empty(!$SansSerif)
      <h3
      class="inline-flex items-center ml-6 text-gray-600"
      >
      <span
      class="inline-block w-4 h-4 mr-1 bg-red-600 rounded-full"
      ></span>
      <span class="ml-2 mr-2">Sans Serif</span>
      <img src="{{ asset('img/font_types_sansserif.jpg') }}" width="100" class="rounded-lg">

    </h3>
    @endempty
    @empty(!$slab)

    <h3
    class="inline-flex items-center ml-6 text-gray-600"
    >
    <span
    class="inline-block w-4 h-4 mr-1 bg-red-600 rounded-full"
    ></span>

    <span class="ml-2 mr-2">Slab Serif</span>
    <img src="{{ asset('img/font_types_slabserif.jpg') }}" width="100" class="rounded-lg">
  </h3>
  @endempty
  @empty(!$Script)

  <h3
  class="inline-flex items-center ml-6 text-gray-600"
  >
  <span
  class="inline-block w-4 h-4 mr-1 bg-red-600 rounded-full"
  ></span>
  <span class="ml-2 mr-2">Script</span>
  <img src="{{ asset('img/font_types_script.jpg') }}" width="100" class="rounded-lg">
</h3>
@endempty
@empty(!$Manuscrit)

<h3
class="inline-flex items-center ml-6 text-gray-600"
>
<span
class="inline-block w-4 h-4 mr-1 bg-red-600 rounded-full"
></span>

<span class="ml-2 mr-2">Manuscrit</span>
<img src="{{ asset('img/font_types_handwritten.jpg') }}" width="100" class="rounded-lg">
</h3>  
@endempty                                                                    
</div>
</div>             

</div>
</div>


@if($type == 'logo')
<!-- typo ou picto/typo -->
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
  <div class="mb-4">
    <div class="mt-4 text-sm">
      <span class="block mb-2 uppercase font-bold text-2xl text-gray-600">
        Le type que vous avez choisie
      </span>
      <div class="flex mt-2">

        <h3
        class="inline-flex items-center ml-6 text-gray-600"
        >
        <span
        class="inline-block w-4 h-4 mr-1 bg-red-600 rounded-full"
        ></span>
        @if ($conception->typeLogo =='typo')
        <span class="ml-2 mr-2">Logo typographique</span>
        <img src="{{ asset('img/typo.jpg') }}" width="200" class="rounded-lg">
        @else
        <span class="ml-2 mr-2">Logo typographique et pictographique</span>
        <img src="{{ asset('img/typo_picto.jpg') }}" width="200" class="rounded-lg">
        @endif

      </h3>

    </div>
  </div>             

</div>
</div>


@else


  <!-- style -->
    @if($conception->style !== null)
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <div class="mb-4">
          <div class="mt-4 text-sm">
            <span class="block mb-2 uppercase font-bold text-2xl text-gray-600">
              Le style que vous avez choisie
            </span>
            <div class="flex mt-2">

              <span
              class="inline-block w-4 h-4 mr-1 bg-red-600 rounded-full"
              ></span>

              <span class="ml-2 mr-2">{{ $conception->style }}</span>
              <img src="{{ asset('img/' . $conception->style . '.jpg') }}" width="100" class="rounded-lg">


          </div>
        </div>             

      </div>
      </div>
    @endif

@endif


@can('soumettre_proposition')
<!-- attributs de la commande -->
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
  <div class="mb-4">
    <div class="mt-4 text-sm">
      <span class="block mb-2 uppercase font-bold text-2xl text-gray-600">
        Détails techniques
      </span>
      <div class="mt-2">
             {!! $conception->meta_data !!}                                                        
      </div>
    </div>             

</div>
</div>
@endcan


<!-- submit form -->
@if (isset($confirm))
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
  <div class="text-center items-center">
  <div class="grid grid-cols-4 gap-4">
    <div></div>
    <div>
          <a class="text-center block rounded text-sm rounded-lg h-10 py-2 text-white transition-colors duration-150 bg-purple-600 border border-transparent active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" href="/conceptions/{{ $conception->id }}/edit">Modifier</a>
  </div>
  <div>
    <form method="POST" action="/conceptions/{{ $conception->id }}" >
      @csrf
      @method('PATCH')
      <input type="hidden" name="confirm">

      <button class="w-64 px-4 py-2 text-sm h-10 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple mb-2" type="submit">
        Valider et lancer la création
     </button>
    </form>     
   </div>   
    <div></div>

</div>
</div>
</div>
@endif



</div>
</main>

</x-master>
<x-master>




  <main class="h-full overflow-y-auto bg-blue-100">
    <div class="container px-6 mx-auto grid">
      <form action="/conceptions/{{ $conception->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="">
         <h4
         class="mt-4 mb-4 text-2xl font-bold text-gray-700 uppercase font-semibold">
         Informations pour la conception du {{ $conception->type }}
       </h4>
       <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
        <div class="mb-4">
          <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
          for="rs_entreprise">
          Nom de l'entreprise
        </label>


        <input
        class="block h-10 px-2 py-2 rounded-md w-full
        border border-gray-400 bg-gray-200
        focus:border-purple-600 focus:outline-none focus:shadow-outline-purple form-input"

        type="text"
        name="rs_entreprise"
        id="rs_entreprise"
        placeholder="Votre nom, raison sociale ou votre marque"
        value="{{old('rs_entreprise', $conception->rs_entreprise)}}" 
        required
        >

        @error('rs_entreprise')
        <p class="block h-10 px-2 py-2 rounded-md w-full mt-2
        bg-red-600 text-white font-bold"> Attention : {{ $message }}</p>
        @enderror
      </div>

@if ($type == 'logo')

      <div class="mb-4">
          <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
          for="ageEntreprise">
          L'entreprise existe depuis quand ?
        </label>
    <div class="flex items-center">
      <select class="block w-full w-full bg-gray-200 border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded-md leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="ageEntreprise">
        <option value="">Choisir ici</option>
        <option value="Moins d'un An"
        @if ($conception->ageEntreprise == 'Moins d\'un An')
        selected
        @endif>Moins d'un An</option>
        <option value="Entre 1 et 5 ans"
        @if ($conception->ageEntreprise == 'Entre 1 et 5 ans')
        selected
        @endif>Entre 1 et 5 ans</option>
        <option value="Entre 5 et 10 ans"
        @if ($conception->ageEntreprise == 'Entre 5 et 10 ans')
        selected
        @endif>Entre 5 et 10 ans</option>
        <option value="Entre 10 et 20 ans"
        @if ($conception->ageEntreprise == 'Entre 10 et 20 ans')
        selected
        @endif>Entre 10 et 20 ans</option>
        <option value="Plus que 20 ans"
        @if ($conception->ageEntreprise == 'Plus que 20 ans')
        selected
        @endif>Plus que 20 ans</option>
        </select>



      </div>

  </div>


@else

      <div class="mb-4">
        <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
        for="logo">
        Votre logo 
      </label>


      @if ($conception->logo !== Null)

<section
x-data="{
logoToDelete:false,
logos:[],
logoDb:true,
addLogo(){
this.logos.push({
id: this.logos.length +1,
});
//this.logoToDelete = true;
},

}"
>
<input type="hidden" name="logoToDelete" :value="logoToDelete">

<section x-show="logoDb">
            <button
            class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
            @click="addLogo(), logoDb = ! logoDb"
            :aria-expanded="logoDb ? 'true' : 'false'" :class="{ 'active': logoDb }"
            type="button"
            >
            <span
            aria-hidden="true"
            class="inline-block align-middle absolute text-md shadow-xs font-bold text-white top-0 right-0
            bg-red-600 w-6 h-6 transform translate-x-2 -translate-y-2 rounded-full"
            >X</span>
            <img src="{{ asset($conception->logo) }}" width="100px">

          </button>
        </section>
          <section x-show="logos.length">
  <template x-for="logo in logos" :key="logo.id">

    <input
    class="block h-12 px-2 py-2 rounded-md w-full
    border border-gray-400 bg-gray-200
    focus:border-purple-600 focus:outline-none
    focus:shadow-outline-purple form-input"
    type="file"
    name="logo"
    id="logo"
    value="{{old('logo')}}"
    required>



  </template>
        </section>           


   
      </section>


    @error('logo')
    <p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
    @enderror

<!-- here was the form to delete the logo -->

    @else
    <input
    class="block h-12 px-2 py-2 rounded-md w-full
    border border-gray-400 bg-gray-200
    focus:border-purple-600 focus:outline-none
    focus:shadow-outline-purple form-input"
    type="file"
    name="logo"
    id="logo"
    value="{{old('logo', $conception->logo)}}"
    required
    >

    @error('logo')
    <p class="block h-10 px-2 py-2 rounded-md w-full mt-2
    bg-red-600 text-white font-bold"> Attention : {{ $message }}</p>
    @enderror
    @endif

  </div>

@endif


  <div class="mb-4">
    <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
    for="slogan">
    Avez-vous un slogan ?
  </label>

  <input
  class="block h-10 px-2 py-2 rounded-md w-full
  border border-gray-400 bg-gray-200
  focus:border-purple-600 focus:outline-none focus:shadow-outline-purple form-input"

  type="text"
  name="slogan"
  id="slogan"
  placeholder="Votre slogan"
  value="{{old('slogan', $conception->slogan)}}"
  >

  @error('slogan')
  <p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
  @enderror
</div>
</div>

<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

  <div class="mb-4">
    <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
    for="activities">
    Décrivez vos activités
  </label>

  <textarea
  class="block px-2 py-2 rounded-md w-full
  border border-gray-400 bg-gray-200
  focus:border-purple-600 focus:outline-none focus:shadow-outline-purple form-textarea" 

  name="activities"
  placeholder="Quelle est votre activitiés"
  required 
  >{{old('activities', $conception->activities)}}</textarea>
  @error('activities')
  <p class="block h-10 px-2 py-2 rounded-md w-full mt-2
  bg-red-600 text-white font-bold"> Attention : {{ $message }}</p>
  @enderror
</div>

  <div class="mb-4">
    <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
    for="produitService">
    Quels sont les produits ou services vendues ?
  </label>

  <textarea
  class="block px-2 py-2 rounded-md w-full
  border border-gray-400 bg-gray-200
  focus:border-purple-600 focus:outline-none focus:shadow-outline-purple form-textarea" 

  name="produitService"
  placeholder="Les produits ou services vendues" 
  >{{old('produitService', $conception->produitService)}}</textarea>
  @error('produitService')
  <p class="block h-10 px-2 py-2 rounded-md w-full mt-2
  bg-red-600 text-white font-bold"> Attention : {{ $message }}</p>
  @enderror
</div>

@if ($type == 'logo')


<div class="mb-4">
  <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
  for="axeDeveloppement">
  Quelle sont vos axes de développement ?
</label>

<textarea
class="block px-2 py-2 rounded-md w-full
border border-gray-400 bg-gray-200
focus:border-purple-600 focus:outline-none focus:shadow-outline-purple form-textarea"
name="axeDeveloppement"
placeholder="Vos axes de développement"
>{{old('axeDeveloppement', $conception->axeDeveloppement)}}</textarea>

@error('axeDeveloppement')
<p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
@enderror
</div>
@else

<div class="mb-4">
  <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
  for="positionnement">
  Quelle est votre positionnement ?
</label>

<textarea
class="block px-2 py-2 rounded-md w-full
border border-gray-400 bg-gray-200
focus:border-purple-600 focus:outline-none focus:shadow-outline-purple form-textarea"
name="positionnement"
placeholder="Positionnement de votre Entreprise"

>{{old('positionnement', $conception->positionnement)}}</textarea>

@error('positionnement')
<p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
@enderror
</div>

<div class="mb-4">
  <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
  for="objectif">
  Dites nos le ou les objectifs attendus avec cette création ?
</label>

<textarea
class="block px-2 py-2 rounded-md w-full
border border-gray-400 bg-gray-200
focus:border-purple-600 focus:outline-none focus:shadow-outline-purple form-textarea"
name="objectif"
placeholder="Objectifs attendus de cette création graphique"

>{{old('objectif', $conception->objectif)}}</textarea>

@error('objectif')
<p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
@enderror
</div>

@endif



<div class="mb-4">
  <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
  for="contacts">
  @if($type === 'logo')
  Quelles sont vos informations de contact
  @else
  Quelles informations de contact doivent figurer sur la création
  @endif
</label>

<textarea
class="block px-2 py-2 rounded-md w-full
border border-gray-400 bg-gray-200
focus:border-purple-600 focus:outline-none focus:shadow-outline-purple form-textarea"
name="contacts"
placeholder="Vos Adresses, téléphones et emails"

>{{old('contacts', $conception->contacts)}}</textarea>
@error('contacts')
<p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
@enderror
</div>

</div>

@if ($type !== 'logo')

<!-- Div textes créa -->
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

  <div class="mb-4">
    <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
    for="texte_additionnel">
    Saisire les textes pour votre création
  </label>

  <textarea
  class="block px-2 py-2 rounded-md w-full
  border border-gray-400 bg-gray-200
  focus:border-purple-600 focus:outline-none focus:shadow-outline-purple form-textarea" 
  name="texte_additionnel"
  placeholder="Quelles sont les textes qui doivent figurer sur votre création"
  required
  rows="10"
  >{{old('texte_additionnel', $conception->texte_additionnel)}}</textarea>
  @error('texte_additionnel')
  <p class="block h-10 px-2 py-2 rounded-md w-full mt-2
  bg-red-600 text-white font-bold"> Attention : {{ $message }}</p>
  @enderror
</div>


</div>
@endif

<!-- Div photos -->
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
@if($images->count() !== 0 )

  <div class="mb-4">
    <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700"
    for="texte_additionnel">

    Les images pour votre création<hr>
  </h3>

<section
x-data="{
imagesToDelete:[],
addImageToDelete(img){
this.imagesToDelete.push(img);
},

@foreach ($images as $image)
img{{ $image->id }} : true ,
@endforeach
}"
>
<input type="hidden" name="imagesToDelete[]" :value="imagesToDelete">
  @foreach ($images as $image)

        <section x-show="img{{ $image->id }}" class="flex inline-grid ml-8">
            <button
            class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
            @click="addImageToDelete({{ $image->id }}), img{{ $image->id }} = ! img{{ $image->id }} "
            :aria-expanded="img{{ $image->id }} ? 'true' : 'false'" :class="{ 'active': img{{ $image->id }} }"
            type="button"
            >
            <span
            aria-hidden="true"
            class="inline-block align-middle absolute text-md shadow-xs font-bold text-white top-0 right-0
            bg-red-600 w-6 h-6 transform translate-x-2 -translate-y-2 rounded-full"
            >X</span></button>
            <a class="flex" href="{{ asset($image->lien) }}" target="_blank">
            <img src="{{ asset($image->lien) }}"
            class="px-4 py-4 w-48 border border-blue-400 shadow-lg rounded-lg mb-2"></a>

          
        </section>

@endforeach
</section>
</div>
@endif

<!-- Div upload photos -->



<div class="mb-4">
  <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
  for="texte_additionnel">
@if($type === 'logo')
Si vous avez des exemples de logos que vous aimez bien, merci de les uploader
@else
Merci d'uploader les images pour votre création
@endif
</label>

<input
class="block h-12 px-2 py-2 rounded-md w-full
border border-gray-400 bg-gray-200
focus:border-purple-600 focus:outline-none
focus:shadow-outline-purple form-input"

type="file"
name="images[]"
id="images"
multiple
>

@error('images')
<p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
@enderror
</div>

</div>

<!-- ici si le client à un document il peut le charger ici -->

<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

      <div class="mb-4">
      @if ($document !== Null ) 

        <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
        for="document">
        Le document que vous avez uploader
      </label>
<section
x-data="{
docToDelete:false,
docs:[],
docDb:true,
addDoc(){
this.docs.push({
id: this.docs.length +1,
});
this.docToDelete = true;
},

}"
>
<input type="hidden" name="docToDelete" :value="docToDelete">

<section x-show="docDb">
            <button
            class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
            @click="addDoc(), docDb = ! docDb"
            :aria-expanded="docDb ? 'true' : 'false'" :class="{ 'active': docDb }"
            type="button"
            >
            <span
            aria-hidden="true"
            class="inline-block align-middle absolute text-md shadow-xs font-bold text-white top-0 right-0
            bg-red-600 w-6 h-6 transform translate-x-2 -translate-y-2 rounded-full"
            >X</span>
            <img src="{{ asset('img/doc.png') }}"
            class="block px-2 py-2 rounded-md w-full
          border border-gray-400 bg-gray-200 shadow-lg">
          </button>
          <a href="{{ asset($document->lien) }}" class="ml-4 text-blue-400 font-bold"> {{ $document->nomDocument }}</a>
        </section>
          <section x-show="docs.length">
  <template x-for="document in docs" :key="document.id">

    <input
    class="block h-12 px-2 py-2 rounded-md w-full
    border border-gray-400 bg-gray-200
    focus:border-purple-600 focus:outline-none
    focus:shadow-outline-purple form-input"
    type="file"
    name="document"
    id="document"
    value="{{old('document')}}"
    >



  </template>
        </section>           


   
      </section>


    @error('logo')
    <p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
    @enderror

<!-- here was the form to delete the logo -->


    @else
        <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
        for="document">
        Si vous avez un document à nous envoyé, merci de l'uploader
      </label>

    <input
    class="block h-12 px-2 py-2 rounded-md w-full
    border border-gray-400 bg-gray-200
    focus:border-purple-600 focus:outline-none
    focus:shadow-outline-purple form-input"
    type="file"
    name="document"
    id="document"
    value="{{old('document', $conception->document)}}"

    >

    @error('document')
    <p class="block h-10 px-2 py-2 rounded-md w-full mt-2
    bg-red-600 text-white font-bold"> Attention : {{ $message }}</p>
    @enderror
    @endif

  </div>
</div>

<!-- fin div chargement document -->    





</div>

<!-- Div produit/Services -->

@if($produits->count() !== 0 )

<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
    <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700"
    for="texte_additionnel">
    Les produits/services/événements pour votre création<hr>
  </h3>
<div class="grid grid-cols-3 gap-4 justify-items-auto">
  <div class="flex justify-center items-center px-4 py-2">

           <h3 class="block mb-2 uppercase font-bold text-sm text-gray-700"
           for="texte_additionnel">
           Image du produit
         </h3>
</div>
  <div class="flex justify-center items-center px-4 py-2">

       <h3 class="block mb-2 uppercase font-bold text-sm text-gray-700"
       for="">
       Description
     </h3>
</div>
  <div class="flex justify-center items-center px-4 py-2">

        <h3 class="block mb-2 uppercase font-bold text-sm text-gray-700"
   for="">
   Prix
 </h3>
</div>
</div>


<section
x-data="{
produitsToDelete:[],
addProduitToDelete(prod){
this.produitsToDelete.push(prod, this.produitsToDelete.length);
},

@foreach ($produits as $produit)
prod{{ $produit->id }} : true ,
@endforeach
}"
>
<input type="hidden" name="produitsToDelete[]" :value="produitsToDelete">
  @foreach ($produits as $produit)

        <section x-show="prod{{ $produit->id }}">
<div class="grid grid-cols-3 gap-4 justify-items-auto">
  <div class="flex justify-center items-center px-4 py-2">

<input type="hidden" name="h[{{$loop->index}}]" value="{{ $produit->id }}">

            <button
            class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
            @click="addProduitToDelete({{ $produit->id }}), prod{{ $produit->id }} = ! prod{{ $produit->id }} "
            :aria-expanded="prod{{ $produit->id }} ? 'true' : 'false'" :class="{ 'active': prod{{ $produit->id }} }"
            type="button"
            >
            <span
            aria-hidden="true"
            class="inline-block align-middle absolute text-md shadow-xs font-bold text-white top-0 right-0
            bg-red-600 w-6 h-6 transform translate-x-2 -translate-y-2 rounded-full"
            >X</span></button>
            <a class="flex" href="{{ asset($produit->image) }}" target="_blank">
            <img src="{{ asset($produit->image) }}"
            class="px-4 py-4 w-48 border border-blue-400 shadow-lg rounded-lg mb-2"></a>
</div>

  <div class="flex justify-center items-center px-4 py-2">


<textarea
  class="block px-2 py-2 rounded-md w-full
  border border-gray-400 bg-gray-200
  focus:border-purple-600 focus:outline-none focus:shadow-outline-purple form-textarea" 
  name="d[{{$loop->index}}]"
  required
  rows="5"
  >{{old('', $produit->description)}}</textarea>


  </div>



  <div class="flex justify-center items-center px-4 py-2">          


  <input
  class="block h-10 px-2 py-2 rounded-md w-full
  border border-gray-400 bg-gray-200
  focus:border-purple-600 focus:outline-none focus:shadow-outline-purple form-input"

  type="number"
  step="any"
  name="p[{{$loop->index}}]"
  value="{{old('', $produit->prix / 100)}}"
  >


  </div>

</div>
          
        </section>

@endforeach
</section>

</div>

@endif



@if($type !== 'logo')


<section
x-data="{
todos:[],



newTodo:'',
addTodo(){
this.todos.push({
id: this.todos.length +1,
name : 'i' + (this.todos.length) , // + {{ count($produits) }}),
desc : 'd' + (this.todos.length) , // + {{ count($produits) }}),
prix : 'p' + (this.todos.length) , // + {{ count($produits) }}),

});
},

deleteTodo(todo){

this.todos.splice(this.todos.indexOf(todo), 1 );
}

}"
>




<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
  <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
  for="texte_additionnel">
  Avez vous des produits, services ou événement à mettre sur votre création
</label>	
<div class="flex-1 text-center items-center">

  <button type="button" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple mb-2" @click="addTodo">
    + Ajouter un produit ou service ou événement

  </button>
  <hr class="mb-2">
</div>


<section x-show="todos.length">
  <template x-for="todo in todos" :key="todo.id">
    <div class="px-2 mb-2">
      <div class="flex -mx-2">
        <div class="w-1/3 px-2 w-full ">
          <div>
           <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
           for="texte_additionnel">
           Image du produit
         </label>

         <input
         class="block h-12 px-2 py-2 rounded-md w-full
    border border-gray-400 bg-gray-200
    focus:border-purple-600 focus:outline-none
    focus:shadow-outline-purple form-input"

         type="file"
         :key="todo.id"
         :name="todo.name"
         multiple
         >


         @error('texte_additionnel')
         <p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
         @enderror
       </div>
     </div>
     <div class="w-1/3 px-2 w-full ">
      <div>
       <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
       for="">
       Description
     </label>

     <textarea
class="block px-2 py-2 rounded-md w-full
border border-gray-400 bg-gray-200
focus:border-purple-600 focus:outline-none focus:shadow-outline-purple form-textarea" 

     type="text"
     :name="todo.desc"
     id=""
     value="" 
     ></textarea>

     @error('')
     <p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
     @enderror
   </div>
 </div>
 <div class="w-1/3 px-2 w-full ">
  <div>
   <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
   for="">
   Prix
 </label>
 <div
 class="relative focus-within:text-purple-600"
 >
 <input
        class="block h-10 px-2 py-2 rounded-md w-full
        border border-gray-400 bg-gray-200
        focus:border-purple-600 focus:outline-none focus:shadow-outline-purple form-input"
 type="number"
 step="any"
 :name="todo.prix"
 id=""
 value="" 
 >
 <button
 class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
 @click="deleteTodo(todo)">
 Supprimer
</button>
</div>    

@error('rs_entreprise')
<p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
@enderror
</div>
</div>
</div>
<hr class="mt-4">
</div>
</template>
</section>

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
}" class="text-sm px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

<div class="mb-4">
  <div class="mt-4 text-sm">
    <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
      Quelle est votre cible ?
    </span>
    <div class="mt-2">

      <div class="grid grid-cols-8 gap-4">        
        <div>
          <label
          class="inline-flex items-center text-gray-600"
          >
          <input
          type="checkbox"
          class="focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-checkbox h-8 w-8 "
          name="cible_b2c"
          value="Particuliers"
          @click="show =! show"
          @empty(!$Particuliers) 
          checked
          @endempty            

          />
          <span class="ml-2">Particuliers</span>
        </label>
      </div>
      <div>      
        <label
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

        />

        <span class="ml-2">Entreprise</span>
      </label>
    </div>
  </div>
</div>
</div>             
@error('cible')
<p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
@enderror
</div>
<div x-show="show" class="mb-4">
  <hr class="mb-2">                

  <label class="block mt-4 text-sm">
    <span class="block mb-2 uppercase font-bold text-md text-gray-700">
      Tranche d'age de votre cible
    </span>
  </label>

  <div class="grid grid-cols-8 gap-4">
    <div>
      <label
      class="inline-flex items-center text-gray-600"
      >
      <input
      type="checkbox"
      class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
      name="Enfants"
      value="Enfants"
      value="Enfants"
      @empty(!$Enfants) 
      checked
      @endempty      
      />
      <span class="ml-2">Enfants</span>
    </label>
  </div>
  <div>
    <label
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
    />
    <span class="ml-2">Adolescents</span>
  </label>
</div>
<div>                      
  <label
  class="inline-flex items-center ml-6 text-gray-600"
  >
  <input
  type="checkbox"
  class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
  name="Adultes"
  value="Adultes"
  @empty(!$Adultes) 
  checked
  @endempty     
  />
  <span class="ml-2">Adultes</span>
</label>
</div>
<div>                      
  <label
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
  />
  <span class="ml-2">Seniours</span>
</label>                               
</div>
</div>
<label class="block mt-4 text-sm">
  <span class="block mb-2 uppercase font-bold text-md text-gray-700">
    Sex de votre cible
  </span>

</label>

<div class="grid grid-cols-8 gap-4">
  <div>
    <label
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

    />
    <span class="ml-2">Hommes</span>
  </label>
</div>
<div>
  <label
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
  />
  <span class="ml-2 mr-2">Femmes</span>

</label>
</div>
</div>
</div>    

<div x-show="b2b" class="mb-4">
  <hr class="mb-2">                
  <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
  for="activities_cible">
  Quelles sont les secteurs d'activités de vos clients
</label>

<textarea
class="block px-2 py-2 rounded-md w-full
border border-gray-400 bg-gray-200
focus:border-purple-600 focus:outline-none focus:shadow-outline-purple form-textarea"
name="activities_cible"
placeholder="Les secteurs d'activités de vos clients"

>{{old('activities_cible', $conception->activities_cible)}}</textarea>
@error('activities_cible')
<p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
@enderror
</div>                            

</div>

<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

  <div class="mb-4">
    <div class="mt-4 text-sm">
      <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
        Avez-vous des préférences pour les couleurs ? (Vous pourrez choisir jusqu'à 3)
      </span>

      <div class="flex mt-2">


        <input
        class="block h-10 w-full
        border border-gray-400
        focus:border-purple-600 focus:outline-none focus:shadow-outline-purple"

        type="color"
        name="couleur_1"
        id="couleur_1"

        value="{{old('couleur_1', $conception->couleur_1)}}"

        required>

        @error('couleur_1')
        <p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
        @enderror



        <input
        class="block h-10 w-full
        border border-gray-400
        focus:border-purple-600 focus:outline-none focus:shadow-outline-purple"

        type="color"
        name="couleur_2"
        id="couleur_2"

        value="{{old('couleur_2', $conception->couleur_2)}}"

        required>

        @error('couleur_2')
        <p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
        @enderror



        <input
        class="block h-10 w-full
        border border-gray-400
        focus:border-purple-600 focus:outline-none focus:shadow-outline-purple"

        type="color"
        name="couleur_3"
        id="couleur_3"

        value="{{old('couleur_3', $conception->couleur_3)}}"

        required>

        @error('couleur_3')
        <p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
        @enderror


      </div>
    </div>
  </div>
</div>
<!-- font -->
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
  <div class="mb-4">
    <div class="mt-4 text-sm">
      <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
        Avez-vous des préférences pour la police d'écriture ? (Vous pourrez choisir jusqu'à 3)
      </span>
      <div class="flex mt-2">

        <label
        class="inline-flex items-center ml-6 text-gray-600"
        >
        <input
        type="checkbox"
        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple  h-8 w-8"
        name="Serif"
        value="Serif"
        @empty(!$Serif) 
        checked
        @endempty 

        />
        <span class="ml-2 mr-2">Serif</span>
        <img src="{{ asset('img/font_types_serif.jpg') }}" width="100" class="rounded-lg">
      </label>
      <label
      class="inline-flex items-center ml-6 text-gray-600"
      >
      <input
      type="checkbox"
      class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
      name="SansSerif"
      value="SansSerif"
      @empty(!$SansSerif) 
      checked
      @endempty 

      />
      <span class="ml-2 mr-2">Sans Serif</span>
      <img src="{{ asset('img/font_types_sansserif.jpg') }}" width="100" class="rounded-lg">

    </label>
    <label
    class="inline-flex items-center ml-6 text-gray-600"
    >
    <input
    type="checkbox"
    class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-checkbox h-8 w-8"
    name="Slab"
    value="Slab"
    @empty(!$slab) 
    checked
    @endempty 

    />
    <span class="ml-2 mr-2">Slab Serif</span>
    <img src="{{ asset('img/font_types_slabserif.jpg') }}" width="100" class="rounded-lg">
  </label>
  <label
  class="inline-flex items-center ml-6 text-gray-600"
  >
  <input
  type="checkbox"
  class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-checkbox h-8 w-8"
  name="Script"
  value="Script"
  @empty(!$Script) 
  checked
  @endempty 

  />
  <span class="ml-2 mr-2">Script</span>
  <img src="{{ asset('img/font_types_script.jpg') }}" width="100" class="rounded-lg">
</label>
<label
class="inline-flex items-center ml-6 text-gray-600"
>
<input
type="checkbox"
class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-checkbox h-8 w-8"
name="Manuscrit"
value="Manuscrit"
@empty(!$Manuscrit) 
checked
@endempty 

/>
<span class="ml-2 mr-2">Manuscrit</span>
<img src="{{ asset('img/font_types_handwritten.jpg') }}" width="100" class="rounded-lg">
</label>                                                                      
</div>


</div>             
@error('positionnement')
<p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
@enderror
</div>
</div>


<!-- style -->
@if ($type === 'logo')
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
  <div class="mb-4">
    <div class="mt-4 text-sm">
      <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
        Avez-vous des préférences pour le type de logo ? sinon vous nous laisser s'en occuper
      </span>
      <div class="flex mt-2">

        <label
        class="inline-flex items-center ml-6 text-gray-600"
        >
        <input
        type="radio"
        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple  h-8 w-8"
        name="typeLogo"
        value="typo"
        @if ($conception->typeLogo == 'typo') 
        checked
        @endif 

        />
        <span class="ml-2 mr-2">Logo typographique</span>
        <img src="{{ asset('img/typo.jpg') }}" width="200" class="rounded-lg">
      </label>
      <label
      class="inline-flex items-center ml-10 text-gray-600"
      >
      <input
      type="radio"
      class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
      name="typeLogo"
      value="typoPicto"
      @if ($conception->typeLogo == 'typoPicto') 
      checked
      @endif 

      />
      <span class="ml-2 mr-2">Logo typographique et pictographique</span>
      <img src="{{ asset('img/typo_picto.jpg') }}" width="200" class="rounded-lg">

    </label>

                                                                     
</div>
</div>             
</div>
</div>
@else

<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
  <div class="mb-4">
    <div class="mt-4 text-sm">
      <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
        Avez-vous des préférences pour le style ? sinon vous nous laisser s'en occuper
      </span>
      <div class="flex mt-2">

        <label
        class="inline-flex items-center ml-6 text-gray-600"
        >
        <input
        type="radio"
        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple  h-8 w-8"
        name="style"
        value="style1"
        @if ($conception->style == 'style1') 
        checked
        @endif 

        />
        <span class="ml-2 mr-2">style1</span>
        <img src="{{ asset('img/font_types_serif.jpg') }}" width="100" class="rounded-lg">
      </label>
      <label
      class="inline-flex items-center ml-6 text-gray-600"
      >
      <input
      type="radio"
      class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
      name="style"
      value="style2"
      @if ($conception->style == 'style2') 
      checked
      @endif 

      />
      <span class="ml-2 mr-2">style2</span>
      <img src="{{ asset('img/font_types_sansserif.jpg') }}" width="100" class="rounded-lg">

    </label>
    <label
    class="inline-flex items-center ml-6 text-gray-600"
    >
    <input
    type="radio"
    class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-radio h-8 w-8"
    name="style"
    value="style3"
    @if ($conception->style == 'style3') 
    checked
    @endif 

    />
    <span class="ml-2 mr-2">style3</span>
    <img src="{{ asset('img/font_types_slabserif.jpg') }}" width="100" class="rounded-lg">
  </label>
  <label
  class="inline-flex items-center ml-6 text-gray-600"
  >
  <input
  type="radio"
  class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-radio h-8 w-8"
  name="style"
  value="style4"
  @if ($conception->style == 'style4') 
  checked
  @endif 

  />
  <span class="ml-2 mr-2">style4</span>
  <img src="{{ asset('img/font_types_script.jpg') }}" width="100" class="rounded-lg">
</label>
<label
class="inline-flex items-center ml-6 text-gray-600"
>
<input
type="radio"
class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-radio h-8 w-8"
name="style"
value="style5"
@if ($conception->style == 'style5') 
checked
@endif 

/>
<span class="ml-2 mr-2">style5</span>
<img src="{{ asset('img/font_types_handwritten.jpg') }}" width="100" class="rounded-lg">
</label>                                                                      
</div>
</div>             
@error('positionnement')
<p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
@enderror
</div>
</div>

@endif

<!-- note sur les livrables -->
  @if($type !== 'logo')

<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

<div class="mb-4">
  <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
  for="note">

  Avez vous des demandes spéciales concernant les fichiers livrables ?

</label>

<textarea
class="block px-2 py-2 rounded-md w-full
border border-gray-400 bg-gray-200
focus:border-purple-600 focus:outline-none focus:shadow-outline-purple form-textarea"
name="note"
placeholder="Lister les exigences de votre imprimeur : nomenclature, format de fichier d'impression, résolution, profil colorimétrique à incorporer…"

>{{old('note', $conception->note)}}</textarea>
@error('note')
<p class="text-red-500 text-xs mt-2"> {{ $message }}</p>
@enderror
</div>
</div>
@endif


<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

  <div class="flex-1 text-center items-center">
    <button class="w-64 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple mb-2" type="submit">
     Enregistrer

   </button>
 </div>
</div>

</div>

</form>

</div>
</main>
</x-master>
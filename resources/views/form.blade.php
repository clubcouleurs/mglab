<x-master>
	<form action="/conceptions/{{ $conception->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

<main class="h-full overflow-y-auto bg-blue-100">
<div class="container px-6 mx-auto grid">
  <div class="bg-blue-900">
   <h4
   class="mt-4 mb-4 text-lg font-semibold text-orange-600">
   Informations pour la conception {{ $conception->type }}
 </h4>
 <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
          <div class="mb-4">
            <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
              for="rs_entreprise">
              Nom/Raison Social
            </label>

            <input
            class="block w-full mt-1 text-sm border border-purple-400 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"

            type="text"
            name="rs_entreprise"
            id="rs_entreprise"
            value="{{old('rs_entreprise')}}" 
            required>

                @error('rs_entreprise')
                <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
                @enderror
        </div>
        <div class="mb-4">
              <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
                for="logo">
                Votre logo
              </label>

              <input
              class="block w-full mt-1 text-sm dark:border-gray-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
                type="file"
                name="logo"
                id="logo"
                value="{{old('logo')}}" 
                required>
                    @error('logo')
                      <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
                    @enderror
          </div>

          <div class="mb-4">
            <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
              for="slogan">
              Avez-vous un slogan
            </label>

            <input
            class="block w-full mt-1 text-sm border border-gray-800 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"

            type="text"
            name="slogan"
            id="slogan"
            value="{{old('slogan')}}" 
            required>
            
                @error('slogan')
                <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
                @enderror
        </div>


            <div class="mb-4">
              <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
                for="activities">
                Décrivez votre activités
              </label>

                    <textarea
                      class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" 
                    name="activities"
                    placeholder="Quelle est votre activitiés"
                    required 
                    >{{old('activities')}}</textarea>
                    @error('activities')
                      <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-4">
              <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
                for="positionnement">
                Quelle est votre positionnement
              </label>

                    <textarea
                      class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="positionnement"
                    placeholder="Positionnement de votre Entreprise"
                    required 
                    >{{old('positionnement')}}</textarea>

                    @error('positionnement')
                      <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
                    @enderror
            </div>
                        
             

                    

                    <div class="mb-4">
                          <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
                            for="contacts">
                            Quelles informations de contact doivent figurer sur la création
                          </label>

                        <textarea
                          class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        name="contacts"
                        placeholder="Vos Adresses, téléphones et emails"
                        
                        >{{old('contacts')}}</textarea>
                          @error('contacts')
                            <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
                          @enderror
                    </div>
      </div>


<!-- Div textes créa -->
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

            <div class="mb-4">
              <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
                for="texte_additionnel">
                Saisire les textes pour votre création
              </label>

                    <textarea
                      class="block w-full mt-1 text-sm form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple" 
                    name="texte_additionnel"
                    placeholder="Quelles sont les textes qui doivent figurer sur votre création"
                    required
                    rows="10"
                    >{{old('texte_additionnel')}}</textarea>
                    @error('texte_additionnel')
                      <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
                    @enderror
            </div>


      </div>

<!-- Div photos -->
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

            <div class="mb-4">
              <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
                for="texte_additionnel">
                Merci d'uploader les images pour votre création
              </label>

            <input
            class="block w-full mt-1 text-sm border border-gray-800 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"

            type="file"
            name="images[]"
            id="images"
            multiple
            >

                    @error('images')
                      <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
                    @enderror
            </div>


      </div>

<!-- Div produit/Services -->


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
              <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
                for="texte_additionnel">
                Avez des produits, services ou événement à mettre sur votre création
              </label>	
<div class="flex-1 text-center items-center">

<button type="button" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple mb-2" @click="addTodo">
              + Ajouter un produit ou service ou événement

            </button>
            <hr class="mb-2">
</div>





<section x-show="todos.length">
<template x-for="todo in todos" :key="todo.id">
<div class="px-2">
  <div class="flex -mx-2">
    <div class="w-1/3 px-2 w-full ">
      <div class="bg-gray-400">




      	<label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="texte_additionnel">
                Image du produit
              </label>

            <input
            class="block w-full mt-1 text-sm border border-gray-800 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"

            type="file"
            name=""
            :key="todo.id"
            value=""
            multiple
            >

                    @error('texte_additionnel')
                      <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
                    @enderror
      </div>
    </div>
    <div class="w-1/3 px-2 w-full ">
      <div class="bg-gray-500">
      	            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
              for="">
              Description
            </label>

            <textarea
            class="block w-full mt-1 text-sm border border-gray-800 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-textarea"

            type="text"
            name=""
            id=""
            value="" 
            ></textarea>

                @error('')
                <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
                @enderror
      </div>
    </div>
    <div class="w-1/3 px-2 w-full ">
      <div class="bg-gray-400">
      	            <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
              for="">
              Prix
            </label>
                <div
                  class="relative text-gray-500 focus-within:text-purple-600"
                >
            <input
            class="block w-full mt-1 text-sm border border-gray-800 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"

            type="number"
            name=""
            id=""
            value="" 
            required>
                  <button
                    class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                  @click="deleteTodo(todo)">
                    Supprimer
                  </button>
                          </div>    

                @error('rs_entreprise')
                <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
                @enderror
      </div>
    </div>
  </div>
</div>
</template>
</section>

</div>
</section>



 <div x-data="{ show:false, b2b:false }" class="text-sm px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

              <div class="mb-4">
                      <div class="mt-4 text-sm">
                        <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
                          Quelle est votre cible
                        </span>
                        <div class="mt-2">

                          <label
                          class="inline-flex items-center text-gray-600"
                          >
                          <input
                          type="checkbox"
                          class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-checkbox h-8 w-8"
                          name="cible_b2c"
                          value="Particuliers"
                          @click="show =! show"

                          />
                          <span class="ml-2">Particuliers</span>
                        </label>
                        <label
                        class="inline-flex items-center ml-6 text-gray-600"
                        >
                        <input
                        type="checkbox"
                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
                        name="cible_b2b"
                        value="Entreprise"
                        @click="b2b =! b2b"

                        />

                        <span class="ml-2">Entreprise</span>
                      </label>
                      </div>
                      </div>             
                    @error('cible')
                      <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
                    @enderror
            </div>
                    <div x-show="show" class="mb-4">
                    <hr class="mb-2">                

					<label class="block mt-4 text-sm">
                              <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
                                Tranche d'age de votre cible
                              </span>
                              
                          </label>
                        <label
                        class="inline-flex items-center ml-6 text-gray-600"
                        >
                        <input
                        type="checkbox"
                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
                        name="Enfants"
                        value="Enfants"
                        />
                        <span class="ml-2">Enfants</span>
                      </label>
                        <label
                        class="inline-flex items-center ml-6 text-gray-600"
                        >
                        <input
                        type="checkbox"
                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
                        name="Adolescents"
                        value="Adolescents"
                        />
                        <span class="ml-2">Adolescents</span>
                      </label>
                        <label
                        class="inline-flex items-center ml-6 text-gray-600"
                        >
                        <input
                        type="checkbox"
                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
                        name="Adultes"
                        value="Adultes"
                        />
                        <span class="ml-2">Adultes</span>
                      </label>
                        <label
                        class="inline-flex items-center ml-6 text-gray-600"
                        >
                        <input
                        type="checkbox"
                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
                        name="Seniours"
                        value="Seniours"
                        />
                        <span class="ml-2">Seniours</span>
                      </label>                               

                          <label class="block mt-4 text-sm">
                              <span class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                Sex de votre cible
                              </span>
                              
                          </label>
                        <label
                        class="inline-flex items-center ml-6 text-gray-600"
                        >
                        <input
                        type="checkbox"
                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
                        name="Hommes"
                        value="Hommes"
                        
                        />
                        <span class="ml-2">Hommes</span>
                      </label>
                        <label
                        class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                        >
                        <input
                        type="checkbox"
                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
                        name="Femmes"
                        value="Femmes"
                        />
                        <span class="ml-2 mr-2">Femmes</span>
                        
                      </label>
	                                       

                    </div>    

        <div x-show="b2b" class="mb-4">
                    <hr class="mb-2">                
          <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
                            for="activities_cible">
                            Quelles sont les secteurs d'activités de vos clients
                          </label>

                        <textarea
                          class="block w-full mt-1 text-sm form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        name="activities_cible"
                        placeholder="Les secteurs d'activités de vos clients"
                         
                        >{{old('activities_cible')}}</textarea>
                          @error('activities_cible')
                            <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
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
            class="block w-full mt-1 text-sm border border-purple-400 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8"

            type="color"
            name="couleur_1"
            id="couleur_1"
            value="{{old('couleur_1')}}" 
            required>

                @error('couleur_1')
                <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
                @enderror



            <input
            class="block w-full mt-1 text-sm border border-purple-400 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8"

            type="color"
            name="couleur_2"
            id="couleur_2"
            value="{{old('couleur_2')}}" 
            required>

                @error('couleur_2')
                <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
                @enderror



            <input
            class="block w-full mt-1 text-sm border border-purple-400 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8"

            type="color"
            name="couleur_3"
            id="couleur_3"
            value="{{old('couleur_3')}}" 
            required>

                @error('couleur_3')
                <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
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
                          

                          />
                          <span class="ml-2 mr-2">Manuscrit</span>
                          <img src="{{ asset('img/font_types_handwritten.jpg') }}" width="100" class="rounded-lg">
                        </label>                                                                      
                      </div>
                      </div>             
                    @error('positionnement')
                      <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
                    @enderror
            </div>
        </div>

<!-- style -->
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
                          

                          />
                          <span class="ml-2 mr-2">style5</span>
                          <img src="{{ asset('img/font_types_handwritten.jpg') }}" width="100" class="rounded-lg">
                        </label>                                                                      
                      </div>
                      </div>             
                    @error('positionnement')
                      <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
                    @enderror
            </div>
        </div>

<!-- submit form -->

<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

<div class="flex-1 text-center items-center">

<button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple mb-2" type="submit">
             Valider et lancer la création

            </button>
            </div>
          </div>
</div>
</div>
</main>
</form>
</x-master>
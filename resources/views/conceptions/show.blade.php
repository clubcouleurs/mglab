<x-master>


<main class="h-full overflow-y-auto bg-blue-100">
<div class="container px-6 mx-auto grid">
  <div class="bg-blue-900">
   <h4
   class="mt-4 mb-4 text-lg font-semibold text-orange-600">
   Informations pour la conception {{ $conception->type }}
 </h4>
 <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
          <div class="mb-4">
            <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700"
              for="rs_entreprise">
              Nom/Raison Social
            </h3>
            <p
            class="w-full mt-1 text-lg"
            >
              {{$conception->rs_entreprise}}
            </p>            





        </div>
        <div class="mb-4">
          <hr>
            <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700">
              Votre logo
            </h3>

              <img src="{{asset($conception->logo)}}" width="250">
          </div>

          <div class="mb-4">
          <hr>
            <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700">
              Votre slogan
            </h3>

            <p
            class="w-full mt-1 text-lg"
            >
              {{$conception->slogan}}
            </p>

        </div>


            <div class="mb-4">
                        <hr>
              <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700"
                for="activities">
                Votre activités
              </h3>
            <p
            class="w-full mt-1 text-lg"
            >
              {{$conception->activities}}
            </p>

            </div>
            <div class="mb-4">
                        <hr>
              <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700"
                for="positionnement">
                Votre positionnement
              </h3>

            <p
            class="w-full mt-1 text-lg"
            >
              {{$conception->positionnement}}
            </p>
            </div>
                        
             

                    

                    <div class="mb-4">
                                <hr>
                          <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700"
                            for="contacts">
                            Vos informations de contact qui doivent figurer sur la création
                          </h3>
                        <p
                          class="w-full mt-1 text-lg"
                          >
                            {{$conception->contacts}}
                          </p>


                    </div>
      </div>


<!-- Div textes créa -->
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

            <div class="mb-4">
                        
              <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700"
                for="texte_additionnel">
               Les textes pour votre création
              </h3>
                        <p
                          class="w-full mt-1 text-lg"
                          >
                            {{$conception->texte_additionnel}}
                          </p>
            </div>


      </div>

<!-- Div photos -->
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

            <div class="mb-4">
              <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700"
                for="texte_additionnel">
                Les images pour votre création<hr>
              </h3>
                        
                          
                            @foreach ($images as $image) 
                            <div class="flex">
                                <a class="flex text-red-700 justify-center" href=" {{ asset($image->lien) }}" target="_blank">
                                  <img src="{{ asset($image->lien) }}" width="50" class="mr-4">
                                  {{$image->nomFichier}}
                                </a>
                            </div>
                            @endforeach
                                                 
                         
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
              <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700"
                for="texte_additionnel">
                Avez des produits, services ou événement à mettre sur votre création
              </h3>	
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




      	<h3 class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="texte_additionnel">
                Image du produit
              </h3>

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
      	            <h3 class="block mb-2 uppercase font-bold text-xs text-gray-700"
              for="">
              Description
            </h3>

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
      	            <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700"
              for="">
              Prix
            </h3>
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
                        <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
                          Votre cible
                        </span>
                        <div class="mt-2">

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
                    <div x-show="show" class="mb-4">
                    <hr class="mb-2">                

					<h3 class="block mt-4 text-sm">
                              <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
                                Tranche d'age de votre cible
                              </span>
                              
                          </h3>
                        <h3
                        class="inline-flex items-center ml-6 text-gray-600"
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
                        <h3
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
                        disabled                           
                        />
                        <span class="ml-2">Adultes</span>
                      </h3>
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

                          <h3 class="block mt-4 text-sm">
                              <span class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                Sex de votre cible
                              </span>
                              
                          </h3>
                        <h3
                        class="inline-flex items-center ml-6 text-gray-600"
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
                        <h3
                        class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
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

        <div x-show="b2b" class="mb-4">
                    <hr class="mb-2">                
          <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700"
                            for="activities_cible">
                            Les secteurs d'activités de vos clients
                          </h3>
                          <p class="w-full mt-1 text-lg">
                            {{$conception->activities_cible}}
                          </p>

        </div>                            

</div>

 <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">

<div class="mb-4">
                      <div class="mt-4 text-sm">
                        <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
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
                        <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
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

<!-- style -->
 <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
<div class="mb-4">
                      <div class="mt-4 text-sm">
                        <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
                          Le style que vous avez choisie
                        </span>
                        <div class="flex mt-2">

                          <h3
                          class="inline-flex items-center ml-6 text-gray-600"
                          >
                                        <span
                                        class="inline-block w-4 h-4 mr-1 bg-red-600 rounded-full"
                                      ></span>

                          <span class="ml-2 mr-2">{{ $conception->style }}</span>
                          <img src="{{ asset('img/font_types_serif.jpg') }}" width="100" class="rounded-lg">
                        </h3>
                                                                                              
                      </div>
                      </div>             

            </div>
        </div>

<!-- submit form -->


</div>
</div>
</main>

</x-master>
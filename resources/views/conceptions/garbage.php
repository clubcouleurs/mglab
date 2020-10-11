
<form method="POST" action="/conceptions/{{ $conception->id }}" >
   @csrf
   @method('DELETE')
   
<table class="w-full whitespace-no-wrap">
    <thead>
      <tr
      class="text-xs font-semibold tracking-wide uppercase border"
      >
      <th class="px-4 py-3">Image</th>
      <th class="px-4 py-3">Suppression</th>
    </tr>
  </thead>
  <tbody
  class="bg-white divide-y"
  >
  @foreach ($images as $image)
  <tr class="text-gray-700">
   <td class="px-4 py-3">
    <a class="flex" href="{{ asset($image->lien) }}" target="_blank">

      <div class="flex items-center">
        <div class="flex-1px-4 py-2">
          <img src="{{ asset($image->lien) }}"
          class="h-48 border border-blue-500 rounded rounded-lg">
        </div>
        <div class="flex-1 text-center px-4 py-2 m-2">
          <span class="inline-block align-middle">
           {{$image->nomFichier}}
         </span>
       </div>
     </div>
   </a>
 </td>    
    <td>
      <div class="flex items-center h-24">
        <div class="flex-1 text-center px-4 py-2 ">
         <input
         type="checkbox"
         class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-checkbox h-8 w-8"
         name="imagesBd[{{ $image->id }}]"
         value="{{ $image->id }}"
         />  
       </div>

     </div>


   </td>

</tr>
@endforeach
<tr>
  <td></td>
  <td> 
      <div class="flex items-center h-24">
        <div class="flex-1 text-center px-4 py-2 ">
      <button class="w-64 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple mb-2" type="submit">
        Supprimer la sélection
      </button> 
       </div>

     </div>


    </form>  
  </td>
</tr>
</tbody>
</table>




<form method="POST" action="/conceptions/{{ $conception->id }}">
        @csrf
        @method('DELETE')
        <input type="hidden" name="deleteLogo">
        <button
        class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
        type="submit"
        >
        <span
        aria-hidden="true"
        class="inline-block align-middle absolute text-md shadow-xs font-bold text-white top-0 right-0
        bg-red-600 w-6 h-6 transform translate-x-2 -translate-y-2 rounded-full"
        >X</span>

      </button>
      <img src="{{ asset($conception->logo) }}" width="100px">
    </form>


<section
x-data="{
logos:[],
newTodo:'',
addLogo(){
this.logos.push({
id: this.logos.length +1,

});
},

}"
>
<section x-show="logoDb">
            <button
            class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
            @click="AddLogo(), logoDb = ! logoDb"
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
          <section x-show="logo">
  <template x-for="logo in logos" :key="logo.id">

    <input
    class="block h-12 px-2 py-2 rounded-md w-full
    border border-gray-400 bg-gray-200
    focus:border-purple-600 focus:outline-none
    focus:shadow-outline-purple form-input"
    type="file"
    name="logo"
    id="logo"
    value="{{old('logo', $conception->logo)}}"
    required>

    @error('logo')
    <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
    @enderror

  </template>
        </section>           


    @endif
      </section>
      


          <!-- ancien modèle -->
          <div class="container px-6 mx-auto grid">

            <!-- Les conceptions en attente de propals -->
            <div class="w-full overflow-hidden rounded-lg
                        border border-red-600 shadow-xl bg-red-600 mb-8 mt-8">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-white uppercase border-b "
                    >
                      <th class="px-4 py-3">{{ count($conceptionsEnAttPropals) }} Conceptions en cours de création  </th>

                      <th class="px-4 py-3">Soumettre les propositions</th>
                      @cannot('soumettre_proposition')
                      <th class="px-4 py-3">Graphiste</th>
                      @endcannot
                      <th class="px-4 py-3">Date de commande</th>
                     
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y"
                  >
                  @foreach ($conceptionsEnAttPropals as $conception)
                    <tr class="text-gray-700">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          
                          <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                          >
                            <img
                              class="object-cover w-full h-full rounded-full"
                              src="{{ asset('img/icon.jpg') }}"
                              alt=""
                              loading="lazy"
                            />
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                                <div class="block flex items-center w-full">
                                      <span
                                        class="inline-block w-3 h-3 mr-1 bg-red-600 rounded-full"
                                      ></span>

                                      <div class="w-64">
                                        <span class="font-bold bold text-2xl">
                                          <a href="/conceptions/{{$conception->id}}" class="text-red-600">
                                            @if(!empty($conception->propals))
                                            <a href="/conceptions/{{$conception->id}}/propositions">
                                          {{$conception->type}}
                                            </a>
                                            @else  
                                          {{$conception->type}}
                                            
                                            @endif
                                        </a>
                                        </span>
                                      </div>
                                      <div>

                                      </div>

                                </div>                            
                            <p class="">{{$conception->user->display_name}}</p>
                            




                          </div>
                        </div>
                      </td>
                    @can('soumettre_proposition')
                      <td>                    
                  

                    <form class="w-full max-w-sm" action="/conceptions/{{$conception->id}}/propositions" method="POST"
                       enctype="multipart/form-data"
                       onsubmit="return validateForm()"
                       name="myForm">
                            @csrf
                          <div class="flex items-center border border-teal-500 py-2 px-2 bg-blue-100">

                  <input
              class="block w-full mt-1 text-sm dark:border-gray-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
                type="file"
                name="propals[]"
                id="propals2"
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
                                        
                      </td>
                    @endcan
                    @can('affecter_graphistes')

                      <td class="px-4 py-3 text-xs">
                        <form class="w-full max-w-sm" action="/conceptions/{{$conception->id}}" method="POST">
                            @csrf
                            @method('PATCH')
                          <div class="flex items-center border border-teal-500 py-2 px-2 bg-blue-100">
                                <select class="block w-full mr-3 appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="graphiste">

                                  <option value="Aucun">Aucun</option>
                                  @foreach ($graphistes as $graphiste)
                                  <option value="{{ $graphiste->id }}"
                                    @if ($graphiste->id == $conception->graphiste_id)
                                    selected
                                    @endif
                                    >{{-- $graphiste->user->user_login --}}</option>
                                  @endforeach
                                </select>
                            <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-3 px-4 pr-8 rounded" type="submit">
                              Ok
                            </button>

                          </div>
                        </form>
                  @else
                  @cannot('soumettre_proposition')
                          <div class="flex items-center border border-teal-500 py-2 px-2 bg-blue-100">   
                                  <p>
                                    {{$conception->graphiste->user->user_login}}
                                  </p>
                                
                          </div>
                      </td>
                  @endcannot
                  @endcan

                      <td class="px-4 py-3 text-xs">
                        <span
                          class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full "
                        >
                          {{$conception->created_at->diffForHumans()}}
                        </span>
                      </td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Les conceptions à valider -->
            <div class="w-full overflow-hidden rounded-lg
                        border border-purple-600 shadow-xl bg-purple-600 mb-8">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-white uppercase border-b "
                    >
                      <th class="px-4 py-3">{{ count($conceptionsEnAttCrea) }} Conceptions en attente de fichier définitif  </th>
                      <th class="px-4 py-3">Soumettre la création finale PDF</th>
                      @cannot('soumettre_proposition')
                      <th class="px-4 py-3">Graphiste</th>
                      @endcannot
                      <th class="px-4 py-3">Date de commande</th>
                     
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y">
                  @foreach ($conceptionsEnAttCrea as $conception)
                    <tr class="text-gray-700">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                          >
                            <img
                              class="object-cover w-full h-full rounded-full"
                              src="{{ asset('img/icon.jpg') }}"
                              alt=""
                              loading="lazy"
                            />
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                                <div class="block flex items-center w-full">
                                      <span
                                        class="inline-block w-3 h-3 mr-1 bg-red-600 rounded-full"
                                      ></span>

                                      <div class="w-64">
                                        <span class="font-bold bold text-2xl">
                                          <a href="/conceptions/{{$conception->id}}" class="text-red-600">
                                          {{$conception->type}}</a>
                                        </span>
                                      </div>
                                      <div>

                                      </div>

                                </div>                            
                            <p class="">{{$conception->user->display_name}}</p>
                            




                          </div>
                        </div>
                      </td>
                    @can('soumettre_proposition')
                      <td>                    

                    <form class="w-full max-w-sm" action="/conceptions/{{$conception->id}}" method="POST"
                       enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                          <div class="flex items-center border border-teal-500 py-2 px-2 bg-blue-100">

              <input
              class="block w-full mt-1 text-sm dark:border-gray-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input"
                type="file"
                name="pdf_conception"
                id="pdf_conception-"
                value="{{old('pdf_conception')}}" 
                required>
                    @error('pdf_conception')
                      <p class="test-red-500 test-xs mt-2"> {{ $message }}</p>
                    @enderror


              

                            <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-3 px-4 pr-8 rounded" type="submit">
                              Ok
                            </button>

                          </div>
                        </form>
                      </td>
                    @endcan
                    @can('affecter_graphistes')

                      <td class="px-4 py-3 text-xs">
                        <form class="w-full max-w-sm" action="/conceptions/{{$conception->id}}" method="POST">
                            @csrf
                            @method('PATCH')
                          <div class="flex items-center border border-teal-500 py-2 px-2 bg-blue-100">
                                <select class="block w-full mr-3 appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="graphiste">

                                  <option value="Aucun">Aucun</option>
                                  @foreach ($graphistes as $graphiste)
                                  <option value="{{ $graphiste->id }}"
                                    @if ($graphiste->id == $conception->graphiste_id)
                                    selected
                                    @endif
                                    >{{-- $graphiste->user->user_login --}}</option>
                                  @endforeach
                                </select>
                            <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-3 px-4 pr-8 rounded" type="submit">
                              Ok
                            </button>

                          </div>
                        </form>
                  @else
                  @cannot('soumettre_proposition')
                          <div class="flex items-center border border-teal-500 py-2 px-2 bg-blue-100">   
                                  <p>
                                    {{$conception->graphiste->user->user_login}}
                                  </p>
                                
                          </div>
                 


                      </td>
                  @endcannot
                  @endcan

                      <td class="px-4 py-3 text-xs">
                        <span
                          class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full "
                        >
                          {{$conception->created_at->diffForHumans()}}
                        </span>
                      </td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
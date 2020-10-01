


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
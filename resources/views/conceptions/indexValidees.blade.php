<x-master>

        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            
            @if (count($conceptions) > 0)
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


            <!-- Les conceptions à valider -->
            <div class="w-full overflow-hidden rounded-lg
                        border border-red-600 shadow-xl bg-red-600 mb-8
                        @if (count($conceptions) === 0)
                          mt-8
                        @endif
                        @can('administrer')
                          mt-8
                        @endcan

                        ">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-white uppercase border-b "
                    >
                      <th class="px-4 py-3">{{ count($conceptions) }} Conceptions en attente de vos données</th>
                      @can('administrer')
                      <th class="px-4 py-3">Graphiste</th>
                      @endcan
                      <th class="px-4 py-3">Date de commande</th>
                     
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y"
                  >
                  @foreach ($conceptions as $conception)
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
                                        <span class="font-bold bold text-2xl">{{$conception->type}}</span>
                                      </div>
                                      <div>
                                        <a
                                          class="block w-64 px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                          href="/conceptions/{{$conception->id}}/edit"
                                        >
                                          Configurer
                                        </a>
                                      </div>

                                </div>                            
                            <p class="">{{$conception->user->display_name}}</p>
                            




                          </div>
                        </div>
                      </td>

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

 @endif
            <!-- Les conceptions à valider -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs mb-8">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b "
                    >
                      <th class="px-4 py-3"> {{ count($conceptionsACreer) }} Conceptions en cours de création</th>
                      
                      <th class="px-4 py-3">Date de lancement de création</th>
                     
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y"
                  >
                  @foreach ($conceptionsACreer as $conception)
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
                                        class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"
                                      ></span>

                                      <div class="w-64">
                                        <span class="font-bold bold text-2xl">{{$conception->type}}</span>
                                      </div>
                                      <div>
                                        <a
                                          class="block w-64 px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                          href="/conceptions/{{$conception->id}}"
                                        >
                                          Voir le cahier de charges
                                        </a>
                                      </div>

                                </div>                            
                            <p class="">{{$conception->user->display_name}}</p>
                            




                          </div>
                        </div>
                      </td>

                      <td class="px-4 py-3 text-xs">
                        <span
                          class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full "
                        >{{$conception->lancer_at->diffForHumans()}} 
                        </span>
                      </td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            
            </div>



          </div>
        </main>


</x-master>
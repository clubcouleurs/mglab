<x-master>

        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            
 

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
                      <th class="px-4 py-3">{{ count($conceptions) }} Conceptions en attente de données</th>
                      
                      
                     
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





          </div>
        </main>


</x-master>
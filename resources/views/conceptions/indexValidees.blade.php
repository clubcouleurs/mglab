<x-master>

        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            
 

            <!-- Les conceptions à valider -->
            <div class="w-full overflow-hidden rounded-lg
                         shadow-xl mb-8 mt-8">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left uppercase border-b"
                    >
                      <th class="px-4 py-3">{{ count($conceptions) }} Conceptions validées  </th>

                      <th class="px-4 py-3">Fichier définitif</th>

                      
                      <th class="px-4 py-3">Graphiste</th>

                     
                      <th class="px-4 py-3">Date de validation</th>
                     
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

                          </div>
                          <div>
                                <div class="block flex items-center w-full">
                                      <span
                                        class="inline-block w-3 h-3 mr-1 bg-black rounded-full"
                                      ></span>


                                        <span class="font-bold bold text-2xl">{{$conception->type}}</span>



                                </div>                            
                            <p>{{$conception->user->display_name}}</p>
                           
                          </div>
                        </div>
                      </td>

                      <td>
                          <div class="flex items-center rounded-lg border border-teal-500 py-2 px-2 bg-red-100">

                          <img src="{{ asset('img/pdf.png') }}" class="h-8 mr-2">
                          <a download="{{ $conception->pdf_conception }}" href="{{ Storage::url('creations/' . $conception->pdf_conception) }}" class="font-semibold text-red-600">
                              {{ $conception->pdf_conception }}</a>
                        </div>
                      </td>

                      <td class="px-4 py-3 text-xs">
                    

                          
             
                                  
                                  <p>
                                    {{$conception->graphiste->user->user_login}}
                                  </p>
                                



  
                


                      </td>


                      <td class="px-4 py-3 text-xs">
                        <span
                          class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full "
                        >
                          {{$conception->validate_at->diffForHumans()}}
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
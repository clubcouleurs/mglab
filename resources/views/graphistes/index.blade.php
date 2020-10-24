<x-master type='types' :value="$types">

        <main class="h-full overflow-y-auto">


<div class="container px-6 mx-auto">
             
<!-- Les conceptions à valider -->
            <div class="w-full overflow-hidden rounded-lg
                        border border-purple-600 shadow-xl mt-8">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="font-semibold tracking-wide text-left uppercase border-b "
                    >
                      <th class="px-4 py-3">Utilisateurs  </th>
                      <th class="px-4 py-3">Rendre un graphiste</th>
                      <th class="px-4 py-3">Graphiste</th>
                      <th class="px-4 py-3">Date d'inscription</th>

                     
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y">
                  @foreach ($users as $user)
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
                                          <a href="/conceptions/{{$user->id}}" class="text-red-600">
                                          {{$user->user_login}}</a>
                                        </span>
                                      </div>
                                      <div>

                                      </div>

                                </div>                            
                            <p class="">{{$user->display_name}}</p>
                            




                          </div>
                        </div>
                      </td>

                      <td>                    

                    <form class="w-full max-w-sm" action="/graphistes/{{$user->ID}}" method="POST"
                       enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="flex content-center flex-wrap">
                          <div class="w-full p-2">
                            <div class="text-center p-2">
                            @if ($user->graphiste === null)
                           <button class="flex-shrink-0 bg-teal-500 text-center
                             hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-3 px-4 rounded-lg" type="submit">
                                  Rendre graphiste
                            </button>
                            @endif  

                          </div>
                          </div>
                        </div>
                          <div class="flex content-start">
                            <div class="w-full">

                          </div>
                          </div>
                        </form>
                      </td>


                      <td>
                            @if ($user->graphiste !== null)

                    <form class="w-full max-w-sm" action="/graphistes/{{$user->graphiste->id}}" method="POST"
                       enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')

                            <div class="flex content-center flex-wrap">
                          <div class="w-full p-2">
                            <div class="text-center p-2">
                           <button class="flex-shrink-0 bg-teal-500 text-center
                             hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-3 px-4 rounded-lg" type="submit">
                                  Détacher
                            </button>

                          </div>
                          </div>
                        </div>
                          <div class="flex content-start">
                            <div class="w-full">

                          </div>
                          </div>
                        </form>
                            @endif  

                      </td>


                      <td class="px-4 py-3 text-xs">
                        <span
                          class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full "
                        >
                          {{$user->user_registered->diffForHumans()}}
                        </span>
                      </td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>

                {{ $users->links() }}



              </div>
            </div>





          </div>
        </main>


</x-master>
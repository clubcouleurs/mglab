<x-master>


<main class="h-full overflow-y-auto bg-blue-100">
<div class="container px-6 mx-auto">
            <div class="grid gap-6 mb-8 xl:grid-cols-4 mt-8 grid-rows-4 grid-flow-col">
             
              <div
                class="min-w-0 row-span-3 col-span-1 p-4 bg-white rounded-lg shadow-md"
              >
                <h4 class="mb-4 font-semibold text-gray-600">
                 Vous avez choisie cette proposition 
                </h4>
                <hr class="mb-4">
                <p>
                  <img src="{{asset('propals/' . $proposition->lien)}}" class="rounded-lg shadow-md">
                </p>
                <hr class="mt-4">

                <div class="mt-6">

                <p class="font-extrabold text-xl">
                  Vous avez encore droits à Modifications
                </p>
                </div>
              </div>

              <div
                class="min-w-0 row-span-1 col-span-2 p-4 bg-white rounded-lg shadow-md"
              >
                <h4 class="mb-2 font-semibold text-gray-600">
                  Avez vous des modification à appliquer ?
                </h4>
                <hr class="mb-0">
                <p>
                  <img src="" class="rounded-lg shadow-md">
                </p>
                <div class="mt-2">

                  <p>
                    @foreach ($proposition->conception->modifications as $modification)
                    <div class="w-64 py-2 px-2 bg-blue-100 mb-2">
                    Modification {{$loop->remaining + 1}} : 
                  </div>
                    <div class="flex items-center py-4 px-4 bg-red-100 mb-2">
                                
                    {{$modification->explication}}

                          </div>
                          <hr class="mb-2">
                    @endforeach
                  
                  </p>

                </div>
              </div>

                                       
             


            </div>
            </div>
           </main> 
</x-master>
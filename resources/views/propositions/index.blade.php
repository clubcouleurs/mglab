<x-master>


<main class="h-full overflow-y-auto bg-blue-100">
<div class="container px-6 mx-auto grid gap-4 grid-cols-3 mb-8 mt-8">

              @foreach ($propositions as $propal)
              <div
                class="min-w-0 p-4 bg-white rounded-lg shadow-md"
              >
                <h4 class="mb-4 font-semibold text-gray-600">
                  Proposition N°: {{$loop->iteration}}
                </h4>
                <hr class="mb-4">
                <p>
                  <img src="{{asset('/propals/' . $propal->lien )}}" class="rounded-lg shadow-md">
                </p>
                <div class="mt-6 items-center text-center">



                  <a href="/propositions/{{$propal->id}}/edit"
                    class="block w-full px-5 items-center w-full py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                  href="/propositions/{{$propal->id}}/edit"
                  >
                    Je choisie cette proposition
                  </a>

                </div>
              </div>
              @endforeach


           
            </div>
           </main> 
</x-master>
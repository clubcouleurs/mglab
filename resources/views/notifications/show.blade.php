<x-master type='types' :value="$types">

  <main class="h-full overflow-y-auto">

    <div class="container px-6 mx-auto grid">

      <span class="text-4xl mt-6 text-gray-700">
        Inbox
      </span>            
<hr class="bg-blue-900 border-2">
      <span class="text-md mt-6 text-gray-700">
        Cette page contient vos notifications à propos de vos commandes en cours
      </span>        
      <!-- Les conceptions en attente de propals -->
      <div class="w-full overflow-hidden rounded-lg
      border border-gray-900 mb-8 mt-8">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
            class="font-semibold tracking-wide text-left uppercase border-b"
            >
            <th class="px-4 py-3">Sujet</th>
            <th class="px-4 py-3 text-center">Conception concernée</th>

            <th class="px-4 py-3">Date</th>

          </tr>
        </thead>
        <tbody
        class="bg-white divide-y"
        >
        @foreach ($notifications as $notification)
        <tr class="text-gray-700">
          <td class="px-4 py-3">
            <div class="flex items-center text-sm">


              <svg viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Page-1" stroke="none" stroke-width="1" fill="current-color" fill-rule="evenodd">
                  <g id="icon-shape">
                    <path d="M14.8780488,10.097561 L20,14 L20,16 L13.627451,11.0980392 L10,14 L6.37254902,11.0980392 L0,16 L0,14 L5.12195122,10.097561 L0,6 L0,4 L10,12 L20,4 L20,6 L14.8780488,10.097561 Z M18.0092049,2 C19.1086907,2 20,2.89451376 20,3.99406028 L20,16.0059397 C20,17.1072288 19.1017876,18 18.0092049,18 L1.99079514,18 C0.891309342,18 0,17.1054862 0,16.0059397 L0,3.99406028 C0,2.8927712 0.898212381,2 1.99079514,2 L18.0092049,2 Z" id="Combined-Shape"></path>
                  </g>
                </g>
              </svg>


              <div class="block flex items-center w-full">



                <span class="
                @if ($notification->read_at === Null)
                font-semibold text-md
                @else 
                text-md
                @endif">
                  {{$notification->data['sujet']}}

                 


        
                </span>

                <div>

                </div>

              </div>                            

          </div>
        </td>
<td>
  <div>

    <div class="text-center justify-center flex items-center p-1 rounded-lg bg-white rounded-lg shadow-md">

    <a
    class="block px-2 py-1 text-sm text-white text-center transition-colors duration-150 bg-gray-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-gray-500 focus:outline-none focus:shadow-outline-purple"
    href="/conceptions/{{$notification->data['conceptionId']}}"
    >
    Consulter la conception
  </a>




</td>



        <td class="px-4 py-3 text-xs">
          <span
          class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full "
          >
          {{$notification->created_at->diffForHumans()}}
        </span>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>
{{-- $notifications->links() --}}

</div>
</div>

</div>
</main>
</x-master>

   <x-layout>
  <main class="h-full overflow-y-auto bg-blue-100">
    <div class="container px-6 mx-auto grid">

<div class="px-4 py-3 mb-2 border rounded-lg">
  <div class="mb-2">
    <div class="text-sm">
            <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
        Réponse Enquête de satisfaction
      </span>
<p>
  <span class="text-2xl text-gray-700">
  Envoyé à {{$client}},
  </span>

</p>
</div>
</div>
</div>



<div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md">
      <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
        Qualité de notre prestation
      </span>
      <div class="flex mt-2">
        <span class="inline-block w-5 h-5 mr-2 bg-red-600 rounded-full"></span>
        <p class="text-2xl">{{ $avis->quality_prestation }}</p>
      </div>
</div>

<div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md">
      <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
        RESPECT DES ENGAGEMENTS DE LIVRAISON
      </span>
      <div class="flex mt-2">
        <span class="inline-block w-5 h-5 mr-2 bg-red-600 rounded-full"></span>
        <p class="text-2xl">{{ $avis->delai_livraison }}</p>
      </div>  
</div>

<div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md">
      <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
        L'EFFICACité de LA COMMUNICATION ET LE SERVICE APRÈS-VENTE
      </span>
      <div class="flex mt-2">
        <span class="inline-block w-5 h-5 mr-2 bg-red-600 rounded-full"></span>
        <p class="text-2xl">{{ $avis->quality_sav }}</p>
      </div>  
</div>

<div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md">
      <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
        LA QUALITÉ DE NOTRE SITE INTERNET
      </span>
      <div class="flex mt-2">
        <span class="inline-block w-5 h-5 mr-2 bg-red-600 rounded-full"></span>
        <p class="text-2xl">{{ $avis->quality_site }}</p>
      </div>  
</div>

<div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md">
      <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
        COMPRÉHENSION de la DEMANDE
      </span>
      <div class="flex mt-2">
        <span class="inline-block w-5 h-5 mr-2 bg-red-600 rounded-full"></span>
        <p class="text-2xl">{{ $avis->understand_demande }}</p>
      </div>  
</div>

<div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md">
      <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
        SERVICES RÉPONDENT-ILS au BESOINS client ?
      </span>
      <div class="flex mt-2">
        <span class="inline-block w-5 h-5 mr-2 bg-red-600 rounded-full"></span>
        <p class="text-2xl">{{ $avis->services_needs }}</p>
      </div>  
</div>


<div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md">

<div class="mb-2">
  <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
  for="objectif">
 Remarques et suggestions :
</label>

<p>{{ $avis->remarques }}</p>


</div>


</div>








</div>
</main>
</x-layout>

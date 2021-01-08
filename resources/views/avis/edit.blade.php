   <x-layout>
  <main class="h-full overflow-y-auto bg-blue-100">
    <div class="container px-6 mx-auto grid">

<div class="px-4 py-3 mb-2 border rounded-lg">
  <div class="mb-2">
    <div class="text-sm">
            <span class="block mb-2 uppercase font-bold text-4xl text-gray-700">
        Enquête de satisfaction
      </span>
      <hr>
<p>
  <span class="text-2xl text-gray-700">
  Cher {{$client}},<br>
  </span>
Dans le cadre de l'amélioration de nos offres, nous souhaiterions recueillir votre avis quant à la qualité de nos services.

Nous vous demandons respectueusement de nous accorder 30 secondes pour répondre à ce questionnaire.

Le traitement de vos réponses nous aidera à améliorer nos prestations.<br>

En vous remerciant par avance, je vous prie de croire, cher {{$client}}, en l'expression de nos sincères salutations.<br>
L'équipe MonGraphisme.com.

</p>
</div>
</div>
</div>
      <form action="/avis/{{ $avis->id }}"
           method="post"
           name="formEditConception">
        @csrf
        @method('PATCH')


<div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md">
  <div class="mb-2">
    <div class="text-sm">
      <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
        Que pensez-vous de la qualité de notre prestation ?
      </span>
      <div class="flex mt-2">

        <label
        class="inline-flex items-center ml-6 text-gray-600"
        >
        <input
        type="radio"
        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple  h-8 w-8"
        name="quality_prestation"
        value="4"

        />
        <span class="ml-2 mr-2">Très bien</span>
      </label>
      <label
      class="inline-flex items-center ml-6 text-gray-600"
      >
      <input
      type="radio"
      class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
      name="quality_prestation"
      value="3"
  

      />
      <span class="ml-2 mr-2">Bien</span>

    </label>
    <label
    class="inline-flex items-center ml-6 text-gray-600"
    >
    <input
    type="radio"
    class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-radio h-8 w-8"
    name="quality_prestation"
    value="2"

    />
    <span class="ml-2 mr-2">Passable</span>
  </label>
  <label
  class="inline-flex items-center ml-6 text-gray-600"
  >
  <input
  type="radio"
  class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-radio h-8 w-8"
  name="quality_prestation"
  value="1"


  />
  <span class="ml-2 mr-2">Mauvais</span>
</label>                                                                     
</div>
</div>             

</div>
</div>



<div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md">
  <div class="mb-2">
    <div class="text-sm">
      <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
        Respect des engagements de livraison
      </span>
      <div class="flex mt-2">

        <label
        class="inline-flex items-center ml-6 text-gray-600"
        >
        <input
        type="radio"
        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple  h-8 w-8"
        name="delai_livraison"
        value="4"

        />
        <span class="ml-2 mr-2">Très bien</span>
      </label>
      <label
      class="inline-flex items-center ml-6 text-gray-600"
      >
      <input
      type="radio"
      class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
      name="delai_livraison"
      value="3"
  

      />
      <span class="ml-2 mr-2">Bien</span>

    </label>
    <label
    class="inline-flex items-center ml-6 text-gray-600"
    >
    <input
    type="radio"
    class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-radio h-8 w-8"
    name="delai_livraison"
    value="2"

    />
    <span class="ml-2 mr-2">Passable</span>
  </label>
  <label
  class="inline-flex items-center ml-6 text-gray-600"
  >
  <input
  type="radio"
  class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-radio h-8 w-8"
  name="delai_livraison"
  value="1"


  />
  <span class="ml-2 mr-2">Mauvais</span>
</label>                                                                     
</div>
</div>             

</div>
</div>



<div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md">
  <div class="mb-2">
    <div class="text-sm">
      <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
        La communication et le service après-vente sont-ils efficaces ?
      </span>
      <div class="flex mt-2">

        <label
        class="inline-flex items-center ml-6 text-gray-600"
        >
        <input
        type="radio"
        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple  h-8 w-8"
        name="quality_sav"
        value="4"

        />
        <span class="ml-2 mr-2">Très bien</span>
      </label>
      <label
      class="inline-flex items-center ml-6 text-gray-600"
      >
      <input
      type="radio"
      class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
      name="quality_sav"
      value="3"
  

      />
      <span class="ml-2 mr-2">Bien</span>

    </label>
    <label
    class="inline-flex items-center ml-6 text-gray-600"
    >
    <input
    type="radio"
    class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-radio h-8 w-8"
    name="quality_sav"
    value="2"

    />
    <span class="ml-2 mr-2">Passable</span>
  </label>
  <label
  class="inline-flex items-center ml-6 text-gray-600"
  >
  <input
  type="radio"
  class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-radio h-8 w-8"
  name="quality_sav"
  value="1"


  />
  <span class="ml-2 mr-2">Mauvais</span>
</label>                                                                     
</div>
</div>             

</div>
</div>


<div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md">
  <div class="mb-2">
    <div class="text-sm">
      <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
        Que pensez-vous de la qualité de notre site internet ?
      </span>
      <div class="flex mt-2">

        <label
        class="inline-flex items-center ml-6 text-gray-600"
        >
        <input
        type="radio"
        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple  h-8 w-8"
        name="quality_site"
        value="4"

        />
        <span class="ml-2 mr-2">Très bien</span>
      </label>
      <label
      class="inline-flex items-center ml-6 text-gray-600"
      >
      <input
      type="radio"
      class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
      name="quality_site"
      value="3"
  

      />
      <span class="ml-2 mr-2">Bien</span>

    </label>
    <label
    class="inline-flex items-center ml-6 text-gray-600"
    >
    <input
    type="radio"
    class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-radio h-8 w-8"
    name="quality_site"
    value="2"

    />
    <span class="ml-2 mr-2">Passable</span>
  </label>
  <label
  class="inline-flex items-center ml-6 text-gray-600"
  >
  <input
  type="radio"
  class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-radio h-8 w-8"
  name="quality_site"
  value="1"


  />
  <span class="ml-2 mr-2">Mauvais</span>
</label>                                                                     
</div>
</div>             

</div>
</div>





<div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md">
  <div class="mb-2">
    <div class="text-sm">
      <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
        Avons-nous compris votre demande ?
      </span>
      <div class="flex mt-2">

        <label
        class="inline-flex items-center ml-6 text-gray-600"
        >
        <input
        type="radio"
        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple  h-8 w-8"
        name="understand_demande"
        value="4"

        />
        <span class="ml-2 mr-2">Très bien</span>
      </label>
      <label
      class="inline-flex items-center ml-6 text-gray-600"
      >
      <input
      type="radio"
      class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
      name="understand_demande"
      value="3"
  

      />
      <span class="ml-2 mr-2">Bien</span>

    </label>
    <label
    class="inline-flex items-center ml-6 text-gray-600"
    >
    <input
    type="radio"
    class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-radio h-8 w-8"
    name="understand_demande"
    value="2"

    />
    <span class="ml-2 mr-2">Passable</span>
  </label>
  <label
  class="inline-flex items-center ml-6 text-gray-600"
  >
  <input
  type="radio"
  class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-radio h-8 w-8"
  name="understand_demande"
  value="1"


  />
  <span class="ml-2 mr-2">Mauvais</span>
</label>                                                                     
</div>
</div>             

</div>
</div>




<div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md">
  <div class="mb-2">
    <div class="text-sm">
      <span class="block mb-2 uppercase font-bold text-2xl text-gray-700">
        Nos services répondent-ils à vos besoins ?
      </span>
      <div class="flex mt-2">

        <label
        class="inline-flex items-center ml-6 text-gray-600"
        >
        <input
        type="radio"
        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple  h-8 w-8"
        name="services_needs"
        value="4"

        />
        <span class="ml-2 mr-2">Très bien</span>
      </label>
      <label
      class="inline-flex items-center ml-6 text-gray-600"
      >
      <input
      type="radio"
      class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple h-8 w-8"
      name="services_needs"
      value="3"
  

      />
      <span class="ml-2 mr-2">Bien</span>

    </label>
    <label
    class="inline-flex items-center ml-6 text-gray-600"
    >
    <input
    type="radio"
    class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-radio h-8 w-8"
    name="services_needs"
    value="2"

    />
    <span class="ml-2 mr-2">Passable</span>
  </label>
  <label
  class="inline-flex items-center ml-6 text-gray-600"
  >
  <input
  type="radio"
  class="text-purple-600 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-radio h-8 w-8"
  name="services_needs"
  value="1"


  />
  <span class="ml-2 mr-2">Mauvais</span>
</label>                                                                     
</div>
</div>             

</div>
</div>



<div class="px-4 py-3 mb-2 bg-white rounded-lg shadow-md">

<div class="mb-2">
  <label class="block mb-2 uppercase font-bold text-2xl text-gray-700"
  for="objectif">
  Vos remarques et suggestions :
</label>

<textarea
class="block px-2 py-2 rounded-md w-full
border border-gray-400 bg-gray-200
focus:border-purple-600 focus:outline-none focus:shadow-outline-purple form-textarea"
name="remarques"
rows=6
placeholder="Nous serrons ravis d'entendre vos remarques, suggestions et idées"

></textarea>


</div>


</div>


<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
  <div id="divMsgSub" class="flex-1 text-center items-center p-2 rounded-lg mb-2">


</div>
  <div class="flex-1 text-center items-center">
    <button class="w-64 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple mb-2"
    type="submit">
     Envoyer
   </button>
 </div>
</div>



      </form>

</div>
</main>
</x-layout>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

</head>
<style type="text/css">
  .img-thumbnail {
  padding: 0.25rem;
  background-color: #fff;
  border: 1px solid #dee2e6;
  border-radius: 0.25rem;
  max-width: 200px;
  height: auto;
}

  th {
  text-align: inherit;
  }
  table {
  border-collapse: collapse;
  }
  .table {
    border-collapse: collapse !important;
  }
  .table td,
  .table th {
    background-color: #fff !important;
  }
  .table th,
  .table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
  }  
.table thead th {
  vertical-align: bottom;
  border-bottom: 2px solid #dee2e6;
}
.table tbody + tbody {
  border-top: 2px solid #dee2e6;
}

.table .table {
  background-color: #fff;
}  
  
</style>
<body>

<table style="width: 100%; height: 120px">
  <tr bgcolor="#c01a89" valign="center">
    <td align="center" valign="center">
<img src="{{ asset('img/logo_blanc.png') }}" width="250px" style="margin-top: 25px"></td>
</tr>


</table>

<table style="width: 100%">
<tr>
<td align="center">
  <h2>Le cahier de charges pour la conception du {{ $conception->type }}</h2>
</td>
  </tr>

</table>

  <h3>Nom de l'entreprise</h3>
  <p>{{$conception->rs_entreprise}}</p>            

  @if ($type == 'logo')

  <hr>
  <h3>L'age de votre entreprise</h3>

  <p>{{$conception->ageEntreprise}}</p>

  @else

  <hr>
  <h3>Votre logo</h3>

  <img src="{{asset($conception->logo)}}" width="250" class="img-thumbnail">

  @endif

  <hr>
  <h3>Votre slogan</h3>
  <p>{{$conception->slogan}}</p>



      <hr>
      <h3>
        Votre activités
      </h3>
      <p
      class="w-full mt-1 text-lg px-2 py-2 bg-blue-100 border rounded-lg"
      >
      {{$conception->activities}}
    </p>




  @if ($type == 'logo')



    <hr>
    <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-600">
      Vos axes de développement
    </h3>

    <p class="w-full mt-1 text-lg px-2 py-2 bg-blue-100 border rounded-lg">
      {{$conception->axeDeveloppement}}
    </p>



  @else


    <hr>
    <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-600">
      Votre positionnement
    </h3>

    <p
    class="w-full mt-1 text-lg px-2 py-2 bg-blue-100 border rounded-lg"
    >
    {{$conception->positionnement}}
  </p>
</div>
@endif




  <hr>
  <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-600">
    Vos produits et services
  </h3>

  <p
  class="w-full mt-1 text-lg px-2 py-2 bg-blue-100 border rounded-lg"
  >
  {{$conception->produitService}}
</p>




  <hr>


  <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-600">

    @if($type === 'logo')
    Vos informations de contact
    @else
    Les informations de contact qui doivent figurer sur la création
    @endif

  </h3>
  <p class="w-full mt-1 text-lg px-2 py-2 bg-blue-100 border rounded-lg">
    {{$conception->contacts}}
  </p>





<!-- Div textes créa -->
@if ($type !== 'logo')
  <hr>
    <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700">
      Les textes pour votre création
    </h3>
    <p class="w-full mt-1 text-lg">
      {{$conception->texte_additionnel}}
    </p>

@endif
<!-- Div photos -->
@if(count($images) > 0 )
  <hr>
    <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700">
      @if($type === 'logo')
      Les exemples de logos que vous avez aimez<hr>
      @else
      Les images pour votre création<hr>
      @endif
    </h3>



  <table class="table">
    <tbody>
        {{ $i = 0 }}
<tr>
    @foreach ($images as $image)
      {{ $i += 1  }}

      @if ($i === 3)
          <td><img src="{{ asset($image->lien) }}" height="200px"></td>      
        </tr>
      @else
          <td><img src="{{ asset($image->lien) }}" height="200px"></td>      
      @endif

      @if ($i === 3)
      {{ $i = 0 }}
        <tr>
      @endif        
    @endforeach
  </tr> 
    </tbody>
  </table>
@endif



<!-- ici si le client à un document il peut le charger ici -->
@if ($document !== Null ) 
  <hr>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
  <div class="mb-4">
    <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700">
    Le document que vous avez uploader
  </h3>

<table>
  <tr>
    <td>
<img src="{{ asset('img/doc.png') }}" width="50px">
</td>
<td>
<h4> {{ $document->nomDocument }}</h4>
</td>
</tr>
</table>

@endif
<!-- fin div chargement document -->    



<!-- Div produit/Services -->
@if ($type !== 'logo')
    <hr>


    <h3 class="block mb-2 uppercase font-bold text-2xl text-gray-700"
    for="texte_additionnel">
    Avez des produits, services ou événement à mettre sur votre création
  </h3> 



  <table class="table">
    <thead>
      <tr>
        <th>Image du produit</th>
        <th>Description</th>
        <th>Prix</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($produits as $produit)
      <tr>
        <td align="center"><img src="{{ asset($produit->image) }}" width="100px" class="img-thumbnail"></td>
        <td><p>{{$produit->description}}</p></td>
        <td>{{$produit->prix / 100 }} €</td>
      </tr>
      @endforeach
    </tbody>
  </table>






@endif


<hr>
    <h3>
      Votre cible
    </h3>
          <h3>
          <input type="checkbox"
          @empty(!$Particuliers)
          checked
          @endempty
          disabled
          />
        Particuliers
        </h3>

        <h3>
        <input type="checkbox"
        @empty(!$Entreprises) 
        checked
        @endempty                        
        disabled
        />
        <span class="ml-2">Entreprise</span>
      </h3>



  <hr>                

  <h3 class="block mt-4 text-sm">
    <span class="block mb-2 uppercase font-bold text-md text-gray-700">
      Tranche d'age de votre cible
    </span>

  </h3>
<table width="50%">
  <tr>
    <td>

      <h3
      class="inline-flex items-center text-gray-600"
      >
      <input
      type="checkbox"
      @empty(!$Enfants) 
      checked
      @endempty
      disabled

      />
      <span class="ml-2">Enfants</span>
    </h3>
</td>
<td>
    <h3
    class="inline-flex items-center ml-6 text-gray-600"
    >
    <input
    type="checkbox"
    @empty(!$Adolescents) 
    checked
    @endempty                        
    disabled                        
    />
    <span class="ml-2">Adolescents</span>
  </h3>
</td>
<td>
  <h3>
  <input
  type="checkbox"
  @empty(!$Adultes) 
  checked
  @endempty                        
  disabled                           
  />
  <span class="ml-2">Adultes</span>
</h3>
</td>
<td>
  <h3>
  <input
  type="checkbox"
  @empty(!$Seniours) 
  checked
  @endempty                        
  disabled                         
  />
  <span class="ml-2">Seniours</span>
</h3>                               
</td>
</tr>
</table>
<hr>
<h3 class="block mt-4 text-sm">
  <span class="block mb-2 uppercase font-bold text-md text-gray-700">
    Sex de votre cible
  </span>

</h3>
<table width="50%">
  <tr>
    <td>
    <h3>
    <input
    type="checkbox"
    @empty(!$Hommes) 
    checked
    @endempty                        
    disabled                          
    />
    <span class="ml-2">Hommes</span>
  </h3>
</td>
<td>
  <h3
  class="inline-flex items-center ml-6 text-gray-600"
  >
  <input
  type="checkbox"
  @empty(!$Femmes) 
  checked
  @endempty                        
  disabled                          
  />
  <span class="ml-2 mr-2">Femmes</span>
</h3>
</td>
</tr>
</table>


  <hr class="mb-2">                
  <h3>
  Les secteurs d'activités de vos clients
</h3>
<p>
  {{$conception->activities_cible}}
</p>


<hr>

          <h3>
        Vos préférences pour les couleurs
         </h3>


      @empty ($conception->couleur_1 || $conception->couleur_2 || $conception->couleur_3)

      <p>
        Vous n'avez pas de préférences de couleurs, nos graphistes vont s'en occuper
      </p>
      @else


<table width="100%" style="height: 50px; width: 100%">
  <tr>
    <td style="background-color: {{$conception->couleur_1}}">
    </td>

    <td style="background-color: {{$conception->couleur_2}}">
    </td>

    <td style="background-color: {{$conception->couleur_3}}">
    </td>
  </tr>
</table>


<hr>
    




@endempty

<!-- font -->


          <h3>
        Vos préférences pour la police d'écriture
         </h3>

        <table>
          <tr>
        @empty(!$Serif)

            <td>
                <span>Serif</span>
            </td>
            <td>
                <img src="{{ asset('img/font_types_serif.jpg') }}" width="100" class="img-thumbnail">
            </td>

      @endempty

      @empty(!$SansSerif)

            <td>
                <span>Sans Serif</span>
            </td>
            <td>
                <img src="{{ asset('img/font_types_sansserif.jpg') }}" width="100" class="img-thumbnail">
            </td>


    @endempty
    @empty(!$slab)


            <td>
                <span>Slab Serif</span>
            </td>
            <td>
                <img src="{{ asset('img/font_types_slabserif.jpg') }}" width="100" class="img-thumbnail">
            </td>


  @endempty
  @empty(!$Script)


            <td>
                 <span>Script</span>
            </td>
            <td>
                  <img src="{{ asset('img/font_types_script.jpg') }}" width="100" class="img-thumbnail">
            </td>




@endempty
@empty(!$Manuscrit)


            <td>
                <span>Manuscrit</span>
            </td>
            <td>
                <img src="{{ asset('img/font_types_handwritten.jpg') }}" width="100" class="img-thumbnail">
            </td>


 
@endempty                                                                    

          </tr>
        </table>

@if($type == 'logo')
<!-- typo ou picto/typo -->
<hr>

      <h3>
        Le type que vous avez choisie
      </h3>


        <h3>

        @if ($conception->typeLogo =='typo')
        <table>
          <tr>
            <td>
              <span>Logo typographique</span>
            </td>
            <td>
              <img src="{{ asset('img/typo.jpg') }}" width="200" class="img-thumbnail">
            </td>
          </tr>
        </table>
        @else

        <table>
          <tr>
            <td>
              <span>Logo typographique et pictographique</span>
            </td>
            <td>
              <img src="{{ asset('img/typo_picto.jpg') }}" width="200" class="img-thumbnail">
            </td>
          </tr>
        </table>

        @endif

      </h3>


@else


<!-- style -->


      <h3>
        Le style que vous avez choisie
      </h3>

        <table>
          <tr>
            <td>
            <span>{{ $conception->style }}</span>
            </td>
            <td>
        <img src="{{ asset('img/font_types_serif.jpg') }}" width="100" class="img-thumbnail">
            </td>
          </tr>
        </table>




@endif

<hr>

              <table  class="inner-body"  border="0" align="center" width="570" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="padding: 20px" align="center">
                  <img src="{{ asset('img/footer-email.jpg') }}" width="250px">
                  </td>
                </tr>
            
              </table>

              <table align="center" width="100%" style="height: 26px">

                <tr>
                  <td align="center" bgcolor="#c01a89" valign="center">
                  <a style="color: white;" href="https://www.mongraphisme.com">&copy; mongraphisme.com</a>
                  </td>
                </tr>                
              </table>              

</body>
</html>
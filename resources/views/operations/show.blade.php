<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  </head>
  <body>
    @php
    use App\Models\operation;
   $operations= operation::find($operations->id);
   $totalVente = 0; 

@endphp
    <div class="container p-5 mx-5 shodow  m-auto">
      <div class="d-flex justify-content-between">
        <div class="item text-center">
          <h2 class="text-primary">
            <img class="img-fluid" src="{{ asset('img/dingqi-logo.jpg') }}" alt=""></h2>
        </div>
        <div class="item  text-dark">
          <h4>Numero operation : #000{{$mouvements->first()->operation->id}}</h4>
      
         
         
          
            <h5> Operation : {{$operations->libelle}}</h5>
            <h5> Type :
              {{-- {{$operations->typeOperation->libelle}} --}}
              @if ($operations->typeOperation)
              {{ $operations->typeOperation->libelle }}
          @else
              N/A
          @endif
            </h5>  
            <h5> Date  : {{$operations->date_operation}}</h5>
        
        </div>
      </div>
      <br>
      <div class="col-4">
        <hr class="border border-warning border-3 opacity-75">
      </div>
      <div class="container  ">
       <div class="row">
      <div class="col p-2 ">
        <h5> Magasin : 
        @if ($operations->mouvements->isNotEmpty()){{ $operations->mouvements->first()->entrepot->libelle }} @endif
       </h5>
        <h5> Adresse :
          
          {{ $operations->mouvements->first()->entrepot->adresse }}
        </h5>  
        <h5> Type d'entrepot : 
          
          {{ $operations->mouvements->first()->entrepot->type }}</h5>
      </div>
      <div class="col p-2 ">
       
      </div>
      
    </div>
  </div>
      <div class="col-12">
        <hr class="border border-warning border-3 opacity-75">
      </div>
      <div class="container">
        <table class="table">
          <thead class="text-primary ">
            <tr >
              <th scope="col">Produits</th>
              <th scope="col">Prix</th>
              <th scope="col">Quantite</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($mouvements as $mouvement)
            <tr>
              <td>{{ $mouvement->produit->libelle }}</td>
              <td>{{ $mouvement->produit->prix_unitaire }}</td>
              <td>{{ $mouvement->quantite_en_stock }}</td>
              <td>{{ $mouvement->produit->prix_unitaire*$mouvement->quantite_en_stock }}</td>
            </tr>
            @php
          $totalVente += ($mouvement->produit->prix_unitaire * $mouvement->quantite_en_stock);
          @endphp
            @endforeach
  
          </tbody>
          
          
        </table>
      </div>
      <div class="">
        <hr class="border border-warning border-3 opacity-75">
      </div>
      <div class="container text-center">
        <div class="row">
          
          <div class="col">
          
          </div>
          <div class="col">
          <h2 class="bg-warning text-dark p-2">Total : {{$totalVente}}  DHS</h2>
          </div>
        </div>
      </div>
      
    </div>
    <div class="col text-center">
      <h5>Tel : 06 62 61 22 06 / 06 67 66 19 99 / 05 22 30 00 14 </h5>
     </div>
     <div class="col-10 text-end p-2">
      <button class="d-print-none btn btn-warning text-end p-2" onclick="print()">Imprimer</button>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
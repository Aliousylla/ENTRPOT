<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>

    <div class="container p-5">
      <table class="table table-dark table-striped">
       <h1> Depot</h1>
<h2 class="text-primary">Nombre de produit : {{$nombreDeMouvements}}</h2>
        <tbody>
         <tr> 
            <th >produits</th>
            @foreach ($mouvements as $item)
            <td>{{$item->produit->libelle}}</td>
            @endforeach
        </tr> 
        <tr> 
            <th >Date </th>
            @foreach ($mouvements as $item)
            <td>{{$item->operation->date_operation}}</td>
            @endforeach
        </tr>    
            
        <tr> 
            <th >Operation </th>
            @foreach ($mouvements as $item)
            <td>{{$item->operation->libelle}}</td> 
            @endforeach
        </tr>  
        <tr> 
            <th >Quantite </th>
            @foreach ($mouvements as $item)
            <td>{{$item->quantite_en_stock}}</td> 
            @endforeach
        </tr> 
        </tbody>
      </table>

      <table class="table table-dark table-striped">
        <h1>transaction Magasin 1</h1>
        <h2 class="text-primary">Nombre de produit : {{$nombreDeMouvements_1}}</h2>
         <tbody>
          <tr> 
             <th >produits</th>
             @foreach ($mouvements_1 as $item)
             <td>{{$item->produit->libelle}}</td>
             @endforeach
         </tr> 
         <tr> 
             <th >Date </th>
             @foreach ($mouvements_1 as $item)
             <td>{{$item->operation->date_operation}}</td>
             @endforeach
         </tr>    
             
         <tr> 
             <th >Operation </th>
             @foreach ($mouvements_1 as $item)
             <td>{{$item->operation->libelle}}</td> 
             @endforeach
         </tr>  
         <tr> 
             <th >Quantite </th>
             @foreach ($mouvements_1 as $item)
             <td>{{$item->quantite_en_stock}}</td> 
             @endforeach
         </tr> 
         </tbody>
       </table>
       <table class="table table-dark table-striped">
        <h1>transaction Magasin 2</h1>
        <h2 class="text-primary">Nombre de produit : {{$nombreDeMouvements_2}}</h2>
         <tbody>
          <tr> 
             <th >produits</th>
             @foreach ($mouvements_2 as $item)
             <td>{{$item->produit->libelle}}</td>
             @endforeach
         </tr> 
         <tr> 
             <th >Date </th>
             @foreach ($mouvements_2 as $item)
             <td>{{$item->operation->date_operation}}</td>
             @endforeach
         </tr>    
             
         <tr> 
             <th >Operation </th>
             @foreach ($mouvements_2 as $item)
             <td>{{$item->operation->libelle}}</td> 
             @endforeach
         </tr>  
         <tr> 
             <th >Quantite </th>
             @foreach ($mouvements_2 as $item)
             <td>{{$item->quantite_en_stock}}</td> 
             @endforeach
         </tr> 
         </tbody>
       </table>
       <table class="table table-dark table-striped">
        <h1>transaction Magasin 3</h1>
        <h2 class="text-primary">Nombre de produit : {{$nombreDeMouvements_3}}</h2>
         <tbody>
          <tr> 
             <th >produits</th>
             @foreach ($mouvements_3 as $item)
             <td>{{$item->produit->libelle}}</td>
             @endforeach
         </tr> 
         <tr> 
             <th >Date </th>
             @foreach ($mouvements_3 as $item)
             <td>{{$item->operation->date_operation}}</td>
             @endforeach
         </tr>    
             
         <tr> 
             <th >Operation </th>
             @foreach ($mouvements_3 as $item)
             <td>{{$item->operation->libelle}}</td> 
             @endforeach
         </tr>  
         <tr> 
             <th >Quantite </th>
             @foreach ($mouvements_3 as $item)
             <td>{{$item->quantite_en_stock}}</td> 
             @endforeach
         </tr> 
         </tbody>
       </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
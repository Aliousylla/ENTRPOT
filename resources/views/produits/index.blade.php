@extends('layoute/layout')
@section('titre')
Liste des produits
@endsection

    
   @section('tableau')
   
   <table class="table table-bordered  " id="datatable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th scope="col">Code barre</th>
        <th scope="col">libelle</th>
        <th scope="col">Prix unitaire</th>
        <th scope="col">Quantité en stock</th>   
        <th scope="col">Fournisseur</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
          <th scope="col">Code barre</th>
          <th scope="col">libelle</th>
          <th scope="col">Prix unitaire</th>
          <th scope="col">Quantité en stock</th>   
          <th scope="col">entrepot</th>
          <th scope="col">Action</th>
        </tr>
    </tfoot>
    <tbody>
      @foreach($produits as $produit)
      <tr>
        <th scope="row">{!!DNS1D::getBarcodeHTML($produit->id,'CODABAR',4,50)!!} </th>
        <td>{{ $produit->libelle }}</td>
        <td>{{ $produit->prix_unitaire }}</td>
        <td>{{ $produit->quantite_en_stock }}</td>
        <td>{{ $produit->fournisseur->nom_societe}}</td>
        {{-- <td>{{ $produit->entrepot->id}}</td> --}}
        <td>

          <div class="btn-group" role="group" aria-label="Basic example">

            {{-- <button href="{{ route('produits.edit', $produit->id)}}" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa fa-eyedropper" aria-hidden="true"></i></button> --}}
            
            <a style=" background: rgb(255, 187, 0); color: rgb(0, 0, 0) " href="{{ route('produits.show', $produit->id) }}" class="btn btn-"><i class="fa fa-eye" aria-hidden="true"></i></a>
            
            <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display: inline-block;">
              @csrf
              @method('DELETE')
              <button type="reset" onclick="return " class="btn btn-danger p-2" data-bs-toggle="modal" data-bs-target="#destroytModal" ><i class="fa fa-trash" aria-hidden="true"></i></button>
            </form>
    
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
   @endsection


   @section('bouton')
       <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Création d'un produit</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
  </head>
  <body>
    
    <div class="container">
      <button  style=" background: rgb(255, 187, 0); color: rgb(0, 0, 0) "type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#createModal">Créer un produit <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createModalLabel">Création d'un produit</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('produits.store') }}">
              @csrf

              <div class="form-group mb-3">
                <label for="libelle">nom du produit</label>
                <input value="{{ old('libelle') }}" type="text" name="libelle" id="libelle" class="form-control @error('libelle') is-invalid @enderror" required>
                <div class="invalid-feedback">
                  Veuillez entrer le nom du produit.
                </div>
                @error('libelle')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
        
              <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                <div class="invalid-feedback">
                  Veuillez entrer la description du produit.
                </div>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

      
        
              <div class="form-group mb-3">
                <label for="prix_unitaire">Prix unitaire</label>
                <input value="{{ old('prix_unitaire') }}" type="number" name="prix_unitaire" id="prix_unitaire" class="form-control @error('prix_unitaire') is-invalid @enderror" step="0.01" required>
                <div class="invalid-feedback">
                  Veuillez entrer le prix unitaire du produit.
                </div>
                @error('prix_unitaire')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
        
              <div class="form-group mb-3">
                <label for="quantite_en_stock">Quantité en stock</label>
                <input value="{{ old('quantite_en_stock') }}" type="number" name="quantite_en_stock" id="quantite_en_stock" class="form-control @error('quantite_en_stock') is-invalid @enderror" required>
                <div class="invalid-feedback">
                  Veuillez entrer la quantité en stock du produit.
                </div>
                @error('quantite_en_stock')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group mb-3">
                <label for="fournisseur_id">Fournisseur</label>
                <select name="fournisseur_id" id="fournisseur_id" class="form-control @error('fournisseur_id') is-invalid @enderror" required>
                  <option value="">Sélectionnez le Fournisseur</option>
                  @foreach($fournisseurs as $fournisseur)
                  <option value="{{ $fournisseur->id }}">{{ $fournisseur->nom_societe }}</option>
                  @endforeach
                </select>
                <div class="invalid-feedback">
                  Veuillez sélectionner le Fournisseur.
                </div>
                @error('fournisseur_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group mb-3">
                <label for="categorie_id">Categorie</label>
                <select name="categorie_id" id="categorie_id" class="form-control @error('categorie_id') is-invalid @enderror" required>
                  <option value="">Sélectionnez  categorie</option>
                  @foreach($categories as $categorie)
                  <option value="{{ $categorie->id }}">{{ $categorie->nom_categorie }}</option>
                  @endforeach
                </select>
                <div class="invalid-feedback">
                  Veuillez sélectionner le categorie.
                </div>
                @error('categorie_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Créer</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>





    document.getElementById('entrepot_id').addEventListener('change', function() {
    var entrepotId = this.value; 
    fetch('/lieux-stockage/' + entrepotId)
        .then(response => response.json())
        .then(data => {
            var lieuStockageOptions = data.map(function(lieuStockage) {
                return '<option value="' + lieuStockage.id + '">' + lieuStockage.libelle + '</option>';
            });
            lieuStockageOptions.unshift('<option value="">Sélectionnez un lieu de stockage</option>');
            document.getElementById('lieu_stockage_id').innerHTML = lieuStockageOptions.join('');
        })
        .catch(error => {
            console.error('Une erreur s\'est produite:', error);
        });
});

document.getElementById('lieu_stockage_id').addEventListener('change', function() {
    var lieuStockageId = this.value; 
    var emplacementSelect = document.getElementById('emplacement_id');
    emplacementSelect.innerHTML = '<option value="">Chargement des emplacements...</option>';

    fetch('/emplacements/' + lieuStockageId)
        .then(response => response.json())
        .then(data => {
          console.log(data)
            var emplacementOptions = data.map(function(emplacement) {
                return '<option value="' + emplacement.id + '">' + emplacement.libelle + '</option>';
            });

            emplacementSelect.innerHTML = '<option value="">Sélectionnez un emplacement</option>' + emplacementOptions.join('');
        })
        .catch(error => {
            console.error('Une erreur s\'est produite:', error);
            emplacementSelect.innerHTML = '<option value="">Erreur lors du chargement des emplacements</option>';
        });
});


 

</script>

  </body>
</html>


   @endsection
       
   <!doctype html>
   <html lang="en">
   <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>Pharmatix</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   </head>
   <body>       
              
   {{-- destroytModal --}}
   <div class="modal fade" id="destroytModal" tabindex="-1" aria-labelledby="destroytModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="destroytModalLabel">Supprimer le produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="#destroytModal modal-sm"><form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger p-2" >Supprimer</button>
      </form>
    </div>
            </div>
        </div>
    </div>
</div>

 
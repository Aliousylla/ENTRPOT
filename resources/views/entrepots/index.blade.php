@extends('layoute/layout')
@section('titre')
Liste des entrepots
@endsection

    
   @section('tableau')
   <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom de l'entrepot</th>  
        <th scope="col">Adresse</th>
        <th scope="col">Type d'entrepot</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom de l'entrepot</th>  
        <th scope="col">Adresse</th>
        <th scope="col">Type d'entrepot</th>
        <th scope="col">Action</th>
      </tr>
    </tfoot>
    <tbody>
      @foreach($entrepots as $entrepot)
      <tr>
        <th scope="row">{{ $entrepot->id }}</th>
        <td>{{ $entrepot->libelle }}</td>
        
        <td>{{ $entrepot->adresse }}</td>
        <td>{{ $entrepot->type }}</td>
        <td>
          {{-- <a href="{{ route('entrepots.edit', $entrepot->id) }}" class="btn btn-primary">Modifier</a> --}}


            <div class="btn-group" role="group" aria-label="Basic example">
            <button  style=" background: rgb(255, 187, 0); color: rgb(0, 0, 0) "type="button" class="btn btn" data-bs-toggle="modal" data-bs-target="#editModal">Editer</button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#destroytModal"><i class="fa fa-trash" aria-hidden="true"></i></button>
        
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
    <title>Ajout d'un entrepot</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
  </head>
  <body>
    
    <div class="container">
      <button style=" background: rgb(255, 187, 0); color: rgb(0, 0, 0) " type="button" class="btn btn" data-bs-toggle="modal" data-bs-target="#createModal">Ajouter un entrepot <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createModalLabel">Ajout d'un entrepot</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('entrepots.store') }}">
              @csrf

              <div class="form-group mb-3">
                <label for="libelle">Nom de l'entrepot</label>
                <input value="{{ old('libelle') }}" type="text" name="libelle" id="libelle" class="form-control @error('libelle') is-invalid @enderror" required>
                <div class="invalid-feedback">
                  Veuillez entrer le nom du societe.
                </div>
                @error('libelle')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
        
              
        
              <div class="form-group mb-3">
                <label for="adresse">Adresse</label>
                <input value="{{ old('adresse') }}" type="text" name="adresse" id="adresse" class="form-control @error('adresse') is-invalid @enderror" required>
                <div class="invalid-feedback">
                  Veuillez entrer l'adresse 
                </div>
                @error('adresse')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
        
              <div class="form-group mb-3">
                <label for="type">type</label>
                <input value="{{ old('type') }}" type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
                <div class="invalid-feedback">
                  Veuillez entrer le type.
                </div>
                @error('type')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>            
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button  style=" background: rgb(255, 187, 0); color: rgb(0, 0, 0) "type="submit" class="btn btn">Créer</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

   @endsection
   <!doctype html>
   <html lang="en">
   <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>Editer</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   </head>
   <body>
       
   <div class="container">
       <!-- Button trigger modal -->
       
   
       <!-- Modal -->
       <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="editModalLabel">Edition du entrepot</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                       <form method="POST" action="{{ route('entrepots.update', $entrepot->id) }}" class="needs-validation" novalidate>
                           @csrf
                           @method('PUT')
   
                           <div class="form-group mb-3">
                               <label for="libelle">Nom de l'entrepot</label>
                               <input value="{{ old('libelle', $entrepot->libelle) }}" type="text" name="libelle" id="libelle" class="form-control @error('libelle') is-invalid @enderror" required>
                               <div class="invalid-feedback">
                                   Veuillez entrer le libelle de l'entrepot.
                               </div>
                               @error('libelle')
                               <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                           </div>
                           
   
                         <div class="form-group mb-3">
                           <label for="adresse">Adresse</label>
                           <input value="{{ old('adresse', $entrepot->adresse) }}" type="text" name="adresse" id="adresse" class="form-control @error('adresse') is-invalid @enderror" required>
                           <div class="invalid-feedback">
                               Veuillez entrer le adresse.
                           </div>
                           @error('adresse')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>
                       <div class="form-group mb-3">
                         <label for="type">Type d'entrepot </label>
                         <input value="{{ old('type', $entrepot->type) }}" type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
                         <div class="invalid-feedback">
                             Veuillez entrer le type d'entrepot  .
                         </div>
                         @error('type')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                     </div>
                     
                           <button style=" background: rgb(255, 187, 0); color: rgb(0, 0, 0) " type="submit" class="btn btn">Modifier</button>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>
   

   <div class="container">
    <!-- Button trigger modal -->
    

    <!-- Modal -->
    <div class="modal fade" id="destroytModal" tabindex="-1" aria-labelledby="destroytModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="destroytModalLabel">Supprimer le entrepot</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <div class="#destroytModal modal-sm"><form action="{{ route('entrepots.destroy', $entrepot->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger p-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce médicament ?')">Supprimer</button>
          </form>
        </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
    </body>
   </html>

 

 
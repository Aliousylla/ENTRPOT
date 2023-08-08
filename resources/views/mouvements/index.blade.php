@php
    use Carbon\Carbon;
    
@endphp
@extends('layoute/layout')
@section('titre')
Les transactions
@endsection

    
   @section('tableau')
   <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Magasin</th>
        <th scope="col">Operation </th>
        <th scope="col">Date operation</th>
        <th scope="col">Type </th> 
        <th scope="col">Nombre de produit livree</th> 
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Magasin</th>
        <th scope="col">Operation </th>
        <th scope="col">Date operation</th>
        <th scope="col">Type </th> 
        <th scope="col">Nombre de produit livree</th> 
        <th scope="col">Action</th>
      </tr>
    </tfoot>
    <tbody>
     
      @foreach($mouvements  as $mouvement)
     
      <tr>
        <th scope="row">{{ $mouvement->id }}</th>
        <td>
           {{ $mouvement->operation->libelle}}
       </td>
        <td>{{ Carbon::parse($mouvement->operation->date_operation)->locale('fr')->format('d - F - Y ') }}</td>
        <td>{{ $mouvement->operation->typeoperation->libelle }}</td>
        <td>4</td>       
   
        <td>
          <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('mouvements.show', $mouvement->id)}}"  class="btn btn-primary">Details</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#destroytModal"><i class="fa fa-trash" aria-hidden="true"></i></button>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
   @endsection


   @section('bouton')
    <div class="container">
      <a  href="mouvements/create"type="button" class="btn btn-primary"  >Ajouter des mouvements <i class="fa fa-plus-circle" aria-hidden="true"></i>
      </a>
    </div>
   @endsection

 
   <script>
   
   </script>
   
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
   
   <!-- Language -->
   <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"></script>
  </body>
   </html>

 

 
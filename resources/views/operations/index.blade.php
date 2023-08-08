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
        <th scope="col">Entrepot</th>
        <th scope="col">Type entrepot</th>
        <th scope="col">Operation </th>
        <th scope="col">Date operation</th>
        <th scope="col">Type </th> 
        <th scope="col">Nombre de produit</th> 
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Entrepot</th>
        <th scope="col">Type entrepot</th>
        <th scope="col">Operation </th>
        <th scope="col">Date operation</th>
        <th scope="col">Type </th> 
        <th scope="col">Nombre de produit </th> 
        <th scope="col">Action</th>
      </tr>
    </tfoot>
    <tbody>
      
     
      @foreach($operations  as $operation)
     
      <tr>
        <th scope="row">{{ $operation->id }}</th>
        <td>
          @if ($operation->mouvements->isNotEmpty()) {{ $operation->mouvements->first()->entrepot->libelle }}
      @endif
      </td>
      <td>
        {{-- {{ $operation->mouvements->first()->entrepots->type }} --}}
      </td>
        <td>
           {{ $operation->libelle}}
       </td>
        <td>{{ Carbon::parse($operation->date_operation)->locale('fr')->format('d - F - Y ') }}</td>
        <td>
          
          @if ($operation->typeOperation)
          {{ $operation->typeOperation->libelle }}
      @else
          N/A
      @endif
        </td>
        <td>{{$operation->mouvements->count()}}</td>       
   

        <td>
          <div class="btn-group" role="group" aria-label="Basic example">
            <a style=" background: rgb(255, 187, 0); color: rgb(0, 0, 0) " href="{{ route('operations.show', $operation->id)}}"  class="btn btn">Details</a>
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
      <a  style=" background: rgb(255, 187, 0); color: rgb(0, 0, 0) " href="operations/create"type="button" class="btn btn"  >Ajouter des operations <i class="fa fa-plus-circle" aria-hidden="true"></i>
      </a>
    </div>
   @endsection

 
   <script>
   
   </script>
   
     </body>
   </html>

 

 
@php
    use Carbon\Carbon;
    
@endphp
@extends('layoute/layout')
@section('card')
<div class="row">
    @php
    use App\Models\Entrepot;
    use App\Models\Mouvement;
    use App\Models\produit;
    use App\Models\Fournisseur;
   
    $entrepots= Entrepot::all()->count();
    $produits= produit::all()->count();
    $fournisseurs= Fournisseur::all()->count();
    
@endphp
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Médicaments</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$produits}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-shopping-cart fa-2x text-gray-300"></i>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Fournisseur</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$fournisseurs}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-truck fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Employés</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Entrepots</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $entrepots }} </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
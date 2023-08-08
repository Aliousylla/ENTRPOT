

<ul class="navbar-nav  sidebar sidebar accordion" id="accordionSidebar" style=" background: rgb(255, 187, 0) !important; color: rgb(0, 0, 0) !important ">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ asset('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-0">
            
        </div>
        <div class="sidebar-brand-text mx-3"><img class="img-fluid" src="{{ asset('img/dingqi-logo.jpg') }}" alt=""> <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ asset('dashboard')}}">
            <i class="fa fa-home fa-fw"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ asset('produits')}}">
            <i class="fa fa-tags"></i>
            <span>Produit</span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Operations</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opération</h6>
                <a class="collapse-item" href="{{ asset('operations/create')}}">Nouvelle Opération</a>
                <a class="collapse-item" href="{{ asset('operations')}}">Facture client</a>
                <a class="collapse-item" href="{{ asset('operations')}}">Facture Fournisseur</a>
                <a class="collapse-item" href="{{ asset('operations')}}">Bon de retour</a>
                <a class="collapse-item" href="{{ asset('operations')}}">Bon de livraison</a>
                <a class="collapse-item" href="{{ asset('operations')}}">Bonus</a>
            </div>
        </div>
        
    </li>


    <li class="nav-item">
        <a class="nav-link" href="{{ asset('operations') }}">
            <i class="fa fa-shopping-cart"></i>
            <span>Operation</span></a>
    </li>
    
    <!-- Nav Item - Utilities Collapse Menu -->
    
    
    <li class="nav-item">
        <a class="nav-link" href="{{ asset('typeoperations') }}">
            <i class="fa fa-database"></i>
            <span>Types d'operations</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ asset('entrepots') }}">
            <i class="fa fa-archive"></i>
            <span>Entrepot</span></a>
    </li>
    <!-- Divider -->
    

    <!-- Heading -->
    

    <!-- Nav Item - Pages Collapse Menu -->
   

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ asset('fournisseurs') }}">
            <i class="fa fa-truck"></i>
            <span>Fournisseur</span></a>
    </li>
    
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ asset('employes') }}">
            <i class="fa fa-users"></i>
            <span>Employe</span></a>
    </li>
    

    <li class="nav-item">
        <a class="nav-link" href="{{ asset('profile') }}">
            <i class="fa fa-cog"></i>
            <span>Comptes</span></a>
    </li>

    


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button  style=" background: rgb(0, 0, 0); color: rgb(231, 140, 20) "class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    

</ul>
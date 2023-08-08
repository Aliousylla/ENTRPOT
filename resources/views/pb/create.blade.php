<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pharmatix</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
  
    <div class="container text-center text-light bg-primary my-5 p-3">
        <h1>Page de transaction</h1>
    </div>
  
   
  
    <div class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded">
      
        <table class="table table-bordered" id="" width="100%" cellspacing="0">
            <thead>
                <tr>
                    
                    <th scope="col">#</th>
                    <th scope="col">Produits</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Entrepot</th>
                    <th scope="col">Operation</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <form action="{{ route('mouvements.store') }}" method="post">
                @csrf
                <tbody id="tbody">
                    
                    @for ($i = 0; $i < count(old('produit_id', [''])); $i++)
                    <tr>
                        <td><input type="hidden" name="produit_id[]" class="form-control produit_id" value="{{ old('produit_id.' . $i) }}"></td>
                        <td><input type="text" name="libelle[]" class="form-control search-input autocomplete" value="{{ old('libelle.' . $i) }}" autofocus></td>
                        <td><input type="text" name="prix_unitaire[]" class="form-control prix_unitaire" value="{{ old('prix_unitaire.' . $i) }}"></td>
                        <td>
                            <input type="number" name="quantite_en_stock[]" class="form-control quantite_en_stock" value="{{ old('quantite_en_stock.'. $i) }}">
                        </td>
                        <td>
                          <div class="mb-3">
                            <select class="form-select" aria-label="Default select enrepot" name="entrepot_id[]">
                                <option value="">Selectionner L'entrepot</option> 
                                @foreach($entrepots as $entrepot)
                                    <option value="{{ $entrepot->id}}">{{ $entrepot->type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td> 
                        <td><input type="text" name="operation_id[]" class="form-control operation_id" value="{{ $operations->id}} "></td>           
                     
                        <td><button type="button" id="add" class="btn btn-success">+</button></td>

                    </tr>
                    @endfor
                </tbody>
                <tfoot>
                    
                    <td>
                    <button type="button" id="submitBtn" class="btn btn-primary valider">Valider</button>
                  </td> 
                </tr>

                </tfoot>
            </form>
            
            
            
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var i = 1;
            var produitsSelectionnes = []
            $('#add').click(function() {
                i++;
                var newRow = '<tr id="row' + i + '">' + 
                '<td><input type="hidden" name="produit_id[]" class="form-control produit_id"></td>'+
                '<td><input type="text" name="libelle[]" class="form-control search-input autocomplete libelle"></td>' +
                '<td><input type="text" name="prix_unitaire[]" class="form-control prix_unitaire"></td>' +
                '<td><input type="text" name="quantite_en_stock[]" class="form-control quantite_en_stock"></td>' +
                '<td><div class="mb-3"><select class="form-select" aria-label="Default select enrepot" name="entrepot_id[]"><option selected>selectionner L\'entrepot</option>@foreach($entrepots as $entrepot)<option value="{{ $entrepot->id }}">{{ $entrepot->type }}</option>@endforeach</select></div></td>'+
                '<td><input type="text" name="operation_id[]" class="form-control operation_id" value="{{ $operations->id }}"></td>' + 
                '<td><button type="button" id="' + i + '" class="btn btn-danger remove_row">-</button></td>' +
                '</tr>';
                $('#tbody').append(newRow);
                initAutocomplete();
            });

            $(document).on('click', '.remove_row', function() {
                var row_id = $(this).attr("id");
                $('#row' + row_id).remove();
            });

            function initAutocomplete() {
                $('.autocomplete').autocomplete({
                    source: function(request, response) {
                        var term = request.term;
                        fetch("{{ route('searchproduitAutocomplete') }}?term=" + term)
                            .then(response => response.json())
                            .then(function(data) {
                            response(data.map(item => ({ value: item, label: item.libelle, prix_unitaire: item.prix_unitaire,produit_id: item.id})));
                                
                            });
                    },
                    minLength: 1,
                    select: function(event, ui) {
                        $(this).val(ui.item.label);
                        $(this).data('prix', ui.item.prix_unitaire);
                        $(this).closest('tr').find('.prix_unitaire').val(ui.item.prix_unitaire);
                        $(this).closest('tr').find('.produit_id').val(ui.item.produit_id);

                        return false;
                    }
                });
            }

            // Initialiser l'autocomplétion pour le premier formulaire existant
            initAutocomplete();

  
@foreach ($produits as $index => $produit)
    @php
        $quantiteEnStock = $produit->quantite_en_stock;
    @endphp
    $('#row{{ $index + 1 }} .quantite_en_stock').val('{{ $quantiteEnStock }}');
@endforeach


$('#submitBtn').click(function() {
    var form = $('<form></form>').attr('action', "{{ route('mouvements.store') }}").attr('method', 'post');
    form.append($('<input>').attr('type', 'hidden').attr('name', '_token').val('{{ csrf_token() }}'));

    $('#tbody tr').each(function() {
        var produitId = $(this).find('.produit_id').val();
        var libelle = $(this).find('.search-input').val();
        var prixUnitaire = $(this).find('.prix_unitaire').val();
        var quantiteEnStock = parseInt($(this).find('.quantite_en_stock').val()); // Convertir la valeur en nombre entier
        var operationId = $(this).find('.operation_id').val();
        var entrepotId = $(this).find('.form-select').val();

        form.append($('<input>').attr('type', 'hidden').attr('name', 'produit_id[]').val(produitId));
        form.append($('<input>').attr('type', 'hidden').attr('name', 'libelle[]').val(libelle));
        form.append($('<input>').attr('type', 'hidden').attr('name', 'quantite_en_stock[]').val(quantiteEnStock));
        form.append($('<input>').attr('type', 'hidden').attr('name', 'operation_id[]').val(operationId));
        form.append($('<input>').attr('type', 'hidden').attr('name', 'entrepot_id[]').val(entrepotId));
    });

    $('body').append(form);
    form.submit();
});

});    
    </script>

</body>
</html>

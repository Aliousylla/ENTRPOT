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
    <div class="container  text-black bg-warning my-5 p-3 col-4">
        <h1 class="text-center">Nouvelle operation</h1>
    
    <div class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded">
 <form action="{{ route('operations.store') }}" method="post">
                @csrf  
                 
                    <label class="form-labe" for="libelle">Nom client ou Magasin </label>
                                             
                    <input type="text" name="libelle" class="form-control libelle" >
                
                <label  class="form-labe" for="Info">Contact</label>
                
                    <input type="text" name="info" class="form-control info" >
    
               
                <label class="form-labe" for="type__operation_id"> Type d'operation</label> 
                
                    <select name="type__operation_id" id="type__operation_id" class="form-control " required>
                        <option value="">Sélectionnez le type operation</option>
                        @foreach($typeoperations as $typeoperation)
                        <option value="{{ $typeoperation->id }}">{{ $typeoperation->libelle }}</option>
                        @endforeach
                      </select>
        
            <button type="submit" id="submitBtn" class="btn btn-warning valider ">Valider</button>

            </form>
    </div>
</div>
    </body>
</html>

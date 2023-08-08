<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DINGQI</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    
    <div class="container shadow-lg p-3 mb-5 bg-body-tertiary rounded col-8">
        <div class="container text-center text-dark bg-warning my-5 p-3">
            <h1>Ajouter un type d'operation</h1>
        </div>
            
            <form action="{{ route('typeoperations.store') }}" method="post">
                @csrf
                
                    <div class="mb-3">
                      <label for="libelle" class="form-label">Type d'operation</label>
                      <input type="text" class="form-control" id="libelle" name="libelle">
                    </div>
                    <div class="mb-3">
                        <select name="flux" id="flux" class="form-control" required>
                            <option value="">Sélectionnez le Fluxr</option>
                           
                            <option value="Sortie">Sortie</option>
                            <option value="Entree">Entree</option>
                            
                          </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                 
                
            </form>
            
            
            
        
    </div>

   </body>
</html>

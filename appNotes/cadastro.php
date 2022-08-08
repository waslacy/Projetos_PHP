<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Notes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div class="container">
        <form class="form-cadastro m-auto" method="POST" action="postNota.php">
            <input type="text" placeholder="Titulo" class="form-control bg-transparent" name="title">
            <textarea class="form-control mt-3 bg-transparent" style="min-height: 200px;" placeholder="Texto" name="text"></textarea>

            <div class="row d-flex justify-content-around">
                <div class="col-md-3">
                    <button class="btn text-dark" id="button1">Salvar</button>
                </div>
                <div class="col-md-3">
                    <button class="btn" onclick="descartaNota()" id="button2">Descartar</button>
                </div>
            </div>
        </fo>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>
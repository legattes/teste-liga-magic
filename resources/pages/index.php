<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Busca por cartas</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center align-self-center">
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <h1>Teste LigaMagic</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 offset-lg-1 col-md-4 offset-md-1 col-sm-6 col-xs-12">
                <form id="card-form" action="">
                    <div class="mb-3">
                        <label for="produto_nome" class="form-label">Nome da carta</label>
                        <input type="text" class="form-control" name="produto_nome">
                    </div>
                    <div class="mb-3">
                        <label for="user_token" class="form-label">Token da API</label>
                        <input type="text" class="form-control" name="user_token">
                    </div>
                    <button type="submit" id="btn-submit" class="btn btn-primary">Procurar</button>
                </form>
            </div>
            <div class="col-lg-4 offset-lg-3 col-md-4 offset-md-3 col-sm-6 col-xs-12 card-holder hidden">
                <div class="card" style="width:80%">
                    <img src="" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"></p>
                        <p class="card-text sub"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/scripts.js"></script>
</body>

</html>
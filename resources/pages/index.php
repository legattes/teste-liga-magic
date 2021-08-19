<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Busca por cartas</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <form id="card-form" action="">
                <div class="mb-3">
                    <label for="produto-nome" class="form-label">Nome da carta</label>
                    <input type="text" class="form-control" name="produto-nome">
                </div>
                <div class="mb-3">
                    <label for="user_token" class="form-label">Token da API</label>
                    <input type="text" class="form-control" name="user_token">
                </div>
                <button type="submit" id="btn-submit" class="btn btn-primary">Procurar</button>
            </form>
        </div>
        <div class="row">
            <div class="card" style="width: 30%;">
                <img src="/images/raio.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Raio</h5>
                    <p class="card-text">R$ 9,99</p>
                    <p class="card-text sub">Preço atualizado em 18/08/2021 às 23:32:00</p>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery-3.6.0.min.js"></script>

    <script>
        $('#card-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "http://localhost:8080/api/produto",
                type: 'get',
                contentType: 'application/json; charset=uft-8',
                data: $('form#card-form').serialize(),
                //data: {},
                cache: false
            }).done(function(Response) {
                alert(Response);
            }).fail(function() {
                alert('fail');
            });
        });
    </script>
</body>

</html>
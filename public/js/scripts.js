$('#card-form').submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: "/api/produto",
        type: 'get',
        contentType: 'application/json; charset=uft-8',
        data: $('form#card-form').serialize(),
        cache: false
    }).done(function (Response) {
        if (Response.responseJSON) {
            alert(Response.responseJSON.jsonError);
            return;
        }

        var d = new Date(Response.produto_updated_at);
        var data = d.toLocaleDateString().split('/');
        var hora = d.toLocaleTimeString().split(' ');

        $('.card-holder').removeClass('hidden');
        $('.card-img-top').attr('src', "/images/" + Response.produto_imagem);
        $('.card-title').text(Response.produto_nome);
        $('.card-text').text('R$ ' + Response.produto_preco);
        $('.card-text.sub').text("Preço atualizado em " + data[1] + '/' + data[0] + '/' + data[2] + " às " + hora[0]);
    }).fail(function (Response) {
        if (Response.responseJSON) {
            alert(Response.responseJSON.jsonError);
        }
    });
});
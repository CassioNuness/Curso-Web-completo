function exibirArtigo(id, callbackSucesso, callbackErro) {
    //logica: recupera o id via requisição http
    if (false) {
        callbackSucesso('funções de callback em JS', 'funçoes de callback são muito utilizadas...')
    } else {
        callbackErro('Erro ao recuperar os dados')
    }
}

var callbackSucesso = function(titulo, descricao) {
    document.write('<h1>' + titulo + '</h1>');
    document.write('<hr />');
    document.write('<p>' + descricao + '</p>')
}

var callbackErro = function(erro) {
    document.write('<p><b>Erro:</b>' + erro + '</p>')
} 

exibirArtigo(1, callbackSucesso, callbackErro);


//Funções de callback são funções passadas como argumentos para outras funções. Elas são chamadas de "callback" porque são chamadas de volta (ou executadas) dentro da função externa, geralmente quando uma operação assíncrona é concluída ou quando um evento ocorre.




















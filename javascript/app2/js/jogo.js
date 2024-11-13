// Capturar o nível da URL e definir o intervalo de criação dos mosquitos
function iniciarJogo() {
    var nivel = document.getElementById('nivel').value;

    if (nivel === '') {
        alert('Selecione um nível para iniciar o jogo');
        return false;
    }

    // Redireciona para app.html passando o nível na URL
    window.location.href = "app.html?nivel=" + nivel;  // Corrigido para passar 'nivel' corretamente
}

// Extrair o nível da URL e definir a velocidade do intervalo
var params = new URLSearchParams(window.location.search);
var nivel = params.get('nivel') || 'normal'; // Corrigido para capturar o 'nivel'
var mosquitoTempo = 1500;

if (nivel === 'normal') {
    mosquitoTempo = 1500;
} else if (nivel === 'dificil') {
    mosquitoTempo = 1000;
} else if (nivel === 'chucknorris') {
    mosquitoTempo = 750;
}

// Ajuste da área de jogo
var altura = 0;
var largura = 0;
var vidas = 1;
var tempo = 15;

function ajustaTamanhoPalcoJogo() {
    altura = window.innerHeight;
    largura = window.innerWidth;
}

ajustaTamanhoPalcoJogo();

// Cronômetro
document.getElementById('cronometro').innerHTML = tempo;
var cronometro = setInterval(function() {
    tempo -= 1;

    if (tempo < 0) {
        clearInterval(cronometro);
        clearInterval(criaMosquitoInterval);
        window.location.href = 'vitoria.html';
    } else {
        document.getElementById('cronometro').innerHTML = tempo;
    }
}, 1000);

// Criar posição aleatória para o mosquito
function posicaoRandomica() {
    if (document.getElementById('mosquito')) {
        document.getElementById('mosquito').remove();

        if (vidas > 3) {
            window.location.href = 'fim_de_jogo.html';
        } else {
            document.getElementById('v' + vidas).src = "imagens/coracao_vazio.png";
            vidas++;
        }
    }

    var mosquito = document.createElement('img');
    mosquito.src = 'imagens/mosquito.png';
    mosquito.className = tamanhoAleatorio() + ' ' + ladoAleatorio();
    mosquito.style.position = 'absolute';
    mosquito.id = 'mosquito';
    mosquito.onclick = function() {
        this.remove();
    };

    // Adiciona o mosquito no body e calcula a posição aleatória com base nas dimensões do mosquito
    document.body.appendChild(mosquito);
    var mosquitoWidth = mosquito.offsetWidth;
    var mosquitoHeight = mosquito.offsetHeight;

    var posicaoX = Math.max(0, Math.floor(Math.random() * (largura - mosquitoWidth)));
    var posicaoY = Math.max(0, Math.floor(Math.random() * (altura - mosquitoHeight)));

    mosquito.style.left = posicaoX + 'px';
    mosquito.style.top = posicaoY + 'px';
}

// Intervalo de criação dos mosquitos ajustado pelo nível
var criaMosquitoInterval = setInterval(posicaoRandomica, mosquitoTempo);

// Funções auxiliares para definir tamanho e lado do mosquito
function tamanhoAleatorio() {
    var classe = Math.floor(Math.random() * 3);
    switch (classe) {
        case 0: return 'mosquito1';
        case 1: return 'mosquito2';
        case 2: return 'mosquito3';
    }
}

function ladoAleatorio() {
    var classe = Math.floor(Math.random() * 2);
    switch (classe) {
        case 0: return 'ladoA';
        case 1: return 'ladoB';
    }
}

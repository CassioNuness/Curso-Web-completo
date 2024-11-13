// Declara a função chamada 'soma'
function soma() {
    // Inicializa uma variável 'resultado' com o valor 0
    var resultado = 0;

    // Itera sobre todos os argumentos passados para a função usando um loop 'for...in'
    for (var i in arguments) {
        // Adiciona o valor do argumento atual a 'resultado'
        // 'arguments[i]' acessa o i-ésimo argumento passado para a função
        resultado += arguments[i];
    }

    // Retorna o valor final de 'resultado'
    return resultado;
}

// Chama a função 'soma' com vários argumentos e imprime o resultado no console
console.log(soma(7, 05, 3.2, 0.8, 'Texto'));

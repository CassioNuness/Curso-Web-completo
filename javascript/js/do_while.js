// Inicializa a variável x com o valor 11
var x = 11;

// Início do laço do...while
do {
    // Verifica se x é igual a 12
    if (x === 12) {
        // Incrementa x em 1 para evitar loop infinito
        x++;
        // Se x for igual a 12, pula a iteração atual e vai para a próxima
        continue;
    }

    // Verifica se x é igual a 15
    if (x === 15) {
        // Se x for igual a 15, interrompe o laço
        break;
    }

    // Escreve o valor de x no documento HTML e pula uma linha
    document.write(x + '<br />');

    // Incrementa x em 1
    x++;

} while (x <= 15); // Continua o laço enquanto x for menor ou igual a 15

// Escreve "Laço terminado" no documento HTML e pula uma linha
document.write('Laço terminado <br />');

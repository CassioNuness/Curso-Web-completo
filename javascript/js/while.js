// Declaração de uma variável x e atribuição do valor 1 a ela
var x = 1;

// Escreve "início" no documento HTML e pula uma linha
document.write('início <br />');

// Início do laço while que continuará enquanto x for menor ou igual a 10
while(x <= 10) {
    // Incrementa o valor de x em 1
    x++;

    // Verifica se o valor de x é igual a 5
    if(x === 5){
        // Se x for igual a 5, continue para a próxima iteração do laço, pulando o resto do código dentro do laço para esta iteração
        continue;
    }

    // Escreve o valor atual de x no documento HTML e pula uma linha
    document.write(x + '<br />'); 
}

// Escreve "fim" no documento HTML e pula uma linha
document.write('fim <br />');

// Cria um array vazio chamado lista_frutas
var lista_frutas = Array();

// Adiciona elementos ao array
lista_frutas[0] = 'Banana';
lista_frutas[1] = 'Maça';
lista_frutas[2] = 'Morango';
lista_frutas[3] = 'Uva';

// Inicializa a variável y com valor 0
var y = 0;

// Inicia um loop while que continua enquanto y for menor que o comprimento do array lista_frutas
while (y < lista_frutas.length) {
  // Escreve o elemento atual do array no documento HTML, seguido por uma quebra de linha
  document.write(lista_frutas[y] + '<br />');

  // Incrementa y em 1
  y++;
}

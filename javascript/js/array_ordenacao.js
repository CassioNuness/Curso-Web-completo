// Declara uma variável chamada 'lista_frutas' como um array
// var lista_frutas = Array();

// // Adiciona frutas ao array 'lista_frutas' em índices diferentes
// lista_frutas[0] = 'Maçã';
// lista_frutas[1] = 'Uva';
// lista_frutas[2] = 'Banana';
// lista_frutas[3] = 'Morango';

// // Ordena os elementos do array 'lista_frutas' em ordem alfabética
// console.log(lista_frutas.sort()); // ['Banana', 'Maçã', 'Morango', 'Uva']

// Declara uma variável chamada 'lista_numeros' como um array
var lista_numeros = Array();

// Adiciona números ao array 'lista_numeros' em índices diferentes
lista_numeros[0] = 12;
lista_numeros[1] = 40;
lista_numeros[2] = 3;
lista_numeros[3] = 7;
lista_numeros[4] = 19;
lista_numeros[5] = 1;

// Ordena os elementos do array 'lista_numeros' usando a função de comparação 'ordenaNumeros'
console.log(lista_numeros.sort(ordenaNumeros)); // [1, 3, 7, 12, 19, 40]

// Define a função de comparação 'ordenaNumeros' para ordenar os números
function ordenaNumeros(a, b) {
    return a - b;
    // se 'a - b' for > 0, 'a' será ordenado depois de 'b'
    // se 'a - b' for < 0, 'a' será ordenado antes de 'b'
    // se 'a - b' for == 0, a ordem de 'a' e 'b' será mantida
}

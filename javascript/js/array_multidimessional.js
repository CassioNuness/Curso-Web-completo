// Declara uma variável chamada 'lista_coisas' como um array
var lista_coisas = Array();

// Adiciona um array de frutas ao array 'lista_coisas' na chave 'frutas'
lista_coisas['frutas'] = Array('Banana', 'Maçã', 'Morango', 'Uva');

// Adiciona um array vazio ao array 'lista_coisas' na chave 'pessoas'
lista_coisas['pessoas'] = [];

// Adiciona elementos ao array 'pessoas' com chaves não numéricas (como se fosse um objeto)
lista_coisas['pessoas']['a'] = 'João';
lista_coisas['pessoas']['b'] = 'José';
lista_coisas['pessoas']['c'] = 'Maria';

// Escreve o valor associado à chave 'b' do array 'pessoas' no documento HTML
document.write(lista_coisas['pessoas']['b']); // Isso exibirá 'José'

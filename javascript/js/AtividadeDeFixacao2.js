// Criação de um array com os nomes dos funcionários
var listaFuncionarios = ['Viviane', 'Rosângela', 'Lucas', 'Fernanda'];

// Usando o laço for para iterar sobre o array
for (var i = 0; i < listaFuncionarios.length; i++) {
    // A variável 'valor' armazena o elemento atual do array no índice 'i'
    var valor = listaFuncionarios[i];

    // Exibe no documento HTML o índice e o valor correspondente do array
    document.write('Índice = ' + i + ' | Valor = ' + valor + '<br />');
}


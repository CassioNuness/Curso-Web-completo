var listaFuncionarios = ['Viviane', 'Rosângela', 'Lucas', 'Fernanda'];

// Função que será passada para o forEach
var f = function(valor, indice) {
    document.write('Índice = ' + indice + ' | Valor = ' + valor + '<br />');
}

// Usando forEach para iterar sobre o array e imprimir cada elemento
listaFuncionarios.forEach(f);

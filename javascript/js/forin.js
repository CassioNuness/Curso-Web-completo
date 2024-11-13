// Criação de um array usando a função construtora Array
var listaConvidados = Array();

// Adicionando elementos ao array com diferentes tipos de índices
listaConvidados['a'] = 'Jorge';       // Índice string 'a'
listaConvidados[10] = 'Jamilton';     // Índice numérico 10
listaConvidados['zebra'] = 'José';    // Índice string 'zebra'
listaConvidados[-1] = 'Ana';          // Índice numérico negativo -1
listaConvidados[true] = 'Maria';      // Índice booleano true (convertido para string 'true')

// Loop for...in para iterar sobre as propriedades do array
for (var x in listaConvidados) {
    // Escreve no documento o índice e o valor correspondente do array
    document.write('Índice = ' + x + ' - Valor = ' + listaConvidados[x] + '<br />');
}

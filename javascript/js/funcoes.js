
//Funções com retorno: São aquelas que retornam um valor específico após sua execução. Você pode definir qual será esse valor utilizando a palavra-chave return.
//Funções void : São aquelas que não possuem uma instrução return, ou seja, elas não retornam um valor específico. Normalmente, essas funções são usadas para realizar uma tarefa ou operação sem a necessidade de retornar um resultado.

// Esta função que calcula a área de um terreno com base na largura e no comprimento fornecidos.
function calcularAreaTerreno (largura, comprimento) {
    // Calcula a área multiplicando a largura pelo comprimento.
    var area = largura * comprimento;

    // Retorna a área calculada.
    return area;
}

// Solicita a largura do terreno ao usuário e armazena o valor convertido em float.
var largura = parseFloat(prompt('Digite a largura do terreno em metros'));

// Solicita o comprimento do terreno ao usuário e armazena o valor convertido em float.
var comprimento = parseFloat(prompt('Digite o comprimento do terreno em metros'));

// Chama a função calcularAreaTerreno, passando a largura e o comprimento como argumentos, e armazena o resultado na variável area.
var area = calcularAreaTerreno(largura, comprimento);

// Escreve a mensagem com a área calculada na tela.
document.write('O terreno possui ' + area + ' metros quadrados');

















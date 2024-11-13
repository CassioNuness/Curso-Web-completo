// Cria um array de objetos com valores iniciais
var objetos = ['Cadeira', 'Impressora', 'Garfo'];

// Função para adicionar um objeto
function adicionarObjeto() {
    console.log("Função adicionarObjeto chamada"); // Log para debug
    // Recupera o valor do campo de texto
    var inputObjeto = document.getElementById('inputObjeto');
    var valor = inputObjeto.value.trim();

    // Verifica se o valor está vazio
    if (valor === '') {
        alert('Informe um valor válido');
        return;
    }

    // Verifica se o valor já existe no array de objetos
    if (objetos.includes(valor)) {
        alert('Objeto já foi adicionado');
    } else {
        // Adiciona o valor ao array de objetos
        objetos.push(valor);
        console.log('Objetos após adicionar:', objetos); // Log para debug

        // Limpa o campo de entrada de texto
        inputObjeto.value = '';
    }
}

// Função para ordenar os objetos
function ordenarObjetos() {
    console.log("Função ordenarObjetos chamada"); // Log para debug
    // Ordena o array de objetos em ordem alfabética
    objetos.sort();
    console.log('Objetos após ordenar:', objetos); // Log para debug
}

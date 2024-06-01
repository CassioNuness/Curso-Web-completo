// Função para solicitar a entrada do usuário e efetuar o cálculo
function calcular() {
    // Solicitar o primeiro número
    var num1 = parseFloat(prompt("Digite o primeiro número:"));

    // Solicitar a operação (soma ou subtração)
    var operacao = prompt("Digite 'soma' ou 'subtração' para a operação desejada:");

    // Solicitar o segundo número
    var num2 = parseFloat(prompt("Digite o segundo número:"));

    // Chamar a função para efetuar o cálculo com os parâmetros fornecidos
    var resultado = calculo(num1, num2, operacao);

    // Exibir o resultado para o usuário
    alert("O resultado da " + operacao + " entre " + num1 + " e " + num2 + " é: " + resultado);
}

// Função para efetuar o cálculo com base nos parâmetros fornecidos
function calculo(num1, num2, operacao) {
    if (operacao === "soma") {
        return num1 + num2;
    } else if (operacao === "subtração") {
        return num1 - num2;
    } else {
        // Se a operação inserida pelo usuário não for reconhecida, retornar uma mensagem de erro
        return "Operação inválida";
    }
}

// Chamada da função para iniciar a aplicação
calcular();

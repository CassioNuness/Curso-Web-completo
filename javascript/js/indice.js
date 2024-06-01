//recebe os parâmetros:

// Solicitar o nome da pessoa
var nome = prompt("Digite seu nome:");

// Solicitar a altura da pessoa em centímetros
var altura = prompt("Digite sua altura em centímetros:");

// Solicitar o peso da pessoa
var peso = prompt("Informe seu peso:");

// Converter as entradas para o tipo float
altura = parseFloat(altura);
peso = parseFloat(peso); 

// Converter a altura de centímetros para metros
var altura = altura / 100;

// Calcular o índice de massa corporal (IMC)
var imc = peso / (altura * altura);

// Classificar o IMC em faixas descritivas
var classificacao;
if (imc < 16) {
    classificacao = "Baixo peso muito grave";
} else if (imc >= 18 && imc <= 18.50) {
    classificacao = "Baixo peso";
} else if (imc >= 18.50 && imc <= 24.99) {
    classificacao = "Peso normal";
} else if (imc >= 25 && imc <= 29.99) {
    classificacao = "Sobrepeso";
} else if (imc >= 30 && imc <= 34.99) {
    classificacao = "Obesidade grau I";
} else if (imc >= 35 && imc <= 39.99) {
    classificacao = "Obesidade grau II";
} else {
    classificacao = "Obesidade grau III";
}

// Saída para o usuário
document.write(nome + " possui índice de massa corporal igual a " + imc.toFixed(2) + ", sendo classificado como: " + classificacao + ".");

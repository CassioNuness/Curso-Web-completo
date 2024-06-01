// Solicitar a idade ao usuário através de um prompt
var idade = prompt("Digite sua idade:");

// Converter a entrada do usuário para um número inteiro
idade = parseInt(idade);

// Verificar a faixa etária com base na idade informada
if (idade >= 0 && idade < 15) {
    document.write("Criança");
} else if (idade >= 15 && idade < 30) {
    document.write("Jovem");
} else if (idade >= 30 && idade < 60) {
    document.write("Adulto");
} else if (idade >= 60) {
    document.write("Idoso");
}



 // Seleciona o campo de entrada pelo ID
var input = document.getElementById("meuInput");

// Adiciona um evento de foco
input.addEventListener('focus', function() {
    input.style.backgroundColor = 'yellow';
})

// Adiciona um evento de perda de foco
input.addEventListener('blur', function() {
    var valor = input.value;
    if(valor.length < 3) {
        input.style.backgroundColor = 'red';
    } else {
        input.style.backgroundColor = 'green'
    }
})
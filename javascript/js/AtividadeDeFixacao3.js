// Inicializa o valor do multiplicador externo
var y = 1;

// Enquanto o multiplicador externo for menor ou igual a 10
while (y <= 10) {
    // Inicializa o valor do multiplicador interno
    var x = 1;
    
    // Enquanto o multiplicador interno for menor ou igual a 10
    while (x <= 10) {
        // Escreve a operação de multiplicação e o resultado no documento HTML
        document.write(y + ' x ' + x + ' = ' + (y * x) + '<br />');
        
        // Incrementa o multiplicador interno
        x++;
    }
    
    // Adiciona uma linha horizontal para separar as tabuadas
    document.write('<hr />');
    
    // Incrementa o multiplicador externo
    y++;
}

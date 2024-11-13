// Loop para cada número de 1 a 10
for (var y = 1; y <= 10; y++) {

    // Loop para cada multiplicação de 1 a 10
    for (var x = 1; x <= 10; x++) {
        // Escreve a multiplicação atual no documento HTML
        document.write(y + ' x ' + x + ' = ' + (y * x) + '<br />');
    }

    // Adiciona uma linha horizontal após cada tabuada
    document.write('<hr />');
}
f
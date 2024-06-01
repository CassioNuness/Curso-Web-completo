//3 escopos: global, função e o bloco

//Escopo Global: Este é o escopo mais amplo em JavaScript. As variáveis declaradas fora de qualquer função ou bloco de código são consideradas globais e podem ser acessadas de qualquer lugar no código, tanto dentro quanto fora de funções. Variáveis globais permanecem acessíveis ao longo de toda a execução do programa, o que significa que elas podem ser acessadas e modificadas de qualquer lugar no código. No entanto, o uso excessivo de variáveis globais pode levar a problemas de legibilidade, manutenção e até mesmo colisões de nomes, especialmente em projetos maiores.

//Escopo de Função: Variáveis declaradas dentro de uma função têm escopo local àquela função, o que significa que elas só podem ser acessadas dentro dessa função. Essas variáveis são chamadas de variáveis locais e não podem ser acessadas de fora da função onde foram declaradas. Isso ajuda a encapsular o código e evitar conflitos de nomes entre diferentes partes do programa. Além disso, quando uma função é chamada, um novo escopo é criado para ela, e as variáveis declaradas dentro dessa função existem apenas nesse escopo.

//Escopo de Bloco: O escopo de bloco foi introduzido no JavaScript com o ES6 (ECMAScript 2015). Antes do ES6, JavaScript não tinha escopo de bloco; as variáveis declaradas dentro de blocos de código ({ }) eram acessíveis em todo o escopo da função mais próxima. Com o ES6, a declaração let e const foi introduzida, que permite que as variáveis tenham escopo de bloco. Isso significa que as variáveis declaradas com let ou const só são acessíveis dentro do bloco onde foram declaradas. O escopo de bloco é útil para evitar vazamentos de variáveis e ajuda a escrever código mais seguro e previsível.


// Declara e atribui o valor 'Friends' à variável global 'serie'
var serie = 'Friends';

// Inicia um bloco condicional que sempre será executado porque a condição é true
if (true) {
    // Declara e atribui o valor 'Game of Thrones' à variável global 'serie2'
    var serie2 = 'Game of Thrones';
    // Escreve o valor da variável global 'serie' no documento
    document.write(serie);
}

// Escreve o valor da variável global 'serie2' no documento
document.write(serie2);
// Escreve uma quebra de linha no documento
document.write('<br />');

// Declara uma função chamada 'x'
function x() {
    // Declara e atribui o valor 'The Walking Dead' à variável local 'serie3'
    var serie3 = 'The Walking Dead';
    // Tenta escrever o valor da variável global 'serie' no documento
    document.write(serie);
    // Tenta escrever o valor da variável global 'serie2' no documento
    document.write(serie2);
}

// Chama a função 'x'
x();

// Escreve uma quebra de linha no documento
document.write('<br />');
// Tenta escrever o valor da variável local 'serie3' no documento, mas como é uma variável local, não está acessível neste escopo, então não renderiza nada
document.write(serie3);



// // Auim tem duas comparações que retornam true.
// if(2 == 2 && 3 >= 1 && "a" == "b"){ //caso haja uma expressão dentro da condição && que seja falso, assim toda a empressão irá retornar falso.
//     document.write("Verdadeiro<br>");
// } else {
//     document.write("Falso<br>");
// }

// // Se pelo menos um resultado do operador logico || na empressão retornar true, então toda a empressão será verdadeira.
// if(2 == 2 || 3 >= 1 || "a" == "b"){
//     document.write("Verdadeiro<br>");
// } else {
//     document.write("Falso<br>");
// }

// //O operador logico "!" inverte o resultado da empressão de comparação.
// if(!(4 >= 2)){
//     document.write("Verdadeiro<br>");
// } else {
//     document.write("Falso<br>");
// }


var nota = prompt("Digite a nota do aluno");
var faltas = prompt("Digite a quantidade de faltas");

var media = 7;
var faltas_maximas = 15;


// if (nota >= media && faltas <= faltas_maximas) {
//     document.write("Aprovado");
// } else {
//     document.write("Reprovado");
// }

//operador ternario

var resultado = (nota >= media && faltas <= faltas_maximas) ? 'Aprovado' : 'Reprovado';
document.write(resultado);

















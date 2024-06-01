// Definição da função que imprime as strings de duas em duas
function imprimirString(array) {
    // Loop começa do primeiro elemento (índice 0) até o penúltimo elemento (array.length - 2)
    for (let i = 1; i < array.length - 1; i++) {
      // Imprime a string atual (array[i]) seguida pela próxima string (array[i + 1]) separadas por uma vírgula
      console.log(array[i] + "," + array[i + 1]);
    }
  }
  
  // Array de strings fornecido como entrada
  const imprimir = ["A", "B", "C", "D", "E", "F"];
  
  // Chamada da função para imprimir as strings de duas em duas
  imprimirString(imprimir);
  
var parametro = 2;

// Início do switch: aqui definimos a expressão que será avaliada
switch (parametro) {
    // Caso o valor de parametro seja igual a 1
    case 1:
        // Se o valor for 1, este bloco de código será executado
        document.write('Parametro 1');
        // A palavra-chave 'break' é usada para sair do switch após o caso correspondente ser encontrado e executado
        break;

    // Caso o valor de parametro seja igual a 2
    case 2:
        // Se o valor for 2, este bloco de código será executado
        document.write('Parametro 2');
        // 'break' é usado para sair do switch
        break;

    // Caso nenhum dos casos anteriores seja verdadeiro
    default:
        // Se nenhum dos casos anteriores corresponder ao valor de parametro, este bloco de código será executado
        document.write('Default');
        // 'break' é usado para sair do switch
        break;
}

function calcular(tipo, valor){
    // Verifica se o tipo é uma ação (como operação ou limpar)
    if(tipo === 'acao') {
      // Se a ação for 'c', limpa o visor
      if(valor === 'c'){
        document.getElementById('resultado').value = ''
      }
      // Se a ação for uma operação, adiciona ao visor
      if(valor === '+' || valor === '-' || valor === '*' || valor === '/' || valor === '.'){
        document.getElementById('resultado').value += valor
      }
      // Se a ação for '=', avalia a expressão no visor e exibe o resultado
      if(valor === '=') {
        var valor_campo = eval(document.getElementById('resultado').value)
        document.getElementById('resultado').value = valor_campo
      }
    } else if (tipo === 'valor') {
      // Se o tipo for valor (número), adiciona ao visor
      document.getElementById('resultado').value += valor
    }
  }
  
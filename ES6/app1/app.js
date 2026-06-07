class Despesa {
  constructor(ano, mes, dia, tipo, descricao, valor) {
    this.ano = ano;
    this.mes = mes;
    this.dia = dia;
    this.tipo = tipo;
    this.descricao = descricao;
    this.valor = valor;
  }

  validarDados() {
    for (let i in this) {
      if (this[i] === undefined || this[i] === "" || this[i] === null) {
        return false;
      }
    }
    return true;
  }
}

class Bd {
  constructor() {
    let id = localStorage.getItem("id");

    if (id === null) {
      localStorage.setItem("id", 0);
    }
  }

  getProximoId() {
    let proximoId = localStorage.getItem("id");
    return parseInt(proximoId) + 1;
  }

  gravar(d) {
    let id = this.getProximoId();

    localStorage.setItem(id, JSON.stringify(d));
    localStorage.setItem("id", id);
  }

  recuperarTodosRegistros() {
    let despesas = Array();

    //console.log('estamos chegando até aqui');
    let id = localStorage.getItem("id");

    //recuperar todas as despesas cadastradas em localStorage
    for (let i = 1; i <= id; i++) {
      //recuperar despesas
      let despesa = JSON.parse(localStorage.getItem(i));

      //existe a possibilidade de haver índices que foram pulados/removidos
      if (despesa === null) {
        continue;
      }

      despesas.push(despesa);
    }
    //console.log(despesas);
    return despesas;
  }
}

let bd = new Bd();

function cadastrarDespesa() {
  let ano = document.getElementById("ano");
  let mes = document.getElementById("mes");
  let dia = document.getElementById("dia");
  let tipo = document.getElementById("tipo");
  let descricao = document.getElementById("descricao");
  let valor = document.getElementById("valor");

  let despesa = new Despesa(
    ano.value,
    mes.value,
    dia.value,
    tipo.value,
    descricao.value,
    valor.value,
  );

  if (despesa.validarDados()) {
    bd.gravar(despesa);

    document.getElementById("modalTitulo").innerHTML =
      "Registro inserido com sucesso";
    document.getElementById("modalTituloDiv").className =
      "modal-header text-success";
    document.getElementById("modalConteudo").innerHTML =
      "Despesa cadastrada com sucesso!";
    document.getElementById("modalBtn").className = "btn btn-success";
    document.getElementById("modalBtn").innerHTML = "Voltar";

    //dialog('Registro inserido com sucesso', 'Despesa cadastrada com sucesso!', 'success');
    $("#modalRegistraDespesa").modal("show");
  } else {
    document.getElementById("modalTitulo").innerHTML = "Erro na gravação";
    document.getElementById("modalTituloDiv").className =
      "modal-header text-danger";
    document.getElementById("modalConteudo").innerHTML =
      "Existem campos obrigatórios que não foram preenchidos.";
    document.getElementById("modalBtn").className = "btn btn-danger";
    document.getElementById("modalBtn").innerHTML = "Voltar e corrigir";

    //dialog('Erro na gravação', 'Existem campos obrigatórios que não foram preenchidos.', 'error');
    $("#modalRegistraDespesa").modal("show");
  }
}

function carregarListaDespesas() {
  let despesas = Array();

  despesas = bd.recuperarTodosRegistros();

  //selecionar o elemento tbody da tabela
  let listaDespesas = document.getElementById("listaDespesas");

  /*
                <tr id="listaDespesas">
                    <td>15/03/2018</td>
                    <td>Alimentação</td>
                    <td>McDonalds</td>
                    <td>R$ 32,00</td>
                    <!-- <td><button class="btn btn-danger"><i class="fas fa-times"></i></button></td> -->
              </tr>
    */

  //percorrer o array despesas, listando cada despesa de forma dinâmica
  despesas.forEach(function (d) {
    console.log(d);

    //criando a linha (tr)
    let linha = listaDespesas.insertRow();

    //criando as colunas (td)
    linha.insertCell(0).innerHTML = `${d.dia}/${d.mes}/${d.ano}`;
    linha.insertCell(1).innerHTML = d.tipo;

    //ajustar o tipo
    const tipos = [
      "",
      "Alimentação",
      "Educação",
      "Lazer",
      "Saúde",
      "Transporte",
    ];

    linha.insertCell(1).innerHTML = tipos[d.tipo];

    linha.insertCell(2).innerHTML = d.descricao;
    linha.insertCell(3).innerHTML = d.valor;
  });
}

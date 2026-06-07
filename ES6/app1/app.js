// Classe responsável por representar uma despesa
class Despesa {
  constructor(ano, mes, dia, tipo, descricao, valor) {
    this.ano = ano;
    this.mes = mes;
    this.dia = dia;
    this.tipo = tipo;
    this.descricao = descricao;
    this.valor = valor;
  }

  // Valida se todos os atributos foram preenchidos
  validarDados() {
    for (let i in this) {
      if (this[i] === undefined || this[i] === "" || this[i] === null) {
        return false;
      }
    }

    return true;
  }
}

// Classe responsável por manipular o LocalStorage
class Bd {
  constructor() {
    // Recupera o último id salvo
    let id = localStorage.getItem("id");

    // Caso não exista nenhum registro, cria o id inicial
    if (id === null) {
      localStorage.setItem("id", 0);
    }
  }

  // Retorna o próximo id disponível
  getProximoId() {
    let proximoId = localStorage.getItem("id");
    return parseInt(proximoId) + 1;
  }

  // Salva uma despesa no LocalStorage
  gravar(d) {
    let id = this.getProximoId();

    // Salva a despesa utilizando o id como chave
    localStorage.setItem(id, JSON.stringify(d));

    // Atualiza o último id utilizado
    localStorage.setItem("id", id);
  }

  // Recupera todas as despesas armazenadas
  recuperarTodosRegistros() {
    let despesas = Array();

    // Recupera o último id cadastrado
    let id = localStorage.getItem("id");

    // Percorre todos os registros do LocalStorage
    for (let i = 1; i <= id; i++) {
      // Recupera a despesa da posição atual
      let despesa = JSON.parse(localStorage.getItem(i));

      // Caso o registro tenha sido removido, ignora
      if (despesa === null) {
        continue;
      }

      // Adiciona a despesa ao array
      despesas.push(despesa);
    }

    return despesas;
  }

  pesquisar(despesa) {
     console.log(despesa);
  }

}

// Instancia do banco de dados
let bd = new Bd();

// Função responsável pelo cadastro da despesa
function cadastrarDespesa() {
  // Recupera os campos do formulário
  let ano = document.getElementById("ano");
  let mes = document.getElementById("mes");
  let dia = document.getElementById("dia");
  let tipo = document.getElementById("tipo");
  let descricao = document.getElementById("descricao");
  let valor = document.getElementById("valor");

  // Cria um objeto despesa
  let despesa = new Despesa(
    ano.value,
    mes.value,
    dia.value,
    tipo.value,
    descricao.value,
    valor.value,
  );

  // Valida os dados informados
  if (despesa.validarDados()) {
    // Salva a despesa
    bd.gravar(despesa);

    // Configura o modal de sucesso
    document.getElementById("modalTitulo").innerHTML =
      "Registro inserido com sucesso";

    document.getElementById("modalTituloDiv").className =
      "modal-header text-success";

    document.getElementById("modalConteudo").innerHTML =
      "Despesa cadastrada com sucesso!";

    document.getElementById("modalBtn").className = "btn btn-success";

    document.getElementById("modalBtn").innerHTML = "Voltar";

    // Exibe o modal
    $("#modalRegistraDespesa").modal("show");

    // Limpa os campos do formulário
    limparCampos();
  } else {
    // Configura o modal de erro
    document.getElementById("modalTitulo").innerHTML = "Erro na gravação";

    document.getElementById("modalTituloDiv").className =
      "modal-header text-danger";

    document.getElementById("modalConteudo").innerHTML =
      "Existem campos obrigatórios que não foram preenchidos.";

    document.getElementById("modalBtn").className = "btn btn-danger";

    document.getElementById("modalBtn").innerHTML = "Voltar e corrigir";

    // Exibe o modal
    $("#modalRegistraDespesa").modal("show");
  }
}

// Limpa todos os campos do formulário
function limparCampos() {
  document.getElementById("ano").value = "";
  document.getElementById("mes").value = "";
  document.getElementById("dia").value = "";
  document.getElementById("tipo").value = "";
  document.getElementById("descricao").value = "";
  document.getElementById("valor").value = "";
}

// Carrega as despesas cadastradas na tabela
function carregarListaDespesas() {
  // Recupera todas as despesas do LocalStorage
  let despesas = bd.recuperarTodosRegistros();

  // Seleciona o tbody da tabela
  let listaDespesas = document.getElementById("listaDespesas");

  // Mapeamento dos tipos
  const tipos = ["", "Alimentação", "Educação", "Lazer", "Saúde", "Transporte"];

  // Percorre cada despesa encontrada
  despesas.forEach(function (d) {
    // Cria uma nova linha na tabela
    let linha = listaDespesas.insertRow();

    // Coluna Data
    linha.insertCell(0).innerHTML = `${d.dia}/${d.mes}/${d.ano}`;

    // Coluna Tipo
    linha.insertCell(1).innerHTML = tipos[d.tipo];

    // Coluna Descrição
    linha.insertCell(2).innerHTML = d.descricao;

    // Coluna Valor
    linha.insertCell(3).innerHTML = d.valor;
  });
}

function pesquisarDespesa() {
  console.log("Pesquisar despesa");

  // Recupera os campos do formulário
  let ano = document.getElementById("ano").value;
  let mes = document.getElementById("mes").value;
  let dia = document.getElementById("dia").value;
  let tipo = document.getElementById("tipo").value;
  let descricao = document.getElementById("descricao").value;
  let valor = document.getElementById("valor").value;

  // Cria um objeto despesa com os dados de pesquisa
  let despesa = new Despesa(ano, mes, dia, tipo, descricao, valor);

    // Chama o método de pesquisa do banco de dados
    bd.pesquisar(despesa);
}

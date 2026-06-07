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

      // Adiciona o id da despesa para futuras referências
        despesa.id = i;

      // Adiciona a despesa ao array
      despesas.push(despesa);
    }

    return despesas;
  }

  // Pesquisa despesas com base nos filtros preenchidos
  pesquisar(despesa) {
    // Primeiro recupera todas as despesas cadastradas
    let despesasFiltradas = this.recuperarTodosRegistros();

    // Filtra por ano, se o campo foi preenchido
    if (despesa.ano !== "") {
      despesasFiltradas = despesasFiltradas.filter((d) => d.ano == despesa.ano);
    }

    // Filtra por mês, se o campo foi preenchido
    if (despesa.mes !== "") {
      despesasFiltradas = despesasFiltradas.filter((d) => d.mes == despesa.mes);
    }

    // Filtra por dia, se o campo foi preenchido
    if (despesa.dia !== "") {
      despesasFiltradas = despesasFiltradas.filter((d) => d.dia == despesa.dia);
    }

    // Filtra por tipo, se o campo foi preenchido
    if (despesa.tipo !== "") {
      despesasFiltradas = despesasFiltradas.filter(
        (d) => d.tipo == despesa.tipo,
      );
    }

    // Filtra por descrição, se o campo foi preenchido
    if (despesa.descricao !== "") {
      despesasFiltradas = despesasFiltradas.filter(
        (d) => d.descricao == despesa.descricao,
      );
    }

    // Filtra por valor, se o campo foi preenchido
     if (despesa.valor !== "") {
      despesasFiltradas = despesasFiltradas.filter(
        (d) => d.valor == despesa.valor
      );
    }

    return despesasFiltradas;
  }

    // Remove uma despesa do LocalStorage
    remover(id) {
        localStorage.removeItem(id);
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

// Carrega as despesas cadastradas ou filtradas na tabela
function carregarListaDespesas(despesas = Array(), filtro = false) {
  // Se não receber um array de despesas, carrega todas do LocalStorage
  if (despesas.length === 0 && filtro === false) {
    despesas = bd.recuperarTodosRegistros();
  }

  // Seleciona o tbody da tabela
  let listaDespesas = document.getElementById("listaDespesas");

  // Limpa a tabela antes de montar novamente
  // Isso evita duplicar linhas ao pesquisar
  listaDespesas.innerHTML = "";

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

    //criar o botão de exclusão
    let btn = document.createElement("button");
    btn.className = "btn btn-danger";
    btn.innerHTML = '<i class="fas fa-times"></i>';
    btn.id = `id_despesa_${d.id}`;
    btn.onclick = function () {
        //remover a despesa do LocalStorage
        let id = this.id.replace("id_despesa_", "");

        //alert(id);

        bd.remover(id);

        //recarregar a lista de despesas
        window.location.reload();
    }
    linha.insertCell(4).appendChild(btn);

    console.log(d);

  });
}

// Função responsável por pesquisar despesas
function pesquisarDespesa() {
  // Recupera os campos do formulário de consulta
  let ano = document.getElementById("ano").value;
  let mes = document.getElementById("mes").value;
  let dia = document.getElementById("dia").value;
  let tipo = document.getElementById("tipo").value;
  let descricao = document.getElementById("descricao").value;
  let valor = document.getElementById("valor").value;

  // Cria um objeto despesa com os dados de pesquisa
  let despesa = new Despesa(ano, mes, dia, tipo, descricao, valor);

  // Pesquisa as despesas com base nos filtros preenchidos
  let despesasFiltradas = bd.pesquisar(despesa);

  // Atualiza a tabela mostrando apenas as despesas filtradas
  carregarListaDespesas(despesasFiltradas, true);
}

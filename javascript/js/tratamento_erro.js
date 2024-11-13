  //netflix

    
// Declaração do array 'video' e inicialização de seus elementos
var video = Array();

video[1] = Array();
video[1]['nome'] = 'Fullmetal Alchemist';
video[1]['categoria'] = 'Anime';

// Função para obter informações do vídeo
function getVideo(video) {
    try {
        // Lógica para acessar informações do vídeo
        // Aqui, tenta acessar 'nome' do vídeo no índice 0, que não existe
        console.log(video[0]['nome']);
    } catch (erro) {
        // Chama a função 'tratarErro' passando o erro como argumento
        tratarErro(erro);
        // Exibe mensagem de erro amigável para o usuário
        console.log('Agora sim podemos tratar esse erro');
        // Lança uma nova exceção com uma mensagem customizada
        throw new Error('Houve um erro mas não se preocupe, estamos trabalhando nisso agora!');
    } finally {
        // Este bloco sempre é executado, independentemente de ter ocorrido um erro ou não
        console.log('Sempre passa por aqui (try / catch)');
    }

    // Esta linha não será executada se um erro for lançado no bloco 'catch'
    console.log('A aplicação não morreu');
}

// Função para tratar o erro e exibir informações sobre ele
function tratarErro(e) {
    console.log(e);
}

// Chama a função 'getVideo' com o array 'video'
getVideo(video);

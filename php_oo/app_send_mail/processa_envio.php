<?php

    // ======================================================
    // APP SEND MAIL - INTEGRAÇÃO COM PHPMAILER
    // ======================================================


    // ======================================================
    // IMPORTAÇÃO DOS ARQUIVOS DO PHPMAILER
    // ======================================================

    // Carrega as classes necessárias da biblioteca PHPMailer.
    //
    // require interrompe a execução do programa caso
    // algum desses arquivos não seja encontrado.

    // Classe responsável pelo tratamento de exceções.
    require "./bibliotecas/PHPMailer/Exception.php";

    // Classe relacionada à autenticação OAuth.
    require "./bibliotecas/PHPMailer/OAuth.php";

    // Classe principal da biblioteca PHPMailer.
    require "./bibliotecas/PHPMailer/PHPMailer.php";

    // Classe relacionada ao protocolo POP3.
    require "./bibliotecas/PHPMailer/POP3.php";

    // Classe responsável pela comunicação através do SMTP.
    require "./bibliotecas/PHPMailer/SMTP.php";


    // ======================================================
    // NAMESPACES
    // ======================================================

    // Importa a classe PHPMailer para que possamos
    // utilizá-la simplesmente como PHPMailer no código.
    use PHPMailer\PHPMailer\PHPMailer;

    // Importa a classe Exception utilizada pelo PHPMailer
    // para realizar o tratamento de possíveis erros.
    use PHPMailer\PHPMailer\Exception;


    // Utilizado anteriormente para verificar os dados
    // recebidos através do formulário.
    // print_r($_POST);


    // ======================================================
    // CLASSE MENSAGEM
    // ======================================================

    // Representa os dados da mensagem que será enviada.
    class Mensagem {

        // Atributos privados.
        //
        // Só podem ser acessados diretamente
        // de dentro da própria classe.
        private $para = null;
        private $assunto = null;
        private $mensagem = null;


        // Método mágico GET.
        //
        // Permite recuperar o valor de um atributo
        // da classe através do nome recebido.
        public function __get($atributo) {
            return $this->$atributo;
        }


        // Método mágico SET.
        //
        // Permite atribuir um valor a um atributo
        // da classe.
        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }


        // ==================================================
        // VALIDAÇÃO DA MENSAGEM
        // ==================================================

        // Verifica se os dados necessários para o envio
        // da mensagem foram preenchidos.
        public function mensagemValida() {

            // empty() verifica se determinado valor está vazio.
            //
            // O operador || significa OU.
            //
            // Portanto, se:
            // - para estiver vazio OU
            // - assunto estiver vazio OU
            // - mensagem estiver vazia
            //
            // a mensagem será considerada inválida.
            if(
                empty($this->para) ||
                empty($this->assunto) ||
                empty($this->mensagem)
            ) {
                return false;
            }

            // Se nenhum campo estiver vazio,
            // a mensagem é considerada válida.
            return true;
        }
    }


    // ======================================================
    // CRIAÇÃO DO OBJETO MENSAGEM
    // ======================================================

    // Instancia um objeto da classe Mensagem.
    $mensagem = new Mensagem();


    // ======================================================
    // RECEBENDO OS DADOS DO FORMULÁRIO
    // ======================================================

    // $_POST contém os dados enviados pelo formulário
    // através do método POST.

    // Define o destinatário.
    $mensagem->__set('para', $_POST['para']);

    // Define o assunto.
    $mensagem->__set('assunto', $_POST['assunto']);

    // Define o conteúdo da mensagem.
    $mensagem->__set('mensagem', $_POST['mensagem']);


    // Pode ser utilizado durante o desenvolvimento
    // para visualizar o conteúdo do objeto.
    // print_r($mensagem);


    // ======================================================
    // VALIDAÇÃO ANTES DO ENVIO
    // ======================================================

    // O operador ! significa NÃO.
    //
    // Portanto:
    //
    // !$mensagem->mensagemValida()
    //
    // significa:
    //
    // "Se a mensagem NÃO for válida..."
    if(!$mensagem->mensagemValida()) {

        echo 'Mensagem não é válida';

        // Interrompe imediatamente a execução do script.
        // Dessa forma, o PHPMailer nem será executado
        // caso os campos estejam incompletos.
        die();
    }


    // ======================================================
    // CRIAÇÃO DO OBJETO PHPMAILER
    // ======================================================

    // Cria uma instância da classe PHPMailer.
    //
    // O parâmetro true habilita o uso de Exceptions,
    // permitindo que erros sejam tratados pelo try/catch.
    $mail = new PHPMailer(true);


    // ======================================================
    // TRATAMENTO DE EXCEÇÕES
    // ======================================================

    // O código dentro do try será executado normalmente.
    //
    // Caso o PHPMailer gere uma exceção,
    // a execução será direcionada para o catch.
    try {


        // ==================================================
        // CONFIGURAÇÕES DO SERVIDOR SMTP
        // ==================================================

        // Ativa informações detalhadas de depuração.
        // Útil durante o desenvolvimento para visualizar
        // a comunicação realizada pelo PHPMailer.
        $mail->SMTPDebug = 2;


        // Informa ao PHPMailer que o envio
        // será realizado utilizando SMTP.
        $mail->isSMTP();


        // Endereço do servidor SMTP utilizado para enviar
        // os e-mails.
        //
        // Neste momento da aula ainda é um valor de exemplo.
        $mail->Host = 'smtp.example.com';


        // Ativa autenticação no servidor SMTP.
        $mail->SMTPAuth = true;


        // Usuário utilizado para autenticação no SMTP.
        $mail->Username = 'user@example.com';


        // Senha utilizada para autenticação no SMTP.
        $mail->Password = 'secret';


        // Define o tipo de criptografia utilizada
        // durante a comunicação com o servidor.
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;


        // Porta utilizada na conexão SMTP.
        //
        // A porta 587 normalmente é utilizada
        // em conexões STARTTLS.
        $mail->Port = 587;



        // ==================================================
        // DESTINATÁRIOS
        // ==================================================

        // Define quem está enviando o e-mail.
        $mail->setFrom('from@example.com', 'Mailer');


        // Adiciona um destinatário.
        $mail->addAddress(
            'joe@example.net',
            'Joe User'
        );


        // Adiciona outro destinatário.
        //
        // O nome é opcional.
        $mail->addAddress('ellen@example.com');


        // Define um endereço para receber respostas.
        $mail->addReplyTo(
            'info@example.com',
            'Information'
        );


        // Adiciona um destinatário em cópia (CC).
        $mail->addCC('cc@example.com');


        // Adiciona um destinatário em cópia oculta (BCC).
        $mail->addBCC('bcc@example.com');



        // ==================================================
        // ANEXOS
        // ==================================================

        // Adiciona um arquivo como anexo.
        $mail->addAttachment('/var/tmp/file.tar.gz');


        // Adiciona outro anexo e permite definir
        // um nome diferente para o arquivo no e-mail.
        $mail->addAttachment(
            '/tmp/image.jpg',
            'new.jpg'
        );



        // ==================================================
        // CONTEÚDO DO E-MAIL
        // ==================================================

        // Informa que o corpo do e-mail
        // poderá utilizar HTML.
        $mail->isHTML(true);


        // Define o assunto do e-mail.
        $mail->Subject = 'Here is the subject';


        // Define o conteúdo principal do e-mail em HTML.
        $mail->Body =
            'This is the HTML message body <b>in bold!</b>';


        // Define uma versão alternativa em texto simples.
        //
        // Ela pode ser utilizada por clientes de e-mail
        // que não conseguem exibir HTML.
        $mail->AltBody =
            'This is the body in plain text for non-HTML mail clients';



        // ==================================================
        // ENVIO
        // ==================================================

        // Tenta efetivamente enviar o e-mail.
        $mail->send();


        // Se chegou até aqui sem lançar uma exceção,
        // o envio foi realizado.
        echo 'Message has been sent';


    } catch (Exception $e) {

        // ==================================================
        // TRATAMENTO DE ERRO
        // ==================================================

        // Caso alguma exceção aconteça durante o envio,
        // o programa entra neste bloco.

        echo "Não foi possivel enviar este e-mail! 
              Por favor tente novamente mais tarde.";


        // Exibe informações técnicas sobre o erro
        // retornado pelo PHPMailer.
        //
        // Muito útil durante o desenvolvimento.
        echo 'Detalhes do erro: ' . $mail->ErrorInfo;
    }

?>
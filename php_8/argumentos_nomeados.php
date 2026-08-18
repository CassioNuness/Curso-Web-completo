<?php

    // Função que simula o envio de um e-mail.
    // Todos os parâmetros possuem valores padrão.
    function sendEmail($destinatarios = "", $cc = "", $assunto = "", $mensagem = "") {

        echo "Destinatários: " . $destinatarios . "<br>";
        echo "CC: " . $cc . "<br>";
        echo "Assunto: " . $assunto . "<br>";
        echo "Mensagem: " . $mensagem . "<br>";
    }

    /*
        FORMA CONVENCIONAL

        Os argumentos precisam ser informados seguindo
        exatamente a ordem definida nos parâmetros da função:

        1 - destinatarios
        2 - cc
        3 - assunto
        4 - mensagem
    */
    sendEmail(
        "jorge@argus-academy.com",
        "teste@teste.com.br",
        "Argumentos Nomeados",
        "Dominando a feature de argumentos nomeados do PHP 8"
    );

    echo "<hr>";


    /*
        ARGUMENTOS NOMEADOS - PHP 8

        A partir do PHP 8 podemos informar explicitamente
        para qual parâmetro cada valor será enviado.

        Dessa forma, não precisamos depender somente
        da posição dos argumentos.
    */
    sendEmail(
        destinatarios: "jorge@argus-academy.com",
        cc: "teste@teste.com.br",
        assunto: "Argumentos Nomeados",
        mensagem: "Dominando a feature de argumentos nomeados do PHP 8"
    );

    echo "<hr>";


    /*
        Uma das vantagens dos argumentos nomeados é poder
        alterar a ordem dos argumentos.

        Como estamos informando o nome do parâmetro,
        o PHP sabe exatamente onde colocar cada valor.
    */
    sendEmail(
        mensagem: "Dominando a feature de argumentos nomeados do PHP 8",
        assunto: "Argumentos Nomeados",
        destinatarios: "jorge@argus-academy.com",
        cc: "teste@teste.com.br"
    );

?>
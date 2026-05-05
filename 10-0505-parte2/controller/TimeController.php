<?php

require_once __DIR__ . '/../dao/TimeDao.php'; // carrega o DAO (que já carrega Database e Model)

// Controller: orquestra a comunicação entre o DAO e as Views
class TimeController
{
    // Retorna todos os times buscados do banco
    public function listar()
    {
        $dao = new TimeDao();
        return $dao->listar();
    }

    // Ação de cadastro: lê o POST, salva no banco e redireciona
    public function salvar()
    {
        // Cria o objeto com os dados enviados pelo formulário via POST
        $time = new TimeFutebol(
            $_POST['nome'],         // nome do time
            $_POST['fundacao'],     // ano de fundação
            $_POST['estadio'],      // nome do estádio
            $_POST['corprincipal']  // cor principal
        );

        $dao = new TimeDao(); // instancia o DAO
        $dao->salvar($time);  // persiste o objeto no banco

        header("Location: lista.php"); // redireciona para a listagem após salvar
    }
}

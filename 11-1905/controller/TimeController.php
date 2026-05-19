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

    // Busca um único time pelo id para pré-preencher o formulário de edição
    public function buscarPorId($id)
    {
        $dao = new TimeDao();
        return $dao->buscarPorId($id);
    }

    // Ação de atualização: lê o POST, atualiza no banco e redireciona
    public function atualizar()
    {
        $time = new TimeFutebol(
            $_POST['nome'],
            $_POST['fundacao'],
            $_POST['estadio'],
            $_POST['corprincipal'],
            $_POST['id']
        );

        $dao = new TimeDao();
        $dao->atualizar($time);

        header("Location: lista.php");
    }

    // Ação de deleção: lê o POST, remove do banco e redireciona
    public function deletar()
    {
        $dao = new TimeDao();
        $dao->deletar($_POST['id']);

        header("Location: lista.php");
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

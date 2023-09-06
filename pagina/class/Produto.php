<?php

include_once 'Conectar.php';

class Produto
{

    private $id;
    private $nome;
    private $id_categoria;
    private $qtd;
    private $con;


    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }


    public function getId_categoria()
    {
        return $this->id_categoria;
    }

    public function setId_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;

        return $this;
    }
    public function getQtd()
    {
        return $this->qtd;
    }
    public function setQtd($qtd): self
    {
        $this->qtd = $qtd;
        return $this;
    }

    function salvar()
    {
        try {
            $this->con = new Conectar();
            $sql = "INSERT INTO produto VALUES (null, ?, ?, ?)";
            $sql = $this->con->prepare($sql);
            $sql->bindValue(1, $this->nome);
            $sql->bindValue(2, $this->id_categoria);
            $sql->bindValue(3, $this->qtd);

            return $sql->execute() == 1 ? TRUE : FALSE;
        } catch (PDOException $exc) {
            echo "Erro de bd " . $exc->getMessage();
        }
    }

    function consultar()
    {
        try {
            $this->con = new Conectar();
            $sql = "SELECT p.id, p.nome, c.descricao, p.qtd FROM produto as p INNER JOIN categoria as c on p.id_categoria = c.id";
            $ligacao = $this->con->prepare($sql);
            return $ligacao->execute() == 1 ? $ligacao->fetchAll() : FALSE;
        } catch (PDOException $exc) {
            echo "Erro de bd " . $exc->getMessage();
        }
    }
    function excluir()
    {
        try {
            $this->con = new Conectar();
            $sql = "DELETE FROM produto WHERE id = ?";
            $sql = $this->con->prepare($sql);
            $sql->bindValue(1, $this->id);

            return $sql->execute() == 1 ? TRUE : FALSE;
        } catch (PDOException $exc) {
            echo "Erro de bd " . $exc->getMessage();
        }
    }

    function editar()
    {
        try {
            $this->con = new Conectar();
            $sql = "UPDATE produto SET nome = ?, id_categoria = ? WHERE id = ?";
            $sql = $this->con->prepare($sql);

            $sql->bindValue(1, $this->nome);
            $sql->bindValue(2, $this->id_categoria);
            $sql->bindValue(3, $this->qtd);
            $sql->bindValue(4, $this->id);

            return $sql->execute() == 1 ? TRUE : FALSE;
        } catch (PDOException $exc) {
            echo "Erro de bd " . $exc->getMessage();
        }
    }
    function consultarPorID()
    {
        try {
            $this->con = new Conectar();

            $sql = "SELECT * FROM produto WHERE id = ?";
            $sql = $this->con->prepare($sql);
            $sql->bindValue(1, $this->id);

            return $sql->execute() == 1 ? $sql->fetchAll() : FALSE;
        } catch (PDOException $exc) {
            echo "Erro de bd " . $exc->getMessage();
        }
    }
    function consultarLike($letra)
    {
        try {

            $this->con = new Conectar();
            $sql = "SELECT p.id, p.nome, c.descricao, p.qtd FROM produto as p INNER JOIN categoria as c on p.id_categoria = c.id WHERE p.nome LIKE ?";

            $ligacao = $this->con->prepare($sql);
            $ligacao->bindValue(1, $letra . '%');

            //%a -> ultima letra 
            //%a% letra no meio da palavra 
            //a% primeira letra 

            return $ligacao->execute() == 1 ? $ligacao->fetchAll() : FALSE;
        } catch (PDOException $exc) {
            echo "Erro de bd " . $exc->getMessage();
        }
    }
}
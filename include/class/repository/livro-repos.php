<?php

class LivroRepository implements Repository{
    public static function listAll(){
        $db = DB::getInstance();
        $sql = "SELECT * FROM livro";
        $query = $db->prepare($sql);
        $query->execute();

        $list = array();
        foreach($query->fetchAll(PDO::FETCH_OBJ) as  $row){
            $livro = new Livro;
            $livro->setId($row->id);
            $livro->setTitulo($row->titulo);
            $livro->setAno($row->ano);
            $livro->setGenero($row->genero);
            $livro->setIsbn($row->isbn);
            $livro->setAutorId($row->autor_id);
            $livro->setDataInclusao($row->dt_inclusao);
            $livro->setDataAlteracao($row->dt_alteracao);
            $livro->setinclusaoFuncionarioId($row->inclusao_funcionario_id);
            $livro->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);
            $list[] = $livro;
        }
        return $list;
    }
    public static function get($id){
        $db = DB::getInstance();
        $sql = "SELECT * FROM livro WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindParam(":id",$id);
        $query->execute();
    
        if($query->rowCount() > 0){ 
            $row = $query->fetch(PDO::FETCH_OBJ);
            $livro = new Livro;
            $livro->setId($row->id);
            $livro->setTitulo($row->titulo);
            $livro->setAno($row->ano);
            $livro->setGenero($row->genero);
            $livro->setIsbn($row->isbn);
            $livro->setAutorId($row->autor_id);
            $livro->setDataInclusao($row->dt_inclusao);
            $livro->setDataAlteracao($row->dt_alteracao);
            $livro->setinclusaoFuncionarioId($row->inclusao_funcionario_id);
            $livro->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);
            return $livro;
        };
        return null;
    }
    public static function insert($obj){
        $db = DB::getInstance();
        $sql = "INSERT INTO livro (titulo, ano, genero, isbn, autor_id, data_inclusao, inclusao_funcionario_id) VALUES (:nome, :data_inclusao, :inclusao_funcionario_id)";

        $query = $db->prepare($sql);
        $query->bindValue(":titulo",$obj->getTitulo());
        $query->bindValue(":ano",$obj->getAno());
        $query->bindValue(":genero",$obj->getGenero());
        $query->bindValue(":isbn",$obj->getIsbn());
        $query->bindValue(":autor_id",$obj->getAutorID());
        $query->bindValue(":data_inclusao",$obj->getDataInclusao());
        $query->bindValue(":inclusao_funcionario_id",$obj->getInclusaoFuncionarioId());

        $query->execute();

        $id = $db->lastInsertId(); // mostra o ultimo id inserido
        return $id;
    }
    public static function update($obj){
        $db = DB::getInstance();
        $sql = "UPDATE livro SET titulo = :titulo, ano = :ano, genero = :genero, isbn = :isbn, autor_id = :autor_id data_alteracao = :data_alteracao, alteracao_funcionario_id = :alteracao_funcionario_id WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindValue(":nome",$obj->getNome());
        $query->bindValue(":alteracao_inclusao",$obj->getDataInclusao());
        $query->bindValue(":alteracao_funcionario_id",$obj->getInclusaoFuncionarioId());
    }
    public static function delete($id){
        $db = DB::getInstance();
        $sql = "DELETE FROM autor WHERE id=:id";
        $query=$db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
    }
}
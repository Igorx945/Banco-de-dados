<?php

class AutorRepository implements Repository{
    public static function listAll(){
        $db = DB::getInstance();
        $sql = "SELECT * FROM autor";
        $query = $db->prepare($sql);
        $query->execute();

        $list = array();
        foreach($query->fetchAll(PDO::FETCH_OBJ) as  $row){
            $autor = new Autor;
            $autor->setId($row->id);
            $autor->setNome($row->nome);
            $autor->setData_inclusao($row->dt_inclusao);
            $autor->setData_alteracao($row->dt_alteracao);
            $autor->setInclusao_funcionario($row->inclusao_funcionario_id);
            $autor->setAlteracao_funcionario_id($row->alteracao_funcionario_id);
            $list[] = $autor;
        }
        return $list;
    }
    public static function get($id){
        $db = DB::getInstance();
        $sql = "SELECT * FROM autor WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindParam(":id",$id);
        $query->execute();
    
        if($query->rowCount() > 0){
            $row = $query->fetch(PDO::FETCH_OBJ);
            $autor = new Autor;
            $autor->setId($row->id);
            $autor->setNome($row->nome);
            $autor->setData_inclusao($row->dt_inclusao);
            $autor->setData_alteracao($row->dt_alteracao);
            $autor->setInclusao_funcionario($row->inclusao_funcionario_id);
            $autor->setAlteracao_funcionario_id($row->alteracao_funcionario_id);
            return $autor;
        };
        return null;
    }
    public static function insert($obj){

    }
    public static function update($obj){

    }
    public static function delete($id){

    }
}
<?php
class AutorRepository implements AutorRepository{
    public static function listAll(){
        $db = DB::getInstance();

        $sql = "SELECT * FROM table WHERE id=:id";
        $query = $db->prepare($sql);
        $query->execute();

        $list = array();
        foreach ($query->fetchAll(PDO::FETCH_OBJ) as $row) {
            $autor = new Autor;
            $autor->setId($row->id);
            $autor->setNome($row->nome);
            $autor->setdata_Inclusao($row->data_inclusao);
            $autor->setInclusao_funcionario($row->inclusao_funcionario_id);
            $autor->setalteracao_Funcionario_Id($row->alteracao_funcionario_id);
            $list[] = $autor;
        }
        return $list;
    }
    public static function get($id)
    {
        $db = DB::getInstance();

        $sql = "SELECT * FROM table WHERE id=:id";
        $query = $db->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        if ($query->rowCount() > 0) {
            $row = $query->fetch(PDO::FETCH_OBJ);
            $autor = new Autor;
            $autor->setId($row->id);
            $autor->setNome($row->nome);
            $autor->setdata_Inclusao($row->data_inclusao);
            $autor->setInclusao_funcionario($row->inclusao_funcionario_id);
            $autor->setalteracao_Funcionario_Id($row->alteracao_funcionario_id);
            return $autor;
        }
        return null; //retorna nulo se não encontrar o autor com esse ID no banco de dados.
    }
    public static function insert($obj)
    {
        $db = DB::getInstance();
        $sql = "INSERT INTO autor (nome, data_inclusao,inclusao_funcionario_id) VALUES  (:nome, :data_inclusao, :inclusao_funcionario_id)";
        $query  = $db->prepare($sql);
        $query->bindValue(":nome", $obj->getNome());
        $query->bindValue(":data_inclusao", $obj->getData_inclusao());
        $query->bindValue(":inclusao_funcionario_id", $obj->getInclusao_funcionario_id());
        $query->execute();
        $id =  $db->lastInsertId();
        return $id;
    }
    public static function update($obj){
    
        $db = DB::getInstance();
        $sql = "UPDATE autor SET  nome = :nome , data_alteracao = :data_alteracao, alteracao_funcionario_id =  :alteracao_funcionario_id WHERE id = :id";
        $query  = $db->prepare($sql);
        $query->bindValue(":nome", $obj->getNome());
        $query->bindValue(":data_alteracao", $obj->getData_alteracao());
        $query->bindValue(":alteracao_funcionario_id", $obj->getAlteracao_funcionario_id());
        $query->execute();
        $id =  $db->lastInsertId();
        return $id;
    }
    public static function delete($id){
        $db = DB::getInstance();
        $sql = "DELETE FROM autor WHERE id=:id";

        $query = $db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
    }
}

<?php

class EmprestimoRepository implements Repository{
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
        }
        return null;
    }
    public static function insert($obj){
        $db = DB::getInstance() ;//cria uma instancia da classe db (conexão com o bd).]
        $sql = "INSERT INTO emprestimo (livro_id, cliente_id, data_vencimento,  data_inclusao, inclusao_funcionario_id, devolucao_funcionario_id) VALUES(:livro_id, :cliente_id, :data_vencimento, :data_inclusao, :inclusao_funcionario_id, :devolucao_funcionario_id)";

        $query = $db->prepare($sql);//prepara a query para ser executada.
        $query->bindValue(":livro_id", $obj->getLivroId());
        $query->bindValue(":cliente_id", $obj->getClienteId());
        $query->bindValue(":data_vencimento", $obj->getDataVencimento());
        $query->bindValue(":data_inclusao", $obj->getDataInclusao());
        $query->bindValue(":inclusao_funcionario_id", $obj->getInclusaoFuncionarioId());
        $query->bindValue(":devolucao_funcionario_id", $obj->getDevolucaoFuncionarioId());
        $query->execute();
        $id = $db->lastInsertId();//recupera o último Id inserido no BD.
        return $id;
    }
    public static function update($obj){
        $db = DB::getInstance();
        $sql = "UPDATE emprestimo SET data_vencimento = :data_vencimento, data_alteracao = :data_alteracao, data_renovacao = :data_renovacao, alteracao_funcionario_id = :alteracao_funcionario_id, renovacao_funcionario_id WHERE id = :id";

        $query = $db->prepare($sql);//prepara a query para ser executada.
        $query->bindValue(':id', $obj->getId());
        $query->bindValue(':data_vencimento' ,$obj->getDataVencimento());
        $query->bindValue(':data_alteracao', $obj->getDataAlteracao());
        $query->bindValue(':data_renovacao', $obj->getDataRenovacao());
        $query->bindValue(':alteracao_funcionario_id', $obj->getAlteracaoFuncionarioId());
        $query->bindValue(':renovacao_funcionario_id',  $obj->getRenovacaoFuncionarioId());
        $query->execute();
    }
    public static function delete($id){
        $db = DB::getInstance();
        $sql = "DELETE FROM emprestimo WHERE id=:id";

        $query = $db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
    }
}
?>
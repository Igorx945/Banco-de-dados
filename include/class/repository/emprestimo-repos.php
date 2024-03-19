<?php

class EmprestimoRepository implements Repository{
    public static function listAll(){
        $db = DB::getInstance();
        $sql = "SELECT * FROM emprestimo WHERE id = :id";
        $query = $db->prepare($sql);
        $query->execute();

        $list = array();
        foreach($query->fetchAll(PDO::FETCH_OBJ) as  $row){
            $emprestimo = new Emprestimo;
            $emprestimo->setId($row->id);
            $emprestimo->setLivroId($row->livro_id);
            $emprestimo->setClienteId($row->cliente_id);
            $emprestimo->setDataVencimento($row->data_vencimento);
            $emprestimo->setDataInclusao($row->data_inclusao);
            $emprestimo->setDataAlteracao($row->data_alteracao);
            $emprestimo->setDataRenovacao($row->data_renovacao);
            $emprestimo->setDataDevolucao($row->data_devolucao);
            $emprestimo->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $emprestimo->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);
            $emprestimo->setRenovacaoFuncionarioId($row->renovacao_funcionario_id);
            $emprestimo->setDevolucaoFuncionarioId($row->devolucao_funcionario_id);
            $list[] = $emprestimo;
        }
        return $list;
    }
    public static function get($id){
        $db = DB::getInstance();
        $sql = "SELECT * FROM emprestimo WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindParam(":id",$id);
        $query->execute();
    
        if($query->rowCount() > 0){
            $row = $query->fetch(PDO::FETCH_OBJ);
            $emprestimo = new Emprestimo;
            $emprestimo->setId($row->id);
            $emprestimo->setLivroId($row->livro_id);
            $emprestimo->setClienteId($row->cliente_id);
            $emprestimo->setDataVencimento($row->data_vencimento);
            $emprestimo->setDataInclusao($row->data_inclusao);
            $emprestimo->setDataAlteracao($row->data_alteracao);
            $emprestimo->setDataRenovacao($row->data_renovacao);
            $emprestimo->setDataDevolucao($row->data_devolucao);
            $emprestimo->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $emprestimo->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);
            $emprestimo->setRenovacaoFuncionarioId($row->renovacao_funcionario_id);
            $emprestimo->setDevolucaoFuncionarioId($row->devolucao_funcionario_id);
            return $emprestimo;
        };
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
        $sql = "DELETE FROM autor WHERE id=:id";
        $query=$db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
    }
}
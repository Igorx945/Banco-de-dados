<?php
class ClienteRepository implements Repository{
    public static function listAll(){
        $db = DB::getInstance();

        $sql = "SELECT * FROM table WHERE id=:id";
        $query = $db->prepare($sql);
        $query->execute();
        
        $list = array();
        foreach($query->fetchAll(PDO::FETCH_OBJ) as $row){
            $cliente = new Cliente;
            $cliente->setId($row->id);
            $cliente->setNome($row->nome);
            $cliente->setTelefone($row->telefone);
            $cliente->setCpf($row->cpf);
            $cliente->setRg($row->rg);
            $cliente->setData_nascimento($row->data_nascimento); 
            $cliente->setData_inclusao($row->data_inclusao);
            $cliente->setData_alteracao($row->data_alteracao);
            $cliente->setIinclusao_funcionario_id($row->inclusao_funcionario_id);
            $cliente->setAlteracao_funcionario_id($row->alteracao_funcionario_id);
            $list[] = $cliente;
        }
    return $list;
    }
    public static function get($id){
        $db = DB::getInstance();

        $sql = "SELECT * FROM table WHERE id=:id";
        $query = $db->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        if ($query->rowCount() > 0){
            $row = $query->fetch(PDO::FETCH_OBJ);
            $cliente = new Cliente;
            $cliente->setId($row->id);
            $cliente->setNome($row->nome);
            $cliente->setTelefone($row->telefone);
            $cliente->setCpf($row->cpf);
            $cliente->setRg($row->rg);
            $cliente->setData_nascimento($row->data_nascimento); 
            $cliente->setData_inclusao($row->data_inclusao);
            $cliente->setData_alteracao($row->data_alteracao);
            $cliente->setIinclusao_funcionario_id($row->inclusao_funcionario_id);
            $cliente->setAlteracao_funcionario_id($row->alteracao_funcionario_id);
            return $cliente;
        }
        return null; //retorna nulo se não encontrar o autor com esse ID no banco de dados.
    }
    public static function insert($obj){
        $db = DB::getInstance();
        $sql = "INSERT INTO cliente (nome, telefone, email, cpf, rg, data_nascimento, data_inclusao,inclusao_funcionario_id) VALUES  (:nome, :telefone, :email, :cpf, :rg, :data_nascimento, :data_inclusao, :inclusao_funcionario_id)";
        $query  = $db->prepare($sql);
        $query->bindValue(":nome", $obj->getNome());
        $query->bindValue(":telefone", $obj->getTelefone());
        $query->bindValue(":email", $obj->getEmail());
        $query->bindValue(":cpf", $obj->getCpf());
        $query->bindValue(":rg", $obj->getRg());
        $query->bindValue(":data_nascimento", $obj->getData_nascimento());
        $query->bindValue(":data_inclusao", $obj->getData_inclusao());
        $query->bindValue(":inclusao_funcionario_id", $obj->getInclusao_funcionario_id());
        $query->execute();
        $id =  $db->lastInsertId();
        return $id;
    }
    public static function update($obj){
        $db = DB::getInstance();
        $sql = "UPDATE cliente SET  nome = :nome , telefone = :telefone, email = :email, cpf = :cpf, rg = :rg data_nascimento = :data_nascimento, data_alteracao = :data_alteracao, alteracao_funcionario_id =  :alteracao_funcionario_id WHERE id = :id";
        $query  = $db->prepare($sql);
        $query->bindValue(":nome", $obj->getNome());
        $query->bindValue(":telefone", $obj->getTelefone());
        $query->bindValue(":email", $obj->getEmail());
        $query->bindValue(":cpf", $obj->getCpf());
        $query->bindValue(":rg", $obj->getRg());
        $query->bindValue(":data_nascimento", $obj->getData_nascimento());
        $query->bindValue(":data_inclusao", $obj->getData_inclusao());
        $query->bindValue(":inclusao_funcionario_id", $obj->getInclusao_funcionario_id());
        $query->execute();
        $id =  $db->lastInsertId();
        return $id;
    }
    public static function delete($id){
        $db = DB::getInstance();
        $sql = "DELETE FROM cliente WHERE id=:id";

        $query = $db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
    }

}
?>
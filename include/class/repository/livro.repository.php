<?php
class LivroRepository implements Repository
{
    public static function listAll()
    {
        $db = DB::getInstance();

        $sql = "SELECT * FROM table WHERE id=:id";
        $query = $db->prepare($sql);
        $query->execute();

        $list = array();
        foreach ($query->fetchAll(PDO::FETCH_OBJ) as $row) {
            $livro = new Livro;
            $livro->setId($row->id);
            $livro->setTitulo($row->titulo);
            $livro->setAno($row->ano);
            $livro->setGenero($row->genero);
            $livro->setIsbn($row->isbn);
            $livro->setAutorId($row->autor_id);
            $livro->setDataInclusao($row->data_inclusao);
            $livro->setDataAlteracao($row->data_alteracao);
            $livro->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $livro->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);
            $list[] = $livro;
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
            $livro = new Livro;
            $livro->setId($row->id);
            $livro->setTitulo($row->titulo);
            $livro->setAno($row->ano);
            $livro->setGenero($row->genero);
            $livro->setIsbn($row->isbn);
            $livro->setAutorId($row->autor_id);
            $livro->setDataInclusao($row->data_inclusao);
            $livro->setDataAlteracao($row->data_alteracao);
            $livro->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $livro->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);

            return $livro;
        }
        return null; //retorna nulo se não encontrar o autor com esse ID no banco de dados.
    }
    public static function insert($obj)
    {
        $db = DB::getInstance();
        $sql = "INSERT INTO livro (titulo, ano, genero, isbn, autor_id, data_inclusao,inclusao_funcionario_id) VALUES  (:titulo, :ano, :genero, :isbn, :autor_id :data_inclusao, :inclusao_funcionario_id)";
        $query  = $db->prepare($sql);
        $query->bindValue(":titulo", $obj->getTitulo());
        $query->bindValue(":ano", $obj->getAno());
        $query->bindValue(":genero", $obj->getGenero());
        $query->bindValue(":isbn", $obj->getIsbn());
        $query->bindValue(":autor_id", $obj->getAutor_id());
        $query->bindValue(":data_inclusao", $obj->getData_inclusao());
        $query->bindValue(":inclusao_funcionario_id", $obj->getInclusao_funcionario_id());
        $query->execute();
        $id =  $db->lastInsertId();
        return $id;
    }
    public static function update($obj)
    {
        $db = DB::getInstance();
        $sql = "UPDATE autor SET  titulo = :titulo, ano = :ano, genero = :genero, isbn = :isbn, autor = :autor_id data_inclusao = :data_inclusao, inclusao_funcionario_id = :inclusao_funcionario_id) WHERE id = :id";
        $query  = $db->prepare($sql);
        $query->bindValue(":titulo", $obj->getTitulo());
        $query->bindValue(":ano", $obj->getAno());
        $query->bindValue(":genero", $obj->getGenero());
        $query->bindValue(":isbn", $obj->getIsbn());
        $query->bindValue(":autor_id", $obj->getAutor_id());
        $query->bindValue(":data_inclusao", $obj->getData_inclusao());
        $query->bindValue(":inclusao_funcionario_id", $obj->getInclusao_funcionario_id());
        $query->execute();
        $id =  $db->lastInsertId();
        return $id;
    }
    public static function delete($id){
        $db = DB::getInstance();
        $sql = "DELETE FROM livro WHERE id=:id";

        $query = $db->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
    }
}

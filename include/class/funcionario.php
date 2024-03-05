<?php 

class Funcionario{
    private $id;
    private $nome;
    private $cpf;
    private $telefone;
    private $senha;
    private $email;
    private $data_inclusao;
    private $data_alteracao;
    private $inclusao_funcionario_id;
    private $alteracao_funcionario_id;
    
    public function getId(){
        return $this->id;
    }
    public function setid($id){
        $this->id = $id;
    }


    public function getnome(){
        return $this->nome;
    }
    public function setnome($nome){
        $this->nome = $nome;
    }


    public function getcpf(){
        return $this->cpf;
    }
    public function setcpf($cpf){
        $this->cpf = $cpf;
    }


    public function gettelefone(){
        return $this->telefone;
    }
    public function settelefone($telefone){
        $this->telefone = $telefone;
    }


    public function getsenha(){
        return $this->senha;
    }
    public function setsenha($senha){
        $this->senha = $senha;
    }


    public function getemail(){
        return $this->email;
    }
    public function setemail($email){
        $this->email = $email;
    }


    public function getDataInclusao(){
        return $this->data_inclusao;
    }
    public function setDataInclusao($data_inclusao){
        $this->data_inclusao = $data_inclusao;
    }


    public function getDataAlteracao(){
        return $this->data_alteracao;
    }
    public function setDataAlteracao($data_alteracao){
        $this->data_alteracao = $data_alteracao;
    }


    public function getInclusaoFuncionario_id(){
        return $this->inclusao_funcionario_id;
    }
    public function setInclusaoFuncionario_id($inclusao_funcionario_id){
        $this->inclusao_funcionario_id = $inclusao_funcionario_id;
    }


    public function getAlteracaofuncionario_id(){
        return $this->alteracao_funcionario_id;
    }
    public function setAlteracaoFuncionario_id($alteracao_funcionario_id){
        $this->alteracao_funcionario_id = $alteracao_funcionario_id;
    }
    
}
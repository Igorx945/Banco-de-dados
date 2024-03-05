<?php

class Cliente{
    private $id;
    private $nome;
    private $telefone;
    private $email;
    private $cpf;
    private $rg;
    private $data_nascimento;
    private $data_inclusao;
    private $data_alteracao;
    private $inclusao_funcionario_id;
    private $alteracao_funcionario_id;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    public function getRg(){
        return $this->rg;
    }
    public function setRg($rg){
        $this->rg = $rg;
    }
    public function getData_nascimento(){
        return $this->data_nascimento;
    }
    public function setData_nascimento($data_nascimento){
        $this->data_nascimento = $data_nascimento;
    }
    public function getData_inclusao(){
        return $this->data_inclusao;
    }
    public function setData_inclusao($data_inclusao){
        $this->id = $data_inclusao;
    }
    public function getData_alteracao(){
        return $this->data_alteracao;
    }
    public function setData_alteracao($data_alteracao){
        $this->data_alteracao = $data_alteracao;
    }
    public function getInclusao_funcionario_id(){
        return $this->inclusao_funcionario_id;
    }
    public function setIinclusao_funcionario_id($inclusao_funcionario_id){
        $this->id = $inclusao_funcionario_id;
    }
    public function getAlteracao_funcionario_id(){
        return $this->alteracao_funcionario_id;
    }
    public function setAlteracao_funcionario_id($alteracao_funcionario_id){
        $this->alteracao_funcionario_id = $alteracao_funcionario_id;
    }
    
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Passageiros_model extends CI_Model { //Nome da classe com letra maiuscula

	public $cpf;
	public $nome;
	public $telefone;
	public $endereco;
	public $data_nasc;
	public $passaporte;

	public function __construct(){
		parent::__construct();

	}




	public function listar_passageiros()
	{	
		$this->db->select('Nome,CPF,Telefone,Endereco,Data_Nasc,Passaporte');
		$this->db->from('passageiros'); 
		$this->db->order_by('nome', 'ASC');//coloca em ordem alfabetica as categorias do banco de dados
		return $this->db->get()->result(); //pega o resultado da comparação

	}


	public function adicionar ($nome, $cpf, $telefone,$endereco, $data_nasc,$passaporte)
	{
		$dados['Nome'] = $nome;
		$dados['CPF'] = $cpf;
		$dados['Telefone'] = $telefone;
		$dados['Endereco'] = $endereco;
		$dados['Data_Nasc'] = $data_nasc;
		$dados['Passaporte'] = $passaporte;
		
	

		return $this->db->insert('passageiros', $dados);
	}
	public function excluir($cpf){
		$this->db->where('cpf', $cpf);
		return $this->db->delete('passageiros');
	}




 	public function alterar($nome, $cpf, $telefone,$endereco, $data_nasc,$passaporte)
	{
		$dados['Nome'] = $nome;
		$dados['CPF'] = $cpf;
		$dados['Telefone'] = $telefone;
		$dados['Endereco'] = $endereco;
		$dados['Data_Nasc'] = $data_nasc;
		$dados['Passaporte'] = $passaporte;
		
	
		$this->db->where('CPF', $cpf);
		return $this->db->update('passageiros', $dados);
	}
	public function listar_passageiro($cpf)
	{
		$this->db->select('Nome,CPF,Telefone,Endereco,Data_Nasc,Passaporte');
		$this->db->from('passageiros'); 
		$this->db->where('CPF', $cpf);
		return $this->db->get()->result(); //pega o resultado da comparação
	}
 

}
?>
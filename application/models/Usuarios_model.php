<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model { //Nome da classe com letra maiuscula

	public $id;
	public $nome;
	public $email;
	public $img;
	public $historico;
	public $user;
	public $senha;
	public $titulo;

	public function __construct(){
		parent::__construct();

	}

	public function listar_categorias()
	{
		$this->db->order_by('titulo', 'ASC');//coloca em ordem alfabetica as categorias do banco de dados
		return ($this->db->get('categoria')->result()); //retorna as categorias
	}


	public function listar_autor($id)
	{	$this->db->select('id, nome, historico, img');
		$this->db->from('usuario'); //da tabela categoria
		$this->db->where('id='.$id); //compara com o id
		return $this->db->get()->result(); //pega o resultado da comparação

	}
	public function listar_autores()
	{	$this->db->select('id, nome, img');
		$this->db->from('usuario'); //da tabela categoria
		$this->db->order_by('nome', 'ASC');//coloca em ordem alfabetica as categorias do banco de dados

		return $this->db->get()->result(); //pega o resultado da comparação

	}

	public function adicionar ($nome, $email,$historico, $user, $senha)
	{
		$dados['nome'] = $nome;
		$dados['email'] = $email;
		$dados['historico'] = $historico;
		$dados['user'] = $user;
		$dados['senha'] = md5($senha);
		return $this->db->insert('usuario', $dados);
	}
	public function excluir($id){
		$this->db->where('md5(id)', $id);
		return $this->db->delete('usuario');
	}

		public function listar_usuario($id)
	{	$this->db->select('id,nome, historico, email,user');
		$this->db->from('usuario'); //da tabela categoria
		$this->db->where('md5(id)', $id); //compara com o id
		return $this->db->get()->result(); //pega o resultado da comparação

	}
	public function alterar($nome, $email,$historico, $user, $senha, $id){
 	    $dados['nome'] = $nome;
		$dados['email'] = $email;
		$dados['historico'] = $historico;
		$dados['user'] = $user;
		$dados['senha'] = md5($senha);
 		$this->db->where('id', $id);
 		return $this->db->update('usuario', $dados);
 	}
 

}
?>
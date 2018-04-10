<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model { //Nome da classe com letra maiuscula

	public $id;
	public $titulo;

	public function __construct(){
		parent::__construct();

	}

	public function listar_categorias()
	{
		$this->db->order_by('titulo', 'ASC');//coloca em ordem alfabetica as categorias do banco de dados
		return ($this->db->get('categoria')->result()); //retorna as categorias
	}


	public function listar_titulo($id)
	{
		$this->db->from('categoria'); //da tabela categoria
		$this->db->where('id',$id); //compara com o id
		return $this->db->get()->result(); //pega o resultado da comparação

	}
	public function adicionar ($titulo)
	{
		$dados['titulo'] = $titulo;
		return $this->db->insert('categoria', $dados);
	}
	public function excluir($id){
		$this->db->where('md5(id)', $id);
		return $this->db->delete('categoria');
	}
	public function listar_categoria($id)
	{
		$this->db->from('categoria'); //da tabela categoria
		$this->db->where('md5(id)',$id); //compara com o id
		return $this->db->get()->result(); //pega o resultado da comparação

	}
 	public function alterar($titulo, $id){
 		$dados['titulo']= $titulo;
 		$this->db->where('id', $id);
 		return $this->db->update('categoria', $dados);
 	}

}
?>
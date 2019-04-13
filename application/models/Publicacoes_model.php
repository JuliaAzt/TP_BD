<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacoes_model extends CI_Model { //Nome da classe com letra maiuscula

	public $id;
	public $categoria;
	public $titulo;
	public $subtitulo;
	public $conteudo;
	public $data;
	public $img;
	public $user;


	public function __construct(){
		parent::__construct();

	}

	public function destaques_home()
	{
		$this->db->select('usuario.id as idautor, usuario.nome, postagens.id, postagens.titulo, postagens.user, postagens.data, postagens.subtitulo');// seleciona colunas de algumas tabelas

		$this->db->from('postagens'); //tira da tabela postagem
		$this->db->join('usuario', 'usuario.id=' . 'postagens.user'); //quando o id do usuario for igual o do banco
		$this->db->limit(4);

		$this->db->order_by('data', 'DESC');//coloca em ordem alfabetica as categorias do banco de dados
		return $this->db->get()->result(); //retorna as categorias
	}

	public function categorias_pub($id)
	{
		$this->db->select('usuario.id as idautor, usuario.nome, postagens.id, postagens.titulo, postagens.user, postagens.data, postagens.img, postagens.categoria, postagens.subtitulo');// seleciona colunas de algumas tabelas

		$this->db->from('postagens'); //tira da tabela postagem
		$this->db->join('usuario', 'usuario.id= postagens.user'); //quando o id do usuario for igual o do banco
		$this->db->where('postagens.categoria',$id);
		$this->db->order_by('data', 'DESC');//coloca em ordem alfabetica as categorias do banco de dados
		return $this->db->get()->result(); //retorna as categorias
	}

	public function publicacao($id)
	{
		$this->db->select('usuario.id as idautor, usuario.nome, postagens.id, postagens.titulo, postagens.user, postagens.data, postagens.img, postagens.categoria ,postagens.conteudo, postagens.subtitulo');// seleciona colunas de algumas tabelas

		$this->db->from('postagens'); //tira da tabela postagem
		$this->db->join('usuario', 'usuario.id= postagens.user'); //quando o id do usuario for igual o do banco
		$this->db->where('postagens.id',$id);
		return $this->db->get()->result(); //retorna as categorias
	}

	public function listar_titulo($id)
	{
		$this->db->select('id, titulo');
		$this->db->from('postagens'); //da tabela categoria
		$this->db->where('id='.$id); //compara com o id
		return $this->db->get()->result(); //pega o resultado da comparação

	}


}
?>
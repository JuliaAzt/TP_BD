<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller { //Nome da classe com letra maiuscula

	public function __construct(){
		parent::__construct();
		$this->load->model('Categorias_model','modelcategoria');//carrega o model e apelida ele, está aqui pq vai ser usado em todas as páginas
		$this->categorias = $this->modelcategoria->listar_categorias(); //usa funcao do model utilizando o "apelido/ typedef"

	}

	public function index($id,$slug=null)
	{	
		$dados['categorias']=$this->categorias;
		$this->load->model('publicacoes_model','modelpublicacoes');
		$dados['postagem'] = $this->modelpublicacoes->categorias_pub($id);
		$dados['titulo']= 'Categorias - ';
		$dados['subtitulo']= '';
		$dados['subtitulodb']= $this->modelcategoria->listar_titulo($id);


		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/categoria');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}


}

?>
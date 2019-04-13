<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Postagens extends CI_Controller { //Nome da classe com letra maiuscula


	public function __construct(){
		parent::__construct();
		$this->load->model('Categorias_model','modelcategoria');//carrega o model e apelida ele, está aqui pq vai ser usado em todas as páginas
		$this->categorias = $this->modelcategoria->listar_categorias(); //usa funcao do model utilizando o "apelido/ typedef"

	}

	public function index($id ,$slug=null)
	{	
		$dados['categorias']=$this->categorias;
		$this->load->model('Publicacoes_model','modelpublicacoes');

		

		$dados['postagem'] = $this->modelpublicacoes->publicacao($id);
		$dados['titulo']= 'Publicação - ';
		$dados['subtitulo']= '';
		$dados['subtitulodb']= $this->modelpublicacoes->listar_titulo($id);


		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/publicacao');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}


}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sobrenos extends CI_Controller { //Nome da classe com letra maiuscula

	public function __construct(){
		parent::__construct();
		$this->load->model('Categorias_model','modelcategoria');//carrega o model e apelida ele, está aqui pq vai ser usado em todas as páginas
		$this->categorias = $this->modelcategoria->listar_categorias(); //usa funcao do model utilizando o "apelido/ typedef"
		$this->load->model('usuarios_model', 'modelusuarios');

	}

	public function index()
	{	
		$dados['categorias']=$this->categorias;

		$dados['autores'] = $this->modelusuarios->listar_autores();
		$dados['titulo']= 'Sobre Nós - ';
		$dados['subtitulo']= 'Conheça nossa equipe';



		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/sobrenos');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}

	public function autores($id, $slug)//$SLUG = NOME DO AUTOR
	{

		$dados['autores']= $this->modelusuarios->listar_autor($id);
		$dados['categorias']=$this->categorias;

		$dados['titulo']= 'Sobre Nós';
		$dados['subtitulo']= 'Autor';
		$dados['subtitulodb']= $this->modelcategoria->listar_titulo($id);


		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/autor');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}


}
?>
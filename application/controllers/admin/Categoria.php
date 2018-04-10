<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller { //Nome da classe com letra maiuscula

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logado'))
			redirect(base_url('admin/login'));
		
		$this->load->model('Categorias_model','modelcategoria');
		$this->categorias = $this->modelcategoria->listar_categorias(); 

	}

	public function index()
	{	
		$this->load->library('table');
		$dados['categorias']=$this->categorias;
		$dados['titulo']= 'Painel de controle';
		$dados['subtitulo']= 'Categoria';



		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/categoria');
		$this->load->view('backend/template/html-footer');
	}
	public function inserir(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-categoria', 'Nome da Categoria','required|is_unique[categoria.titulo]');
		if ($this->form_validation->run() == FALSE) //min_lenght não funcionou
			$this->index();
		else{
			$titulo= $this->input->post('txt-categoria');
			if($this->modelcategoria->adicionar($titulo))
				redirect(base_url('admin/categoria'));
			else
				echo "Houve um erro no sistema";

		}

	}
	public function excluir($id)
	{
		if($this->modelcategoria->excluir($id))
				redirect(base_url('admin/categoria'));
			else
				echo "Houve um erro no sistema";


	}
	public function alterar($id){
		$this->load->library('table');
		$dados['categorias']=$this->modelcategoria->listar_categoria($id);
		$dados['titulo']= 'Painel de controle';
		$dados['subtitulo']= 'Categoria';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');

		$this->load->view('backend/alterar-categoria');
		$this->load->view('backend/template/html-footer');

	}
		public function salvar_alteracoes(){
			$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-categoria', 'Nome da Categoria','required|is_unique[categoria.titulo]');
		if ($this->form_validation->run() == FALSE) //min_lenght não funcionou
			$this->index();
		else{
			$titulo= $this->input->post('txt-categoria');
			$id = $this->input->post('txt-id');
			if($this->modelcategoria->alterar($titulo, $id))
				redirect(base_url('admin/categoria'));
			else
				echo "Houve um erro no sistema";

		}
		
	}
}
?>
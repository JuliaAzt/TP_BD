<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Passageiros extends CI_Controller 
{ //Nome da classe com letra maiuscula

		public function __construct(){
			parent::__construct();


	}


	public function index()
	{	
		

		$this->load->library('table');

		$this->load->model('passageiros_model','modelpassageiros');
		$dados['passageiros']= $this->modelpassageiros->listar_passageiros();

		$dados['titulo']= 'Painel de controle';
		$dados['subtitulo']= 'Passageiros';		
		$this->load->view('template/html-header', $dados);
		$this->load->view('template/template');
		$this->load->view('passageiros');
		$this->load->view('template/html-footer');

	}


	public function inserir()
	{
		
		$this->load->model('passageiros_model',"modelpassageiros");
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-Nome', 'Nome do usuário','required');
		$this->form_validation->set_rules('txt-CPF', 'CPF','required|is_unique[passageiros.cpf]');
		$this->form_validation->set_rules('txt-Telefone', 'Telefone','required');
		$this->form_validation->set_rules('txt-Endereco', 'Endereço','required');
		$this->form_validation->set_rules('txt-datanasc', 'Data_nasc','required');
		$this->form_validation->set_rules('txt-passaporte', 'Passaporte','required');
		


		if ($this->form_validation->run() == FALSE) //min_lenght não funcionou
			$this->index();
		else
		{

			$nome= $this->input->post('txt-Nome');
			$cpf= $this->input->post('txt-CPF');
			$telefone= $this->input->post('txt-Telefone');
			$endereco= $this->input->post('txt-Endereco');
			$data_nasc= $this->input->post('txt-datanasc');
			$passaporte= $this->input->post('txt-passaporte');
			

			if($this->modelpassageiros->adicionar($nome, $cpf, $telefone,$endereco, $data_nasc,$passaporte))
				redirect(base_url('passageiros'));
			else
				echo "Houve um erro no sistema";

		}

	}

	public function excluir($cpf)
	{
		

		$this->load->model('passageiros_model','modelpassageiros');

		if($this->modelpassageiros->excluir($cpf))
				redirect(base_url('passageiros'));
			else
				echo "Houve um erro no sistema";


	}
	public function alterar($cpf)
	{
		
		$this->load->model('passageiros_model','modelpassageiros');
		$dados['passageiros']=$this->modelpassageiros->listar_passageiro($cpf);
		$dados['titulo']= 'Painel de controle';
		$dados['subtitulo']= 'Passageiro';
		
		$this->load->view('template/html-header', $dados);
		$this->load->view('template/template');
		$this->load->view('alterar-passageiro');
		$this->load->view('template/html-footer');
	

	}

	public function salvar_alteracoes()
	{
		
		

		$this->load->model('passageiros_model',"modelpassageiros");
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-Nome', 'Nome do usuário','required');
		$this->form_validation->set_rules('txt-CPF', 'CPF','required');
		$this->form_validation->set_rules('txt-Telefone', 'Telefone','required');
		$this->form_validation->set_rules('txt-Endereco', 'Endereço','required');
		$this->form_validation->set_rules('txt-datanasc', 'Data_nasc','required');
		$this->form_validation->set_rules('txt-passaporte', 'Passaporte','required');
		

		if ($this->form_validation->run() == FALSE) 
		{	
			$cpf = $this->input->post('txt-CPF');
			$this->alterar($cpf);
		}

		else
		{
			$nome= $this->input->post('txt-Nome');
			$cpf= $this->input->post('txt-CPF');
			$telefone= $this->input->post('txt-Telefone');
			$endereco= $this->input->post('txt-Endereco');
			$data_nasc= $this->input->post('txt-datanasc');
			$passaporte= $this->input->post('txt-passaporte');
			
			

			if($this->modelpassageiros->alterar($nome, $cpf, $telefone,$endereco, $data_nasc,$passaporte))
				redirect(base_url('passageiros'));
			else
				echo "Houve um erro no sistema";
		}
	
	}


	
	



}
?>
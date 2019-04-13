<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller 
	{ //Nome da classe com letra maiuscula

		public function __construct(){
			parent::__construct();

	}

	public function index()
	{	
		if(!$this->session->userdata('logado'))
			redirect(base_url('admin/login'));

		$this->load->library('table');

		$this->load->model('usuarios_model','modelusuarios');
		$dados['usuarios']= $this->modelusuarios->listar_autores();

		$dados['titulo']= 'Painel de controle';
		$dados['subtitulo']= 'Usuários';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/usuarios');
		$this->load->view('backend/template/html-footer');

	}


	public function inserir()
	{
		if(!$this->session->userdata('logado'))
			redirect(base_url('admin/login'));
		$this->load->model('usuarios_model',"modelusuarios");
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-nome', 'Nome do usuário','required');
		$this->form_validation->set_rules('txt-email', 'E-mail','required|valid_email|is_unique[usuario.email]');
		$this->form_validation->set_rules('txt-estado', 'estado','required');
		$this->form_validation->set_rules('txt-estado', 'cidade','required');
		$this->form_validation->set_rules('txt-user', 'user','required|is_unique[usuario.user]');
		$this->form_validation->set_rules('txt-senha', 'senha','required');
		$this->form_validation->set_rules('txt-confir-senha', ' confirmar senha','required|matches[txt-senha]');


		if ($this->form_validation->run() == FALSE) //min_lenght não funcionou
			$this->index();
		else
		{
			$nome= $this->input->post('txt-nome');
			$email= $this->input->post('txt-email');
			$estado= $this->input->post('txt-estado');
			$cidade= $this->input->post('txt-cidade');
			$user= $this->input->post('txt-user');
			$senha= $this->input->post('txt-senha');

			if($this->modelusuarios->adicionar($nome, $email, $user, $senha,$estado,$cidade))
				redirect(base_url('admin/usuarios'));
			else
				echo "Houve um erro no sistema";

		}

	}

	public function excluir($id)
	{
		if(!$this->session->userdata('logado'))
			redirect(base_url('admin/login'));

		$this->load->model('usuarios_model','modelusuarios');

		if($this->modelusuarios->excluir($id))
				redirect(base_url('admin/usuarios'));
			else
				echo "Houve um erro no sistema";


	}
	public function alterar($id)
	{
		if(!$this->session->userdata('logado'))
			redirect(base_url('admin/login'));

		$this->load->model('usuarios_model',"modelusuarios");
		$dados['usuarios']=$this->modelusuarios->listar_usuario($id);
		$dados['titulo']= 'Painel de controle';
		$dados['subtitulo']= 'Usuarios';
		
		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/alterar-usuario');
		$this->load->view('backend/template/html-footer');
	

	}

	public function salvar_alteracoes()
	{
		
		if(!$this->session->userdata('logado'))
			redirect(base_url('admin/login'));

		$this->load->model('usuarios_model','modelusuarios');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-nome', 'Nome do usuário','required');
		$this->form_validation->set_rules('txt-email', 'E-mail','required|valid_email');
		$this->form_validation->set_rules('txt-estado', 'estado','required');
		$this->form_validation->set_rules('txt-estado', 'cidade','required');
		$this->form_validation->set_rules('txt-user', 'user','required');
		$this->form_validation->set_rules('txt-senha', 'senha','required');
		$this->form_validation->set_rules('txt-confir-senha', ' confirmar senha','required|matches[txt-senha]');

		if ($this->form_validation->run() == FALSE) 
		{	
			$id = $this->input->post('txt-id');
			$this->alterar($id);
		}

		else
		{
			$id = $this->input->post('txt-id');
			$nome= $this->input->post('txt-nome');
			$email= $this->input->post('txt-email');
			$estado= $this->input->post('txt-estado');
			$cidade= $this->input->post('txt-cidade');
			$user= $this->input->post('txt-user');
			$senha= $this->input->post('txt-senha');
			$id = $this->input->post('txt-id');

			if($this->modelusuarios->alterar($nome, $email, $user, $senha, $id, $estado, $cidade))
				redirect(base_url('admin/usuarios'));
			else
				echo "Houve um erro no sistema";
		}
	
	}
/*
	public function nova_foto()
	{
		if(!$this->session->userdata('logado'))
			redirect(base_url('admin/login'));

		$this->load->model('usuarios_model',"modelusuarios");
		$id = $this->input->post('id');
		$config['upload_path']='./assets/frontend/img/usuarios';
		$config['allowed_types']= 'jpg';
		$config['file_name'] =  $id."jpg";
		$config['overwrite']= TRUE;
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload())
			echo $this->upload->display_errors();
		else
		{
			$config2['source_image']= './assets/frontend/img/usuarios/'.$id.'.jpg';
			$config2['create_thumb']=FALSE;
			$config2['width']=200;
			$config2['height']=200;
			$this->load->library('image_lib', $config2);
			if($this->image_lib->resize()) 
				 redirect(base_url('admin/usuarios/alterar/'.$id)); 
				 else 
				 	echo $this->image_lib->display_errors();
				
		}

	

	}


*/

	public function pag_login()
	{

		$dados['titulo']= 'Painel de controle';
		$dados['subtitulo']= ' - Entrar no sistema';



		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/login');
		$this->load->view('backend/template/html-footer');

	}
	public function login()
	{
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-user', 'Usuário','required');
		$this->form_validation->set_rules('txt-senha', 'Senha','required');

		if ($this->form_validation->run() == FALSE) //min_lenght não funcionou
			$this->pag_login();
		else
		{
			$usuario = $this->input->post('txt-user');
			$senha =  $this->input->post('txt-senha');
			$this->db->where('user', $usuario);
			$this->db->where('senha', md5($senha) );
			$userlogado = $this->db->get('usuario')->result();
			 if (count($userlogado)==1) 
			 {	
			 	$dadosSessao['userlogado'] = $userlogado[0];
			 	$dadosSessao['logado'] = TRUE ;
			 	$this->session->set_userdata($dadosSessao);
			 	redirect(base_url('admin'));
			 }
			else{

			 	$dadosSessao['userlogado'] = NULL; 
				$dadosSessao['logado'] = FALSE;
				$this->session->set_userdata($dadosSessao);
			 	redirect(base_url('admin/login'));
			}



			
		}


	}
		public function logout()
	{
		$dadosSessao['userlogado'] = NULL; 
		$dadosSessao['logado'] = FALSE;
		$this->session->set_userdata($dadosSessao);
 	 	redirect(base_url('admin/login'));

	}



}
?>
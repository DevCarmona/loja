<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//	13 - 14m
class Usuarios extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		//	Valid Session? / Existe uma sessão?
	}

	public function index()
	{
		$data = array(
			'titulo' => 'Usuários cadastrados',

			'styles' => array(
				'bundles/datatables/datatables.min.css',
				'bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css',
			),

			'scripts' => array(
				'bundles/datatables/datatables.min.js',
				'bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js',
				'bundles/jquery-ui/jquery-ui.min.js',
				'js/page/datatables.js',
			),

			'usuarios' => $this->ion_auth->users()->result(),
		);

//		echo '<pre>'; print_r($data['usuarios']); exit();

		$this->load->view('restrita/layout/header', $data);
		$this->load->view('restrita/usuarios/index');
		$this->load->view('restrita/layout/footer');
	}

	public function core($usuario_id = NULL)
	{
		if (!$usuario_id) {

			//	Register / Cadastrar
		} else {
			if (!$this->ion_auth->user($usuario_id)->row()) {
				exit('Não existe');
			}else {
				$data = array(
					'titulo' => 'Editando usuário'
				);

				$this->load->view('restrita/layout/header', $data);
				$this->load->view('restrita/usuarios/core');
				$this->load->view('restrita/layout/footer');
			}

		}
	}
}

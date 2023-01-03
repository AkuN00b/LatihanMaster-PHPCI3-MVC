<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisMobil extends CI_Controller {

	public function __construct()
    {
      parent::__construct();
      $this->load->model("JenisMobilM");
    }

	public function index()
	{
		$getData["getData"] = $this->JenisMobilM->get();
		$this->load->view('JenisMobil/index', $getData);
	}

	public function getCreate() 
	{
		$this->load->view('JenisMobil/create');
	}

	public function postCreate()
    {
        $data = array (        
          'nama_jenis_mobil' => $this->input->post('nama_jenis_mobil'),
        );

        $result = $this->JenisMobilM->save($data);

		if ($result > 0) $this->sukses();
		else $this->gagal();
    }

    function sukses() {
		redirect(site_url('JenisMobil'));
	}

	function gagal() {
		echo "<script>alert('Input data Jenis Mobil Gagal')</script>";
	}

	public function getEdit()
	{
		$id = $this->uri->segment(3);
	    $result = $this->JenisMobilM->get_id($id);

	    if ($result->num_rows() > 0) {
	        $i = $result->row_array();

	        $data = array(
	        	'id_jenis_mobil'    => $i['id_jenis_mobil'],
	            'nama_jenis_mobil'  => $i['nama_jenis_mobil']
	        );

	        $this->load->view('JenisMobil/edit',$data);
	    } else {
	    	echo "<script>alert('Data Jenis Mobil tidak ditemukan !!'); </script>";
	    	echo "<script>window.history.back(); </script>";
	    }
	}

	public function postUpdate() {
	    $id_jenis_mobil = $this->input->post('id_jenis_mobil');
	    $nama_jenis_mobil = $this->input->post('nama_jenis_mobil');

		$this->JenisMobilM->update($id_jenis_mobil, $nama_jenis_mobil);
	    redirect(site_url('JenisMobil'));
	}

	public function postDelete()
	{
		$id = $this->uri->segment(3);
	    $this->JenisMobilM->delete($id);
	    redirect('JenisMobil');
	}
}

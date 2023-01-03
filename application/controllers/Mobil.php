<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {

	public function __construct()
    {
      parent::__construct();
      $this->load->model("MobilM");
      $this->load->model("JenisMobilM");
    }

	public function index()
	{
		$getData["getData"] = $this->MobilM->get();
		$this->load->view('Mobil/index', $getData);
	}

	public function getCreate() 
	{
		$getData["getDataJenisMobil"] = $this->JenisMobilM->get();
		$this->load->view('Mobil/create', $getData);
	}

	public function postCreate()
    {
        $data = array (        
          'nama_mobil' => $this->input->post('nama_mobil'),
          'merk_mobil' => $this->input->post('merk_mobil'),
          'harga_mobil' => $this->input->post('harga_mobil'),
          'id_jenis_mobil' => $this->input->post('id_jenis_mobil'),
        );

        $result = $this->MobilM->save($data);

		if ($result > 0) $this->sukses();
		else $this->gagal();
    }

    function sukses() {
		redirect(site_url('Mobil'));
	}

	function gagal() {
		echo "<script>alert('Input data Mobil Gagal')</script>";
	}

	public function getEdit()
	{
		$id = $this->uri->segment(3);
	    $result = $this->MobilM->get_id($id);

		$getData["getDataJenisMobil"] = $this->JenisMobilM->get();

	    if ($result->num_rows() > 0) {
	        $i = $result->row_array();

	        $getData["idMobil"] = $i['id_mobil'];
	        $getData["namaMobil"] = $i['nama_mobil'];
	        $getData["merkMobil"] = $i['merk_mobil'];
	        $getData["hargaMobil"] = $i['harga_mobil'];
	        $getData["idJenisMobil"] = $i['id_jenis_mobil'];

	        $this->load->view('Mobil/edit', $getData);
	    } else {
	    	echo "<script>alert('Data Mobil tidak ditemukan !!'); </script>";
	    	echo "<script>window.history.back(); </script>";
	    }
	}

	public function postUpdate() {
	    $id_mobil = $this->input->post('id_mobil');
	    $nama_mobil = $this->input->post('nama_mobil');
	    $merk_mobil = $this->input->post('merk_mobil');
	    $harga_mobil = $this->input->post('harga_mobil');
	    $id_jenis_mobil = $this->input->post('id_jenis_mobil');

		$this->MobilM->update($id_mobil, $nama_mobil, $merk_mobil, $harga_mobil, $id_jenis_mobil);
	    redirect(site_url('Mobil'));
	}

	public function postDelete()
	{
		$id = $this->uri->segment(3);
	    $this->MobilM->delete($id);
	    redirect('Mobil');
	}
}

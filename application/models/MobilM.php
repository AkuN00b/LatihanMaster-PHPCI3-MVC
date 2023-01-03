<?php defined('BASEPATH') or exit('No direct script access allowed');

  class MobilM extends CI_Model
  {
    private $table = "mobil";

    public function get()
    {
      return $this->db->query("SELECT m.id_mobil, m.nama_mobil, m.merk_mobil, m.harga_mobil, jm.nama_jenis_mobil 
                               FROM mobil m
                               INNER JOIN jenismobil jm ON jm.id_jenis_mobil = m.id_jenis_mobil
                               ORDER BY m.id_mobil ASC")->result();
    }

    public function get_id($id) 
    {
      $query = $this->db->get_where($this->table, array('id_mobil' => $id));
      return $query;
    }

    public function save($data)
    {
      return $this->db->insert($this->table, $data);
    }

    public function update($id_mobil, $nama_mobil, $merk_mobil, $harga_mobil, $id_jenis_mobil) 
    {
      $data = array(
        'id_mobil' => $id_mobil,
        'nama_mobil' => $nama_mobil,
        'merk_mobil' => $merk_mobil,
        'harga_mobil' => $harga_mobil,
        'id_jenis_mobil' => $id_jenis_mobil,
      );

      $this->db->where('id_mobil', $id_mobil);
      $this->db->update($this->table, $data);
    }

    public function delete($id) 
    {
      $this->db->where('id_mobil', $id);
      $this->db->delete($this->table);
    }
  }
?>
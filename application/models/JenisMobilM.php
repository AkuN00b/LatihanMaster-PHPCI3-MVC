<?php defined('BASEPATH') or exit('No direct script access allowed');

  class JenisMobilM extends CI_Model
  {
    private $table = "jenismobil";

    public function get()
    {
      return $this->db->get($this->table)->result();
    }

    public function get_id($id) 
    {
      $query = $this->db->get_where($this->table, array('id_jenis_mobil' => $id));
      return $query;
    }

    public function save($data)
    {
      return $this->db->insert($this->table, $data);
    }

    public function update($id_jenis_mobil, $nama_jenis_mobil) 
    {
      $data = array(
        'id_jenis_mobil' => $id_jenis_mobil,
        'nama_jenis_mobil' => $nama_jenis_mobil,
      );

      $this->db->where('id_jenis_mobil', $id_jenis_mobil);
      $this->db->update($this->table, $data);
    }

    public function delete($id) 
    {
      $this->db->where('id_jenis_mobil', $id);
      $this->db->delete($this->table);
    }
  }
?>
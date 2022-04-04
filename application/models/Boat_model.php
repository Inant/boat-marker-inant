<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boat_model extends CI_Model {

  private $table = "boat";

  public function __construct()
  {
    parent::__construct();
  }

  public function getAllData()
  {
    $this->db->select('*');
    $this->db->from($this->table);
    $query = $this->db->get();

    return $query->result_array();
  }

  public function insertData()
  {
    $data = array(
        'boat_name' => $this->input->post('boat_name'),
        'latitude' => $this->input->post('latitude'),
        'longitude' => $this->input->post('longitude'),
        'rotation' => $this->input->post('rotation'),
    );
    return $this->db->insert($this->table,$data);
  }

  public function editData($id)
  {
    return $this->db->get_where($this->table, ['id' => $id])->row_array();
  }

  public function updateData($id)
  {
    $data = array(
        'boat_name' => $this->input->post('boat_name'),
        'latitude' => $this->input->post('latitude'),
        'longitude' => $this->input->post('longitude'),
        'rotation' => $this->input->post('rotation'),
    );

    $this->db->where('id', $id);

    return $this->db->update($this->table,$data);
  }

  public function deleteData($id)
  {
    $this->db->where('id',$id);
    $this->db->delete($this->table);
  }

  public function getIdData()
  {
    $this->db->select('*');
    $this->db->where('id',$this->uri->segment(3));

    return $this->db->get($this->table);
  }

}
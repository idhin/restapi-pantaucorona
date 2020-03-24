<?php 

class Event extends CI_Model
{
    public function getEvent($key = null, $value = null){
        if ($key != null){
            $query = $this->db->get_where('tb_simulasi',array($key => $value));
            return $query->row();
        }
        $query = $this->db->get('tb_simulasi');
        return $query->result();

        // $this->db->select('*');
        // $this->db->from('tb_simulasi');
        // $this->db->limit(5);
        // $tampung = $this->db->get();
        // return $tampung->result();
    }

}

?>
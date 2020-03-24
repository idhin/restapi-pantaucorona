<?php 

class User extends CI_Model
{

    public function positif(){
        $sumber = 'http://api.kawalcorona.com/positif';
        $konten = file_get_contents($sumber);
        $object = json_decode($konten, true);

        return $object;
    }

    public function dunia(){
        $sumber = 'http://api.kawalcorona.com/';
        $konten = file_get_contents($sumber);
        $object = json_decode($konten, true);

        return $object;
    }

    public function indonesia(){
        $sumber = 'http://api.kawalcorona.com/indonesia';
        $konten = file_get_contents($sumber);
        $object = json_decode($konten, true);

        return $object;
    }

    public function provinsi(){
        $sumber = 'http://api.kawalcorona.com/indonesia/provinsi';
        $konten = file_get_contents($sumber);
        $object = json_decode($konten, true);

        return $object;
    }
    
    public function sembuh(){
        $sumber = 'http://api.kawalcorona.com/sembuh';
        $konten = file_get_contents($sumber);
        $object = json_decode($konten, true);

        return $object;
    }

    public function meninggal(){
        $sumber = 'http://api.kawalcorona.com/meninggal';
        $konten = file_get_contents($sumber);
        $object = json_decode($konten, true);

        return $object;
    }

    public function save()
    {
        $data = [
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama' => $this->input->post('nama'),
                'noTelp' => $this->input->post('noTelp'),
                'asalSekolah' => $this->input->post('asalSekolah'),
                'kelas' => $this->input->post('kelas'),
        ];
        if ($this->db->insert('tb_pelanggan',$data)){
            return [
                    'id' => $this->db->insert_id(),
                    'success' => TRUE,
                    'message' => 'data berhasil dimasukkan'
            ];
        };
    }

    public function get($key = null, $value = null)
    {
        if ($key != null){
            $query = $this->db->get_where('tb_pelanggan',array($key => $value));
            return $query->row();
        }

        $query = $this->db->get('tb_pelanggan');
        return $query->result();
    }

    public function is_valid()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $hash = $this->get('email', $email)->password;

        if(password_verify($password, $hash))
            return true;
        return false;
        
    }

}

?>
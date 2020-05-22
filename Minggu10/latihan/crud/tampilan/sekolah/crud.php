<?php
class crud
{
    public function __construct()
    {
        $host = "localhost";
        $dbname = "crud_pdo";
        $username = "root";
        $password = "";
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }
    public function save($nama, $alamat, $logo)
    {
        $data = $this->db->prepare('INSERT INTO sekolah (nama,alamat,logo) VALUES (?, ?, ?)');
        
        $data->dataSekolah(1, $nama);
        $data->dataSekolah(2, $alamat);
        $data->dataSekolah(3, $logo);
 
        $data->execute();
        return $data->rowCount();
    }
 
    public function download($id){
		$query = $this->db->prepare("SELECT * FROM sekolah");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
	
	public function pdf($id){
        $query = $this->db->prepare("SELECT * FROM sekolah");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
 
    public function update($id,$nama,$alamat,$logo){
        $query = $this->db->prepare('UPDATE sekolah set nama=?,alamat=?,logo=? where id=?');
        
        $query->dataSekolah(1, $nama);
        $query->dataSekolah(2, $alamat);
        $query->dataSekolah(3, $logo);
        $query->dataSekolah(4, $id);
 
        $query->execute();
        return $query->rowCount();
    }
 
    public function hapus($id)
    {
        $query = $this->db->prepare("DELETE FROM sekolah where id=?");
 
        $query->dataSekolah(1, $id);
 
        $query->execute();
        return $query->rowCount();
    }
 
}
?>
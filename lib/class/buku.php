<?php
/**
 * 
 */
class Buku extends Koneksi
{
	function getData()
	{
		$query  = "SELECT * FROM buku";
		$sql 	= $this->db->query($query);
		return $sql;
	}	

	function addData($judul,$pengarang,$penerbit,$inventaris){
		$query 	= "INSERT INTO buku VALUES(NULL,'$judul','$pengarang','$penerbit','$inventaris',NULL,NULL)";
		$sql 	= $this->db->query($query);
		return $sql;
	}

	function deleteData($id){
		$query = "DELETE FROM buku WHERE id = '$id'";
		$sql   = $this->db->query($query);
		return $sql;
	}

	function editData($id,$judul,$pengarang,$penerbit,$inventaris){
		$query = "UPDATE buku SET judul = '$judul',
				pengarang = '$pengarang', 
				penerbit = '$penerbit', 
				inventaris = '$inventaris'
				WHERE id = '$id'";
		$sql = $this->db->query($query);
		return $sql;

	}

}

?>
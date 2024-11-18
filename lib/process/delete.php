<?php
require_once('../lib.php');
$id = $_GET['id'];
$del = $buku->deleteData($id);

if($del){
	header("location:../../index.php?status=hapus_sukses");
}else{
	header("location:../../index.php?status=hapus_gagal");
}

?>
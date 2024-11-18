<?php
	require_once('../lib.php');

	$id 		= $_POST['id_buku'];
	$judul 		= $_POST['judul'];
	$pengarang 	= $_POST['pengarang'];
	$penerbit 	= $_POST['penerbit'];	 
	$inventaris = $_POST['inventaris'];	 
	$edit_data = $buku->editData($id,$judul,$pengarang,$penerbit,$inventaris);

	if($edit_data){
		header("location:../../index.php?status=edit_success");
	}
	else{
		header("location:../../index.php?status=edit_failed");
	}
?>
<?php
/**
 * 
 */
class Koneksi
{
	
	function __construct()
	{
		$this->db = new mysqli("localhost","root","","perpus");
	}
}



?>
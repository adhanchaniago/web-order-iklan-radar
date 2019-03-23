<?php
	
	function addPelanggan($data) {

		global $mysqli;

		$arr_field = array();
		$arr_value = array();

		//pecahkan array field dan value
		foreach ($data as $field => $value) {
			$arr_field[] = $field;
			$arr_value[] = "'".$value."'";
		}

		//gabungkan array field : field1, field2, dst..
		$fields = implode(',', $arr_field);
		$values = implode(',',$arr_value);
	
		$SQL = "INSERT INTO T_pelanggan (".$fields.") VALUES (".$values.")";	
	
		$mysqli->query($SQL);
		
		return true;
	}

	function getLastNoPelanggan() {
		global $mysqli;

		$_SQL 		= $mysqli->query("SELECT max(no_pelanggan) as maxNo FROM T_pelanggan");
		$_DATA 		= mysqli_fetch_array($_SQL);
		$LastNoPelanggan = $_DATA['maxNo'];
		
		return $LastNoPelanggan;
	}

	function getNoPelanggan($user_id) {
		global $mysqli;

		$_SQL 		= $mysqli->query("SELECT no_pelanggan FROM T_pelanggan WHERE user_id='".$user_id."'");
		$_DATA 		= mysqli_fetch_array($_SQL);
		$NoPelanggan = $_DATA['no_pelanggan'];
		
		return $NoPelanggan;
	}

	function getPelangganOrderList($no_pelanggan) {
		global $mysqli;

		$_SQL	= $mysqli->query("SELECT * FROM T_order WHERE no_pelanggan='".$no_pelanggan."'");
		$OrderList = array();
		while ($_DATA  = mysqli_fetch_array($_SQL)) {
			$OrderList[] = $_DATA;
		}

		return $OrderList;
	}

	function getPelangganItems($item, $no_pelanggan) {
		global $mysqli;

		$_SQL 		= $mysqli->query("SELECT * FROM T_pelanggan WHERE no_pelanggan='".$no_pelanggan."'");
		$_DATA 		= mysqli_fetch_array($_SQL);
		switch ($item) {
			case 'nama':
				$PelangganItem = $_DATA['nama'];
				break;
			case 'alamat':
				$PelangganItem = $_DATA['alamat_pemesan'];
				break;
			case 'perusahaan':
				$PelangganItem = $_DATA['nama_perusahaan'];
				break;
			case 'alamat-kantor':
				$PelangganItem = $_DATA['alamat_kantor'];
				break;
			case 'telepon':
				$PelangganItem = $_DATA['no_telepon'];
				break;
			default:
				# code...
				break;
		}
		
		
		return $PelangganItem;
	}

	function getStatusOrder($status) {
		switch ($status) {
			case 0:
				$status_order = 'Konfirmasi Pembayaran';
			break;
			case 1:
				$status_order = 'Menunggu Verifikasi';
			break;
			case 2:
				$status_order = 'Menunggu Verifikasi';
			break;
		}

		return $status_order;
	} 
	
?>
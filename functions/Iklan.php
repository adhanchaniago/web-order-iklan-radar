<?php

	function getJenisIklan() {
		global $mysqli;

		$_SQL	= $mysqli->query("SELECT * FROM T_iklan");

		while ($_DATA  = mysqli_fetch_array($_SQL)) {
			$JeniIklan[] = $_DATA;
		}


		return $JeniIklan;
	}

	function getIklanItems($item, $kode_iklan) {
		global $mysqli;

		$_SQL	= $mysqli->query("SELECT * FROM T_iklan WHERE kode_iklan='".$kode_iklan."'");

		$_DATA  = mysqli_fetch_array($_SQL);

		switch ($item) {
			case 'jenis-iklan':
				$IklanItems = $_DATA['jenis_iklan'];
			break;
			
			case 'harga-iklan':
				$IklanItems = $_DATA['harga'];
			break;
			
			case 'warna-iklan':
				if ($_DATA['jenis_warna'] == 'BW') {
					$_DATA['jenis_warna'] = 'Hitam Putih';	
				}
				elseif ($_DATA['jenis_warna'] == 'FC') {
					$_DATA['jenis_warna'] = 'Full Color';
				}
				$IklanItems = $_DATA['jenis_warna'];
			break;
			
			
			default:
				$IklanItems = 0;
			break;
		}
		

		return $IklanItems;
	}

	function getDetailIklan($kode_iklan) {
		global $mysqli;

		$_SQL	= $mysqli->query("SELECT * FROM T_iklan WHERE kode_iklan='".$kode_iklan."'");

		while ($_DATA  = mysqli_fetch_array($_SQL)) {
			$DetailIklan[] = $_DATA;
		}

		return $DetailIklan;
	}

	function addOrderIklan($no_pelanggan="", $kode_iklan="", $total_harga="", $ukuran="") {
		global $mysqli;
		
		$mysqli->query("INSERT INTO T_order(
										no_pelanggan,
										kode_iklan,
										total_harga,
										ukuran
									) 
						VALUES(
							'".$no_pelanggan."',
							'".$kode_iklan."',
							'".$total_harga."',
							'".$ukuran."')"
					);

		return true;
	}

	function getLastNoOrder() {
		global $mysqli;

		$_SQL 		= $mysqli->query("SELECT max(no_order) as maxNo FROM T_order");
		$_DATA 		= mysqli_fetch_array($_SQL);
		$LastNoOrder = $_DATA['maxNo'];
		
		return $LastNoOrder;
	}
?>
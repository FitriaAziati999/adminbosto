<div class="container-fluid" style="text-align:center;">
<?php if($nokartu=="") { ?>
<h3>Absen : <?php  echo $mode; ?></h3>
<h3>Silahkan tempelkan RFID anda</h3>
<img src="<?=base_url()?>/template/assets/img/rfid.png" style="width: 200px"> <br>
<img src="<?=base_url()?>/template/assets/img/animasi2.gif">
<?php } else {
    $db = db_connect();
		//cek nomor kartu RFID tersebut apakah terdaftar di tabel karyawan
		$cari_karyawan = $db->query("SELECT * from karyawan where nokartu='$nokartu'");
		$jumlah_data = $cari_karyawan->getNumRows();

		if($jumlah_data==0)
			echo "<h1>Maaf! Kartu Tidak Dikenali</h1>";
		else
		{
			//ambil nama karyawan
			var_dump($nokartu);
			$data_karyawan= $cari_karyawan->getRowArray();
			$nama = $data_karyawan['nama_karyawan'];

			//tanggal dan jam hari ini
			date_default_timezone_set('Asia/Jakarta') ;
			$tanggal = date('Y-m-d');
			$jam     = date('H:i:s');

			//cek di tabel absensi, apakah nomor kartu tersebut sudah ada sesuai tanggal saat ini. Apabila belum ada, maka dianggap absen masuk, tapi kalau sudah ada, maka update data sesuai mode absensi
			$cari_absen = $db->query("SELECT * FROM absensi where nokartu='$nokartu' and tanggal='$tanggal'");
			//hitung jumlah datanya
			$jumlah_absen = $cari_absen->getNumRows();
			if($jumlah_absen == 0)
			{
				echo "<h1>Selamat Datang <br> $nama</h1>";
				$query = $db->query("INSERT absensi (nokartu, tanggal, jam_masuk)VALUES($nokartu', '$tanggal', '$jam')");
			}
			else
			{
				//update sesuai pilihan mode absen
				if($mode_absen == 2)
				{
					echo "<h1>Selamat Istirahat <br> $nama</h1>";
					$query = $db->query("UPDATE absensi set jam_istirahat='$jam' where nokartu='$nokartu' and tanggal='$tanggal'");
				}
				else if($mode_absen == 3)
				{
					echo "<h1>Selamat Datang Kembali <br> $nama</h1>";
					$query = $db->query("UPDATE absensi set jam_kembali='$jam' where nokartu='$nokartu' and tanggal='$tanggal'");
				}
				else if($mode_absen == 4)
				{
					echo "<h1>Selamat Jalan <br> $nama</h1>";
					$query = $db->query("UPDATE absensi set jam_pulang='$jam' where nokartu='$nokartu' and tanggal='$tanggal'");
				}
			}
		}

		//kosongkan tabel tmprfid
		$query = $db->query("DELETE from tmprfid");
	} ?>

</div>
</div>  
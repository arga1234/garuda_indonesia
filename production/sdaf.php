

<!DOCTYPE html>
<html lang="en">

	<body>
		<!-- Membuat Menu Header / Navbar -->
	
		
		<!-- Content -->
		<div style="padding: 0 15px;">
		
			<a href="form_upload.php" class="btn btn-success pull-right">
				<span class="glyphicon glyphicon-upload"></span> Import Data
			</a>
			
			<h3>Data Hasil Import</h3>
			
			<hr>
			
			<!-- Buat sebuah div dan beri class table-responsive agar tabel jadi responsive -->
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th>No</th>
						<th>ID Karyawan</th>
						<th>Tangibles</th>
						<th>Reliability</th>
						<th>Responsiveness</th>
						<th>Assurance</th>
						<th>Empathy</th>
					</tr>
					<?php
					// Load file koneksi.php
					include "koneksi_php.php";
					
					// Buat query untuk menampilkan semua data survey
					$sql = $pdo->prepare("SELECT * FROM datasurvey");
					$sql->execute(); // Eksekusi querynya
					
					$no = 1; // Untuk penomoran tabel, di awal set dengan 1
					while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
						echo "<tr>";
						echo "<td>".$no."</td>";
						echo "<td>".$data['id']."</td>";
						echo "<td>".$data['tangibles']."</td>";
						echo "<td>".$data['reliability']."</td>";
						echo "<td>".$data['responsiveness']."</td>";
						echo "<td>".$data['assurance']."</td>";
						echo "<td>".$data['empathy']."</td>";
						echo "</tr>";
						
						$no++; // Tambah 1 setiap kali looping
					}
					?>
				</table>
			</div>
		</div>
	</body>
</html>

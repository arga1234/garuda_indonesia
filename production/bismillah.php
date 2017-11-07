<!-- Buat Preview Data -->
			<?php
			// Jika user telah mengklik tombol Preview
			if(isset($_POST['preview'])){
				//$ip = ; // Ambil IP Address dari User
				$nama_file_baru = 'data.xlsx';

				// Cek apakah terdapat file data.xlsx pada folder tmp
				if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
					unlink('tmp/'.$nama_file_baru); // Hapus file tersebut

				$tipe_file = $_FILES['file']['type']; // Ambil tipe file yang akan diupload
				$tmp_file = $_FILES['file']['tmp_name'];

				// Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
				if($tipe_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
					// Upload file yang dipilih ke folder tmp
					// dan rename file tersebut menjadi data{ip_address}.xlsx
					// {ip_address} diganti jadi ip address user yang ada di variabel $ip
					// Contoh nama file setelah di rename : data127.0.0.1.xlsx
					move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);

					// Load librari PHPExcel nya
					require_once 'PHPExcel/PHPExcel.php';

					$excelreader = new PHPExcel_Reader_Excel2007();
					$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
					$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

					// Buat sebuah tag form untuk proses import data ke database
					echo "<form method='post' action='import'>";

					// Buat sebuah div untuk alert validasi kosong
					echo "<div class='alert alert-danger' id='kosong'>
					Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
					</div>";

					echo "<table class='table table-bordered'>
					<tr>
						<th colspan='12' class='text-center'>Preview Data</th>
					</tr>
					<tr>

            <th>ID Karyawan</th>
            <th>Tangibles</th>
            <th>Reliability</th>
            <th>Responsiveness</th>
            <th>Assurance</th>
            <th>Empathy</th>
					</tr>";

					$numrow = 1;
					$kosong = 0;
					foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
						// Ambil data pada excel sesuai Kolom
            $id = $row['I']; // Ambil data NIS
            $tangibles = $row['J']; // Ambil data nama
            $reliability = $row['K']; // Ambil data jenis kelamin
            $responsiveness= $row['L']; // Ambil data telepon
            $assurance= $row['M']; // Ambil data alamat
            $empathy= $row['N']; // Ambil data alamat

						// Cek jika semua data tidak diisi
            if(empty($id) && empty($tangibles) && empty($reliability) && empty($responsiveness) && empty($assurence)&& empty($emphaty))
              continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

						// Cek $numrow apakah lebih dari 1
						// Artinya karena baris pertama adalah nama-nama kolom
						// Jadi dilewat saja, tidak usah diimport
						if($numrow > 1){
							// Validasi apakah semua data telah diisi
              $id_td = ( ! empty($id))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
              $tangibles_td = ( ! empty($tangibles))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
              $reliability_td = ( ! empty($reliability))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
              $responsiveness_td = ( ! empty($responsiivness))? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
              $assurance_td = ( ! empty($assurence))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
              $empathy_td = ( ! empty($emphaty))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah

							// Jika salah satu data ada yang kosong
              if(empty($id) or empty($tangibles) or empty($reliability) or empty($responsiveness) or empty($assurance)or empty($empathy))
			  {
                $kosong++; // Tambah 1 variabel $kosong
              }

							echo "<tr>";
              echo "<td".$id_td.">".$id."</td>";
              echo "<td".$tangibles.">".$tangibles."</td>";
              echo "<td".$reliability_td.">".$reliability."</td>";
              echo "<td".$responsiveness_td.">".$responsiveness."</td>";
              echo "<td".$assurance_td.">".$assurance."</td>";
              echo "<td".$empathy_td.">".$empathy."</td>";
							echo "</tr>";
						}

						$numrow++; // Tambah 1 setiap kali looping
					}

					echo "</table>";

					// Cek apakah variabel kosong lebih dari 1
					// Jika lebih dari 1, berarti ada data yang masih kosong
					if($kosong > 1000){
					?>
						<script>
						$(document).ready(function(){
							// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
							$("#jumlah_kosong").html('<?php echo $kosong; ?>');

							$("#kosong").show(); // Munculkan alert validasi kosong
						});
						</script>
					<?php
					}else{ // Jika semua data sudah diisi
						echo "<hr>";

						// Buat sebuah tombol untuk mengimport data ke database
						echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";
					}

					echo "</form>";
				}else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
					// Munculkan pesan validasi
					echo "<div class='alert alert-danger'>
					Hanya File Excel 2007 (.xlsx) yang diperbolehkan
					</div>";
				}
			}
			?>
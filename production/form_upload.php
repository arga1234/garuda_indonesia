<?php
  include 'generate.php';
  session_start();

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <!-- CSS untuk Form Upload Download-->
    <link href="../production/css/UploadDownload.css" rel="stylesheet" type="text/css" >
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Survey Garuda</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['username']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
              <br/>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-edit"></i> Survey <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form.php">Isi Questionaire</a></li>
                      <li><a href="form_upload.php">Form Upload</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.php">Chart</a></li>
                      <li><a href="tables.php">Top 3 and Bottom 3</a></li>
                    </ul>
                  </li>
                  <li><a href="edit_form.php"><i class="fa fa-bar-chart-o"></i> Edit Form <span class="fa"></span></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php echo $_SESSION['username']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="index.php?logout='1"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Form Upload </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>


            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">


<div class="tab">
  <button class="tablinks" onclick="openLoad(event, 'Paris')">Click Here</button>
</div>

<div class="x_panel">
  <div class="x_content">
    <div id="London" class="tabcontent">
      <div class="x_title">
        <h3></h3>
          </div>
          <p></p>
        </div>

<div id="Paris" class="tabcontent">

        <!-- file php IMPORT-->
    <!-- Membuat Menu Header / Navbar -->
    <!-- Content -->
    <div style="padding: 0 15px;">
      <!-- Buat sebuah tombol Cancel untuk kemabli ke halaman awal / view data -->

      <div class="x_title">
      <h3>Welcome</h3>
      <p> Download dan isi form survey di bawah ini terlebih dahulu sebelum mengupload </p>
      <hr>

      <!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
      <form method="post" action="" enctype="multipart/form-data">
        <a href="proses.php" class="btn btn-default">
          <span class="glyphicon glyphicon-download"></span>
          Download dokumen di sini
        </a><br><br>

        <!-- Buat sebuah input type file class pull-left berfungsi agar file input berada di sebelah kiri-->
        <input type="file" name="file" class="pull-left">

        <button type="submit" name="preview" class="btn btn-success btn-sm">
          <span class="glyphicon glyphicon-eye-open"></span> Preview
        </button>
      </form>

      <hr>



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
					echo "<form method='post' action='import_php.php'>";

					// Buat sebuah div untuk alert validasi kosong
				

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

					$numrow = 2;
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
						if($numrow > 3){
							// Validasi apakah semua data telah diisi
              $id_td = ( ! empty($id))? "" : " style='background: #e0e0e0;'"; // Jika NIS kosong, beri warna merah
              $tangibles_td = ( ! empty($tangibles))? "" : " style='background: #e0e0e0;'"; // Jika Nama kosong, beri warna merah
              $reliability_td = ( ! empty($reliability))? "" : " style='background: #e0e0e0;'"; // Jika Jenis Kelamin kosong, beri warna merah
              $responsiveness_td = ( ! empty($responsiveness))? "" : " style='background: #e0e0e0;'"; // Jika Telepon kosong, beri warna merah
              $assurance_td = ( ! empty($assurance))? "" : " style='background: #e0e0e0;'"; // Jika Alamat kosong, beri warna merah
              $empathy_td = ( ! empty($empathy))? "" : " style='background: #e0e0e0;'"; // Jika Alamat kosong, beri warna merah

							// Jika salah satu data ada yang kosong
              if(empty($id) or empty($tangibles) or empty($reliability) or empty($responsiveness) or empty($assurance)or empty($empathy))
			  {
                $kosong++; // Tambah 1 variabel $kosong
              }

							echo "<tr>";
              echo "<td".$id_td.">".$id."</td>";
              echo "<td".$tangibles_td.">".$tangibles."</td>";
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
					if($kosong > 1110){
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
    </div>
</div>
        <!-- file IMPORT kelar-->
      </div>

<div id="Tokyo" class="tabcontent">
  <h3></h3>
  <p></p>
</div>
                    <br />
                    <br />
                    <br />
                    <br />
                  </div>
                </div>

            
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <script src="../production/js/UploadDownload.js"></script>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Dropzone.js -->
    <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>

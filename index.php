<?php include "header.php"; include "koneksi.php"; ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-desktop"></i> Total Lowongan</span>
              <?php
              $sql = mysqli_query($konek,"SELECT*FROM tb_info");
              $a = mysqli_num_rows($sql);
              ?>
              <div class="count"><?php echo $a; ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-bank"></i></i>  Dari Perusahaan</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-envelope"></i> Total Surat Masuk</span>
              <?php
              $sql = mysqli_query($konek,"SELECT*FROM tb_surat_masuk");
              $b = mysqli_num_rows($sql);
              ?>
              <div class="count"><?php echo $b ?></div>
              <?php 
              $date = explode('-', date('Y-m-d'));
              $th = $date[0];
              $bl = $date[1];
              $sql = mysqli_query($konek,"SELECT*FROM tb_surat_masuk WHERE month(tanggal_surat)='$bl' AND year(tanggal_surat)='$th'");
              $c = mysqli_num_rows($sql);
              ?>
              <span class="count_bottom"><i class="green"><i class="fa fa-calculator"></i>  <?php echo $c; ?></i> Bulan Ini </span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Laki-Laki</span>
              <?php
              $sql = mysqli_query($konek,"SELECT*FROM tb_pencaker WHERE jenis_kelamin='Laki-Laki'");
              $d = mysqli_num_rows($sql);
              ?>
              <div class="count green"><?php echo $d ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-male"></i></i> Orang</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Perempuan</span>
              <?php
              $sql = mysqli_query($konek,"SELECT*FROM tb_pencaker WHERE jenis_kelamin='Perempuan'");
              $e = mysqli_num_rows($sql);
              ?>
              <div class="count"><?php echo $e ?></div>
              <span class="count_bottom"><i class="red"><i class="fa fa-female"></i></i> Orang</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Pedaftar</span>
              <?php
              $sql = mysqli_query($konek,"SELECT*FROM tb_pencaker");
              $f = mysqli_num_rows($sql);
              ?>
              <div class="count"><?php echo $f ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-users"></i></i> Orang</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Perusahaan</span>
              <?php
              $sql = mysqli_query($konek,"SELECT*FROM tb_perusahaan");
              $g = mysqli_num_rows($sql);
              ?>
              <div class="count"><?php echo $g ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-building"></i></i> Perusahaan</span>
            </div>
          </div>
          <!-- /top tiles -->
          <div class="row" align="center">
            <img src="fpdf/banjar.png" width="260px">
          </div>


        </div>
        <!-- /page content -->
<?php include "footer.php"; ?>
<?php include "header.php"; include "koneksi.php";?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <?php
                  if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                ?>
                  <div id="pesan" class="alert alert-dismissible alert-success" style="display:none;">
                    <h6><i class="fa fa-check"></i> INFORMASI</h6>
                    <?php echo $_SESSION['pesan']?>
                  </div>
                <?php }
                  $_SESSION['pesan'] = '';
                ?>
                <div class="x_panel">
                  <div class="x_title">
                    <div class="row">
                      <div class="col-md-6">
                        <h2>Info Lowongan Kerja</h2>
                      &nbsp;&nbsp;<a href="lowongan_tambah" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
                      <a href="lowongan_cetak?bln=<?php echo $_GET['bln'] ?>" class="btn btn-danger btn-sm" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                      </div>
                      <div class="col-md-6">
                        <form method="get">
                          <select class="form-control" name="bln" onchange="this.form.submit()">
                            <option>-PILIH-</option>
                            <option value="ALL">SEMUA</option>
                            <?php
                        $sql = mysqli_query($konek,"SELECT tgl_mulai FROM tb_info GROUP BY month(tgl_mulai)");
                        foreach($sql as $tg){
                          $tgl = explode('-', $tg['tgl_mulai']);
                          $th = $tgl[0];
                          $bl = $tgl[1];
                          $tm = $th.'-'.$bl;
                          ?>
                            <option value="<?php echo $tm ?>"><?php echo $tm ?></option>
                        <?php } ?>
                          </select>
                        </form>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered table-condensed">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Id</th>
                          <th>Tanggal Mulai</th>
                          <th>Tanggal Selesai</th>
                          <th>Perusahaan</th>
                          <th>Kontak</th>
                          <th>Handphone</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1; 
                        $bl = $_GET['bln'];
                        if($bl=='ALL'){
                          $sql = mysqli_query($konek,"SELECT*FROM tb_info");  
                        }else{
                          $t = explode('-', $_GET['bln']);
                          $th = $t[0];
                          $bl = $t[1];
                          $sql = mysqli_query($konek,"SELECT*FROM tb_info WHERE month(tgl_mulai)='$bl' AND year(tgl_mulai)='$th'");  
                        } 
                        foreach($sql as $tm){
                        ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $tm['id'] ?></td>
                          <td><?php echo tgl_indo($tm['tgl_mulai']) ?></td>
                          <td><?php echo tgl_indo($tm['tgl_selesai']) ?></td>
                          <td><?php echo $tm['perusahaan'] ?></td>
                          <td><?php echo $tm['pic'] ?></td>
                          <td><?php echo $tm['kontak'] ?></td>
                          <td>
                            <a href="lowongan_edit?ref=<?php echo $tm['id'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                            <a onclick="return confirm('Apakah Anda Yakin')" href="lowongan_hapus?ref=<?php echo $tm['id'] ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?php include "footer.php" ?>
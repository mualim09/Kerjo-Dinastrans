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
                        <h2>Data Surat Masuk</h2>
                      &nbsp;&nbsp;<a href="surat_masuk_tambah" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
                      <a href="surat_masuk_cetak?bln=<?php echo $_GET['bln'] ?>" class="btn btn-danger btn-sm" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                      </div>
                      <div class="col-md-6">
                        <form method="get">
                          <select class="form-control" name="bln" onchange="this.form.submit()">
                            <option>-PILIH-</option>
                            <option value="ALL">SEMUA</option>
                            <?php
                        $sql = mysqli_query($konek,"SELECT tanggal_surat FROM tb_surat_masuk GROUP BY month(tanggal_surat)");
                        foreach($sql as $tg){
                          $tgl = explode('-', $tg['tanggal_surat']);
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
                          <th>Nama Perusahaan</th>
                          <th>Tanggal Masuk</th>
                          <th>Pengirim</th>
                          <th>Kontak</th>
                          <th>Lampiran</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        $bl = $_GET['bln'];
                        if($bl=='ALL'){
                          $sql = mysqli_query($konek,"SELECT*FROM tb_surat_masuk");  
                        }else{
                          $t = explode('-', $_GET['bln']);
                          $th = $t[0];
                          $bl = $t[1];
                          $sql = mysqli_query($konek,"SELECT*FROM tb_surat_masuk WHERE month(tanggal_surat)='$bl' AND year(tanggal_surat)='$th'");  
                        } 
                        
                        foreach($sql as $tm){
                        ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $tm['id_penerima'] ?></td>
                          <td><?php echo $tm['perusahaan'] ?></td>
                          <td><?php echo tgl_indo($tm['tanggal_surat']) ?></td>
                          <td><?php echo $tm['nama_pengirim'] ?></td>
                          <td><?php echo $tm['kontak'] ?></td>
                          <td><a href="lampiran/<?php echo $tm['upload']; ?>" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-eye"></i></a></td>
                          <td width="7%">
                            <a href="surat_masuk_edit?ref=<?php echo $tm['id_penerima'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                            <a onclick="return confirm('Apakah Anda Yakin')" href="surat_masuk_hapus?ref=<?php echo $tm['id_penerima'] ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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
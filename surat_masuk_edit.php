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
                    <h2>Update Data Surat Masuk</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <?php
                    $id = $_GET['ref'];
                    $sql = mysqli_query($konek,"SELECT*FROM tb_surat_masuk WHERE id_penerima='$id'");
                    foreach($sql as $sm){
                    ?>
                    <form method="post" action="surat_masuk_upd.php" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Perusahaan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="id" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $sm['id_penerima']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Penerima</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="pic" value="<?php echo $sm['nama_penerima'] ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Perusahaan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="nama" class="form-control" required="required">
                            <option>-PILIH-</option>
                            <?php
                            $sql = mysqli_query($konek,"SELECT perusahaan FROM tb_perusahaan ORDER BY perusahaan");
                            foreach($sql as $pr){
                            ?>
                            <option value="<?php echo $pr['perusahaan'] ?>"<?php if($pr['perusahaan']==$sm['perusahaan']){echo 'selected';} ?>><?php echo $pr['perusahaan'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="date" name="tgl" required="required" value="<?php echo $sm['tanggal_surat'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pengirim <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="peng" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $sm['nama_pengirim'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kontak <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="con" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $sm['kontak'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File <span class="required">*</span>
                        </label>
                        <input type="hidden" name="file" value="<?php echo $sm['upload'] ?>">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="upd" class="form-control">
                        </div>
                        <small class="text-danger">*Biarkan kosong jika gambar tidak diganti</small>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Simpan</button>
                          <a href="surat_masuk?bln=ALL" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                        </div>
                      </div>
                    </form>
                  <?php } ?>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->

<?php include "footer.php";?>
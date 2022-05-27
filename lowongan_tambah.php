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
                    <h2>Tambah Lowongan Kerja</h2>
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
                    <form method="post" action="lowongan_act.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <?php
                          $query = "SELECT max(id) as maxid FROM tb_info";
                          $hasil = mysqli_query($konek,$query);
                          $data = mysqli_fetch_array($hasil);
                          $id = $data['maxid'];
                          $noUrut = (int) substr($id, 2, 3);
                          $noUrut++;
                          $char = "LK";
                          $cde = $char . sprintf("%02s", $noUrut);
                        ?>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Lowongan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="id" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $cde; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tanggal Mulai <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" name="tgm" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Selesai</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="date" name="tgs" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Perusahaan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="per" id="per" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" placeholder="Cari Nama Perusahaan...">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Personal In Charge (PIC) <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="pic" id="pic" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kontak <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="hp" id="hp" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Perusahaan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="alm" id="alm" class="date-picker form-control col-md-7 col-xs-12" required="required" readonly></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Simpan</button>
                          <a href="lowongan?bln=ALL" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->

<?php include "footer.php";?>
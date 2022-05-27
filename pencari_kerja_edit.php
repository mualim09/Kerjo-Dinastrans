<?php include "header.php"; include "koneksi.php";?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Update Data Pencari Kerja</h2>
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
                    $sql = mysqli_query($konek,"SELECT*FROM tb_pencaker WHERE id_pencaker='$id'");
                    foreach($sql as $pc){
                    ?>
                    <form method="post" action="pencari_kerja_upd.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Pencari Kerja <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="id" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $pc['id_pencaker'] ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tanggal Pendaftaran <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" name="tgl_cari" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $pc['tanggal_pendaftar'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nomor KTP</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="ktp" maxlength="16" required value="<?php echo $pc['no_ktp'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="nama" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $pc['nama'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Lahir <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="tmp" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $pc['tempat_lahir'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="tgl" class="date-picker form-control col-md-7 col-xs-12" required="required" type="date" value="<?php echo $pc['tanggal_lahir'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <p style="margin-top: 8px;">
                        Laki-Laki
                        <input type="radio" class="flat" name="jk" value="Laki-Laki"<?php if($pc['jenis_kelamin']=='Laki-Laki'){echo 'checked';} ?> required /> Perempuan
                        <input type="radio" class="flat" name="jk" value="Perempuan"<?php if($pc['jenis_kelamin']=='Perempuan'){echo 'checked';} ?> required />
                      </p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Agama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="agama" class="form-control">
                            <option>-PILIH-</option>
<option value="Islam"<?php if($pc['agama']=='Islam'){echo 'selected';} ?>>Islam</option>
<option value="Kristen"<?php if($pc['agama']=='Kristen'){echo 'selected';} ?>>Kristen</option>
<option value="Katholik"<?php if($pc['agama']=='Katholik'){echo 'selected';} ?>>Katholik</option>
<option value="Hindu"<?php if($pc['agama']=='Hindu'){echo 'selected';} ?>>Hindu</option>
<option value="Budha"<?php if($pc['agama']=='Budha'){echo 'selected';} ?>>Budha</option>
<option value="Konghuchu"<?php if($pc['agama']=='Konghuchu'){echo 'selected';} ?>>Konghuchu</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="alm" class="date-picker form-control col-md-7 col-xs-12" required="required"><?php echo $pc['alamat'] ?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <p style="margin-top: 8px;">
                        Single
                        <input type="radio" class="flat" name="status" value="Single" required <?php if($pc['status']=='Single'){echo 'checked';} ?>/> Menikah
                        <input type="radio" class="flat" name="status" value="Menikah" required <?php if($pc['status']=='Menikah'){echo 'checked';} ?>/>
                        Cerai
                        <input type="radio" class="flat" name="status" value="Cerai" required <?php if($pc['status']=='Cerai'){echo 'checked';} ?>/>
                      </p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tinggi Badan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="tb" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $pc['tinggi_badan'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Berat Badan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="bb" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $pc['berat_badan'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Handphone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="hp" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $pc['no_hp'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="email" class="date-picker form-control col-md-7 col-xs-12" required="required" type="email" value="<?php echo $pc['email'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pendidikan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="pend" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $pc['pendidikan'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jurusan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="jrs" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $pc['jurusan'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tahun <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="thn" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $pc['tahun'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nilai <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="nilai" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $pc['nilai'] ?>">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Simpan</button>
                          <a href="pencari_kerja" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
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
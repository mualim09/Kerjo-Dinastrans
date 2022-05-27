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
                    <h2>Data Perusahaan</h2>
                    &nbsp;&nbsp;<a href="perusahaan_tambah" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
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
                    <table id="datatable" class="table table-striped table-bordered table-condensed">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Id</th>
                          <th>Nama Perusahaan</th>
                          <th>Nama PIC</th>
                          <th>Jabatan</th>
                          <th>Kontak</th>
                          <th>Alamat</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1; 
                        $sql = mysqli_query($konek,"SELECT*FROM tb_perusahaan");
                        foreach($sql as $tm){
                        ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $tm['id_perusahaan'] ?></td>
                          <td><?php echo $tm['perusahaan'] ?></td>
                          <td><?php echo $tm['nama_PIC'] ?></td>
                          <td><?php echo $tm['jabatan'] ?></td>
                          <td><?php echo $tm['kontak'] ?></td>
                          <td><?php echo $tm['alamat'] ?></td>
                          <td width="7%">
                            <a href="perusahaan_edit?ref=<?php echo $tm['id_perusahaan'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                            <a onclick="return confirm('Apakah Anda Yakin')" href="perusahaan_hapus?ref=<?php echo $tm['id_perusahaan'] ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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
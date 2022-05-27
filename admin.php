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
                    <h2>Data Admin</h2>
                    &nbsp;&nbsp;<a href="admin_tambah" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</a>
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
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Email</th>
                          <th>Handphone</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1; 
                        $sql = mysqli_query($konek,"SELECT*FROM tb_admin");
                        foreach($sql as $tm){
                        ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $tm['id_admin'] ?></td>
                          <td><?php echo $tm['nama'] ?></td>
                          <td><?php echo $tm['username'] ?></td>
                          <td><?php echo md5($tm['password']) ?></td>
                          <td><?php echo $tm['email'] ?></td>
                          <td><?php echo $tm['handphone'] ?></td>
                          <td>
                            <a onclick="return confirm('Apakah Anda Yakin')" href="admin_hapus?ref=<?php echo $tm['id_admin'] ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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
<?php
require('../../timer_module.php');

if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
  echo "<script>alert('Akses ditolak !!! Silahkan sign ini terlebih dahulu, Terimakasih.'); window.location = '../../index.php'</script>";
} else {
  include '../../header_module.php';
  include '../../menu_module.php';
  include '../../control.php';

  // MODULE PELAYANAN DAN PRODUK \\
  echo " <section id=\"main-content\">
         	<section class=\"wrapper\">
           <div class=\"row mt\">
            <div class=\"col-md-12\">
             <div class=\"content-panel\">
               <div class=\"panel-body\">
                 <a href=\"./laporan-barang-masuk.php\" class=\"btn btn-primary\" target=\"_blank\"><i class=\"fa fa-download\"></i> Download PDF</a>
               </div>
              <table class=\"table table-striped table-advance table-hover\">
                <h4>[ <i class=\"fa fa-info\"> ]</i> Tabel Obat Masuk</h4>
                <hr>
                  <thead>
                  <tr>
                    <th><i class=\"\"></i> No</th>
                    <th><i class=\"\"></i> Tanggal</th>
                    <th><i class=\"\"></i> Nama Obat</th>
                    <th><i class=\"\"></i> Jenis Obat</th>
                    <th><i class=\"\"></i> Fungsi</th>
                    <th><i class=\"\"></i> Stok</th>
                    <th><i class=\"fa fa-edit\"></i> Aksi</th>
                  </tr>
                  </thead>
                  <tbody>";

  $no = 1;
  $show_obat_masuk= mysqli_query($link, "SELECT * FROM tbl_obatmasuk ORDER BY id DESC");
  while ($data_obat_masuk = mysqli_fetch_assoc($tampil_obat_masuk)) {
    echo "
                  <tr>
                    <td>$no</td>
                    <td>$data_obat_masuk[tanggal]</td>
                    <td>$data_obat_masuk[nama_obat]</td>
                    <td>$data_obat_masuk[jenis_obat]</td>
                    <td>$data_obat_masuk[fungsi]</td>
                    <td>$data_obat_masuk[stok]</td>
                    <td>
                      <a href=\"../../module/mod_obat_masuk/aksi.php?obatmasuk=add\"><button class=\"btn btn-success btn-xs\"><i class=\"fa fa-check\"></i></button></a>
                      <a href=\"../../module/mod_obat_masuk/aksi.php?obatmasuk=edit&id=$data_obat_masuk[id]\"><button class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button></a>
                      <a href=\"../../module/mod_obat_masuk/aksi.php?obatmasuk=hapus&id=$data_obat_masuk[id]\"><button class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash-o\"></i></button></a>
                    </td>
                  </tr>";
    $no++;
  }
  echo "
                  </tbody>
                </table>      
                <hr>";
  echo "<div class=\"btn-group1\">";
  for ($i = 1; $i <= $pages_services; $i++) {
    echo "
                      <a href=\"services.php?page=$i\"><button type=\"button\" class=\"btn btn-default\">$i</button></a>";
  }
  echo "  
                </div>";
  mysqli_close($link);

  echo "
              </div><!-- /content-panel -->
          </div><!-- /col-md-12 -->
      </div><!-- /row -->
    </section>
    </section>";

  include '../../footer_module.php';
}

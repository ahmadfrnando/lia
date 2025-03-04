<?php

include '../../header_module.php';
include '../../menu_module.php';
include '../../control.php';

// MODULE PELAYANAN DAN PRODUK \\
$module   = @$_GET['obatmasuk'];

if ($module == "add") {
  $nama_obat      = @$_POST['nama_obat'];
  $jenis_obat = @$_POST['jenis_obat'];
  $fungsi      = @$_POST['fungsi'];
  $stok        = @$_POST['stok'];
  $tanggal        = @$_POST['tanggal'];

  $tambah     = "INSERT INTO tbl_obatmasuk (nama_obat, jenis_obat, fungsi, stok, tanggal)
                  VALUES ('$nama_obat', '$jenis_obat', '$fungsi', '$stok', '$tanggal')";

  echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-check\"> ]</i> Tambah Data Obat Masuk</h4>
                  <hr>
                    <form class=\"form-horizontal style-form\" action=\"../../module/mod_obat_masuk/aksi.php?obatmasuk=add\" method=\"POST\">
                      <div class=\"form-group\">          
                          <label class=\"col-sm-2 col-sm-2 control-label\">Tanggal</label>
                          <div class=\"col-sm-10\">
                              <input type=\"date\" class=\"form-control\" name=\"tanggal\" oninvalid=\"alert('Tanggal harus di isi !');\"required>
                          </div>
                          <label class=\"col-sm-2 col-sm-2 control-label\">Nama Obat</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"nama_obat\" oninvalid=\"alert('Nama Obat harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Jenis Obat</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"jenis_obat\" oninvalid=\"alert('Jenis Obat harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Fungsi</label>
                          <div class=\"col-sm-10\">
                               <textarea cols=\"100\" rows=\"5\" type=\"text\" class=\"form-control\" name=\"fungsi\" oninvalid=\"alert('Fungsi harus di isi !');\"required></textarea>
                          </div>
                          <label class=\"col-sm-2 col-sm-2 control-label\">Stok</label>
                          <div class=\"col-sm-10\">
                               <textarea cols=\"100\" rows=\"5\" type=\"number\" class=\"form-control\" name=\"stok\" oninvalid=\"alert('Stok harus di isi !');\"required></textarea>
                          </div>
                      </div>
                </table>      
                  <hr>
                      <div class=\"btn-group1\">
                          <a href=\"../../module/mod_obat_masuk/aksi.php?obatmasuk=add#\"><button type=\"submit\" name=\"submit\" class=\"btn btn-success\">Simpan</button></a>
                          <a href=\"../../module/mod_obat_masuk/services.php?tbl=obatmasuk\"><button type=\"reset\" name=\"reset\" class=\"btn btn-warning\">Batal</button></a>
                      </div>
                    </form>
               </div><!-- /form-panel -->
              </div><!-- /col-md-12 -->
             </div><!-- /row mt-->
            </section>
           </section>";
  if (isset($_POST['submit'])) {
    if (mysqli_query($link, $tambah)) {
      echo "<script language=\"javascript\">
                         alert (\"Data Berhasil Direkam !!\")
                         document.location=\"services.php?tbl=obatmasuk\";
                       </script>";
    } else {
      echo "<script language=\"javascript\">
                         alert (\"Gagal Input Data\")
                         document.location=\"aksi.php?obatmasuk=add\";
                      </script>";
    }
  }
  mysqli_close($link);
}


if ($module == "edit") {
  $id          = @$_GET['id'];

  $edit         = mysqli_query($link, "SELECT * FROM tbl_obatmasuk WHERE id='$id'");
  $showobatmasuk = mysqli_fetch_array($edit);

  echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-edit\"> ]</i> Edit Data Obat Masuk</h4>
                  <hr>
                    <form class=\"form-horizontal style-form\" action=\"../../module/mod_obat_masuk/aksi.php?obatmasuk=update&id=$showobatmasuk[id]\" method=\"POST\">
                      <div class=\"form-group\">          

                          <input type=\"hidden\" class=\"form-control\" name=\"id\" value=\"$showobatmasuk[id]\">

                          <label class=\"col-sm-2 col-sm-2 control-label\">Tanggal</label>
                          <div class=\"col-sm-10\">
                              <input type=\"date\" class=\"form-control\" name=\"tanggal\" value=\"$showobatmasuk[tanggal]\" oninvalid=\"alert('tanggal harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Nama Obat</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"nama_obat\" value=\"$showobatmasuk[nama_obat]\" oninvalid=\"alert('Nama obat harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Jenis Obat</label>
                          <div class=\"col-sm-10\">
                              <textarea cols=\"100\" rows=\"5\" type=\"text\" class=\"form-control\" name=\"jenis_obat\" oninvalid=\"alert('Jenis Obat harus di isi !');\"required>$showobatmasuk[jenis_obat]</textarea>
                          </div>
                          <label class=\"col-sm-2 col-sm-2 control-label\">Fungsi</label>
                          <div class=\"col-sm-10\">
                              <textarea cols=\"100\" rows=\"5\" type=\"text\" class=\"form-control\" name=\"fungsi\" oninvalid=\"alert('Fungsi Obat harus di isi !');\"required>$showobatmasuk[fungsi]</textarea>
                          </div>
                          <label class=\"col-sm-2 col-sm-2 control-label\">Stok Obat</label>
                          <div class=\"col-sm-10\">
                              <textarea cols=\"100\" rows=\"5\" type=\"number\" class=\"form-control\" name=\"stok\" oninvalid=\"alert('Stok Obat Masuk harus di isi !');\"required>$showobatmasuk[stok]</textarea>
                          </div>
                      </div>
                </table>      
                  <hr>
                      <div class=\"btn-group1\">
                          <a href=\"../../module/mod_obat_masuk/aksi.php?obatmasuk=edit&id=$showobatmasuk[id]#\"><button type=\"submit\" name=\"update\" class=\"btn btn-success\">Update</button></a>
                          <a href=\"#\"><button type=\"reset\" name=\"reset\" class=\"btn btn-warning\">Reset</button></a>
                      </div>
                    </form>
               </div><!-- /form-panel -->
              </div><!-- /col-md-12 -->
             </div><!-- /row mt-->
            </section>
           </section>";
}

if ($module == "update") {
  $id     = @$_POST['id'];
  $nama_obat      = @$_POST['nama_obat'];
  $jenis_obat = @$_POST['jenis_obat'];
  $fungsi      = @$_POST['fungsi'];
  $stok        = @$_POST['stok'];
  $tanggal        = @$_POST['tanggal'];

  $update       = "UPDATE tbl_obatmasuk SET tanggal='$tanggal', nama_obat='$nama_obat', jenis_obat='$jenis_obat', fungsi='$fungsi', stok='$stok' where id='$id'";

  if (isset($_POST['update'])) {
    if (mysqli_query($link, $update)) {
      echo "<script language=\"javascript\">
                           alert (\"Data Berhasil Diupdate !!\")
                           document.location=\"services.php?tbl=obatmasuk\";
                         </script>";
    } else {
      echo "<script language=\"javascript\">
                         alert (\"Gagal Update Data\")
                         document.location=\"../../module/mod_obat_masuk/aksi.php?obatmasuk=edit&id=$showobatmasuk[id]\";
                      </script>";
    }
  }
  mysqli_close($link);
}

if ($module == 'hapus') {

  $id   = @$_GET['id'];
  $tampil        = mysqli_query($link, "SELECT * FROM tbl_obatmasuk WHERE id='$id'");
  $showobatmasuk  = mysqli_fetch_array($tampil);

  $hapus = "DELETE FROM tbl_obatmasuk WHERE id='$id'";
  if (mysqli_query($link, $hapus)) {
    echo "<script language=\"javascript\">
               alert (\"Data Berhasil Dihapus !!\")
               document.location=\"services.php?tbl=obatmasuk\";
              </script>";
  } else {
    echo "<script language=\"javascript\">
               alert (\"Gagal Hapus Data\")
               document.location=\"../../module/mod_obat_masuk/aksi.php?obatmasuk=edit&id=$showobatmasuk[id]\";
              </script>";
  }
  mysqli_close($link);
}

include '../../footer_module.php';

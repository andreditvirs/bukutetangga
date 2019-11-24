  <script>
    function select_data($IDKATEGORI, $NAMA_KATEGORI){
      $("#idkategori2").val($IDKATEGORI);
      $("#nama_kategori2").val($NAMA_KATEGORI);
    }
    function refresh(){
      $("#idkategori2").val("");
      $("#nama_kategori2").val("");
    }
  </script>

    <section class="content-header">
      <h1>
        <?php echo $title; ?>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $title; ?></li>
      </ol>
    </section>

    <?php
      $data = $this->session->flashdata('sukses');
      if ($data!="") {?>
        <div class="alert alert-success" role="alert"><strong>Sukses!!</strong>
            <?php echo $data; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="close"></button>
            <span aria-hidden="true"></span>
        </div>
      <?php }
    ?>

    <div class="box" style="overflow-x: scroll;">
      <div class="box-header">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah" onclick="refresh()"><i class="fa fa-plus-circle"></i>Tambah</button>
      </div>
      <div class="box-body">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <td>No</td>
              <td>ID Kategori</td>
              <td>ID Rak</td>
              <td>ISBN Code</td>
              <td>Judul</td>
              <td>Pengarang</td>
              <td>Penerbit</td>
              <td>Jumlah Halaman</td>
              <td>Tanggal Terbit</td>
              <td>Bahasa</td>
              <td>Panjang</td>
              <td>Lebar</td>
              <td>Berat</td>
              <td>Jumlah Stock</td>
              <td>Jumlah Stock Disewa</td>
              <td>Deskripsi</td>
              <td>Sinopsis</td>
              <td>Aksi</td>
            </tr>
          </thead>
          <tbody>
              <?php $no=1;
                foreach ($datakategori->result() as $rows) { ?>
                  <tr>
                    <td><?= $no++ ;?></td>
                    <td><?= $rows->IDBUKU ?></td>
                    <td><?= $rows->IDRAK ?></td>
                    <td><?= $rows->ISBNCODE ?></td>
                    <td><?= $rows->JUDUL ?></td>
                    <td><?= $rows->PENGARANG ?></td>
                    <td><?= $rows->PENERBIT ?></td>
                    <td><?= $rows->JML_HALAMAN ?></td>
                    <td><?= $rows->TGL_TERBIT ?></td>
                    <td><?= $rows->BAHASA ?></td>
                    <td><?= $rows->PANJANG ?></td>
                    <td><?= $rows->LEBAR ?></td>
                    <td><?= $rows->BERAT ?></td>
                    <td><?= $rows->JML_STOCK ?></td>
                    <td><?= $rows->JML_STOCK_DISEWA ?></td>
                    <td><?= $rows->DESKRIPSI ?></td>
                    <td><?= $rows->SINOPSIS ?></td>
                    <td>
                      <a style="cursor: pointer;" onclick="select_data(
                      '<?= $rows->IDBUKU ?>',
                      '<?= $rows->IDRAK ?>'
                      '<?= $rows->ISBNCODE ?>'
                      '<?= $rows->JUDUL ?>'
                      '<?= $rows->PENGARANG ?>'
                      '<?= $rows->PENERBIT ?>'
                      '<?= $rows->JML_HALAMAN ?>'
                      '<?= $rows->TGL_TERBIT ?>'
                      '<?= $rows->BAHASA ?>'
                      '<?= $rows->PANJANG ?>'
                      '<?= $rows->LEBAR ?>'
                      '<?= $rows->BERAT ?>'
                      '<?= $rows->JML_STOCK ?>'
                      '<?= $rows->JML_STOCK_DISEWA ?>'
                      '<?= $rows->DESKRIPSI ?>'
                      '<?= $rows->SINOPSIS ?>'
                      )" data-toggle="modal" data-target="#modal-update"><i class="glyphicon glyphicon-edit"></i></a>
                      <a href="<?php base_url()?>DetailKategoriBuku/hapus/<?php echo $rows->IDBUKU; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                  </tr>
                <?php }
              ?>
          </tbody>
        </table>
      </div>
    </div>

   <!-- membuat modal tambah boostrap -->
   <div class="modal fade" id="modal-tambah" role="dialog">
     <div class="modal-dialog">
       <form action="<?php echo site_url('DetailKategoriBuku/simpan')?>" method="post" accept-charset="utf-8">
          <div class="modal-content">
            <div class="modal-header bq-primary">
              <button type="button" class="close" data-dismiss="modal"></button>
              <h4 class="modal-title">Tambah Data</h4>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
                <div class="form-horizontal text-left">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">IDBUKU </label>
                      <div class="col-sm-10">
                        <input type="text" name="idbuku" id="idbuku" class="form-control" value="" placeholder="Masukkan idkbuku" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">IDRAK </label>
                      <div class="col-sm-10">
                        <input type="text" name="idrak" id="idrak" class="form-control" value="" placeholder="Masukkan idrak" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">ISBNCODE </label>
                      <div class="col-sm-10">
                        <input type="text" name="isbncode" id="isbncode" class="form-control" value="" placeholder="Masukkan isbncode" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">JUDUL </label>
                      <div class="col-sm-10">
                        <input type="text" name="judul" id="judul" class="form-control" value="" placeholder="Masukkan judul" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">PENGARANG </label>
                      <div class="col-sm-10">
                        <input type="text" name="pengarang" id="pengarang" class="form-control" value="" placeholder="Masukkan pengarang" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">PENERBIT </label>
                      <div class="col-sm-10">
                        <input type="text" name="penerbit" id="penerbit" class="form-control" value="" placeholder="Masukkan penerbit" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">JML_HALAMAN </label>
                      <div class="col-sm-10">
                        <input type="text" name="jml_halaman" id="jml_halaman" class="form-control" value="" placeholder="Masukkan jml_halaman" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">TGL_TERBIT </label>
                      <div class="col-sm-10">
                        <input type="text" name="tgl_terbit" id="tgl_terbit" class="form-control" value="" placeholder="Masukkan tgl_terbit" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">BAHASA </label>
                      <div class="col-sm-10">
                        <input type="text" name="bahasa" id="bahasa" class="form-control" value="" placeholder="Masukkan bahasa" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">PANJANG </label>
                      <div class="col-sm-10">
                        <input type="text" name="panjang" id="panjang" class="form-control" value="" placeholder="Masukkan panjang" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">LEBAR </label>
                      <div class="col-sm-10">
                        <input type="text" name="lebar" id="lebar" class="form-control" value="" placeholder="Masukkan lebar" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">BERAT </label>
                      <div class="col-sm-10">
                        <input type="text" name="berat" id="berat" class="form-control" value="" placeholder="Masukkan berat" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">JML_STOCK </label>
                      <div class="col-sm-10">
                        <input type="text" name="jml_stock" id="jml_stock" class="form-control" value="" placeholder="Masukkan jml_stock" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">JML_STOCK_DISEWA </label>
                      <div class="col-sm-10">
                        <input type="text" name="jml_stock_disewa" id="jml_stock_disewa" class="form-control" value="" placeholder="Masukkan jml_stock_disewa" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">DESKRIPSI </label>
                      <div class="col-sm-10">
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="" placeholder="Masukkan deskripsi" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">SINOPSIS </label>
                      <div class="col-sm-10">
                        <input type="text" name="sinopsis" id="sinopsis" class="form-control" value="" placeholder="Masukkan sinopsis" required>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary"><i class="icon-checkmark-circle2">Simpan</i></button>
            </div>
          </div>
       </form>
     </div>
   </div>

   <!-- membuat modal update boostrap -->
   <div class="modal fade" id="modal-update" role="dialog">
     <div class="modal-dialog">
       <form action="<?php echo site_url('DetailKategoriBuku/ubah')?>" method="post" accept-charset="utf-8">
          <div class="modal-content">
            <div class="modal-header bq-primary">
              <button type="button" class="close" data-dismiss="modal"></button>
              <h4 class="modal-title">Tambah Data</h4>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
                <div class="form-horizontal text-left">
                  <div class="box-body">
                    <div class="form-group">
                      <input type="hidden" name="idkategori" id="idkategori2" class="form-control" value="" placeholder="Masukkan idkategori" required>
                      <label class="col-sm-2 control-label" for="">NAMA_KATEGORI </label>
                      <div class="col-sm-10">
                        <input type="text" name="nama_kategori" id="nama_kategori2" class="form-control" value="" placeholder="Masukkan nama_kategori" required>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary"><i class="icon-checkmark-circle2">Simpan</i></button>
            </div>
          </div>
       </form>
     </div>
   </div>
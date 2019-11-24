  <script>
    function select_data($IDSEWA, $TANGGALSEWA, $TANGGALKEMBALI, $IDPENYEDIA, $HARGASEWA, $HARGADENDA, $HARGA_TOTALBUKU, $KODE_SEWA, $KODE_KEMBALI, $STATUS){
      $("#idsewa2").val($IDSEWA);
      $("#tanggalsewa2").val($TANGGALSEWA);
      $("#tanggalkembali2").val($TANGGALKEMBALI);
      $("#idpenyedia2").val($IDPENYEDIA);
      $("#hargasewa2").val($HARGASEWA);
      $("#hargadenda2").val($HARGADENDA);
      $("#harga_totalbuku2").val($HARGA_TOTALBUKU);
      $("#kode_sewa2").val($KODE_SEWA);
      $("#kode_kembali2").val($KODE_KEMBALI);
      $("#status2").val($STATUS);
    }
    function refresh(){
      $("#idsewa2").val("");
      $("#tanggalsewa2").val("");
      $("#tanggalkembali2").val("");
      $("#idpenyedia2").val("");
      $("#hargasewa2").val("");
      $("#hargadenda2").val("");
      $("#harga_totalbuku2").val("");
      $("#kode_sewa2").val("");
      $("#kode_kembali2").val("");
      $("#status2").val("");
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
        <?php var_dump($data['kategori']) ?>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <td>No</td>
              <td>ID Sewa</td>
              <td>Tanggal Sewa</td>
              <td>Tanggal Kembali</td>
              <td>ID Penyedia</td>
              <td>Harga Sewa</td>
              <td>Harga Denda</td>
              <td>Harga Total Buku</td>
              <td>Kode Sewa</td>
              <td>Kode Kembali</td>
              <td>Status</td>
              <td>Aksi</td>
            </tr>
          </thead>
          <tbody>
              <?php $no=1;
                foreach ($datakategori->result() as $rows) { ?>
                  <tr>
                    <td><?= $no++ ;?></td>
                    <td><?= $rows->IDSEWA ?></td>
                    <td><?= $rows->TANGGALSEWA ?></td>
                    <td><?= $rows->TANGGALKEMBALI ?></td>
                    <td><?= $rows->IDPENYEDIA ?></td>
                    <td><?= $rows->HARGASEWA ?></td>
                    <td><?= $rows->HARGADENDA ?></td>
                    <td><?= $rows->HARGA_TOTALBUKU ?></td>
                    <td><?= $rows->KODE_SEWA ?></td>
                    <td><?= $rows->KODE_KEMBALI ?></td>
                    <td><?= $rows->STATUS ?></td>
                    <td>
                      <a style="cursor: pointer;" onclick="select_data(
                      '<?= $rows->IDSEWA ?>',
                      '<?= $rows->TANGGALSEWA ?>'
                      '<?= $rows->TANGGALKEMBALI ?>'
                      '<?= $rows->IDPENYEDIA ?>'
                      '<?= $rows->HARGASEWA ?>'
                      '<?= $rows->HARGADENDA ?>'
                      '<?= $rows->HARGA_TOTALBUKU ?>'
                      '<?= $rows->KODE_SEWA ?>'
                      '<?= $rows->KODE_KEMBALI ?>'
                      '<?= $rows->STATUS ?>'
                      )" data-toggle="modal" data-target="#modal-update"><i class="glyphicon glyphicon-edit"></i></a>
                      <a href="<?php base_url()?>SewaBuku/hapus/<?php echo $rows->IDSEWA; ?>"><i class="glyphicon glyphicon-trash"></i></a>
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
       <form action="<?php echo site_url('SewaBuku/simpan')?>" method="post" accept-charset="utf-8">
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
                      <label class="col-sm-2 control-label" for="">IDSEWA </label>
                      <div class="col-sm-10">
                        <input type="text" name="idsewa" id="idsewa" class="form-control" value="" placeholder="Masukkan idsewa" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">TANGGAL SEWA </label>
                      <div class="col-sm-10">
                        <input type="text" name="tanggalsewa" id="tanggalsewa" class="form-control" value="" placeholder="Masukkan tanggalsewa" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">TANGGALKEMBALI </label>
                      <div class="col-sm-10">
                        <input type="text" name="tanggalkembali" id="tanggalkembali" class="form-control" value="" placeholder="Masukkan tanggalkembali" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">IDPENYEDIA </label>
                      <div class="col-sm-10">
                        <input type="text" name="idpenyedia" id="idpenyedia" class="form-control" value="" placeholder="Masukkan idpenyedia" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">HARGASEWA </label>
                      <div class="col-sm-10">
                        <input type="text" name="hargasewa" id="hargasewa" class="form-control" value="" placeholder="Masukkan hargasewa" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">HARGADENDA </label>
                      <div class="col-sm-10">
                        <input type="text" name="hargadenda" id="hargadenda" class="form-control" value="" placeholder="Masukkan hargadenda" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">HARGA_TOTALBUKU </label>
                      <div class="col-sm-10">
                        <input type="text" name="harga_totalbuku" id="harga_totalbuku" class="form-control" value="" placeholder="Masukkan harga_totalbuku" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">KODE_SEWA </label>
                      <div class="col-sm-10">
                        <input type="text" name="kode_sewa" id="kode_sewa" class="form-control" value="" placeholder="Masukkan kode_sewa" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">KODE_KEMBALI </label>
                      <div class="col-sm-10">
                        <input type="text" name="kode_kembali" id="kode_kembali" class="form-control" value="" placeholder="Masukkan kode_kembali" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">STATUS </label>
                      <div class="col-sm-10">
                        <input type="text" name="status" id="status" class="form-control" value="" placeholder="Masukkan status" required>
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
       <form action="<?php echo site_url('SewaBuku/ubah')?>" method="post" accept-charset="utf-8">
          <div class="modal-content">
            <div class="modal-header bq-primary">
              <button type="button" class="close" data-dismiss="modal"></button>
              <h4 class="modal-title">Edit Data</h4>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
                <div class="form-horizontal text-left">
                  <div class="box-body">
                    <div class="form-group">
                      <input type="hidden" name="idsewa2" id="idsewa2" class="form-control" value="" placeholder="Masukkan idsewa" required>
                      <label class="col-sm-2 control-label" for="">TANGGAL SEWA </label>
                      <div class="col-sm-10">
                        <input type="text" name="tanggalsewa2" id="tanggalsewa2" class="form-control" value="" placeholder="Masukkan tanggalsewa" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">TANGGALKEMBALI </label>
                      <div class="col-sm-10">
                        <input type="text" name="tanggalkembali2" id="tanggalkembali2" class="form-control" value="" placeholder="Masukkan tanggalkembali" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">IDPENYEDIA </label>
                      <div class="col-sm-10">
                        <input type="text" name="idpenyedia2" id="idpenyedia2" class="form-control" value="" placeholder="Masukkan idpenyedia" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">HARGASEWA </label>
                      <div class="col-sm-10">
                        <input type="text" name="hargasewa2" id="hargasewa2" class="form-control" value="" placeholder="Masukkan hargasewa" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">HARGADENDA </label>
                      <div class="col-sm-10">
                        <input type="text" name="hargadenda2" id="hargadenda2" class="form-control" value="" placeholder="Masukkan hargadenda" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">HARGA_TOTALBUKU </label>
                      <div class="col-sm-10">
                        <input type="text" name="harga_totalbuku2" id="harga_totalbuku2" class="form-control" value="" placeholder="Masukkan harga_totalbuku" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">KODE_SEWA </label>
                      <div class="col-sm-10">
                        <input type="text" name="kode_sewa2" id="kode_sewa2" class="form-control" value="" placeholder="Masukkan kode_sewa" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">KODE_KEMBALI </label>
                      <div class="col-sm-10">
                        <input type="text" name="kode_kembali2" id="kode_kembali2" class="form-control" value="" placeholder="Masukkan kode_kembali" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="">STATUS </label>
                      <div class="col-sm-10">
                        <input type="text" name="status2" id="status2" class="form-control" value="" placeholder="Masukkan status" required>
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
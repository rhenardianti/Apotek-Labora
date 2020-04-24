<!DOCTYPE html>
<html>
<head>
  <title>Kelola Tagihan</title>
</head>
<body>
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Daftar Tagihan </h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <?php 
          $berhasilTambah = $this->session->flashdata("tambah");
          if((isset($berhasilTambah)) && (!empty($berhasilTambah))) {

         ?>
         <div class="alert alert-info alertTambah" style="height: 50px;">
          <a href="" class="close" data-dismiss="alert">&times;</a>
           <center><p>
             <?php print_r($berhasilTambah); ?>
           </p></center>
         </div>

       <?php } ?>

        <?php 
          $berhasilTambah = $this->session->flashdata("edit");
          if((isset($berhasilTambah)) && (!empty($berhasilTambah))) {

         ?>
         <div class="alert alert-success alertTambah">
          <a href="" class="close" data-dismiss="alert">&times;</a>
           <center><p>
             <?php print_r($berhasilTambah); ?>
           </p></center>
         </div>

       <?php } ?>

        <?php 
          $berhasilTambah = $this->session->flashdata("hapus");
          if((isset($berhasilTambah)) && (!empty($berhasilTambah))) {

         ?>
         <div class="alert alert-danger alertTambah" style="height: 50px;">
          <a href="" class="close" data-dismiss="alert">&times;</a>
           <center><p>
             <?php print_r($berhasilTambah); ?>
           </p></center>
         </div>

         <?php } ?>
        <p class="text-muted font-13 m-b-30">
          Anda dapat mengelola Tagihan yang terdaftar dalam sistem di halaman ini.
        </p>
        <table id="datatable-responsive" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
          <button class="btn btn-primary buttons-print btn-sm" tabindex="0" aria-controls="datatable-buttons" data-toggle="modal" data-target="#tambahTagihan"><span>Tambah Tagihan</span></buttons>
          <thead>
              <th>No</th>
              <th>ID Tagihan</th>
              <th>Nama Apoteker</th>
              <th>ID Pemesanan</th>
              <th>Tanggal</th>
              <th>Keterangan</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($tagihan as $key => $value) {
              ?>
            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $value['id_tagihan']; ?></td>
              <td><?php echo $value['nama']; ?></td>
              <td><?php echo $value['id_pemesanan']; ?></td>
              <td><?php echo $value['tanggal_transaksi']; ?></td>
              <td><?php echo $value['keterangan']; ?></td>
              <td><?php echo $value['status_pembayaran']; ?></td>
              <td style="text-align:center">
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit<?php echo $value['id_tagihan'] ?>"><i class="fa fa-pencil"></i> Ubah </button>
                <button id='H' class="btn btn-danger btn-xs" data-toggle='modal' data-target='#konfirmasi_hapus' data-id="<?php echo $value['id_tagihan'] ?>"><i class='fa fa-trash-o'></i> Hapus </button>
              </td>
            </tr>
            <?php $i++;} ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php
  $i = 1;
  foreach ($tagihan as $key => $value) {
    ?>

    
  <div class="modal fade" id="edit<?php echo $value['id_tagihan'] ?>" tabindex="-1" role="dialog" aria-labelledby="rincianLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true"?>&times</span></button>
          <h4 class="modal-title" id="rincianLabel">Ubah Rincian Tagihan</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal form-label-left" action="tagihan/editTagihan" method="post" enctype="multipart/form-data">
            <p>Silahkan isi form berikut dengan data tagihan terbaru</p>
            <input type="hidden" name="id_tagihan" value="<?php echo $value['id_tagihan']?>">
            <div class="item form-group">
                <label for="varian" class="control-label col-md-3">Nama Apoteker</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="id_apoteker" name="id_apoteker" class="form-control col-md-7 col-xs-12">
                  <?php
                      foreach ($apoteker->result() as $row_apoteker) {  
                         echo "<option value='".$row_apoteker->id_apoteker."'>".$row_apoteker->nama."</option>";
                      }
                  ?>
                </select>
                </div>
              </div>
              <div class="item form-group">
                <label for="varian" class="control-label col-md-3">ID Pemesanan</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="id_pemesanan" name="id_pemesanan" class="form-control col-md-7 col-xs-12">
                  <?php
                      foreach ($pemesanan->result() as $row_pemesanan) {  
                         echo "<option value='".$row_pemesanan->id_pemesanan."'>".$row_pemesanan->id_pemesanan."</option>";
                      }
                  ?>
                </select>
                </div>
              </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_lahir">Tanggal Tagihan <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" name="tanggal_transaksi" class="form-control has-feedback-left" value="<?php echo $value['tanggal_transaksi'] ?>">
                  <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                  <span id="inputSuccess2Status" class="sr-only">(success)</span>
                </div>
              </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id-tagihan">Keterangan <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="id_pemesanan" name="keterangan" id="keterangan" class="form-control col-md-7 col-xs-12"><?php echo $value['keterangan'] ?></textarea>
              </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="status" name="status_pembayaran" class="form-control col-md-7 col-xs-12">
                    <option value="Lunas">Lunas</option>
                    <option value="Belum Lunas">Belum Lunas</option>
                  </select>
                </div>
              </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-success">Perbarui</button>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer"></div>
      </div>
    </div>
  </div>
    <?php $i++;} ?>
    <div class="modal fade" id="tambahTagihan" tabindex="-1" role="dialog" aria-labelledby="tambahTagihanLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true"?>&times</span></button>
            <h4 class="modal-title" id="tamUserLabel">Tagihan Baru</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal form-label-left" action="tagihan/tambahTagihan" method="post" novalidate enctype="multipart/form-data">
              <p>Silahkan isi form berikut dengan data tagihan baru</a>
              </p>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id-tagihan">ID Tagihan <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="id_tagihan" class="form-control col-md-7 col-xs-12" name="id_tagihan"  required="required" type="text" value="<?php echo $kode?>">
              </div>
            </div>
            <div class="item form-group">
                <label for="varian" class="control-label col-md-3">Nama Apoteker</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="id_apoteker" name="id_apoteker" class="form-control col-md-7 col-xs-12">
                  <?php
                      foreach ($apoteker->result() as $row_apoteker) {  
                         echo "<option value='".$row_apoteker->id_apoteker."'>".$row_apoteker->nama."</option>";
                      }
                  ?>
                </select>
                </div>
              </div>
              <div class="item form-group">
                <label for="varian" class="control-label col-md-3">ID Pemesanan</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="id_pemesanan" name="id_pemesanan" class="form-control col-md-7 col-xs-12">
                  <?php
                      foreach ($pemesanan->result() as $row_pemesanan) {  
                         echo "<option value='".$row_pemesanan->id_pemesanan."'>".$row_pemesanan->id_pemesanan."</option>";
                      }
                  ?>
                </select>
                </div>
              </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_lahir">Tanggal Tagihan <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" name="tanggal_transaksi" class="form-control has-feedback-left">
                  <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                  <span id="inputSuccess2Status" class="sr-only">(success)</span>
                </div>
              </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id-tagihan">Keterangan <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="id_pemesanan" name="keterangan" id="keterangan" class="form-control col-md-7 col-xs-12"></textarea>
              </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="status" name="status_pembayaran" class="form-control col-md-7 col-xs-12">
                    <option value="Lunas">Lunas</option>
                    <option value="Belum Lunas">Belum Lunas</option>
                  </select>
                </div>
              </div>     
                <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button type="reset" class="btn btn-warning">Reset</button>
                  <button id="send" type="submit" class="btn btn-success">Proses</button>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="konfirmasi_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true"?>&times</span></button>
            <h4 class="modal-title" id="hapusTagihanLabel">Hapus Tagihan</h4>
          </div>
          <div class="modal-body">
              <p>Yakin Data Tagihan Akan Dihapus?</a>
              </p>
            <form method="post" action="<?php echo base_url().'tagihan/hapusTagihan'?>">
              <input type="text" name="id" id="unik" hidden="hidden">
          </div>
          <div class="modal-footer">
             <button type="submit" class="btn btn-danger"> Hapus </button>
             <a class="btn btn-default" data-dismiss="modal"> Batal </a>
             </form>
          </div>
        </div>
      </div>
    </div>
</body>
</html>

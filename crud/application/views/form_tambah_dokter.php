<?php
	$id_dokter = "";
	$nama_dokter = "";
	$alamat = "";
  $no_telp = "";
	if($op=="edit"){
		foreach ($sql->result() as $obj) {
			$op = "edit";
			$id_dokter = $obj->id_dokter;
			$nama_pasien = $obj->nama_dokter;
			$alamat = $obj->alamat;
      $no_telp = $obj->no_telp;
		}	
	}	
?>
<div class="container">
  <div class="panel panel-default">
  <div class="panel-heading" align="center"><b>Isi Form Dokter</b></div>
  <div class="panel-body">
  <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>dokter/save" method="POST">
    <input type="hidden" name="op" value="<?php echo $op; ?>" class="form-control" placeholder="op">
    <input type="hidden" name="id_dokter" value="<?php echo $id_dokter; ?>" class="form-control" placeholder="ID Dokter">
    <div class="form-group">
      <label class="col-sm-5 control-label">Nama Dokter</label>
      <div class="col-sm-3">
        <input type="text" name="nama_dokter" value="<?php echo $nama_dokter; ?>" class="form-control" placeholder="Nama Dokter">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-5 control-label">Alamat</label>
      <div class="col-sm-3">
        <input type="text" name="alamat" value="<?php echo $alamat; ?>" class="form-control" placeholder="Alamat">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-5 control-label">Nomor Telepon</label>
      <div class="col-sm-3">
        <input type="text" name="no_telp" value="<?php echo $no_telp; ?>" class="form-control" placeholder="Nomor Telepon">
      </div>
    </div>
    <div class="col-sm-offset-5 col-sm-5">
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="<?php echo base_url(); ?>dokter/" class="btn btn-primary">Kembali</a>
    </div>
  </form>
</div>
</div>
</div>

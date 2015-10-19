<div class="container">
  <div class="panel panel-default">
  <div class="panel-heading" align="center"><b>Daftar Dokter</b></div>
  <div class="panel-body">
  <?php $this->load->view('search/front'); ?> 
  <p class="text-left"><a href="<?php echo base_url(); ?>dokter/add/" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a></p>
  <table align="center" class="table table-hover table-bordered">
    <thead>
    <tr>
        <th class="active col-sm-1">No</th>
        <th class="active col-sm-1">ID Dokter</th>
        <th class="active col-sm-2">Nama Dokter</th>
        <th class="active col-sm-3">Alamat</th>
        <th class="active col-sm-1">Nomor Telepon</th>
        <th class="active col-sm-1">Aksi</th>    
    </tr>
    </thead>
    <tbody> 
    <?php
      $no=0;
      foreach ($sql1->result() as $obj1) {
          $no++;
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $obj1->id_dokter; ?></td>
            <td><?php echo $obj1->nama_dokter; ?></td>
            <td><?php echo $obj1->alamat; ?></td>
            <td><?php echo $obj1->no_telp; ?></td>
            <td>
            <a href="<?php echo base_url(); ?>dokter/edit/<?php echo $obj1->id_dokter; ?>" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-pencil"></i> </a>
            <a href="javascript:if(confirm('Anda yakin ingin menghapus data ini?')){document.location='<?php echo base_url();?>dokter/delete/<?php echo $obj1->id_dokter; ?>';}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
          </tr>
          <?php
      }
    ?>
    </tbody> 
  </table>
  </div>
  </div>
</div>

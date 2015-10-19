<div class="container">
  <div class="panel panel-default">
  <div class="panel-heading" align="center"><b>Hasil Pencarian</b></div>
	<div class="panel-body">
	<a href="<?php echo base_url(); ?>home/" class="btn btn-primary"><i class="glyphicon glyphicon-repeat"></i> Kembali</a>
	<br><br>
		<?php
			$no=0;
			$banyak = count($nama_pasien->result_array());
			echo 'Ditemukan <b>'.$banyak.'</b> hasil pencarian dengan kata <b>"'.$nama.'"</b>';
		?>
		  
		<table align="center" class="table table-hover table-bordered">
			<thead>
			<tr>
		    	<th class="active col-sm-1">No</th>
		    	<th class="active col-sm-1">ID Pasien</th>
		    	<th class="active col-sm-2">Nama Pasien</th>
		    	<th class="active col-sm-3">Alamat</th>
		    	<th class="active col-sm-1">Nomor Telepon</th>
		  </tr>
		  </thead>
		  <tbody> 
		  	<?php
		    	if(count($nama_pasien->result_array())>0){
						foreach($nama_pasien->result_array() as $obj){
						$no++;
		    		?>
          	<tr>
		          <td><?php echo $no; ?></td>
		          <td><?php echo $obj['id_pasien']; ?></td>
		          <td><?php echo $obj['nama_pasien']; ?></td>
		          <td><?php echo $obj['alamat']; ?></td>
		          <td><?php echo $obj['no_telp']; ?></td>
          	</tr> 
		        <?php    
		    		}
		    	}else{
		    		?>
						<?php echo '<br>Tidak ditemukan pasien dengan nama <b>"'.$nama.'"</b>';?>
						<?php
					}
		  	?>
			</tbody>
		</table>
	</div>
	</div>
</div>

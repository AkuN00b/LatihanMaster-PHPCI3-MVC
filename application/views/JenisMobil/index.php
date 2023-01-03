<?php ob_start();?>
	
	<div class="row">
        <!-- column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-block">
                	<div class="card-header">
                		<h4 class="pt-1">
	                    	Data Jenis Mobil
	                    	
	                    	<a href="<?php echo site_url('JenisMobil/getCreate'); ?>" class="float-right btn btn-success pb-1">Tambah</a>
	                    </h4>
                	</div>

                    <div class="card-body">
	                    <div class="table-responsive">
	                        <table class="table text-nowrap">
	                            <thead>
	                                <tr>
	                                    <th>No</th>
	                                    <th>Nama Jenis Mobil</th>
	                                    <th>Aksi</th>
	                                </tr>
	                            </thead>

	                            <tbody>
	                                <?php $i = 0; ?>
	                                <?php foreach ($getData as $data) { ?>
	                                    <tr>
	                                        <td>
	                                            <?php $i++; ?>
	                                            <?php echo $i ?>
	                                        </td>
	                                        <td><?php echo $data->nama_jenis_mobil ?></td>
	                                        <td>
	                                            <a href="<?php echo site_url('JenisMobil/getEdit/'.$data->id_jenis_mobil); ?>" class="btn btn-warning">Edit</a>
	                                            <a href="<?php echo site_url('JenisMobil/postDelete/'.$data->id_jenis_mobil); ?>" class="btn btn-danger alert-notif">Hapus</a>
	                                        </td>
	                                    </tr>
	                                <?php } ?>

	                                <?php if ($i == 0) { ?>
	                                	<tr>
		                                	<td colspan="3"><center><b>Tidak ada Data Jenis Mobil</b></center></td>
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

<?php
	$data = ob_get_clean();
	include('application/views/template.php');
	ob_flush();
?>

<?php if(@$_SESSION['sukses']){ ?>
    <script>
        Swal.fire({            
            icon: 'success',                   
            title: 'Sukses',    
            text: 'data berhasil dihapus',                        
            timer: 3000,                                
            showConfirmButton: false
        })
    </script>
    
<?php unset($_SESSION['sukses']); } ?>

<script>
    $('.alert-notif').on('click',function(){
        var getLink = $(this).attr('href');
        Swal.fire({
            title: "Yakin hapus data?",            
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonColor: '#3085d6',
            cancelButtonText: "Batal"
        
        }).then(result => {
            if(result.isConfirmed){
                window.location.href = getLink
            }
        })

        return false;
    });
</script> 
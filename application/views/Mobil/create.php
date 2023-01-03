<?php ob_start();?>
	
	<div class="row">
        <!-- column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-block">
                	<div class="card-header">
                		<h4 class="pt-1">
	                    	Create Mobil
	                    	
	                    	<a href="<?php echo site_url('Mobil'); ?>" class="float-right btn btn-warning pb-1">Kembali</a>
	                    </h4>
                	</div>

                    <div class="card-body">
	                    <form class="form-horizontal form-material" action="<?php echo site_url('Mobil/postCreate') ?>" method="POST">
                            <div class="form-group">
                                <label class="col-md-12">Nama Mobil</label>
                                <div class="col-md-12">
                                    <input type="text" name="nama_mobil" required class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Merk Mobil</label>
                                <div class="col-md-12">
                                    <input type="text" name="merk_mobil" required class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Harga Mobil</label>
                                <div class="col-md-12">
                                    <input type="text" name="harga_mobil" required class="form-control form-control-line">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Jenis Mobil</label>
                                <div class="col-md-12">
                                    <select class="form-control" name="id_jenis_mobil" required="">
                                        <option value="" selected="selected">Pilih Jenis Mobil</option>
                                        <?php
                                            foreach ($getDataJenisMobil  as $row) {
                                                echo '<option value="' . $row->id_jenis_mobil. '">' . $row->nama_jenis_mobil . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                </div>
                            </div>
                        </form>
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
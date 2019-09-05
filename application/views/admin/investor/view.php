<div class="content-wrapper">
	<section class="content-header">
		<h1> Investor </h1>
		<ol class="breadcrumb">
			<li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Investor</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xm-12">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">
						</h3>
						<div class="pull-right">
						</div>
					</div>
					<div class="panel-body">
						<form action="#" enctype="multipart/form-data" method="POST" id="upload">
							<div class="show_error"></div>
							<input type="hidden" name="ids" value="<?= $tbl_investor['id'] ?>">
							<div class="form-group">
								<center>
									<?php
									if($file['dir']!=""){
										$types = explode("/", $file['mime']);
										if($types[0]=="image"){
											?>
											<img src="<?= base_url($file['dir']) ?>" style="width: 250px; height: 250px; border-radius: 50%" class="img img-thumbnail">
											<br>
										<?php }else{ ?>

											<i class="fa fa-file fa-5x text-danger"></i>
											<br>
											<a href="<?= base_url($file['dir']) ?>" target="_blank"><i class="fa fa-download"></i> <?= $file['name'] ?></a>
											<br>
											<br>
										<?php } ?>
									<?php } ?>
								</center>       
							</div>   
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="name" class="form-control" value="<?= $tbl_investor['name'] ?>" readonly>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="email" class="form-control" value="<?= $tbl_investor['email'] ?>" readonly>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea class="form-control" name="desc" readonly><?= $tbl_investor['address'] ?></textarea>
							</div>
							<div class="form-group">
								<label>Nomer HP</label>
								<input type="text" name="email" class="form-control" value="<?= $tbl_investor['phone'] ?>" readonly>
							</div>
							<div style="float: right;">
								<a href="<?= base_url('admin/investor') ?>">
									<button class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-left"></i> Kembali</button>
								</a>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xm-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Data Investor</h3>
					</div>
					<div class="panel-body">
						<div id="mydiv" class="table-responsive">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
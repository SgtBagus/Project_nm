<div class="content-wrapper">
	<section class="content-header">
		<h1> Investasi : <b><?= $tbl_project_invest['code']?></b> </h1>
		<ol class="breadcrumb">
			<li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?= base_url('admin/investasi') ?>"><i class="fa fa-bar-chart"></i> Investasi</a></li>
			<li class="active">Investor</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="show_error"></div>
			<div class="col-md-12 col-sm-12 col-xm-12">
				<input type="hidden" name="ids" value="<?= $tbl_project_invest['id'] ?>">
				<div class="col-md-6">  
					<div class="box box-solid round" >
						<div class="box-body">
							<table class="table table-bordered">
								<tr>
									<th>Code</th>
									<td><?= $tbl_project_invest['code'] ?></td>
								</tr>
								<tr>
									<th>Proyek</th>
									<td>
										<a href="<?= base_url('admin/project/view/').$project['id'] ?>">
											<?= $project['title'] ?>
										</a>
									</td>
								</tr>
								<tr>
									<th>Investor</th>
									<td align="center">
										<img src="<?= base_url().$file['dir'] ?>" width="50px" height="50px" style="border-radius: 50%">
										<?= $investor['name'] ?>
										<hr>
										<a href="<?= base_url('admin/investor/view/').$investor['id'] ?>">
											<button type="button" class="btn btn-block btn-sm btn-sm btn-info"><i class="fa fa-user"></i></button>
										</a>
									</td>
								</tr>
								<tr>
									<th>Tanggal Mengajukan</th>
									<td><?=date('Y-m-d H:i:s', strtotime($tbl_project_invest['created_at']))?></td>
								</tr>
								<tr>
									<th>Tanggal Kadarluasa</th>
									<td><?=date('Y-m-d H:i:s', strtotime($tbl_project_invest['tgl_kadarluasa']))?></td>
								</tr>
								<tr>
									<th>Tanggal Pembayaran</th>
									<td>
										<?php if (!$tbl_project_invest['tgl_pembayaran']) {
											echo "<p class='help-block'><i>Belum Tersedia</i></p>";
										}else {
											echo date("d-m-Y H:i:s", strtotime($tbl_project_invest['tgl_pembayaran']));
										}?>
									</td>
								</tr>
								<tr>
									<th>Metode Pembayaran</th>
									<td>
										<?php if (!$tbl_project_invest['metode_pembayaran']) {
											echo "<p class='help-block'><i>Belum Tersedia</i></p>";
										}else {
											echo $tbl_project_invest['metode_pembayaran'];
										}?>
									</td>
								</tr>
								<tr>
									<th>Status Pembarayan</th>
									<td>
										<?php if (!$tbl_project_invest['tgl_pembayaran']) { ?>
											<p class='help-block'><i>Invoice Ini Belum Terbayar</i></p>
										<?php  }else {
											if ($tbl_project_invest['status_pembayaran'] == 'WAITING') {
												echo '<small class="label bg-yellow"><i class="fa fa-warning"> </i> Menunggu Dikonfirmasi </small>';
											} else if($tbl_project_invest['status_pembayaran'] == "APPROVE") {
												echo '<small class="label bg-green"><i class="fa fa-check"> </i> Di Terima </small>';
											}else if($tbl_project_invest['status_pembayaran'] == "REJECT") { 
												echo '<small class="label bg-red"><i class="fa fa-ban"> </i> Di Tolak </small>';
											}else if($tbl_project_invest['status_pembayaran'] == "EXPIRED") {
												echo '<small class="label bg-red"><i class="fa fa-ban"> </i> Kadarluasa</small>';
											}else if($tbl_project_invest['status_pembayaran'] == "WAITING PAY") {
												echo '<small class="label bg-yellow"><i class="fa fa-warning"> </i> Menunggu Pembayaran </small>';
											}
										} ?>
									</td>
								</tr>
								<tr>
									<th>Tanggal Konfirmasi</th>
									<td>
										<?php if (!$tbl_project_invest['tgl_konfirmasi']) {
											echo "<p class='help-block'><i>Belum Tersedia</i></p>";
										}else {
											echo date("d-m-Y H:i:s", strtotime($tbl_project_invest['tgl_konfirmasi']));
										}?>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>  
				<div class="col-md-6">        
					<div class="box box-solid round" >
						<div class="box-body">
							<table class="table table-bordered">
								<tr>
									<th>Banyak Unit</th>
									<td><b><?= $tbl_project_invest['unit']; ?></b></td>
								</tr>
								<tr>
									<th>Harga per Unit</th>
									<td><b>Rp <?= number_format($project['harga'],0,',','.'); ?>,-</b></td>
								</tr>
								<tr>
									<th>Total Harga</th>
									<td><b>Rp <?= number_format($tbl_project_invest['total_harga'],0,',','.'); ?>,-</b></td>
								</tr>
							</table>
						</div>
					</div>
					<h3> Bukti Pembayaran</h3>
					<div class="box box-solid round" >
						<div class="box-body">
							<div class="show_error_image"></div>
							<table class="table table-bordered">
								<tr>
									<th width="50%" align="center">
										<?php if($file_invest) { ?>
											<img src="<?= base_url().$file_invest['dir'] ?>" width="100%" height="250px" id="preview_image">
											<br><br>
											<div align="center">
												<a href="<?= base_url().$file_invest['dir'] ?>" target="_blank">
													<button type="button" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Lihat Gambar</button>
												</a>
											</div>
										<?php } else {?>
											<img src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg" width="100%" height="250px" id="preview_image">
										<?php } ?>
									</th>
									<td>
										<form action="<?= base_url('admin/investasi/sumbitImage/').$tbl_project_invest['id']?>" method="POST" id="upload-create">
											<input type="file" class="file" id="imageFile" style="display: none;" name="file" accept="image/x-png,image/jpeg,image/jpg" />
											<button type="button" class="btn btn-sm btn-info" id="btnFile"><i class="fa fa-file"></i> Browser File</button>
											<p class="help-block">Foto yang diupload disarankan berukuran 70px x 70px dan memiliki format PNG, JPG, atau JPEG</p>
											<button type="submit" class="btn btn-sm btn-primary btn-send"><i class="fa fa-save"></i> Simpan Gambar</button>
										</form>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		if ($tbl_project_invest['status_pembayaran'] == 'WAITING') { ?>
			<div class="row" align="center">
				<div class="col-md-12 col-sm-12 col-xm-12">
					<div class="col-md-4 col-sm-4 col-xm-4">
						<a href="<?= base_url('admin/investasi/') ?> ">
							<button type="button" class="btn btn-send btn-block btn-approve btn-lg btn-info"><i class="fa fa-bar-chart"></i> Data Investasi</button>
						</a>
					</div>
					<div class="col-md-4 col-sm-4 col-xm-4">
						<button type="button" class="btn btn-send btn-block btn-approve btn-lg btn-primary" onclick="approve('.$tbl_project_invest['id'].')"><i class="fa fa-check-circle"></i> Terima</button>
					</div>
					<div class="col-md-4 col-sm-4 col-xm-4">
						<button type="button" class="btn btn-send btn-block btn-reject btn-lg btn-danger" onclick="reject('.$tbl_project_invest['id'].')"><i class="fa fa-ban"></i>  Tolak</button>
					</div>
				</div>
			</div>
		<?php }else{
			?>
			<div class="row" align="center">
				<div class="col-md-12 col-sm-12 col-xm-12">
					<div class="col-md-12">
						<a href="<?= base_url('admin/investasi/') ?> ">
							<button type="button" class="btn btn-send btn-block btn-approve btn-lg btn-info"><i class="fa fa-bar-chart"></i> Data Investasi</button>
						</a>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</section>
</div>
<script type="text/javascript">

	$("#upload-create").submit(function(){
		var form = $(this);
		var mydata = new FormData(this);
		$.ajax({
			type: "POST",
			url: form.attr("action"),
			data: mydata,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend : function(){
				$(".btn-send").addClass("disabled").html("<i class='la la-spinner la-spin'></i>  Processing...").attr('disabled',true);
				$(".show_error_image").slideUp().html("");
			},

			success: function(response, textStatus, xhr) {
				var str = response;
				if (str.indexOf("success") != -1){
					$(".show_error_image").hide().html(response).slideDown("fast");
					setTimeout(function(){ 
					location.reload();
					}, 1000);

					$(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
				}else{
					$(".show_error_image").hide().html(response).slideDown("fast");
					$(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
				}
			},
			error: function(xhr, textStatus, errorThrown) {
				console.log(xhr);
				$(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
				$(".show_error_image").hide().html(xhr).slideDown("fast");
			}
		});
		return false;
	});

	function approve(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('admin/investasi/approve/') ?>"+id,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend : function(){
				$(".btn-send").addClass("disabled").html("<i class='fa fa-spinner'></i>").attr('disabled',true);
				$(".show_error").slideUp().html("");
			},
			success: function(response, textStatus, xhr) {
				var str = response;
				if (str.indexOf("success") != -1){
					$(".show_error").hide().html(response).slideDown("fast");
					$(".btn-approve").removeClass("disabled").html('<i class="fa fa-check-circle"></i> ').attr('disabled',false);
					$(".btn-reject").removeClass("disabled").html('<i class="fa fa-ban"></i> ').attr('disabled',false);
					location.reload();
				}else{
					setTimeout(function(){
						$("#modal-delete").modal('hide');
					}, 1000);
					$(".show_error").hide().html(response).slideDown("fast");
					$(".btn-approve").removeClass("disabled").html('<i class="fa fa-check-circle"></i> ').attr('disabled',false);
					$(".btn-reject").removeClass("disabled").html('<i class="fa fa-ban"></i> ').attr('disabled',false);
				}
			},
			error: function(xhr, textStatus, errorThrown) {
			}
		});
	}

	function reject(id) {
		$.ajax({
			type: "POST",
			url: "<?= base_url('admin/investasi/reject/') ?>"+id,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend : function(){
				$(".btn-send").addClass("disabled").html("<i class='fa fa-spinner'></i>").attr('disabled',true);
				$(".show_error").slideUp().html("");
			},
			success: function(response, textStatus, xhr) {
				var str = response;
				if (str.indexOf("success") != -1){
					$(".show_error").hide().html(response).slideDown("fast");
					$(".btn-approve").removeClass("disabled").html('<i class="fa fa-check-circle"></i> ').attr('disabled',false);
					$(".btn-reject").removeClass("disabled").html('<i class="fa fa-ban"></i> ').attr('disabled',false);
					location.reload();
				}else{
					setTimeout(function(){
						$("#modal-delete").modal('hide');
					}, 1000);
					$(".show_error").hide().html(response).slideDown("fast");
					$(".btn-approve").removeClass("disabled").html('<i class="fa fa-check-circle"></i> ').attr('disabled',false);
					$(".btn-reject").removeClass("disabled").html('<i class="fa fa-ban"></i> ').attr('disabled',false);
				}
			},
			error: function(xhr, textStatus, errorThrown) {
			}
		});
	}

</script>
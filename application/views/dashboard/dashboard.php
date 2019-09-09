<div class="row">
    <div class="col-md-12">
        <br>
        <div class="row">
            <div class="col-md-6">        
                <div class="box box-solid round">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4" align="center">
                                <img src="https://img.freepik.com/free-vector/background-with-people-doing-donation_23-2147558145.jpg?size=338&ext=jpg" class="img-circle" alt="User Image" width="75px" height="75px">
                            </div>
                            <div class="col-md-8"> 
                                <h4><b>Rp <?= number_format($total_harga,0,',','.') ?></b></h4>
                                Total Dana Investasi
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="col-md-6">        
                <div class="box box-solid round">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4" align="center">
                                <img src="https://img.freepik.com/free-vector/money-bag-exchange_23-2147510722.jpg?size=338&ext=jpg" class="img-circle" alt="User Image" width="75px" height="75px">
                            </div>
                            <div class="col-md-8">
                                <h4><b><?= $total_project ?></b></h4>
                                Total Proyek yang di Investasikan
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">        
                <div class="box box-solid round" >
                    <div class="box-body">
                        <div class="row" align="center">
                            <h3><b>Investasi</b></h3>
                        </div>

                        <table id="datatable" class="table table-bordered table-striped" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Proyek</th>
                                    <th>Tanggal Invest</th>
                                    <th>Unit</th>
                                    <th>Harga Invest</th>
                                    <th>Status Invest</th>
                                    <th>Status Proyek</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($invest as $row) {
                                    $project =  $this->mymodel->selectDataOne('tbl_project', array('id' => $row['project_id'] ));
                                    ?>
                                    <tr>
                                        <td><?= $i?></td>
                                        <td>
                                            <?=$project['title']; ?>
                                        </td>
                                        <td><?= date("d-m-Y", strtotime($row['created_at']))  ?></td>
                                        <td><?= $row['unit'] ?></td>
                                        <td>Rp <?= number_format($row['total_harga'],0,',','.') ?> </td>
                                        <td align="center">
                                            <small class="label bg-yellow">
                                                <i class="fa fa-warning"> </i> Menunggu Dikonfirmasi
                                            </small>
                                        </td>
                                        <td align="center">
                                            <small class="label bg-blue">
                                                <i class="fa fa-check-circle"></i> Baru Mulai
                                            </small>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('/project/view/').$project['slug'] ?>">
                                                <button class="btn btn-info btn-xs">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <a target="_blank" href="<?= base_url('invoice/payment/')?>asdkjshqw123897">
                                                <button class="btn btn-primary btn-xs">
                                                    <i class="fa fa-print"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
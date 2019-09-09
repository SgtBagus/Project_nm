<form action="<?= base_url('admin/project/edit_images/').$img['id'] ?>"  method="POST">
  <button type="button" class="btn btn-sm btn-primary" id="btnFile-detailEdit_<?=$i?>"><i class="fa fa-file"></i> Browser File</button>
  <input type="file" class="file" id="imageFile-modalEdit_<?=$i?>" style="display: none;" name="file" accept="image/x-png,image/jpeg,image/jpg" />
  <p class="help-block">Gambar yang diupload disarankan memiliki format PNG, JPG, atau JPEG</p>
  <button type="submit" class="btn btn-primary btn-send" ><i class="fa fa-save"></i> Save</button>
  <button type="button" class="btn btn-danger btn-send" data-toggle="modal" data-target="#modal-delete-imageDetail-<?=$i?>"><i class="fa fa-trash"></i> Hapus Detail Gambar</button>
  <div class="modal modal-default fade" id="modal-delete-imageDetail-<?=$i?>" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-red">
          <h4 class="modal-title" align="center"><i class="fa fa-image"></i> Hapus Detail Gambar</h4>
        </div>
        <div class="modal-body" align="center">
          <h5>Anda Yakin Ingin Menghapus Gambar Ke-<?=$i?></h5>
          <div class="box-footer" align="center">
            <a href="<?= base_url('admin/project/editImage/'.$tbl_project['id'])?>">
              <button type="button" class="btn btn-info"><i class="fa fa-close"></i> Tutup</button>
            </a>
            <a href="<?= base_url('admin/project/delete_image/'.$img['id'])?>">
              <button type="button" class="btn btn-danger btn-send" ><i class="fa fa-trash"></i> Hapus</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
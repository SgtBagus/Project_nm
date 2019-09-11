

  <!-- Content Wrapper. Contains page content -->



    <form method="POST" action="<?= base_url('admin/Webpage/update') ?>" id="upload-create" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $webpage['id'] ?>">



                <div class="show_error"></div><div class="form-group">

                      <label for="form-title">Title</label>

                      <input type="text" class="form-control" id="form-title" placeholder="Masukan Title" name="dt[title]" value="<?= $webpage['title'] ?>">

                  </div><div class="form-group">

                      <label for="form-slug">Slug</label>

                      <input type="text" class="form-control" id="form-slug" placeholder="Masukan Slug" name="dt[slug]" value="<?= $webpage['slug'] ?>">

                  </div><div class="form-group">

                      <label for="form-content">Content</label>

                      <textarea name="dt[content]" class="form-control"><?= $webpage['content'] ?></textarea>

                  </div><div class="form-group">

                      <label for="form-prioritas">Prioritas</label>

                      <input type="text" class="form-control" id="form-prioritas" placeholder="Masukan Prioritas" name="dt[prioritas]" value="<?= $webpage['prioritas'] ?>">

                  </div>
                <hr>

                <button type="submit" class="btn btn-primary btn-send" ><i class="fa fa-save"></i> Save</button>

                <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>

             

           
      </form>


  <!-- /.content-wrapper -->

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

                    form.find(".show_error").slideUp().html("");

                },

                success: function(response, textStatus, xhr) {

                    // alert(mydata);

                   var str = response;

                    if (str.indexOf("success") != -1){

                        form.find(".show_error").hide().html(response).slideDown("fast");

                        setTimeout(function(){ 

                          // window.location.href = "<?= base_url('master/Webpage') ?>";
                          $("#load-table").html('');
                          loadtable($("#select-status").val());
                          $("#modal-form").modal('hide');

                        }, 1000);

                        $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);





                    }else{

                        form.find(".show_error").hide().html(response).slideDown("fast");

                        $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);

                        

                    }

                },

                error: function(xhr, textStatus, errorThrown) {

                  console.log(xhr);

                    $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);

                    form.find(".show_error").hide().html(xhr).slideDown("fast");



                }

            });

            return false;

    

        });

  </script>
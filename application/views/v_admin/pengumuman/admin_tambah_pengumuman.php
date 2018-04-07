<style>
        #image-holder {
            margin-top: 8px;
        }

        #image-holder img {
            border: 8px solid #DDD;
            max-width:100%;
        }
    </style>
          <div class=''>

<div class='col-md-12 col-sm-12 col-xs-12'>
              <div class='x_panel'>
                <div class='x_title'>
                  <h2>Pengumuman</h2>
                  <ul class='nav navbar-right panel_toolbox'>
                    <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                    </li>
                    <li><a class='close-link'><i class='fa fa-close'></i></a>
                    </li>
                  </ul>
                  <div class='clearfix'></div>
                </div>
                  <div class='x_content'>

                    <form class='form-horizontal form-label-left' method="post" enctype="multipart/form-data" action="<?php echo base_url().'pengumuman/add/'?>">

                      <div class='item form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12' for='judul'>Judul <span class='required'>*</span>
                        </label>
                        <div class='col-md-9 col-sm-6 col-xs-12'>
                          <input  id='judul' name='judul' required='required' class='form-control col-md-7 col-xs-12' value="">
                        </div>
                      </div>
                      <div class='item form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12' for='judul'>Isi <span class='required'>*</span>
                        </label>
                        <div class='col-md-9 col-sm-6 col-xs-12'>
                            <textarea  id='editor' name='konten' required='required' ></textarea>
                        </div>
                      </div>
                      <div class='item form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12' for='gambar'>Gambar <span class='required'>*</span>
                        </label>
                        <div class='col-md-9 col-sm-6 col-xs-12'>
                          <input type="file" accept="image/*" name="foto" class="form-control" id="foto">
                                <script>
                                    $("#foto").on('change', function () {

                                        //Get count of selected files
                                        var countFiles = $(this)[0].files.length;

                                        var imgPath = $(this)[0].value;
                                        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                                        var image_holder = $("#image-holder");
                                        image_holder.empty();

                                        var x = document.getElementById("foto");
                                        var file = x.files[0];

                                        if (extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "gif") {
                                            if (typeof (FileReader) != "undefined") {

                                                //loop for each file selected for uploaded.
                                                for (var i = 0; i < countFiles; i++) {

                                                    var reader = new FileReader();
                                                    reader.onload = function (e) {
                                                        $("<img />", {
                                                            "src": e.target.result,
                                                            "class": "thumb-image"
                                                        }).appendTo(image_holder);
                                                    }

                                                    image_holder.show();
                                                    reader.readAsDataURL($(this)[0].files[i]);
                                                }

                                            } else {
                                                alert("This browser does not support FileReader.");
                                            }
                                        } else {
                                            alert("hanya boleh foto bertype PNG, JPG dan GIF");
                                            var control = $("#foto");
                                            control.replaceWith(control.val('').clone(true));
                                        }
                                    });
                                </script>
                        </div>
                      </div>
                      <div class='ln_solid'></div>
                      <div class='form-group'>
                        <div class='col-md-6 col-md-offset-3'><input onclick="change_url()" type="submit" class="btn btn-primary" value="Save" name="">
                        </div>
                      </div>
                    </form>
                  </div>
              </div>
            </div>
            </div>
	<script src='<?php echo base_url();?>vendors/ckeditor/ckeditor.js'></script>
	<script src='<?php echo base_url();?>vendors/ckeditor/codeeditor.js'></script>
    <script>
	initCode();
</script>

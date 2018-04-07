<style>
        #image-holder {
            margin-top: 8px;
        }

        #image-holder img {
            border: 8px solid #DDD;
            max-width:100%;
        }
    </style>


                    <form class='form-horizontal form-label-left' method='post' enctype='multipart/form-data' action='petugas/update'>
                      <span class='section'>Tambah Profil</span>
                      <div class='item form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama<span class='required'>*</span>
                         </label>

                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <input id='nama' class='form-control col-md-7 col-xs-12' data-validate-length-range='6' data-validate-words='2' name='nama'  required='required' type='text'value=''>
                        </div>
                      </div>
                      <div class='item form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Username (digunakan untuk login) <span class='required'>*</span>
                        </label>

                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <input id='username' class='form-control col-md-7 col-xs-12' data-validate-length-range='6' data-validate-words='2' name='username' required='required' type='text'value=''>
                        </div>
                      </div>
                      <div class='item form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12' for='password'>Password Sekarang <span class='required'>*</span>
                        </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <input type='password' class='form-control' name='password' id='password'>
                        </div>
                      </div>
                      <div class='item form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12' for='password-baru'>Password Baru <span class='required'>*</span>
                        </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <input  id='password-baru' name='password-baru' placeholder='' required='required' class='form-control col-md-7 col-xs-12' type='password' >
                        </div>
                      </div>
                      <div class='item form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12' for='password-ulangi'>Ulangi Password <span class='required'>*</span>
                        </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <input id='password-ulangi' name='password-ulangi' required='required' type='password' class='form-control col-md-7 col-xs-12' data-parsley-trigger='change' required >
                        </div>
                      </div>
                        <div class='item form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>No. HP<span class='required'>*</span>
                        </label>

                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <input id='username' class='form-control col-md-7 col-xs-12' data-validate-length-range='6' data-validate-words='2' name='hp'  required='required' type='text'value=''>
                        </div>
                      </div><div class='item form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Jabatan<span class='required'>*</span>
                        </label>

                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <input id='username' class='form-control col-md-7 col-xs-12' data-validate-length-range='6' data-validate-words='2' name='jabatan'  required='required' type='text'value=''>
                        </div>
                      </div><div class='item form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Tentang<span class='required'>*</span>
                        </label>

                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <input id='username' class='form-control col-md-7 col-xs-12' data-validate-length-range='6' data-validate-words='2' name='tentang'  required='required' type='text'value=''>
                        </div>
                      </div><div class='item form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Alamat<span class='required'>*</span>
                        </label>

                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <input id='username' class='form-control col-md-7 col-xs-12' data-validate-length-range='6' data-validate-words='2' name='alamat'  required='required' type='text'value=''>
                        </div>
                      </div>

                      <div class='item form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12' for='gambar'>Gambar (maks. 1,5 MB)<span class='required'>*</span>
                        </label>
                        <div class='col-md-9 col-sm-6 col-xs-12'>
                          <input type='file' accept='image/*' name='foto' class='form-control' id='foto'>
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
                      <div class='ln_solid'/>
                        <div class='col-md-6 col-md-offset-3'>
                        <input onclick="change_url()" type="submit" class="btn btn-primary" value="Simpan" name="update">
                        </div></form>

<?php
    $unique_id = $_SESSION['unique_id'];
    $query = $this->db->select('*')->from('user')->join('admin','user.unique_id=admin.unique_id')->where('user.unique_id',$unique_id)->get();
    foreach($query->result() as $d)
    {
    echo"


          <div class=''>
            <div class='clearfix'></div>

            <div class='row'>
              <div class='col-md-12 col-sm-12 col-xs-12'>
                <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Profil saya</h2>
                    <ul class='nav navbar-right panel_toolbox'>
                      <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                      </li>
                      <li><a class='close-link'><i class='fa fa-close'></i></a>
                      </li>
                    </ul>
                    <div class='clearfix'></div>
                  </div>
                  <div class='x_content'>
                    <div class='col-md-3 col-sm-3 col-xs-12 profile_left'>
                      <div class='profile_img'>
                        <div id='crop-avatar'>
                          <!-- Current avatar -->
                          <img class='img-responsive avatar-view' src='".base_url().$d->avatar_url."' alt='Avatar' title='Change the avatar'>
                        </div>
                      </div>
                      <h3>".$d->nama."</h3>

                      <ul class='list-unstyled user_data'>
                        <li><i class='fa fa-map-marker user-profile-icon'></i> ".$d->alamat."
                        </li>

                        <li>
                          <i class='fa fa-briefcase user-profile-icon'></i> ".$d->jabatan."
                        </li>
                      </ul>
                      <br />
                  </div>
                  <div class='col-md-9 col-sm-9 col-xs-12'>
      <div role='tabpanel' class='tab-pane fade active in' id='tab_content1' aria-labelledby='home-tab'>
                 <div class='x_content'>";}?>

                 <style>
                         #image-holder {
                             margin-top: 8px;
                         }

                         #image-holder img {
                             border: 8px solid #DDD;
                             max-width:100%;
                         }
                     </style>
                     <?php
                 $query = $this->db->select('*')->from('user')->join('admin','admin.unique_id=user.unique_id')->where('user.unique_id',$unique_id)->get();
                 foreach($query->result() as $d){
                 echo"

                                     <form class='form-horizontal form-label-left' method='post' enctype='multipart/form-data' action='petugas/update'>
                                       <span class='section'>Edit Profil</span>
                                       <div class='item form-group'>
                                         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama<span class='required'>*</span>
                                          </label>

                                         <div class='col-md-6 col-sm-6 col-xs-12'>
                                           <input id='nama' class='form-control col-md-7 col-xs-12' data-validate-length-range='6' data-validate-words='2' name='nama'  required='required' type='text'value='".$d->nama."'>
                                         </div>
                                       </div>
                                       <div class='item form-group'>
                                         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Username (digunakan untuk login) <span class='required'>*</span>
                                         </label>

                                         <div class='col-md-6 col-sm-6 col-xs-12'>
                                           <input id='username' class='form-control col-md-7 col-xs-12' data-validate-length-range='6' data-validate-words='2' name='username' required='required' type='text'value='".$d->username."'>
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
                                           <input id='username' class='form-control col-md-7 col-xs-12' data-validate-length-range='6' data-validate-words='2' name='hp'  required='required' type='text'value='".$d->hp."'>
                                         </div>
                                       </div><div class='item form-group'>
                                         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Jabatan<span class='required'>*</span>
                                         </label>

                                         <div class='col-md-6 col-sm-6 col-xs-12'>
                                           <input id='username' class='form-control col-md-7 col-xs-12' data-validate-length-range='6' data-validate-words='2' name='jabatan'  required='required' type='text'value='".$d->jabatan."'>
                                         </div>
                                       </div><div class='item form-group'>
                                         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Tentang<span class='required'>*</span>
                                         </label>

                                         <div class='col-md-6 col-sm-6 col-xs-12'>
                                           <input id='username' class='form-control col-md-7 col-xs-12' data-validate-length-range='6' data-validate-words='2' name='tentang'  required='required' type='text'value='".$d->tentang."'>
                                         </div>
                                       </div><div class='item form-group'>
                                         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Alamat<span class='required'>*</span>
                                         </label>

                                         <div class='col-md-6 col-sm-6 col-xs-12'>
                                           <input id='username' class='form-control col-md-7 col-xs-12' data-validate-length-range='6' data-validate-words='2' name='alamat'  required='required' type='text'value='".$d->alamat."'>
                                         </div>
                                       </div>

                                       <div class='item form-group'>
                                         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='gambar'>Gambar (maks. 1,5 MB)<span class='required'>*</span>
                                         </label>
                                         <div class='col-md-9 col-sm-6 col-xs-12'>
                                         ";
                                         echo "
                                           <input type='file' accept='image/*' name='foto' class='form-control' id='foto'>
                                             <div id='image-holder'>
                                               ";
                                                     if(!$unique_id)
                                                     {

                                                     }
                                                     else
                                                     {
                                                         echo "<img src='".base_url().$d->avatar_url."'?rand='".rand()."' alt=''>";
                                                     }
                                                     ;
                                                 }?>
                                                 </div>
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

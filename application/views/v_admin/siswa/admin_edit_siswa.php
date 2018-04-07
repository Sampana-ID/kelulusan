   <div class='x_panel'>
                 <div class='x_title'>
                   <h2>Edit Data Siswa</h2>
                   <ul class='nav navbar-right panel_toolbox'>
                     <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                     </li>

                     <li><a class='close-link'><i class='fa fa-close'></i></a>
                     </li>
                   </ul>
                   <div class='clearfix'></div>
                 </div>
                 <div class='x_content'>
                       <?php
                   $query = $this->db->select('*')->from('user')->join('biodata','user.unique_id=biodata.unique_id')->join('Statistik','user.unique_id=Statistik.unique_id')->join('nilai','user.unique_id=nilai.unique_id')->where('user.unique_id',$unique_id)->get();
                   foreach($query->result() as $d){
                   echo"
                   <div class='col-md-3 col-sm-3 col-xs-12 profile_left'>
                     <div class='profile_img'>
                       <div id='crop-avatar'>
                         <!-- Current avatar -->
                         <img class='img-responsive avatar-view' src='".base_url().$d->avatar_url."' alt='Avatar' title='avatar' style='width:170px;'>
                       </div>
                     </div>


                     <!-- start skills -->
                     <!-- end of skills -->

                   </div>
                   <div class='col-md-3 col-sm-3 col-xs-12 profile_right'>
                   <h3>".$d->nama_lengkap."</h3>

                     <ul class='list-unstyled user_data'>
                       <li><i class='fa fa-map-marker user-profile-icon'></i>Alamat: ".$d->alamat."
                       </li>

                       <li>
                         <i class='fa fa-briefcase user-profile-icon'></i>No.Ujian: ".$d->no_ujian."
                       </li>
                                               <li>
                         <i class='fa fa-briefcase user-profile-icon'></i>Username: ".$d->username."
                       </li>
                     </ul>
                     <br />
                   </div>
                   <div class='col-md-3 col-sm-3 col-xs-12 profile_right'>

                     <h4>Statistik</h4>
                     <ul class='list-unstyled user_data'>
                       <li>
                         <p>Total Login : ".$d->sum_login."</p>
                         <div class='progress progress_sm'>
                           <div class='progress-bar bg-green' role='progressbar' data-transitiongoal='".$d->sum_login."'></div>
                         </div>
                       </li>
                       <li>
                         <p>Unduh Surat Kelulusan : ".$d->sum_unduh."</p>
                         <div class='progress progress_sm'>
                           <div class='progress-bar bg-green' role='progressbar' data-transitiongoal='".$d->sum_unduh."'></div>
                         </div>
                       </li>
                       <li>
                         <p>Melihat Nilai UN : ".$d->sum_nilai_un."</p>
                         <div class='progress progress_sm'>
                           <div class='progress-bar bg-green' role='progressbar' data-transitiongoal='".$d->sum_nilai_un."'></div>
                         </div>
                       </li>
                     </ul>
                   </div>";}
   ?>
                     <div class='col-md-12 col-sm-12 col-xs-12'>
  <?php                if(!$message){

                       }
                       else
                       {
                         if($message=='salah')
                         {
                           echo "
                              <div class='alert alert-danger alert-dismissible fade in' role='alert'>
                                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                                 </button>".$pesan."
                               </div>";
                         }
                         else
                         if($message=='benar')
                         {
                           echo "
                             <div class='alert alert-success alert-dismissible fade in' role='alert'>
                               <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                               </button>".$pesan."
                             </div>";
                         }
                         else
                         if($message=='kosong'){
                               echo "
                                  <div class='alert alert-danger alert-dismissible fade in' role='alert'>
                                     <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                                     </button>".validation_errors()."
                                   </div>";
                         }
                       }
?>
                         <form method="post" class="form-horizontal form-label-left" action="<?php echo base_url().'datasiswa/update/'.$unique_id?>">
                       <?php

                     $n = 1;
                     foreach($query->result() as $d){
                       echo "
                         <div class='item form-group'>
                       <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama <span class='required'>*</span>
                       </label>
                       <div class='col-md-6 col-sm-6 col-xs-12'>
                         <input id='nama' class='form-control col-md-7 col-xs-12' data-validate-length-range='4' data-validate-words='1' name='nama' placeholder='Nama Lengkap' required='required' type='text' value='".$d->nama."' >
                       </div>
                     </div>
                     <div class='item form-group'>
                       <label class='control-label col-md-3 col-sm-3 col-xs-12' for='username'>Username <span class='required'>*</span>
                       </label>
                       <div class='col-md-6 col-sm-6 col-xs-12'>
                         <input id='username' class='form-control col-md-7 col-xs-12' data-validate-length-range='4' data-validate-words='1' name='username' placeholder='username' required='required' type='text' value='".$d->username."'>
                       </div>
                     </div>
                     <div class='item form-group'>
                       <label class='control-label col-md-3 col-sm-3 col-xs-12' for='noujian'>Nomor Ujian <span class='required'>*</span>
                       </label>
                       <div class='col-md-6 col-sm-6 col-xs-12'>
                         <input id='noujian' class='form-control col-md-7 col-xs-12' data-validate-length-range='4' data-validate-words='1' name='no_ujian' placeholder='noujian' required='required' type='text' value='".$d->no_ujian."'>
                       </div>
                     </div>
                     <div class='item form-group'>
                       <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nisn'>NISN <span class='required'>*</span>
                       </label>
                       <div class='col-md-6 col-sm-6 col-xs-12'>
                         <input id='nisn' class='form-control col-md-7 col-xs-12' data-validate-length-range='4' data-validate-words='1' name='nisn' placeholder='nisn' required='required' type='text' value='".$d->nisn."'>
                       </div>
                     </div>
                     <div class='item form-group'>
                       <label class='control-label col-md-3 col-sm-3 col-xs-12' for='jurusan'>Jurusan <span class='required'>*</span>
                       </label>
                       <div class='col-md-6 col-sm-6 col-xs-12'>
                         <input id='jurusan' class='form-control col-md-7 col-xs-12' data-validate-length-range='4' data-validate-words='1' name='jurusan'  required='required' type='text' value='".$d->jurusan."'>
                       </div>
                     </div>
                     <div class='item form-group'>
                       <label class='control-label col-md-3 col-sm-3 col-xs-12' for='kelas'>Kelas <span class='required'>*</span>
                       </label>
                       <div class='col-md-6 col-sm-6 col-xs-12'>
                         <input id='kelas' class='form-control col-md-7 col-xs-12' data-validate-length-range='1'  name='kelas' required='required' type='text' value='".$d->kelas."'>
                       </div>
                     </div>
                     <div class='item form-group'>
                       <label class='control-label col-md-3 col-sm-3 col-xs-12' for='peminatan'>Mapel Peminatan <span class='required'>*</span>
                       </label>
                       <div class='col-md-6 col-sm-6 col-xs-12'>
                         <input id='peminatan' class='form-control col-md-7 col-xs-12' data-validate-length-range='4' data-validate-words='1' name='peminatan'  required='required' type='text' value='".$d->peminatan."'>
                       </div>
                     </div>
                     <div class='item form-group'>
                       <label class='control-label col-md-3 col-sm-3 col-xs-12' for='avatar_url'>URL avatar <span class='required'>*</span>
                       </label>";}
               $avatar = $this->db->get('avatar');
               foreach($avatar->result() as $d){
               echo"
                   <div class='btn-group' data-toggle='buttons' style='margin-right:10px'>
                     <input type='radio' class='flat' id='".$d->nama_avatar."' value='".$d->nama_avatar."' name='avatar_url' checked required data-parsley-multiple='avatar'/>
                   <label for='".$d->nama_avatar."' data-toggle-class='btn-primary' data-toggle-passive-class='btn-default' ><img src='".base_url().$d->url_avatar."' alt='".$d->nama_avatar."' class='img img-circle profile_img' style='width:60px'> </label>
                     </div>";}
                     $n = 1;
                      foreach($query->result() as $d){
                          echo"
                     </div>
                     <div class='item form-group'>
                       <label class='control-label col-md-3 col-sm-3 col-xs-12' for='tempat_lhr'>Tempat Lahir <span class='required'>*</span>
                       </label>
                       <div class='col-md-6 col-sm-6 col-xs-12'>
                         <input id='tempat_lhr' class='form-control col-md-7 col-xs-12' data-validate-length-range='4' data-validate-words='1' name='tempat_lhr' required='required' type='text' value='".$d->tempat_lhr."'>
                       </div>
                     </div>
                     <div class='item form-group'>
                       <label class='control-label col-md-3 col-sm-3 col-xs-12' for='tanggal_lhr'>Tanggal Lahir <span class='required'>*</span>
                       </label>
                       <div class='col-md-6 col-sm-6 col-xs-12'>
                         <input id='tanggal_lhr' class='form-control col-md-7 col-xs-12' data-validate-length-range='4' data-validate-words='1' name='tanggal_lhr' required='required' type='text' value='".$d->tanggal_lhr."'>
                       </div>
                     </div>
                     <div class='item form-group'>
                       <label class='control-label col-md-3 col-sm-3 col-xs-12' for='alamat'>Alamat <span class='required'>*</span>
                       </label>
                       <div class='col-md-6 col-sm-6 col-xs-12'>
                         <input id='alamat' class='form-control col-md-7 col-xs-12' data-validate-length-range='2' name='alamat' required='required' type='text' value='".$d->alamat."'>
                       </div>
                     </div>
                     <div class='item form-group'>
                       <label class='control-label col-md-3 col-sm-3 col-xs-12' for='indonesia'>Nilai Bahasa Indonesia <span class='required'>*</span>
                       </label>
                       <div class='col-md-6 col-sm-6 col-xs-12'>
                         <input id='indonesia' class='form-control col-md-7 col-xs-12' data-validate-length-range='1' data-validate-words='1' name='indonesia'  required='required' type='text' value='".$d->indonesia."'>
                       </div>
                     </div>
                     <div class='item form-group'>
                       <label class='control-label col-md-3 col-sm-3 col-xs-12' for='inggris'>Nilai Bahasa Inggris <span class='required'>*</span>
                       </label>
                       <div class='col-md-6 col-sm-6 col-xs-12'>
                         <input id='inggris' class='form-control col-md-7 col-xs-12' data-validate-length-range='1' data-validate-words='1' name='inggris' required='required' type='text' value='".$d->inggris."'>
                       </div>
                     </div>
                     <div class='item form-group'>
                       <label class='control-label col-md-3 col-sm-3 col-xs-12' for='matematika'>Nilai Matematika <span class='required'>*</span>
                       </label>
                       <div class='col-md-6 col-sm-6 col-xs-12'>
                         <input id='matematika' class='form-control col-md-7 col-xs-12' data-validate-length-range='1' data-validate-words='1' name='matematika' required='required' type='text' value='".$d->matematika."'>
                       </div>
                     </div>
                     <div class='item form-group'>
                       <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nilai_peminatan'>Nilai Peminatan <span class='required'>*</span>
                       </label>
                       <div class='col-md-6 col-sm-6 col-xs-12'>
                         <input id='nilai_peminatan' class='form-control col-md-7 col-xs-12' data-validate-length-range='1' data-validate-words='1' name='nilai_peminatan'  required='required' type='text' value='".$d->nilai_peminatan."'>
                       </div>
                     </div>
                     <div class='item form-group'>
                       <label class='control-label col-md-3 col-sm-3 col-xs-12' for='akhir'>Nilai Akhir <span class='required'>*</span>
                       </label>
                       <div class='col-md-6 col-sm-6 col-xs-12'>
                         <input id='akhir' class='form-control col-md-7 col-xs-12' data-validate-length-range='1' data-validate-words='1' name='akhir' required='required' type='text' value='".$d->akhir."'>
                       </div>
                     </div>
                     <div class='item form-group'>
                       <label class='control-label col-md-3 col-sm-3 col-xs-12' for='peringkat'>Peringkat <span class='required'>*</span>
                       </label>
                       <div class='col-md-6 col-sm-6 col-xs-12'>
                         <input id='peringkat' class='form-control col-md-7 col-xs-12' data-validate-length-range='1'  name='peringkat'  required='required' type='text' value='".$d->peringkat."'>
                       </div>
                     </div>
                     <input type='submit' name='update' class='btn btn-success submit col-md-12' value='Perbarui'/>";}?>


                         </form>
                     </div>
               </div>
             </div>

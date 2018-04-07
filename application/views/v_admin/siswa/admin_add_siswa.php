
<div class='x_panel'>
   <div class='x_title'>
     <h2>Data Siswa</h2>
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
     if(!$message){

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
         <form method="post" class="form-horizontal form-label-left" action="<?php echo base_url().'datasiswa/add/'?>">
           <div class='item form-group'>
         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Nama <span class='required'>*</span>
         </label>
         <div class='col-md-6 col-sm-6 col-xs-12'>
           <input id='nama' class='form-control col-md-7 col-xs-12' data-validate-length-range='4' data-validate-words='1' name='nama' required='required' type='text'  >
         </div>
       </div>
       <div class='item form-group'>
         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='username'>Username <span class='required'>*</span>
         </label>
         <div class='col-md-6 col-sm-6 col-xs-12'>
           <input id='username' class='form-control col-md-7 col-xs-12' data-validate-length-range='4' data-validate-words='1' name='username'  required='required' type='text' >
         </div>
       </div>
       <div class='item form-group'>
         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='password'>Password <span class='required'>*</span>
         </label>
         <div class='col-md-6 col-sm-6 col-xs-12'>
           <input id='password' class='form-control col-md-7 col-xs-12' data-validate-length-range='4' data-validate-words='1' name='password' type='password' required='required' type='text' >
         </div>
       </div>
       <div class='item form-group'>
         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='noujian'>Nomor Ujian <span class='required'>*</span>
         </label>
         <div class='col-md-6 col-sm-6 col-xs-12'>
           <input id='noujian' data-inputmask="'mask': '99-999-999-9'" class='form-control col-md-7 col-xs-12' data-validate-length-range='4' data-validate-words='1' name='no_ujian' required='required' type='text' >
         </div>
       </div>
       <div class='item form-group'>
         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nisn'>NISN <span class='required'>*</span>
         </label>
         <div class='col-md-6 col-sm-6 col-xs-12'>
           <input id='nisn' class='form-control col-md-7 col-xs-12' data-validate-length-range='4' data-validate-words='1' name='nisn' required='required' type='text' >
         </div>
       </div>
       <div class='item form-group'>
         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='jurusan'>Jurusan <span class='required'>*</span>
         </label>
         <div class='col-md-6 col-sm-6 col-xs-12'>
           <?php $this->load->view('v_core/core_jurusan');?>
         </div>
       </div>
       <div class='item form-group'>
         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='kelas'>Kelas <span class='required'>*</span>
         </label>
         <div class='col-md-6 col-sm-6 col-xs-12'>
                      <?php $this->load->view('v_core/core_kelas');?>
         </div>
       </div>
       <div class='item form-group'>
         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='peminatan'>Mapel Peminatan <span class='required'>*</span>
         </label>
         <div class='col-md-6 col-sm-6 col-xs-12'>
           <?php $this->load->view('v_core/core_peminatan');?>
         </div>
       </div>
       <div class='item form-group'>
         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='avatar_url'>URL avatar <span class='required'>*</span>
         </label>
         <div class='col-md-6 col-sm-6 col-xs-12'>
           <?php
$q=$this->db->get('avatar');
foreach($q->result() as $d){
 echo"
     <div class='btn-group' data-toggle='buttons' style='margin-right:10px'>
       <input type='radio' class='flat' id='".$d->nama_avatar."' value='".$d->nama_avatar."' name='avatar' checked required data-parsley-multiple='avatar'/>
     <label for='".$d->nama_avatar."' data-toggle-class='btn-primary' data-toggle-passive-class='btn-default' ><img src='".base_url().$d->url_avatar."' alt='".$d->nama_avatar."' class='img img-circle profile_img' style='width:60px'> </label>
       </div>";}?>
         </div>
       </div>
       <div class='item form-group'>
         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='tempat_lhr'>Tempat Lahir <span class='required'>*</span>
         </label>
         <div class='col-md-6 col-sm-6 col-xs-12'>
           <input id='tempat_lhr' class='form-control col-md-7 col-xs-12' data-validate-length-range='4' data-validate-words='1' name='tempat_lhr' required='required' type='text'>
         </div>
       </div>
       <div class='item form-group'>
         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='tanggal_lhr'>Tanggal Lahir <span class='required'>*</span>
         </label>
         <div class='col-md-6 col-sm-6 xdisplay_inputx form-group has-feedback'>
<input type="text" class="form-control has-feedback-left" id="single_cal2" aria-describedby="inputSuccess2Status1">
         </div>
       </div>
       <div class='item form-group'>
         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='alamat'>Alamat <span class='required'>*</span>
         </label>
         <div class='col-md-6 col-sm-6 col-xs-12'>
           <input id='alamat' class='form-control col-md-7 col-xs-12' data-validate-length-range='2' name='alamat' required='required' type='text'>
         </div>
       </div>
       <div class='item form-group'>
         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='indonesia'>Nilai Bahasa Indonesia <span class='required'>*</span>
         </label>
         <div class='col-md-6 col-sm-6 col-xs-12'>
           <input id='indonesia' class='form-control col-md-7 col-xs-12' data-validate-length-range='1' data-validate-words='1' name='indonesia'  required='required' type='text' >
         </div>
       </div>
       <div class='item form-group'>
         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='inggris'>Nilai Bahasa Inggris <span class='required'>*</span>
         </label>
         <div class='col-md-6 col-sm-6 col-xs-12'>
           <input id='inggris' class='form-control col-md-7 col-xs-12' data-validate-length-range='1' data-validate-words='1' name='inggris' required='required' type='text' >
         </div>
       </div>
       <div class='item form-group'>
         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='matematika'>Nilai Matematika <span class='required'>*</span>
         </label>
         <div class='col-md-6 col-sm-6 col-xs-12'>
           <input id='matematika' class='form-control col-md-7 col-xs-12' data-validate-length-range='1' data-validate-words='1' name='matematika' required='required' type='text' >
         </div>
       </div>
       <div class='item form-group'>
         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nilai_peminatan'>Nilai Peminatan <span class='required'>*</span>
         </label>
         <div class='col-md-6 col-sm-6 col-xs-12'>
           <input id='nilai_peminatan' class='form-control col-md-7 col-xs-12' data-validate-length-range='1' data-validate-words='1' name='nilai_peminatan'  required='required' type='text' >
         </div>
       </div>
       <div class='item form-group'>
         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='akhir'>Nilai Akhir <span class='required'>*</span>
         </label>
         <div class='col-md-6 col-sm-6 col-xs-12'>
           <input id='akhir' class='form-control col-md-7 col-xs-12' data-validate-length-range='1' data-validate-words='1' name='akhir' required='required' type='text' >
         </div>
       </div>
       <div class='item form-group'>
         <label class='control-label col-md-3 col-sm-3 col-xs-12' for='peringkat'>Peringkat <span class='required'>*</span>
         </label>
         <div class='col-md-6 col-sm-6 col-xs-12'>
           <input id='peringkat' class='form-control col-md-7 col-xs-12' data-validate-length-range='1'  name='peringkat'  required='required' type='text' >
         </div>
       </div>
       <input type='submit' name='update' class='btn btn-success submit col-md-12' value='Tambah'/>


           </form>
       </div>
</div>

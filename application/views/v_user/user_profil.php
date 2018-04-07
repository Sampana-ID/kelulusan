<?php

    $unique_id = $_SESSION['unique_id'];
    $data = $this->db->select('*')->join('Statistik','user.unique_id=Statistik.unique_id')->join('biodata','user.unique_id=biodata.unique_id')->where('user.unique_id',$unique_id)->from('user')->get();
    foreach($data -> result() as $d){
    echo"
      <div class=''>
        <div class='clearfix'></div>
          <div class='row'>
            <div class=''>
              <div class='x_panel'>
                <div class='x_title'>
                  <h2>Profil saya</h2>
                  <ul class='nav navbar-right panel_toolbox'>
                    <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a></li>
                    <li><a class='close-link'><i class='fa fa-close'></i></a></li>
                  </ul>
                <div class='clearfix'></div>
              </div>
              <div class='x_content'>
                <div class='col-md-3 col-sm-3 col-xs-12 profile_left'>
                  <div class='profile_img'>
                    <div id='crop-avatar'>
                      <img class='img-responsive avatar-view' src='".base_url().$d->avatar_url."' alt='Avatar' title='Change the avatar'>
                    </div>
                  </div>
                  <h3>".$d->nama_lengkap."</h3>
                  <ul class='list-unstyled user_data'>
                    <li><i class='fa fa-map-marker user-profile-icon'></i> ".$d->alamat."</li>
                    <li><i class='fa fa-briefcase user-profile-icon'></i> ".$d->no_ujian."</li>
                  </ul>
                  <br/>
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
            </div>";
    }
    foreach($data->result() as $d)
    {
        echo"
          <div class='col-md-9 col-sm-9 col-xs-12'>
            <div role='tabpanel' class='tab-pane fade active in' id='tab_content1' aria-labelledby='home-tab'>
              <div class='x_content'>";
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

          echo"
            <form method='post' class='form-horizontal form-label-left' novalidate action='".
                        base_url()."profil/update"."' data-parsley-validate>
                <span class='section'>Edit Profil</span>
                  <div class='item form-group'>
                    <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nama'>Username (digunakan untuk login) <span class='required'>*</span>
                    </label>
                  <div class='col-md-6 col-sm-6 col-xs-12'>
                    <input id='username' class='form-control col-md-7 col-xs-12' name='username' placeholder='username' required='required' type='text'value='".$d->username."'>
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
                      </div>";}
          $avatar = $this->db->get('avatar');
          foreach($avatar->result() as $d)
          {
            echo"
              <div class='btn-group' data-toggle='buttons' style='margin-right:10px'>
                <input type='radio' class='flat' id='".$d->nama_avatar."' value='".$d->nama_avatar."' name='avatar'/>
                <label for='".$d->nama_avatar."' data-toggle-class='btn-primary' data-toggle-passive-class='btn-default' ><img src='".base_url().$d->url_avatar."' alt='".$d->nama_avatar."' class='img img-circle profile_img' style='width:80px'> </label>
              </div>";
          }
            echo"
              <div class='ln_solid'/>
                <div class='col-md-6 col-md-offset-3'>
                  <input type='submit' name='update' class='btn btn-success' value='Perbarui'>
              </div></form>
            </div>
          </div>
          </div>
          </div>
        </div>
        </div>
        </div>
        </div>";
    ?>

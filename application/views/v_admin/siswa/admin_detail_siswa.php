<?php
    $query = $this->db->query("SELECT * FROM `user` WHERE `unique_id` = '$unique_id'");
    if($query->num_rows()>0){

    }
    else{
        echo 'tidak ada data siswa';
        echo"<script language='javascript'>document.location='index.php?page=data_siswa';</script>";
    }
?>
    <div class='x_panel'>
                  <div class='x_title'>
                    <h2>Nilai Siswa</h2>
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
                    $query = $this->db->select('*')->from('user')->join('biodata','user.unique_id=biodata.unique_id')->join('Statistik','user.unique_id=Statistik.unique_id')->where('user.unique_id',$unique_id)->get();
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
                    <p class='text-muted font-13 m-b-30'>
                      Gunakan <code>dropdown</code> untuk membatasi banyaknya <code>table</code>
                    </p>
                    <table id='datatable-responsive' class='table table-striped table-bordered dt-responsive nowrap' cellspacing='0' width='100%'>
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Data</th>
                          <th>Isi Data</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                      $query = $this->db->select('*')->from('biodata')->join('nilai','biodata.unique_id=nilai.unique_id')->join('Statistik','biodata.unique_id=Statistik.unique_id')->where('biodata.unique_id',$unique_id)->get();
                      $n = 1;
                      foreach($query->result() as $d){

                        echo "
                        <tr>
                          <td>$n</td>
                          <td>Nama Lengkap</td>
                          <td>".$d->nama_lengkap."</td>
                        </tr>";
                        $n++;
                        echo"<tr>
                          <td>$n</td>
                          <td>Nomor Ujian</td>
                          <td>".$d->no_ujian."</td>
                        </tr>";
                        $n++;
                        echo"<tr>
                          <td>$n</td>
                          <td>Jumlah Login</td>
                          <td>".$d->sum_login."</td>
                        </tr>";
                        $n++;
                        echo"<tr>
                          <td>$n</td>
                          <td>jumlah Unduh SKL</td>
                          <td>".$d->sum_unduh."</td>
                        </tr>";
                        $n++;
                        echo"<tr>
                          <td>$n</td>
                          <td>Jumlah Melihat Nilai UN</td>
                          <td>".$d->sum_nilai_un."</td>
                        </tr>";
                        $n++;
                        echo"<tr>
                          <td>$n</td>
                          <td>NISN</td>
                          <td>".$d->nisn."</td>
                        </tr>";
                        $n++;
                        echo"<tr>
                          <td>$n</td>
                          <td>Kelas</td>
                          <td>12 ".$d->jurusan." ".$d->kelas."</td>
                        </tr>";
                        $n++;
                        echo"<tr>
                          <td>$n</td>
                          <td>Mapel Peminatan</td>
                          <td>".$d->peminatan."</td>
                        </tr>";
                        $n++;
                        echo"<tr>
                          <td>$n</td>
                          <td>Tempat, Tanggal Lahir</td>
                          <td>".$d->tempat_lhr.", ".$d->tanggal_lhr."</td>
                        </tr>";
                        $n++;
                        echo"<tr>
                          <td>$n</td>
                          <td>Alamat</td>
                          <td>".$d->alamat."</td>
                        </tr>";
                        $n++;
                        echo"<tr>
                          <td>$n</td>
                          <td>Nilai Bahasa Indonesia</td>
                          <td>".$d->indonesia."</td>
                        </tr>";
                        $n++;
                        echo"<tr>
                          <td>$n</td>
                          <td>Nilai Bahasa Inggris</td>
                          <td>".$d->inggris."</td>
                        </tr>";
                        $n++;
                        echo"<tr>
                          <td>$n</td>
                          <td>Nilai Matematika</td>
                          <td>".$d->matematika."</td>
                        </tr>";
                        $n++;
                        echo"<tr>
                          <td>$n</td>
                          <td>Nilai Peminatan (".$d->peminatan.")</td>
                          <td>".$d->nilai_peminatan."</td>
                        </tr>";
                        $n++;
                        echo"<tr>
                          <td>$n</td>
                          <td>Nilai Akhir</td>
                          <td>".$d->akhir."</td>
                        </tr>";
                        $n++;
                        echo"<tr>
                          <td>$n</td>
                          <td>Peringkat</td>
                          <td>".$d->peringkat."</td>
                        </tr>";
                       }
                          ?>
                      </tbody>
                        </table>
                  </div>
                </div>
              </div>

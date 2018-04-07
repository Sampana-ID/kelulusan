
  <div class='row tile_count'>
    <div class='col-md-2 col-sm-4 col-xs-6 tile_stats_count'>
      <span class='count_top'><i class='fa fa-user'></i> Jumlah Siswa Keseluruhan</span>
      <div class='count green'><?php echo $jumlah_siswa; ?></div>
      <span class='count_bottom'>Siswa</span>
    </div>
    <div class='col-md-2 col-sm-4 col-xs-6 tile_stats_count'>
      <span class='count_top'><i class='fa fa-user'></i> Jumlah Siswa IPA</span>
      <div class='count'><?php echo $jumlah_siswa_ipa; ?></div>
      <span class='count_bottom'>Siswa</span>
    </div>
    <div class='col-md-2 col-sm-4 col-xs-6 tile_stats_count'>
      <span class='count_top'><i class='fa fa-user'></i> Jumlah Siswa IPS</span>
      <div class='count '><?php echo $jumlah_siswa_ips; ?></div>
      <span class='count_bottom'>Siswa</span>
    </div>
    <div class='col-md-2 col-sm-4 col-xs-6 tile_stats_count'>
      <span class='count_top'><i class='fa fa-user'></i> Jumlah Login Siswa</span>
      <div class='count'><?php echo $jumlah_login; ?></div>
      <span class='count_bottom'>Login</span>
    </div>
    <div class='col-md-2 col-sm-4 col-xs-6 tile_stats_count'>
      <span class='count_top'><i class='fa fa-user'></i> Jumlah Download Kelulusan</span>
      <div class='count green'><?php echo $jumlah_unduh; ?></div>
      <span class='count_bottom'>Unduh</span>
      </div>
    <div class='col-md-2 col-sm-4 col-xs-6 tile_stats_count'>
      <span class='count_top'><i class='fa fa-user'></i>Siswa Melihat Nilai UN</span>
      <span class='count_bottom'>Siswa</span>
      <div class='count green'><?php echo $jumlah_nilai_un; ?></div>
      <span class='count_bottom'>Dilihat</span>
      </div>
  </div>
  <!-- /top tiles -->
<div class='row'>
<div class='col-md-6 col-sm-6 col-xs-12'>
    <!-- jalan pintas -->
   <div class='x_panel'>
          <div class='x_title'>
            <h2>Petunjuk Jalan Pintas <small>shortcut</small></h2>
            <ul class='nav navbar-right panel_toolbox'>
              <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
              </li>
              <li><a class='close-link'><i class='fa fa-close'></i></a>
              </li>
            </ul>
            <div class='clearfix'></div>
          </div>
          <div class='x_content'>
          <?php echo $jalan_pintas; ?>
        </div>
        </div>

    </div>
<div class='col-md-6 col-sm-6 col-xs-12'>
    <!-- jalan pintas -->
   <div class='x_panel'>
          <div class='x_title'>

            <h2>Jalan Pintas <small>shortcut</small></h2>
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
        $get_shortcut = $this->db->get(' shortcut');
        foreach($get_shortcut -> result() as $d){
        echo"
            <a class='btn btn-app' href='".base_url().$d->url."'>
              <i class='fa ".$d->icon."'></i> ".$d->judul."
            </a>";}?>
          </div>
        </div>

    </div>

    </div>
    <div class='row'>
    <!-- himbauan untuk siswa -->
     <div class='col-md-6 col-sm-6 col-xs-12'>
      <div class='x_panel'>
        <div class='x_title'>
          <h2>Himbauan Petugas</h2>
          <ul class='nav navbar-right panel_toolbox'>
            <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
            </li>

            <li><a class='close-link'><i class='fa fa-close'></i></a>
            </li>
          </ul>
          <div class='clearfix'></div>
        </div>
        <div class='x_content'>

          <div class='bs-example' data-example-id='simple-jumbotron'>
            <div class='jumbotron'>
              <?php echo $himbuan; ?></div>
          </div>

        </div>
      </div>
    </div>
        <?php
              $unique_id = $_SESSION['unique_id'];
              $get_data = $this->db->select('*')->join('Statistik','user.unique_id=Statistik.unique_id')->where('user.unique_id',$unique_id)->from('user')->get();
              foreach($get_data->result() as $d){
        echo"<div class='col-md-6 col-sm-6 col-xs-12'>
                <div class='x_panel fixed_height_390'>
                  <div class='x_content'>

                    <div class='flex'>
                      <ul class='list-inline widget_profile_box'>
                        <li>
                        </li>
                        <li>
                          <img src='";
                          echo base_url();
                          echo $d->avatar_url;
                          echo"' alt='...' class='img-circle profile_img'>

                        </li>
                        <li>


                        </li>
                      </ul>
                      <h3>".$d->nama."<h3>
                    </div>


                    <div class='flex'>

                      <ul class='list-inline count2'>

                        <h3 class='name'></h3>
                        <li>
                          <h3>".$d->sum_login."</h3>
                          <span>Login</span>
                        </li>
                        <li>
                          <h3>".$d->sum_unduh."</h3>
                          <span>Unduh</span>
                        </li>
                        <li>
                          <h3>".$d->sum_nilai_un."</h3>
                          <span>Melihat Nilai UN</span>
                        </li>
                      </ul>
                    </div>";
                    echo $pesan;
                   echo"
                  </div>
                </div>

        </div>";}?>
    </div>

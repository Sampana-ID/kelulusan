 <div class="row">
    <div>
    <div class="x_panel">
      <div class="x_title">
        <h2>Lihat Biodata <small>Cek Biodata</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <?php
          $unique_id = $_SESSION['unique_id'];
          $query = $this->db->select('*')->join('Statistik','user.unique_id=Statistik.unique_id')->join('biodata','user.unique_id=biodata.unique_id')->from('user')->where('user.unique_id',$unique_id)->get();
          foreach($query->result() as $d){
        echo"<table class='table table-hover'>";
        echo"  <thead>
            <tr>
              <th>#</th>
              <th>Jenis Data</th>
              <th>Isi Data</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th >1</th>
              <td>Nama</td>
              <td>".$d->nama_lengkap."</td>
            </tr>
            <tr>
              <th >2</th>
              <td>Nomor Ujian</td>
              <td>".$d->no_ujian."</td>
            </tr>
            <tr>
              <th >3</th>
              <td>NISN</td>
              <td>".$d->nisn."</td>
            </tr>
            <tr>
              <th >4</th>
              <td>Kelas</td>
              <td>12 ".$d->jurusan." ".$d->kelas."</td>
            </tr>
            <tr>
              <th >5</th>
              <td>Mata Pelajaran Peminatan</td>
              <td>".$d->peminatan."</td>
            </tr>
            <tr>
              <th >6</th>
              <td>Tempat, Tanggal Lahir</td>
              <td>".$d->tempat_lhr.", ".$d->tanggal_lhr."</td>
            </tr>
            <tr>
              <th >8</th>
              <td>Alamat</td>
              <td>".$d->alamat."</td>
            </tr>

          </tbody>";
        echo"</table>";}
?>
      </div>
    </div>
  </div>


    </div>
<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Biodata <small>edit biodata</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
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
        <form method="post" class="form-horizontal form-label-left" action="<?php echo base_url().'biodata/update' ?>">
          <p>Cek dan rubah dengan benar karena akan berpengaruh pada semua data!
          </p>
          <span class="section">Edit Data Pribadi</span>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama <span class="required">*</span>
            </label>
            <?php
            $unique_id = $_SESSION['unique_id'];
            $query = $this->db->select('*')->join('biodata','user.unique_id=biodata.unique_id')->from('user')->where('user.unique_id',$unique_id)->get();
            foreach($query->result() as $d){
            echo"

            <div class='col-md-6 col-sm-6 col-xs-12'>
              <input id='nama' class='form-control col-md-7 col-xs-12' data-validate-length-range='6' data-validate-words='2' name='nama' placeholder='Nama Lengkap' type='text'value='".$d->nama_lengkap."'>
            </div>
          </div>
          <div class='item form-group'>
            <label class='control-label col-md-3 col-sm-3 col-xs-12' for='alamat'>Alamat <span class='required'>*</span>
            </label>
            <div class='col-md-6 col-sm-6 col-xs-12'>
              <input type='text' class='form-control' value='".$d->alamat."' name='alamat' id='alamat'>
              </div>
          </div>
          <div class='item form-group'>
            <label class='control-label col-md-3 col-sm-3 col-xs-12' for='tempat_lhr'>Tempat Lahir <span class='required'>*</span>
            </label>
            <div class='col-md-6 col-sm-6 col-xs-12'>
              <input  id='tempat_lhr' name='tempat_lhr' placeholder='Misal : Cirebon'  class='form-control col-md-7 col-xs-12' value='".$d->tempat_lhr."'>
            </div>
          </div>
          <div class='item form-group'>
            <label class='control-label col-md-3 col-sm-3 col-xs-12' for='tanggal_lhr'>Tanggal Lahir <span class='required'>*</span>
            </label>
            <div class='col-md-6 col-sm-6 col-xs-12'>
              <input id='tanggal_lhr' name='tanggal_lhr'  placeholder='format : 3 November 1999' class='form-control col-md-7 col-xs-12' value='".$d->tanggal_lhr."'>
            </div>
          </div>
          <div class='item form-group'>
            <label class='control-label col-md-3 col-sm-3 col-xs-12' for='nisn'>NISN <span class='required'>*</span>
            </label>
            <div class='col-md-6 col-sm-6 col-xs-12'>

     <input id='nisn'
              name='nisn' class='form-control col-md-7 col-xs-12' value='".$d->nisn."' >
            </div>
          </div>
          <div class='ln_solid''></div>
          <div class='form-group'>
            <div class='col-md-6 col-md-offset-3''>
            <input type='submit' name='update' class='btn btn-success' value='Perbarui'>
            </div>";}
            ?>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

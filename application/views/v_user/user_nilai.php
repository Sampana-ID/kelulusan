<div class='row'>
    <div>
    <div class='x_panel'>
      <div class='x_title'>
        <h2>Lihat Nilai UN <small>Cek Nilai</small></h2>
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
          $unique_id = $_SESSION['unique_id'];
          $query = $this->db->select('*')->join('Statistik','Statistik.unique_id=biodata.unique_id')->join('nilai','biodata.unique_id=nilai.unique_id')->from('biodata')->where('biodata.unique_id',$unique_id)->get();
          foreach($query->result() as $d){
            $akhir = $d->akhir/4;
        echo"<table class='table table-hover'>";
         echo" <thead>
        <p>Untuk mencetak dokumen silahkan menuju halaman <a href='".base_url()."suratsiswa"."' >surat keterangan</a></p>
            <tr>
              <th>#</th>
              <th>Data</th>
              <th>Nilai</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope='row'>1</th>
              <td>Nama</td>
              <td>".$d->nama_lengkap."</td>
            </tr>
            <tr>
              <th scope='row'>2</th>
              <td>Nomor Ujian</td>
              <td>".$d->no_ujian."</td>
            </tr>
            <tr>
              <th scope='row'>3</th>
              <td>NISN</td>
              <td>".$d->nisn."</td>
            </tr>
            <tr>
              <th scope='row'>4</th>
              <td>Kelas</td>
              <td>12 ".$d->jurusan." ".$d->kelas."</td>
            </tr>
            <tr>
              <th scope='row'>5</th>
              <td>Bahasa Indonesia</td>
              <td>".$d->indonesia."</td>
            </tr>
            <tr>
              <th scope='row'>6</th>
              <td>Bahasa Inggris</td>
              <td>".$d->inggris."</td>
            </tr>
            <tr>
              <th scope='row'>7</th>
              <td>Matematika</td>
              <td>".$d->matematika."</td>
            </tr>
            <tr>
              <th scope='row'>8</th>
              <td>".$d->peminatan."</td>
              <td>".$d->nilai_peminatan."</td>
            </tr>

              <tr>
              <th scope='row'>9</th>
              <td>Hasil Akhir</td>
              <td>".$d->akhir." / <b style='color:#d54e21'>".$akhir."</b></td>
            </tr>
              <tr>
              <th scope='row'>10</th>
              <td>Peringkat</td>
              <td><b style='color:#d54e21'>".$d->peringkat."</b></td>
            </tr>

          </tbody>";
        echo"</table>";}
    ?>

      </div>
    </div>
  </div>

    </div>

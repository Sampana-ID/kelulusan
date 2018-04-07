<div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Cetak Surat Keterangan </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">


        <!-- Smart Wizard -->
        <p>Perhatikan baik-baik semua panduannya</p>
        <div id="wizard" class="form_wizard wizard_horizontal">
          <ul class="wizard_steps">
            <li>
              <a href="#step-1">
                <span class="step_no">1</span>
                <span class="step_descr">
                                  Langkah 1<br />
                                  <small>Verifikasi data diri</small>
                              </span>
              </a>
            </li>
            <li>
              <a href="#step-2">
                <span class="step_no">2</span>
                <span class="step_descr">
                                  Langkah 2<br />
                                  <small>Persetujuan</small>
                              </span>
              </a>
            </li>
            <li>
              <a href="#step-3">
                <span class="step_no">3</span>
                <span class="step_descr">
                                  Langkah 3<br />
                                  <small>Unduh</small>
                              </span>
              </a>
            </li>
          </ul>
          <div id="step-1">
    <p>silahkan menuju ke biodata diri untuk merubah data diri anda jika ada yang salah!</p>
    <?php
                          $unique_id = $_SESSION['unique_id'];
                        echo"<table class='table table-hover'>";
                        echo" <thead>";
                        $query = $this->db->select('*')->join('Statistik','user.unique_id=Statistik.unique_id')->join('biodata','user.unique_id=biodata.unique_id')->from('user')->where('user.unique_id',$unique_id)->get();
                        foreach($query->result() as $d){
                        echo "    <tr>
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
                              <th >7</th>
                              <td>Alamat</td>
                              <td>".$d->alamat."</td>
                            </tr>

                          </tbody>";}
                        echo"</table>";
            ?>
                          </div>
                          <div id="step-2">
                            <h2 class="StepTitle">Himbauan</h2>
                            <p>
                              Pastikan semua data anda adalah benar, jika data anda salah silahkan merubahnya di bagian biodata diri, anda dapat mengedit semua data pribadi anda, jika ada kesalahan teknis harap segera laporkan pada petugas.
                            </p>
                            <p>
                              Surat keterangan akan didownload dalam bentuk <code>PDF</code> baca <a href="index.php?page=faq">cara membuka file PDF</a> untuk mengetahui tata cara membuka PDF. Anda dapat mencetak dan mendownload kapanpun dan dimanapun, namun anda akan tetap diawasi oleh <a href="index.php?page=petugas">Petugas</a> agar dapat terlaksana dengan baik. Di surat keterangan ada dua jenis surat keterangan, surat kelulusan dan surat hasil UN silahkan unduh sesuai kebutuhan.
                            </p>
                            <p>
                                Dengan Mengklik <code>Next</code> maka anda menyetujui semua persyaratan dari panitia dan semua perangkat yang digunakan, serta anda sudah menyatakan bahwa data yang anda berikan pada halaman<code> Biodata </code>telah benar.
                              </p>
                          </div>
                          <div id="step-3">
                            <h2 class="StepTitle">Unduh</h2>
                            <p>Pilih sesuai keperluan
                            </p>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="pricing">
                                <div class="title">
                                  <h2>Surat Keterangan</h2>
                                  <h1>Kelulusan</h1>
                                </div>
                                <div class="x_content">
                                  <div class="">
                                    <div class="pricing_features">
                                      <ul class="list-unstyled text-left">
                                        <li><i class="fa fa-check text-success"></i> kop surat</li>
                                        <li><i class="fa fa-check text-success"></i> biodata diri</li>
                                        <li><i class="fa fa-check text-success"></i> keterangan lulus/tidak lulus</li>
                                        <li><i class="fa fa-check text-success"></i> Tanda tangan kepala sekolah</li>
                                        <li><i class="fa fa-check text-success"></i> Cap Kepala sekolah</li>
                                      </ul>
                                    </div>
                                  </div>
                                  <div class="pricing_footer">
                                    <?php
                                echo"
                                <a
                                href='".base_url()."cetak/un/".$unique_id."' class='btn btn-success btn-block' role='button'>Download <span> sekarang!</span></a>";
                                      ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="pricing">
                                <div class="title">
                                  <h2>Surat Keterangan</h2>
                                  <h1>Nilai UN</h1>
                                </div>
                                <div class="x_content">
                                  <div class="">
                                    <div class="pricing_features">
                                      <ul class="list-unstyled text-left">
                                        <li><i class="fa fa-check text-success"></i> kop surat</li>
                                        <li><i class="fa fa-check text-success"></i> biodata umum</li>
                                        <li><i class="fa fa-check text-success"></i> nilai UN</li>
                                        <li><i class="fa fa-check text-success"></i> cap dan tanda tangan kepala sekolah</li>

                                      </ul>
                                    </div>
                                  </div>
                                  <div class="pricing_footer">
                                    <?php
                                echo"<a href='".base_url()."cetak/un/".$unique_id."' class='btn btn-success btn-block' role='button'>Download <span> sekarang!</span></a>";
                                      ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                        <!-- End SmartWizard Content -->


                        <!-- End SmartWizard Content -->
                      </div>
                    </div>
                  </div>
                    </div>

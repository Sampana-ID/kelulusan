
    <div class="row">

                  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Siswa</h2>
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
                    <p class="text-muted font-13 m-b-30">
                      Gunakan <code>dropdown</code> untuk membatasi banyaknya <code>table</code>
                    </p>
                    <a class='btn btn-success col-md-12' type='button' href='<?php echo base_url().'datasiswa/tambah/';?>'>Tambah data siswa</a>
                    <a class='btn btn-success col-md-12' type='button' href='<?php echo base_url().'datasiswa/import/';?>'>Import data Siswa</a>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Username</th>
                          <th>Nama Lengkap</th>
                          <th>No. Ujian</th>
                          <th>Mencetak SKL</th>
                          <th>Melihat Nilai</th>
                          <th>Jumlah Login</th>
                          <th>Edit Data</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        $query = $this->db->select('*')->join('Statistik', 'user.unique_id=Statistik.unique_id')->from('user')->where('level','2')->get();
                        foreach($query->result() as $d){
                        echo "
                        <tr>
                          <td>".$d->username."</td>
                          <td>".$d->nama."</td>
                          <td>".$d->no_ujian."</td>
                          <td>".$d->sum_unduh."</td>
                          <td>".$d->sum_nilai_un."</td>
                          <td>".$d->sum_login."</td>
                          <td>
                      <div class='btn-group  btn-group-sm'>
                        <a class='btn btn-default' type='button' href='".base_url().'datasiswa/detail/'.$d->unique_id."'>Detail</a>
                        <a class='btn btn-success' type='button' href='".base_url().'datasiswa/edit/'.$d->unique_id."'>Edit</a>
                  <a class='btn btn-danger' type='button'  id=".$d->unique_id." href='".base_url().'datasiswa/hapus/'.$d->unique_id."'>Hapus</a>
                            </div></td>
                        </tr>";}
                    echo"
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


    </div>
</div>

                  <div class='modal fade bs-example-modal-sm' tabindex='-1' role='dialog' aria-hidden='true'>
                    <div class='modal-dialog modal-sm'>
                      <div class='modal-content'>

                        <div class='modal-header'>
                          <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span>
                          </button>
                          <h4 class='modal-title' id='myModalLabel2'>Hapus Data</h4>
                        </div>
                        <div class='modal-body'>
                          <p>Tindakan ini akan menghapus data siswa terkait. anda yakin untuk menghapusnya?</p>
                        </div>
                        <div class='modal-footer'>
                          <a type='button' class='btn btn-default' data-dismiss='modal'>Tutup</a>
                          <a href='".base_url().'datasiswa/hapus'.$d->unique_id."'type='button' class='btn btn-primary'>Hapus</a>
                        </div>

                      </div>
                    </div>"
                            ;
                        ?>

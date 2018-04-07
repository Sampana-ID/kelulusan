
    <div class="row">

                  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Petugas</h2>
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
                    <a class='btn btn-success col-md-12' type='button' href='<?php echo base_url().'petugas/tambah/';?>'>Tambah Petugas</a>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Username</th>
                          <th>Nama</th>
                          <th>ID</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        $query = $this->db->select('*')->where('level','1')->from('user')->get();
                        foreach($query->result() as $d){
                        echo "
                        <tr>
                        <td>".$d->username."</td>
                        <td>".$d->nama."</td>
                        <td>".$d->unique_id."</td>
                          <td>
                      <div class='btn-group  btn-group-sm'>
                        <a class='btn btn-success' type='button' href='".base_url().'petugas/edit/'.$d->unique_id."'>Edit</a>
                  <a class='btn btn-danger' type='button'  id=".$d->unique_id." href='".base_url().'petugas/hapus/'.$d->unique_id."'>Hapus</a>
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
"
                            ;
                        ?>

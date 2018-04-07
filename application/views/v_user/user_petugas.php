<div class='row'>
<?php
    $query = $this->db->select('*')->join('admin','user.unique_id=admin.unique_id')->from('user')->get();
    foreach($query->result() as $d){
    echo"
          <div class='col-md-4 col-sm-4 col-xs-12 profile_details'>
            <div class='well profile_view'>
              <div class='col-sm-12'>
                <h4 class='brief'><i>".$d->jabatan."</i></h4>
                <div class='left col-xs-7'>
                 <h2>".$d->nama."</h2>
                  <p><strong>Tentang: </strong> ".$d->tentang."</p>
                  <ul class='list-unstyled'>
                    <li><i class='fa fa-building'></i> Alamat: ".$d->alamat."</li>
                    <li><i class='fa fa-phone'></i> HP: ".$d->hp." </li>
                  </ul>
                </div>
                <div class='right col-xs-5 text-center'>
                  <img src='".base_url().$d->avatar_url."' alt='' class='img-circle img-responsive'>
                </div>
              </div>
              <div class='col-xs-12 bottom text-center'>
                <div class='col-xs-12 col-sm-6 emphasis'>
                </div>
                <div class='col-xs-12 col-sm-6 emphasis'>
                </div>
              </div>
            </div>
          </div>";
          }?>
</div>

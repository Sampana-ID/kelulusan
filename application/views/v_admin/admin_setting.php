<form class='form-horizontal form-label-left' method="post" enctype="multipart/form-data">
        <span class='section'>General</span>
        <p><b>Warning!</b>data berikut adalah data vital! jika data dirubah akan memengaruhi data</p>
<?php
$sql = $this->db->get('options');
foreach ($sql->result() as $data)
{
    echo"
                      <div class='item form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12' for='".$data->nama_option."'>".$data->judul_option."
                         </label>

                        <div class='col-md-6 col-sm-6 col-xs-12'>
                          <textarea id='".$data->nama_option."' class='form-control col-md-7 col-xs-12' name='".$data->nama_option."'  required='required' >".$data->isi_option."</textarea>
                        </div>
                      </div>";}?>
                          <div class='ln_solid'/>
                        <div class='col-md-6 col-md-offset-3'>
                        <input onclick="change_url()" type="submit" class="btn btn-primary" value="Simpan" name="update">
                        </div></form>

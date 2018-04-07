<?php
   $this->load->model('Datasitus');
   $data = $this->Datasitus->peminatan();
   echo "<select class='form-control' name='kelas' id='kelas'>";
   foreach ($data -> result() as $d)
    {
      echo "<option>".$d->isi_data."</option>";
    }
    echo "</select>";
?>

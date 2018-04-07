<?php
   $this->load->model('Datasitus');
   $data = $this->Datasitus->jurusan();
   echo "<select class='form-control' name='jurusan' id='jurusan'>";
   foreach ($data -> result() as $d)
    {
      echo "<option>".$d->isi_data."</option>";
    }
    echo "</select>";
?>

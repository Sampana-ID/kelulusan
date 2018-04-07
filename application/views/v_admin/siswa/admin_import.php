<div class='x_panel'>
   <div class='x_title'>
      <h2>Edit Data Siswa</h2>
      <ul class='nav navbar-right panel_toolbox'>
          <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
          </li>
          <li><a class='close-link'><i class='fa fa-close'></i></a>
          </li>
          </ul>
       <div class='clearfix'></div>
    </div>
    <div class='x_content'>
      <h4>Upload + Validasi dengan Codeigniter - harviacode.com</h4>
                  <?php
                  echo form_open_multipart($action);

                  echo '<div class="form-group">';
                  echo '<label>Judul ' . form_error('judul') . '</label>'; // show error judul
                  echo form_input('judul', $judul, 'class="form-control" placeholder="Judul"');
                  echo '</div>';

                  echo '<div class="form-group">';
                  echo '<label>Gambar ' . $error . '</label>'; // show error upload
                  echo form_upload('userfile');
                  echo '</div>';

                  echo form_submit('mysubmit', 'Upload', 'class="btn btn-primary"');
                  echo form_close();
                  ?>
    </div>
</div>

<?php

/**
*
*Pengumuman Kelulusan
*
*This content is file of Pengumuman Kelulusan
*Copyright (c) 2017, Brackets Organization
*
*
**/

require_once('v_core/core_license.php');
?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title><?php echo $title;?></title>
    <?php
    include('v_core/core_css.php');
    ?>
  </head>

  <body class='login'>
    <div>
      <a class='hiddenanchor' id='signin'></a>
      <div class='login_wrapper'>
        <div class='animate form login_form'>
          <section class='login_content'>

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
                echo form_open('login/masuk');
            ?>
              <h1>Akses Terbatas</h1>
              <div>

              </div>
              <div>
                <?php
                  $user = array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Username','id' => 'user' );
                  $pass = array('class' => 'form-control', 'placeholder' => 'Password', 'id' => 'pass' );
                  echo form_input('user',$username, $user);
                  echo form_password('pass',$password, $pass);
                ?>
              </div>
              <div>
                <?php
                $attributes = array('class' => 'check', 'id' => 'memorize');
                echo form_checkbox('memorize', 'yes', TRUE, $attributes);
                echo form_label('keep me signed in', 'memorize');
                ?>
                <?php
                $button = array('class' => 'btn btn-default submit' );
                echo form_submit('login', 'Masuk',$button);
                ?>

              </div>
              <div class='clearfix'></div>
              <div class='separator'>
              <div class='clearfix'></div>
              <br/>
              <div>
                <h1>
                  <i class='fa fa-graduation-cap'></i>
                  <?php echo $name;?>
                </h1>
                <p>
                  <?php echo $copyright;?>
                </p>
                </div>
              </div>
              <?php
              echo form_close();
              ?>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

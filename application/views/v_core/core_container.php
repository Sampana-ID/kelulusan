<!DOCTYPE html>
<html>
  <head>
  <?php
  require_once('core_header.php');
  require_once('core_css.php');
  ?>
  </head>
  <body>
    <body class="nav-md">
      <div class="container body">
        <div class="main_container">
          <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
              <div class="navbar nav_title" style="border: 0;">
                <a href="<?php echo base_url();?>" class="site_title">
                  <i class="fa fa-home"></i><span>
                  <?php
                   require_once('core_license.php');echo $name;?></span></a>
              </div>
              <div class="clearfix"></div>
              <div class="profile clearfix">
                <div class="profile_pic">
                  <img src="
                          <?php
                          $id= $_SESSION['unique_id'];
                          $get = $this->db->query("SELECT * FROM `user` WHERE `unique_id` = '$id'");
                          $row = $get->row();
                          echo base_url();
                          echo $row->avatar_url;
                          ?>" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                  <span>Selamat Datang,</span>
                  <h2>
                  <?php
                  $id= $_SESSION['unique_id'];
                  $get = $this->db->query("SELECT * FROM `user` WHERE `unique_id` = '$id'");
                  $row = $get->row();
                  echo $row->nama;
                  ?></h2>
                </div>
              </div>
              <!-- /menu profile quick info -->

              <br />

              <?php
                require_once('core_menu.php');
              ?>
              </div>
          </div>

          <!-- top navigation -->
          <div class="top_nav">
            <div class="nav_menu">
              <nav>
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>

                <ul class="nav navbar-nav navbar-right">
                  <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <img src="<?php
                      $id= $_SESSION['unique_id'];
                      $get = $this->db->query("SELECT * FROM `user` WHERE `unique_id` = '$id'");
                      $row = $get->row();
                      echo base_url();
                      echo $row->avatar_url;
                          ?>" alt=""><?php
                          $id= $_SESSION['unique_id'];
                          $get = $this->db->query("SELECT * FROM `user` WHERE `unique_id` = '$id'");
                          $row = $get->row();
                          echo $row->nama;
                          ?>
                      <span class=" fa fa-angle-down"></span>
                    </a>
                    <?php
                      require_once 'core_top_menu.php';
                    ?>
                  </li>
                  <li role='presentation' class='dropdown'>
                    <a href='javascript:;' class='dropdown-toggle info-number' data-toggle='dropdown' aria-expanded='false'>
                      <i class='fa fa-envelope-o'></i>
                      <span class='badge bg-green'>
                        <?php
                          $q = $this->db->query("SELECT COUNT(*) AS `id_post` FROM `post`");
                          $d = $q->row();
                          echo $d->id_post;
                          ?>
                        </span>
                    </a>
                    <ul id='menu1' class='dropdown-menu list-unstyled msg_list' role='menu'>
                  <?php
                  $get_post = $this->db->select('*')->join('post','user.nama=post.post_author')->from('user')->get();
                  $post=$this->db->query("SELECT * FROM user INNER JOIN post ON user.nama=post.post_author");
                  foreach($get_post -> result() as $d){
                  echo"
                      <li>
                        <a href='".base_url().'pengumuman/post/'.$d->id_post."'>
                          <span class='image'><img src='images/".$d->post_image."' alt='Pengumuman Gambar' /></span>
                          <span>
                            <span>".$d->nama."</span>
                            <span class='time'>".$d->tanggal."</span>
                          </span>
                          <span class='message'>".$d->post_title."
                          </span>
                        </a>
                      </li>
                      ";}?>
                      <li>
                        <div class='text-center'>
                          <a href="<?php echo base_url().'pengumuman';?>">
                            <strong>Lihat Pengumuman</strong>
                            <i class='fa fa-angle-right'></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>

                </ul>
              </nav>
            </div>
          </div>
          <!-- /top navigation -->

          <!-- page content -->
        <div class='right_col' role='main' style="padding-top: 50px;">
        <?php
            if ($_SESSION['level'] == 1)
            {
              $folder = "v_admin/";
            }
            else{
              $folder = "v_user/";
            }
              $this->load->view($folder.$page);
        ?>
      </div>
          <!-- /page content -->

          <?php
            require_once('core_footer.php');
          ?>
        </div>
      </div>
    <?php

    require_once('core_javascript.php');
    ?>
  </body>
</html>

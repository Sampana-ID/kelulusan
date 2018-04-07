<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('v_core/core_header');?>
  <link href="<?php echo base_url().'vendors/nowui/bootstrap.min.css'?>" rel="stylesheet" />
  <link href="<?php echo base_url().'vendors/nowui/now-ui-kit.css'?>" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>

<body class="profile-page">
    <!-- Navbar -->
    <nav class="navbar navbar-toggleable-md bg-primary fixed-top navbar-transparent " color-on-scroll="500">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="<?php echo base_url().'pengumuman';?>" rel="tooltip" data-placement="bottom" target="_blank">
                    KEMBALI
                </a>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
      <div class="page-header page-header-small" filter-color="orange">
          <div class="page-header-image" data-parallax="true" style="background-image: url('<?php echo base_url()."images/".$gambar?>');">
          </div>
          <div class="container">
              <div class="content-center">
                  <div class="photo-container">
                      <img src="<?php echo base_url().$avatar;?>" alt="">
                  </div>
                  <h3 class="title"><?php echo $judul; ?></h3>
                  <p class="category">oleh: <?php echo $pengarang;?></p>
              </div>
          </div>
      </div>
        <div class="section">
            <div class="container col-md-9" >
                <div class="button-container">
                    <a href="#button" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="Share ke facebook">
                      <i class="fa fa-facebook"></i>
                    </a>
                    <a href="#button" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="Share ke twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#button" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="Share ke google plus">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <?php
                      if($_SESSION['level'] == 1){
                        echo"
                        <a href='".base_url()."pengumuman/edit/".$id."' class='btn btn-primary btn-round btn-lg'>Edit</a>
                        <a href='".base_url()."pengumuman/hapus/".$id."' class='btn btn-primary btn-round btn-lg'>Hapus</a>
                        ";
                      }
                      else
                      {

                      }
                    ?>
                </div>
                <h3 class="title" style="margin-bottom:0px;"><?php echo $judul;?></h3>
                <p style="text-align:center;">di pos pada : <?php echo $tanggal." oleh : ".$pengarang;?></p>
                <div class=""><?php echo $isi;?></div>
              </div>
        </div>
        <footer class="footer footer-default">
            <div class="container">
                <div class="copyright">
                  <?php include('v_core/core_license.php'); echo $copyright;?>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>

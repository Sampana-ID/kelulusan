<div class='row'>
  <div class='col-md-12'>
    <div class='x_panel'>
      <div class='x_title'>
        <h2>Pengumuman<small>resmi</small></h2>
        <ul class='nav navbar-right panel_toolbox'>
          <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
          </li>
          <li><a class='close-link'><i class='fa fa-close'></i></a>
          </li>
        </ul>
        <div class='clearfix'></div>
      </div>
      <div class='x_content'>
        <div class='row'>
    <?php
    $query = $this->db->select('*')->from('user')->join('post','user.nama=post.post_author')->get();
    foreach($query->result() as $d){
    echo"
        <div class='col-md-4 col-sm-4 col-xs-12'>
            <div class='thumbnail'>
              <div class='image view view-first'>
                <img style='width: 100%; display: block;' src='".base_url()."images/".$d->post_image."' alt='image' />
                <div class='mask'>
                  <p>".$d->post_title."</p>
                  <div class='tools tools-bottom'>
                    <a href='#'><i class='fa fa-facebook'></i></a>
                    <a href='#'><i class='fa fa-twitter'></i></a>
                    <a href='#'><i class='fa fa-google-plus'></i></a>
                  </div>
                </div>
              </div>
              <a href='".base_url()."pengumuman/post/".$d->id_post."'>
              <div class='caption'>
                <h2>".$d->post_title."</h2>
              </div>
              </a>
            </div>
          </div>";}?>
        </div>
      </div>
    </div>
  </div>
</div>

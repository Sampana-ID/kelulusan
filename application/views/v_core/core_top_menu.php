<ul class="dropdown-menu dropdown-usermenu pull-right">
  <?php
      if($_SESSION['level'] == 1)
      {
        $level = "1";
      }
      else {
        $level = "0";
      }
      $menu = $this->db->select('*')->where('level',$level)->where('keterangan','1')->from('menu')->get();
      foreach ($menu -> result() as $list_menu)
      {
        echo "<li><a href='".base_url().$list_menu->link."'><i class='fa ".$list_menu->icon."'></i> ".$list_menu->nama." </a></li>";
      }
  ?>
</ul>

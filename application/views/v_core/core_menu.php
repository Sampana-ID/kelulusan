<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>Menu</h3>
    <ul class="nav side-menu">
        <?php
            if($_SESSION['level'] == 1)
            {
              $level = "1";
            }
            else {
              $level = "0";
            }
            $menu = $this->db->select('*')->where('level',$level)->from('menu')->get();
            foreach ($menu -> result() as $list_menu)
            {
              echo "<li><a href='".base_url().$list_menu->link."'><i class='fa ".$list_menu->icon."'></i> ".$list_menu->nama." </a></li>";
            }
        ?>
    </ul>
  </div>
</div>

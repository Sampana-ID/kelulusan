<div class='row'>             <div >
               <div class='x_panel'>
                 <div class='x_title'>
                   <h2><i class='fa fa-question-circle'></i> Bantuan <small><code>FAQ</code></small></h2>
                   <ul class='nav navbar-right panel_toolbox'>
                     <li><a class='collapse-link'><i class='fa fa-chevron-up'></i></a>
                     </li>
                     <li><a class='close-link'><i class='fa fa-close'></i></a>
                     </li>
                   </ul>
                   <div class='clearfix'></div>
                 </div>
                 <div class='x_content'>

                   <!-- start accordion -->
                   <div class='accordion' id='accordion' role='tablist' aria-multiselectable='true'>
          <?php
               $query = $this->db->get('faq');
               foreach($query->result() as $d){
               echo"
                     <div class='panel'>
                       <a class='panel-heading' role='tab' id='headingOne' data-toggle='collapse' data-parent='#accordion' href='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
                         <h4 class='panel-title'>".$d->faq_title."</h4>
                       </a>
                       <div id='collapseOne' class='panel-collapse collapse in' role='tabpanel' aria-labelledby='headingOne'>
                         <div class='panel-body'>
                             ".$d->faq_content."
                         </div>
                       </div>
                     </div>";}?>
                   </div>
                   <!-- end of accordion -->

                 </div>
               </div>
             </div>
               </div>

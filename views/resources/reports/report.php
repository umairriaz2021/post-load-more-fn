<?php 
function resource_checkLayout()
{
    $reports = get_posts(['numberposts'=>4,'post_type'=>'post','post_status'=>'publish','order' => 'ASC','tax_query' => [['taxonomy' => 'category','field'=>'term_id','terms'=>118]]]);
    
    $output = '';
    $count = 1;
    if(count($reports) > 0)
    {
        $output .= '<section id="showResources">'; 
        foreach($reports as $key => $report)
        {
           
            
        if(count($reports)  == $count++)
        {
            $output .= '<div class="row" id="sec_'.$report->ID.'">
            <div class="col-sm-12 col-12 d-block">
              <div class="row border-top border-bottom  my-3 py-3 align-items-center res_row">
              <div class="col-md-6 col-sm-12 col-12 d-block"><div class="partner_img_area"><img src="'.wp_get_attachment_url(get_post_thumbnail_id($report->ID)).'" width="350px" height="350px" class="img-fluid"></div></div>
              <div class="col-md-6 col-sm-12 col-12 d-block">
              <div class="partner-content">
              <h2>'.$report->post_title.'</h2>
              <p class="my-3 cn_style">'.$report->post_content.'</p>  
              </div>
              <a class="text-dark text-decoration-none font-weight-bold btn custom_btn rounded-0" href="javascript:void(0)">Download</a>
              </div>
              </div>   
            </div>
        </div>';
            
            
        }
        else{
            $output .= '<div class="row" id="sec_'.$report->ID.'">
            <div class="col-sm-12 col-12 d-block">
              <div class="row border-top  my-3 py-3 align-items-center res_row">
              <div class="col-md-6 col-sm-12 col-12 d-block"><div class="partner_img_area"><img src="'.wp_get_attachment_url(get_post_thumbnail_id($report->ID)).'" width="350px" height="350px" class="img-fluid"></div></div>
              <div class="col-md-6 col-sm-12 col-12 d-block">
              <div class="partner-content">
              <h2>'.$report->post_title.'</h2>
              <p class="my-3 cn_style">'.$report->post_content.'</p>  
              </div>
              <a class="text-dark text-decoration-none font-weight-bold btn custom_btn rounded-0" href="javascript:void(0)">Download</a>
              </div>
              </div>   
            </div>
        </div>';
        }
         
        }
        $output .= '</section>';
       
    }
   return $output;


}
add_shortcode('report-resources','resource_checkLayout');


function report_search_field()
{
    $reports = get_posts(['numberposts'=>4,'post_type'=>'post','post_status'=>'publish','order' => 'ASC','tax_query' => [['taxonomy' => 'category','field'=>'term_id','terms'=>118]]]);
    $output = '';
    
    if(count($reports) > 0)
    {
        $output .= '<div class="search_inline">
        <select class="form-select" id="r_search" aria-label="Default select example"><option selected>Jump To</option>';
      foreach($reports as $key => $report)
      {
         $output .= '<option value="sec_'.$report->ID.'">'.$report->post_title.'</option>';
      }  
    $output .= '</select>';
    }
   


return $output;
}
add_shortcode('report-search','report_search_field');
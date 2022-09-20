<?php 
function checkLayout()
{
    $partners = get_posts(['numberposts'=>4,'post_type'=>'post','post_status'=>'publish','order' => 'ASC','tax_query' => [['taxonomy' => 'category','field'=>'term_id','terms'=>4]]]);
    $output = '';
    $count = 1;
    if(count($partners) > 0)
    {
        $output .= '<section id="showResources">'; 
        foreach($partners as $key => $partner)
        {
           
            
        if(count($partners)  == $count++)
        {
            $output .= '<div class="row">
            <div class="col-sm-12 col-12 d-block">
              <div class="row border-top border-bottom  my-3 py-3 align-items-center res_row">
              <div class="col-md-6 col-sm-12 col-12 d-block"><div class="partner_img_area"><img src="'.wp_get_attachment_url(get_post_thumbnail_id($partner->ID)).'" width="350px" height="350px" class="img-fluid"></div></div>
              <div class="col-md-6 col-sm-12 col-12 d-block">
              <div class="partner-content">
              <h2>'.$partner->post_title.'</h2>
              <p class="my-3 cn_style">'.$partner->post_content.'</p>  
              </div>
              <a class="text-dark text-decoration-none font-weight-bold" href="'.get_field('partner_url',$partner->ID).'">'.str_replace('/','',str_replace('https//:','',get_field('partner_url',$partner->ID))).'</a>
              </div>
              </div>   
            </div>
        </div>';
            
            
        }
        else{
            $output .= '<div class="row">
            <div class="col-sm-12 col-12 d-block">
              <div class="row border-top  my-3 py-3 align-items-center res_row">
              <div class="col-md-6 col-sm-12 col-12 d-block"><div class="partner_img_area"><img src="'.wp_get_attachment_url(get_post_thumbnail_id($partner->ID)).'" width="350px" height="350px" class="img-fluid"></div></div>
              <div class="col-md-6 col-sm-12 col-12 d-block">
              <div class="partner-content">
              <h2>'.$partner->post_title.'</h2>
              <p class="my-3 cn_style">'.$partner->post_content.'</p>  
              </div>
              <a class="text-dark text-decoration-none font-weight-bold" href="'.get_field('partner_url',$partner->ID).'">'.str_replace('/','',str_replace('https://','',get_field('partner_url',$partner->ID))).'</a>
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
add_shortcode('show-resources','checkLayout');


function resource_search_field()
{
    $output = '<div class="search_inline">
    <input type="text" placeholder="Search" name="s_resource" id="s_resource">
    <a href="javascript:void(0)" class="search"><i class="fas fa-search"></i></a>
</div>';

return $output;
}
add_shortcode('search-field','resource_search_field');
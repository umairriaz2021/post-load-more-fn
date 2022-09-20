<?php

function partners_create_top_shortcode()
{
    $partners = get_posts(['numberposts'=>100,'post_type'=>'partners','post_status'=>'publish','orderby'=>'rand','order' => 'ASC']);
    $output = '';
    if(count($partners) > 0)
    {
        $output .= '<div class="container my-5"><ul class="partner_logos">';
        foreach($partners as $key => $partner)
        {
            $output .= '
            
            <li><img src="'.wp_get_attachment_url(get_post_thumbnail_id($partner->ID)).'" class="img-fluid" width="350px" height="350px"></li>
            ';
         
        }
        $output .= '</ul></div>'; 
    }


   
    return $output;
}
add_shortcode('top-logos','partners_create_top_shortcode');


function partners_show_single_details()
{
    $partners = get_posts(['numberposts'=>4,'post_type'=>'partners','post_status'=>'publish','orderby'=>'rand','order' => 'ASC']);
    $output = '';
    $count = 1;
    if(count($partners) > 0)
    {
        $output .= '<section id="showPartners">'; 
        foreach($partners as $key => $partner)
        {
           
            
        if(count($partners)  == $count++)
        {
            $output .= '<div class="row">
            <div class="col-sm-12 col-12 d-block">
              <div class="row border-top border-bottom  my-3 py-3 align-items-center res_row">
              <div class="col-md-6 col-sm-12 col-12 d-block"><div class="partner_img_area"><a href="'.get_field('partner_url',$partner->ID).'"><img src="'.wp_get_attachment_url(get_post_thumbnail_id($partner->ID)).'" width="350px" height="350px" class="img-fluid"></a></div></div>
              <div class="col-md-6 col-sm-12 col-12 d-block">
              <div class="partner-content">
              <h2>'.$partner->post_title.'</h2>
              <p class="my-3">'.$partner->post_content.'</p>  
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
              <div class="col-md-6 col-sm-12 col-12 d-block"><div class="partner_img_area"><a href="'.get_field('partner_url',$partner->ID).'"><img src="'.wp_get_attachment_url(get_post_thumbnail_id($partner->ID)).'" width="350px" height="350px" class="img-fluid"></a></div></div>
              <div class="col-md-6 col-sm-12 col-12 d-block">
              <div class="partner-content">
              <h2>'.$partner->post_title.'</h2>
              <p class="my-3">'.$partner->post_content.'</p>  
              </div>
              <a class="text-dark text-decoration-none font-weight-bold" href="'.get_field('partner_url',$partner->ID).'">'.str_replace('/','',str_replace('https://','',get_field('partner_url',$partner->ID))).'</a>
              </div>
              </div>   
            </div>
        </div>';
        }
         
        }
        $output .= '</section>';
        $output .= '<div class="show_icon d-flex justify-content-center my-5"><a class="text-dark showPartners" href="javascript:void(0)"><i class="fas fa-angle-down fa-2x"></i></a></div>'; 
    }
   return $output;
}
add_shortcode('partners-details','partners_show_single_details');
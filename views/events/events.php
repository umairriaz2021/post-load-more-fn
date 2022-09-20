<?php


function events_show_single_details()
{
    $events = get_posts(['numberposts'=>4,'post_type'=>'class','post_status'=>'publish','orderby'=>'rand','order' => 'ASC']);
 	
    $output = '';
    $count = 1;
    if(count($events) > 0)
    {
        $output .= '<section id="showEvents">'; 
        foreach($events as $key => $event)
        {

            
        if(count($events)  == $count++)
        {
            $output .= '<div class="row" event-id="'.$event->ID.'">
            <div class="col-sm-12 col-12 d-block">
              <div class="row border-top border-bottom  my-3 py-3 align-items-center res_row">
              <div class="col-md-6 col-sm-12 col-12 d-block"><div class="partner_img_area"><img src="'.get_post_meta($event->ID,'_wcs_image',true).'" width="350px" height="350px" class="img-fluid"></div></div>
              <div class="col-md-6 col-sm-12 col-12 d-block">
              <div class="partner-content">
              <h2>'.$event->post_title.'</h2>
              <p class="my-3">'.$event->post_content.'</p>  
              </div>
			  <div class="event-btn">
				  <a href="'.esc_url(get_post_meta($event->ID,'_wcs_action_custom',true)).'" class="btn btn-primary rounded-0" type="button">Read More</a>

				</div>
              </div>
              </div>   
            </div>
        </div>';
            
            
        }
        else{
            $output .= '<div class="row">
            <div class="col-sm-12 col-12 d-block">
              <div class="row border-top  my-3 py-3 align-items-center res_row">
              <div class="col-md-6 col-sm-12 col-12 d-block"><div class="partner_img_area"><img src="'.get_post_meta($event->ID,'_wcs_image',true).'" width="350px" height="350px" class="img-fluid"></div></div>
              <div class="col-md-6 col-sm-12 col-12 d-block">
              <div class="partner-content">
              <h2>'.$event->post_title.'</h2>
              <p class="my-3">'.$event->post_content.'</p>  
              
			 	</div>
				<div class="event-btn">
				  <a href="'.esc_url(get_post_meta($event->ID,'_wcs_action_custom',true)).'" class="btn btn-primary rounded-0" type="button">Read More</a>

				</div>
              </div>
              </div>   
            </div>
        </div>';
        }
         
        }
        $output .= '</section>';
        $output .= '<div class="show_icon d-flex justify-content-center my-5"><a class="text-dark showEvents" href="javascript:void(0)"><i class="fas fa-angle-down fa-2x"></i></a></div>'; 
    }
   return $output;
}
add_shortcode('events-details','events_show_single_details');

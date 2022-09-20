<?php 

if($_POST['param'] === 'get_partners')
{
    $counter = intval($_POST['count']);
    $partners = get_posts(['numberposts'=>$counter,'post_type'=>'partners','post_status'=>'publish','orderby'=>'rand','order' => 'ASC']);
    $output = '';
    $count = 1;
    if(count($partners) > 0)
    {
       
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
        if($counter++ > count($partners))
        {
            $hide = 1;
        }
        
    }
        
        
    }
    
    echo json_encode(['status'=>200,'data'=>$output,'hide'=>$hide]);

}

if($_POST['param'] === 'get_events')
{
    $counter = intval($_POST['count']);
    $events = get_posts(['numberposts'=>$counter,'post_type'=>'class','post_status'=>'publish','orderby'=>'rand','order' => 'ASC']);
    $output = '';
    $count = 1;
    if(count($events) > 0)
    {
       
        foreach($events as $key => $event)
        {
           
            
        if(count($events)  == $count++)
        {
            $output .= '<div class="row">
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
        if($counter++ > count($events))
        {
            $hide = 1;
        }
        
    }
        
        
    }
    
    echo json_encode(['status'=>200,'data'=>$output,'hide'=>$hide]);

}

if($_POST['params'] === 'get_resources')
{
    
    $resources = get_posts(['numberposts'=>4,'post_type'=>'post','post_status'=>'publish','order' => 'ASC','tax_query' => ['taxonomy' => 'category','field'=>'term_id','terms'=>4]]);
    $search = strtolower($_POST['search']);
    
    $output = '';
    if(count($resources) > 0)
    {
       
        foreach($resources as $key => $resource)
        {
        
        
        if(empty($search) && strpos(strtolower($resource->post_title),$search) !== true ){   
        if(count($resources)  == $count++)
        {
            $output .= '<div class="row">
            <div class="col-sm-12 col-12 d-block">
              <div class="row border-top border-bottom  my-3 py-3 align-items-center res_row">
              <div class="col-md-6 col-sm-12 col-12 d-block"><div class="partner_img_area"><img src="'.wp_get_attachment_url(get_post_thumbnail_id($resource->ID)).'" width="350px" height="350px" class="img-fluid"></div></div>
              <div class="col-md-6 col-sm-12 col-12 d-block">
              <div class="partner-content">
              <h2>'.$resource->post_title.'</h2>
              <p class="my-3">'.$resource->post_content.'</p>  
              </div>
              <a class="text-dark text-decoration-none font-weight-bold" href="'.get_field('partner_url',$resource->ID).'">'.str_replace('/','',str_replace('https//:','',get_field('partner_url',$resource->ID))).'</a>
              </div>
              </div>   
            </div>
        </div>';
            
            
        }
       
        else{
            $output .= '<div class="row">
            <div class="col-sm-12 col-12 d-block">
              <div class="row border-top  my-3 py-3 align-items-center res_row">
              <div class="col-md-6 col-sm-12 col-12 d-block"><div class="partner_img_area"><img src="'.wp_get_attachment_url(get_post_thumbnail_id($resource->ID)).'" width="350px" height="350px" class="img-fluid"></div></div>
              <div class="col-md-6 col-sm-12 col-12 d-block">
              <div class="partner-content">
              <h2>'.$resource->post_title.'</h2>
              <p class="my-3">'.$resource->post_content.'</p>  
              </div>
              <a class="text-dark text-decoration-none font-weight-bold" href="'.get_field('partner_url',$resource->ID).'">'.str_replace('/','',str_replace('https://','',get_field('partner_url',$resource->ID))).'</a>
              </div>
              </div>   
            </div>
        </div>';
        }
        
        }
        elseif(strpos(strtolower($resource->post_title),$search) !== false || strpos(strtolower($resource->post_content),$search) !== false){
            if(count($resources)  == $count++)
        {
            $output .= '<div class="row">
            <div class="col-sm-12 col-12 d-block">
              <div class="row border-top border-bottom  my-3 py-3 align-items-center res_row">
              <div class="col-md-6 col-sm-12 col-12 d-block"><div class="partner_img_area"><img src="'.wp_get_attachment_url(get_post_thumbnail_id($resource->ID)).'" width="350px" height="350px" class="img-fluid"></div></div>
              <div class="col-md-6 col-sm-12 col-12 d-block">
              <div class="partner-content">
              <h2>'.$resource->post_title.'</h2>
              <p class="my-3">'.$resource->post_content.'</p>  
              </div>
              <a class="text-dark text-decoration-none font-weight-bold" href="'.get_field('partner_url',$resource->ID).'">'.str_replace('/','',str_replace('https//:','',get_field('partner_url',$resource->ID))).'</a>
              </div>
              </div>   
            </div>
        </div>';
            
            
        }
       
        else{
            $output .= '<div class="row">
            <div class="col-sm-12 col-12 d-block">
              <div class="row border-top  my-3 py-3 align-items-center">
              <div class="col-md-6 col-sm-12 col-12 d-block"><div class="partner_img_area"><img src="'.wp_get_attachment_url(get_post_thumbnail_id($resource->ID)).'" width="350px" height="350px" class="img-fluid"></div></div>
              <div class="col-md-6 col-sm-12 col-12 d-block">
              <div class="partner-content">
              <h2>'.$resource->post_title.'</h2>
              <p class="my-3">'.$resource->post_content.'</p>  
              </div>
              <a class="text-dark text-decoration-none font-weight-bold" href="'.get_field('partner_url',$resource->ID).'">'.str_replace('/','',str_replace('https://','',get_field('partner_url',$resource->ID))).'</a>
              </div>
              </div>   
            </div>
        </div>';
        }
        }
    }
        
        
    }
    
    echo json_encode(['status'=>200,'data'=>$output]);

}
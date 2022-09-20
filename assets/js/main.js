jQuery(document).ready(function($){
    var counter = 4;
    $('.showPartners').click(function(){
        
        counter += 4;
        var count = counter;
        var action = 'library';
        var param = 'get_partners';
        $.ajax({
            url:cptdisplayajax,
            type:'POST',
            beforeSend:function()
            {   

            },
            data:{count:count,param:param,action:action},
            success:function(res)
            {
                var result = $.parseJSON(res);
                if(result.status==200)
                {
                    $('#showPartners').html(result.data);
                }
                if(result.hide == 1)
                {
                    $('.showPartners').css('display','none');
                }
            }
        })
    })

    $('.showEvents').click(function(){
        
        counter += 4;
        var count = counter;
        var action = 'library';
        var param = 'get_events';
        $.ajax({
            url:cptdisplayajax,
            type:'POST',
            beforeSend:function()
            {   

            },
            data:{count:count,param:param,action:action},
            success:function(res)
            {
                var result = $.parseJSON(res);
                if(result.status==200)
                {
                    $('#showEvents').html(result.data);
                }
                if(result.hide == 1)
                {
                    $('.showEvents').css('display','none');
                }
            }
        })
    })

    function searchResources(eve,cl)
    {
        $('.search_inline').find(cl).on(eve,function(e){
            if(e.which == 13)
            {
            var search = $('#s_resource').val();
            console.log(search);
            var params = 'get_resources';
            var action = 'library';
            $.ajax({
                url:cptdisplayajax,
                type:'POST',
                data:{search:search,params:params,action:action},
                success:function(res)
                {
                    //console.log(res);
                    var result = $.parseJSON(res);
                    if(result.status==200)
                    {
                        $('#showResources').html(result.data);
                    }
                }
            });
            }
            
        });
    }
    function searchResources1(eve,cl)
    {
        $('.search_inline').find(cl).on(eve,function(){
          
            var search = $('#s_resource').val();
            console.log(search);
            var params = 'get_resources';
            var action = 'library';
            $.ajax({
                url:cptdisplayajax,
                type:'POST',
                data:{search:search,params:params,action:action},
                success:function(res)
                {
                    //console.log(res);
                    var result = $.parseJSON(res);
                    if(result.status==200)
                    {
                        $('#showResources').html(result.data);
                    }
                }
            });
           
            
        });
    }

    searchResources1('click','.search');
    searchResources('keypress','#s_resource');

    jQuery('#r_search').change(function () {
        window.location.hash = '#' + jQuery(this).val();
    });
});
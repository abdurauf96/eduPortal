$(document).ready(function($){

    $('.sub').click(function(){
        //alert('ssq');
    })
    $('#phone').val(+998).mask('+999 99 999-99-99');
        
    $('#datepicker').datepicker({
      dateFormat: 'dd-mm-yy',
      autoclose: true,  
    }).val();

    //$( "#datepicker" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
    //$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
    $('.getDist').change(function(){
		var id=$(this).val()
        
        $('#district').removeAttr('disabled');
		$.ajax({
			headers: {
        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
    		url:'/admin/get-dist',
    		type:'post',
    		data:{id:id},
    		success:function(data){
    			$('#district').html(data);
    		}
		})
	})

    $('#region').change(function(){
        var id=$(this).val()
        $('#district').removeAttr('disabled');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/get-dist',
            type:'post',
            data:{id:id},
            success:function(data){
              $('#district').html(data)
            }
        })
    })


    $('#region').change(function(){
        var region_id=$(this).val()
        $('#district').removeAttr('disabled');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/res-school',
            type:'post',
            data:{region_id:region_id},
            success:function(data){
            
              $('#school').html(data);
            }
        })
    })

    $('#district').change(function(){
        var id=$(this).val()
        var region_id=$('#region').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/get-school',
            type:'post',
            data:{id:id, region_id:region_id},
            success:function(data){
                $('#school').html(data);
                
            }
        })
    })
    
    $('.view').click(function(e){
        e.preventDefault();
        var region_id=$('#region').val();
        var district_id=$('#district').val();
        var direction_id=$('#directions').val();
        $.ajax({
            headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             url: '/view-schools',
             type: 'POST',
             data: {region_id: region_id, district_id:district_id, direction_id:direction_id},
             success:function(data){
                $('#result').html(data)
                $('#hidden_block').css('display', 'block');
             }
        })
    })

    $('.get_univer').click(function(){
        var id=$('#reg_id').val();
        $.ajax({
            headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             url: '/get-univers',
             type: 'POST',
             data: {id:id},
             success:function(data){
                $('#result_univer').html(data)
                console.log(data);
                //$('#hidden_block').css('display', 'block');
             }
        })
    })

    $('#categories').change(function(){
        var cat_id = $(this).val();
        $('#directions').removeAttr('disabled');
        $.ajax({
            headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             url: '/search_courses',
             type: 'POST',
             data: {cat_id: cat_id},
             success:function(data){
                $('#directions').html(data)
             }
        })
    })

})
$('#role').on('change', function() {

    var url= $(this).attr('data-url');
    let role_id = $(this).val();
  
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        data: {
          role_id: role_id,
          _token: "{{ csrf_token() }}"
        },
        success: function(data) {
            $('#fetch').html(data.html);
        },
       
    });
  });
  
      $(document).on('submit','#form',function() {
     
    
        var url = $(this).attr('data-url'); 
        
        let role_id = $(this).val();
  
        $.ajax({
          url: url,
          type: 'POST',
          data: {
          _token: "{{ csrf_token() }}",
           role_id:role_id
  
          },
          success: function(data) {
           console.log('hie');
          },
          error: function(xhr, status, error) {
            
            console.error(error);
          }
        });
      });
    
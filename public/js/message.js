$('#search-json').click(function() {
    $.ajax({
        type: 'POST',
        url: '/message',
        success: function(response) { 
            $('#results').html(response);
        },
        data: {
           
            query: $('input[name=message]').val(),
     
        },
    }); 
});
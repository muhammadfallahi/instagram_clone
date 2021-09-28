

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#inputsearch').on('keyup', function(){
    $inputsearch = $(this).val();
    if ($inputsearch == '') {
        $('#searchresult').html('');
        $('#searchresult').hide();
    }else{
        $.ajax({
            method: "post",
            url: "search",
            data: JSON.stringify({
                inputsearch:$inputsearch
            }),
            headers:{
                'Accept':'application/json',
                'Content-Type':'application/json'
  
            },
            success: function(data){
                var searchResultAjax='';
                data = JSON.parse(data);
                console.log(data);
                $('#searchresult').show();
                for(let i=0;i<data.length;i++){
                    searchResultAjax +='<li>'+data[i].username+'</li>'
                }
                $('#searchresult').html(searchResultAjax);
            }
        })

    }
});

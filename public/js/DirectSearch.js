
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#input_direct_search').on('keyup', function(){
    $inputsearch = $(this).val();
    if ($inputsearch == '') {
        $('#search_direct_result').html('');
        $('#search_direct_result').hide();
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
                $('#search_direct_result').show();
                for(let i=0;i<data.length;i++){
                    searchResultAjax +='<li id="txt_direct_search">'+data[i].username+'</li>'
                    // searchResultAjax +='<li class="person" data-chat="person1"><div class="user"><img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin"> <span class="status busy"></span></div><p class="name-time"><span class="name">'+data[i].username+'</span> <span class="time">15/02/2019</span></p></li>'
                }
                $('#search_direct_result').html(searchResultAjax);
            }
        })

    }
});




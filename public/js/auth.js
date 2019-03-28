send('login');

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  let target = $(this).attr('href');

  send(target);
  
});

function send(url) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'get',
        url: url,
        success: function(data) {
            $('.tab-content').empty();
            $(data).appendTo('.tab-content').fadeIn(600);
        }
    });
}

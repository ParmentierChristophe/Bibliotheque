$(".showModal").click(function () {
    var this_id = $(this).attr('data-id');

    $("#" + this_id).addClass("is-active");

});

$(".modal-close").click(function () {
    $(".modal").removeClass("is-active");
});

/*

 $('button').on('click', function(){
 if(this_action == 'edit'){

 $.get( base_url + this_id + '/load-' + this_action, function( data ) {
 $('#myModal').modal();
 $('#myModal').on('shown.bs.modal', function(){
 $('#myModal .load_modal').html(data);
 });
 $('#myModal').on('hidden.bs.modal', function(){
 $('#myModal .modal-body').data('');
 });
 });
 }
 });*/

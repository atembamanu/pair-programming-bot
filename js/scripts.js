$('#skills-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes    
    var modal = $(this)
    modal.find('.modal-body input').val(recipient)
})

$("img#proceed").click(function () {

    $("#skilltest").show(2500);
    $(".why-skills").hide(2500);
})
$(document).ready(function (e) {
    $('.btn-delete').click(function (e) {
        var confirmation = confirm( $(this).data('confirm-msg') );

        if(!confirmation) {
            e.stopPropagation();
            e.preventDefault();
        }
    });
});
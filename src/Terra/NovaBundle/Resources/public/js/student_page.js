jQuery(function($){
    if($("#selectClass")) {
        var idClass = $("#selectClass").find(':selected').attr('data-id');
        student.loadByClass(idClass);
    }
});

$("#selectClass").change(function() {
    var idClass = $(this).find(':selected').attr('data-id');
    student.loadByClass(idClass);
}); 

var student = {
    loadByClass: function(idClass) {
        $.ajax({
             url: Routing.generate('Eleve', { id: idClass }),
             dataType: "json",
             complete: function(content){
                 var response = content.responseJSON.content;
                 $(".content-student-list").html(response);
             }
        });
    }
}
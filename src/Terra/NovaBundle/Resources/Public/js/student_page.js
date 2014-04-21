jQuery(function($){
    if($("#selectClass")) {
        var idClass = $("#selectClass").find(':selected').attr('data-id');
        student.load(idClass);
    }
});

$("#selectClass").change(function() {
    var idClass = $(this).find(':selected').attr('data-id');
        student.load(idClass);
}); 

var student = {
    load: function(idClass) {
        $.ajax({
             url: Routing.generate('Eleve', { id: idClass }),
             dataType: "json",
             complete: function(content){
                 var response = content.responseJSON.content;
                 $(".content-student").html(response);
             }
        });
    }
}
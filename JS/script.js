
$(document).ready(function() {

    $('#title').hover(
        function() {
            $(this).data("originalText", $(this).text());
            $(this).html('TURISMO <span class="verde">PURA VIDA</span>');
        },
        function() {
            $(this).html($(this).data("originalText"));
        }
    );

});

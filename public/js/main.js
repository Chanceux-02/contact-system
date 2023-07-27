$(document).ready(function(){

    $('#deleteBtn').on('click', function(event){
        event.preventDefault();

        const confirmed = window.confirm('Are you sure you want to DELETE?');
        if (confirmed) {
            window.location.href = $(this).attr('href');
        }
    });

    function searchResult() {
        var search_form_btn = $('#searchBtn');
        search_form_btn.on('click', function(event) {
            event.preventDefault();  
            let form = $(this).closest('form');
            var url = form.attr('action');
            var data = form.serialize();
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function(data) {
                    $('#searchResultContainer').html(data);
                },
                error: function(jqXHR, textStatus, errorThrown) { // if ajax is not success
                    console.log(textStatus, errorThrown);
                }
            });
        });
    }


    searchResult();

});
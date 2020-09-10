var currentOrderBy = "DESC";

$(document).ready(function () {
    $("#searchingMovie").keyup(function () {
       getFilmsByTitle(this.value);
    });
    
    $("#orderBy").click(function () {
        console.log('clicked');
        console.log('0rder: '+$(this).attr('order'));
        
        if($(this).attr('order') === 'ASC'){ 
            $(this).attr('order', 'DESC');
        } else {
            $(this).attr('order', 'ASC');
        }
        
        getFilmsByTitle(
            $("#searchingMovie").val(),
            $(this).attr('order')
        );
    });
});

function getFilmsByTitle(title, orderBy='DESC')
{
    $.ajax({
        url: "controllers/showListFilms.php",
        type: "GET",
        dataType: 'json',
        data: {
            "title" : title,
            "orderBy" : orderBy,
        },
        success: function (request) {
            $("#filmListContent").empty();
            $.each(request, function(index, film){
                $('#filmListContent').append( '<tr><td>'+film.title+'</td><td>'+film.year+'</td></tr>' );
            });
        },
        error: function (e) {
            console.log(e.responseText);
            alert('Something happened conencting with the server')
        }
    });
}

// ascende -- get movies
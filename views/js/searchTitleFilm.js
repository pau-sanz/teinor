$(document).ready(function () {
    $("#searchingFilm").keyup(function () {
        getFilmsByTitle(this.value);
    });

    $("#orderBy").click(function () {
        if ($(this).attr('order') === 'ASC') {
            $(this).attr('order', 'DESC');
        } else {
            $(this).attr('order', 'ASC');
        }

        getFilmsByTitle(
                $("#searchingFilm").val(),
                $(this).attr('order')
                );
    });


    $("#yearFilms").change(function () {
        //console.log($(this).val());
        getFilmsByYear(
                $(this).val()
                );
    });


});

function getFilmsByTitle(title, orderBy = 'DESC')
{
    $.ajax({
        url: "controllers/showListFilms.php",
        type: "GET",
        dataType: 'json',
        data: {
            "title": title,
            "orderBy": orderBy,
        },
        success: function (request) {
            $("#filmListContent").empty();
            $.each(request, function (index, film) {
                $('#filmListContent').append('<tr><td>' + film.title + '</td><td>' + film.year + '</td></tr>');
            });
        },
        error: function (e) {
            console.log(e.responseText);
            alert('Something happened conencting with the server')
        }
    });
}

function getFilmsByYear(year)
{
    $.ajax({
        url: "controllers/showListFilmsByYear.php",
        type: "GET",
        dataType: 'json',
        data: {
            "year": year
        },
        success: function (request) {
            $("#filmListContent").empty();
            $.each(request, function (index, film) {
                $('#filmListContent').append('<tr><td>' + film.title + '</td><td>' + film.year + '</td></tr>');
            });
        },
        error: function (e) {
            console.log(e.responseText);
            alert('Something happened conencting with the server')
        }
    });
}
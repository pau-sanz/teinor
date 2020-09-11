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

    $("#showAll").click(function () {
        $('#noFilmResult').remove();

        getFilmsByTitle(
                $("#searchingFilm").val(),
                $(this).attr('order')
                );

        $('#filmList').show();
    });


    $("#yearFilms").change(function () {
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
            $('#noFilmResult').remove();

            if (request[0].title === "No films found") {
                //$("#filmListContent").empty();

                $('#filmList').before("<p id='noFilmResult' class='styleNotFound'>" + request[0].title + " from that year " + request[0].year + ".</p>");
                $('#filmList').hide();
            } else {
                $('#filmList').show();
                $.each(request, function (index, film) {
                    $('#filmListContent').append('<tr><td>' + film.title + '</td><td>' + film.year + '</td></tr>');
                });
            }
        },
        error: function (e) {
            console.log(e.responseText);
            alert('Something happened conencting with the server')
        }
    });
}
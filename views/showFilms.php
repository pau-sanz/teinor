<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <input id="searchingFilm" name="titleFilmSearching" type="text" class="" />
            <button id="orderBy" order="ASC">Order Films</button>
            <button id="showAll" order="ASC">All Films</button>
            <select name="yearFilms" id="yearFilms">
            </select>
            <table id="filmList" class="table table-sm structTable">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Year</th>
                    </tr>
                </thead>
                <tbody id="filmListContent">            
                    <?php
                    foreach ($films as $row) {
                        echo '<tr>';
                        echo "<td>" . $row->getTitle() . "</td>";
                        echo "<td>" . $row->getYear() . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <a href="?ctl=index">Home</a>
        </div>         
    </div>
</div>





<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="text-center">Film searcher</h3>
            <input id="searchingFilm" name="titleFilmSearching" type="text" class="form-control" />
            <div class="struc-buttons-filter">
            <button id="orderBy" order="ASC" class="btn btn-secondary">Order Films</button>
            <button id="showAll" order="ASC" class="btn btn-secondary">All Films</button>
            </div>
            <select name="yearFilms" id="yearFilms" class="custom-select custom-select-sm">
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





<input id="searchingFilm" name="titleFilmSearching" type="text" class="" />
<button id="orderBy" order="ASC">Order Films</button>
<select name="yearFilms" id="yearFilms">
    <option value="chooseYear">Choose year...</option>
</select>
<div class="table-responsive text-nowrap">
    <table id="filmList" class="table table-striped">
        <thead>
            <tr><th>Title</th>
                <th>Year</th>
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
</div>
<div class="">
    <input id="searchingMovie" name="titlemovie" type="text" class="" />
    <button id="orderBy" order="ASC">Order Films</button>
    <table id="filmList" class="">
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
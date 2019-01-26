<?php
include "dbConnect.php";
$keyword = filter_input(INPUT_POST, 'search');

if (!empty($keyword)) {
    $connection = db_connect();
    $sql = "SELECT * FROM film WHERE title = '" . $keyword . "'";
    $result = db_select($sql);
    if ($result === false) {
        $error = db_error();
    }
} else {
    echo "Search Keyword should not be empty";
    die();
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<table class="table table-hover table-dark">
    <thead>
    <tr>
        <?php foreach (array_keys($result[0]) as $key) { ?>
            <th scope="col"><?= $key ?></th>
        <?php } ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach (array_values($result) as $result_i) {
        foreach (array_values($result_i) as $key) { ?>
            <th scope="col"><?= $key ?></th>
        <?php }
    } ?>
    </tbody>
</table>

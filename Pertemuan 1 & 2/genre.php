<?php
$link = new PDO('mysql:host=localhost;dbname=pwl20222','root','');
$link -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$link -> setAttribute(PDO::ATTR_AUTOCOMMIT,false);
$query = "SELECT id,nama FROM genre";
$stmt = $link->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();
$link =null;

?>

<div class="container ">
    <table class="table mt-3 text-center" id="example">
        <thead >
            <tr >
                <th class="text-center">ID</th>
                <th class="text-center">NAME</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($result as $genre ){
                echo '<tr>';
                echo '<td>'. $genre['id'] . '</td>';
                echo '<td>'. $genre['nama'] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>


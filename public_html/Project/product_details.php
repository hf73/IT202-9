<?php
require_once(__DIR__ . "/../../lib/functions.php");
require_once(__DIR__ . "/../../partials/nav.php");

$id = se($_GET, "id", 0, false);
$db = getDB();

$stmt = $db->prepare("SELECT c.id, name, description, category, cost FROM Products JOIN Ratings c ON product_id = c.id WHERE c.id = :id ");

try{
    $stmt->execute(["id" => $id]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    var_export($e);
}
?>
<div class="row row-cols-1 row-cols-md-5 g-4">
            <div class="col">
                <div class="card bg-dark">
                    <div class="card-header">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Name: <?php se($item, "name"); ?></h5>
                        <p class="card-text">Description: <?php se($item, "description"); ?></p>
                        <p class="card-text">Category: <?php se($item, "category"); ?></p>
                        <p class="card-text">cost: <?php se($item, "cost"); ?></p>
                        <p class="card-text">Ratings: <?php se($item, "ratings"); ?></p>
                        <p class="card-text">Comment: <?php se($item, "comment"); ?></p>
                    </div>

                    <div class="card-footer">
                    </div>


<?php
require(__DIR__ . "/../../partials/flash.php");
?>

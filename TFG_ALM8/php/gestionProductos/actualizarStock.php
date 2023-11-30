<?php
// FIXME: FALTAS COSAS
include("../con_db.php");

$data = json_decode(file_get_contents("php://input"));

if ($data) {
    foreach ($data as $item) {
        $productId = $item->idproducto;
        $stockCheckQuery = "SELECT cantidad FROM productos WHERE idproducto = $productId";
        $stockCheckResult = $conex->query($stockCheckQuery);

        if ($stockCheckResult) {
            $currentStock = $stockCheckResult->fetch_assoc()['cantidad'];

            if ($currentStock > 0) {
                $updateQuery = "UPDATE productos SET cantidad = cantidad - 1 WHERE idproducto = $productId";
                $result = $conex->query($updateQuery);
            } else {
                $deleteQuery = "DELETE FROM productos WHERE idproducto = $productId";
                $result = $conex->query($deleteQuery);
            }
        }
    }
}
$conex->close();
?>




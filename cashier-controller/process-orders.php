<?php

    require('connect.php');
    $status = "";

    if (isset($_POST["id"]) && isset($_POST["quantity"])) {
        // inserting the timestamp, and to get the sales_id
        $result = $connect->query("insert into sales () values ()");

        $sales_id = $connect->insert_id;
        $statement = $connect->prepare("insert into sales_details (sales_id, recipe_id, qty) values ('".$sales_id."', ?, ?)");
        $get_ingredient = $connect->prepare("select ingName_id, qty from recipe where recipe_id = ?");
        $get_qty_from_stock = $connect->prepare("select qty, stock_id from stock where ingName_id = ?");
        $update_qty_in_stock = $connect->prepare("update stock set qty = ? where stock_id = ?");

        for ($i = 0; $i < sizeof($_POST["id"]); $i++) {
            $statement->bind_param('ii', $_POST["id"][$i], $_POST["quantity"][$i]);
            $statement->execute();

            if (!$statement) {
                $status = $connect->error;
            } else {
                $get_ingredient->bind_param('i', $_POST["id"]);
                $get_ingredient->execute();
                $get_ingredient_result = $get_ingredient->get_result();

                if (!$get_ingredient) {
                    $status = $connect->error;
                } else {
                    while ($get_ingredient_row = $get_ingredient_result->fetch_assoc()) {
                        $ingredient_id = $get_ingredient_row["ingName_id"];
                        $recipe_quantity = $get_ingredient_row["qty"];

                        $get_qty_from_stock->bind_param('i', $ingredient_id);
                        $get_qty_from_stock->execute();
                        $get_qty_from_stock_result = $get_qty_from_stock->get_result();

                        if (!$get_qty_from_stock) {
                            $status = $connect->error;
                        } else {
                            while ($row = $get_qty_from_stock_result->fetch_assoc()) {
                                $new_stock_quantity = $row["qty"] - ($recipe_quantity * $_POST["quantity"]);
                                $update_qty_in_stock->bind_param('ii', $new_stock_quantity, $row["stock_id"]);
                                $update_qty_in_stock->execute();

                                if (!$update_qty_in_stock) {
                                    $status = $connect->error;
                                } else {
                                    $status = 'success';
                                }
                            }
                        }
                    }
                }
            }
        }

        $statement->close();
        $get_ingredient->close();
        $get_qty_from_stock->close();
        $update_qty_in_stock->close();
    
    }

    echo $status;

?>
<?php 
  
  include("dbconnection.php"); 
  session_start(); 
 
  // value of chosen recipe 
  $var_value = $_POST['varname']; 

  
  //update chosen recipe
  //deactivate chosen recipe, set deactivate to 1 
  $deact_query = "UPDATE recipe SET deactivate= '1' WHERE recipe_id ='".$var_value."'"; 

  mysqli_query($connect, $deact_query) or die(mysqli_error($connect)); 

  // delete current ingredients 
    $delete_current_ing = "DELETE FROM `recipeingredients` WHERE `recipeingredients`.`recipe_id` = '".$var_value."'"; 
    mysqli_query($connect, $delete_current_ing) or die(mysqli_error($connect));


  //add new recipe name, type with new id 
  $query = "INSERT INTO recipe (recipe_name, recipe_typeid) VALUES('" . $_POST['recipe_name'] . "', '" . $_POST['recipe_type'] . "')";
  mysqli_query($connect, $query) or die(mysqli_error($connect));  

  // // store array of CURRENT ingredients 
  //  for ($i = 0; $i < sizeof($_POST['ingname']); $i++ ) {
  //    $ingredients = array($_POST["qtyname"][$i], $_POST["uomname"][$i], $_POST["ingname"][$i]); 
  //    // echo  $_POST["ingname"][$i] . "<br>";
  //    //update every ingredient id, set qty where ingid = ingname
  //    mysqli_query($connect, "update recipeingredients set unit_id = '".$_POST["uomname"][$i]."', qty = '".$_POST["qtyname"][$i]."' where ingName_id = (select ingName_id from ingredientname where ing_name = '".$_POST["ingname"][$i]."')") or die (mysqli_error($connect));

  //    }
  

  

//  -- NEW ID -- //
  // value of new id
  $max_recipe = mysqli_query($connect, "SELECT MAX(recipe_id) AS maxrecipe FROM recipe"); 
  while ($row = mysqli_fetch_array($max_recipe)){

    // $update_current_recipe = mysqli_query($connect, "update recipeingredients set recipe_id = '".$row['maxrecipe']."' where recipe_id = '".$var_value."'");
  

  //add recipes into recipeingredient 

          for ($i = 0; $i < sizeof($_POST['ingname']); $i++ ) {
            $select_ing_id = mysqli_query($connect, "select ingName_id from ingredientname where ing_name = '".$_POST["ingname"][$i]."'");
            while($ing_id_row = mysqli_fetch_array($select_ing_id)){

              $query2 = "INSERT INTO recipeingredients (recipe_id, qty, unit_id, ingName_id) VALUES ('" . $row['maxrecipe'] . "', '" . $_POST["qtyname"][$i]."', '".$_POST["uomname"][$i]."', '".$ing_id_row['ingName_id']."');";
             $result2 = mysqli_query($connect, $query2) or die (mysqli_error($connect));
           }
          }
  
}

// -- END OF NEW ID -- //

  // for ($i = 0; $i < sizeof($_POST["ingname"]); $i++ ) {
  //   echo $_POST["qtyname"][$i]. "</br>"; 
  //   echo $_POST["uomname"][$i]. "</br>";
  //   echo $_POST["ingname"][$i]. "</br>"; 
  //   echo "</br>"; 
  // }
  

  $id = mysqli_insert_id($connect); 
  $_SESSION['recipe_id'] = $id;

  header("Location: EditRecipe.php");


    // update recipeingredients set recipe_id = 'new_recipe_id' where recipe_id = 'old_recipe_id';


    // echo "<td>".$_POST['ing_name'][$i]." </td>"; 

    // echo "<td>".$_POST['unitM'][$i]." </td>"; 

    // echo "<td>".$_POST['qty'][$i]." </td>"; 

    // echo "<br>";
   // echo "<a href='EditTheIngredient.php?varname=".$_POST['recipe_id']."'>Next</a>"; 

 ?>
<?php //fetch all rows from dogs table and display a delete button for each row

	require '../includes/dbh.inc.php';

  $que = 'SELECT tag, name, image FROM dogs';

	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $que)){

			header("location:remove.php?error=sqlerror");
			exit();

		}
		else{

			mysqli_set_charset($conn, "utf8"); //set hebrew support when selecting data from table

			mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
  		$rows = mysqli_num_rows($result);

      if($row = mysqli_fetch_all($result)){

        $del = "";
        foreach ($row as $col){

          echo "<form class='content' action='".$del."' method='post'>";
          echo "  <img src='../images/dogs/".$col[2]."' height='200'><br>";
          echo "  <button type='submit' name='remove' value='".$col[0]."'>הסר</button> $col[0] - $col[1]";
          echo "</form>";

          if(isset($_POST['remove'])){

            $del = mysqli_query($conn, 'DELETE FROM dogs WHERE tag="'.$_POST['remove'].'"');
            header("location:remove.php");

          }

        }

      }
      else{

        echo "BLANK PAGE OF DOOM";
        exit();

      }

		}
	//clean up
	mysqli_stmt_close($stmt);
	mysqli_close($conn);

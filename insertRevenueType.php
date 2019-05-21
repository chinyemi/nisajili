<?php

require_once('header.php');
?>
<?php

include('functionRevenueType.php');

if (isset($_POST["operation"])) {
    if ($_POST["operation"] == "Add") {




        $statement = $connection->prepare("
			INSERT INTO RevenueType (revType, revCategory, Description) 
			VALUES (:revType, :revCategory, :Description)
		");
        $result = $statement->execute(
                array(
                    ':revType' => $_POST["revType"],
                    ':revCategory' => $_POST["revCategory"],
                    ':Description' => $_POST["Description"],
                )
        );
        if (!empty($result)) {
            echo 'Data Inserted';
        }
    }
    if ($_POST["operation"] == "Edit") {

        $statement = $connection->prepare(
                "UPDATE RevenueType 
			SET revType = :revType, revCategory = :revCategory, Description = :Description
			WHERE revtypeID = :revtypeID
			"
        );
        $result = $statement->execute(
                array(
                    ':revType' => $_POST["revType"],
                    ':revCategory' => $_POST["revCategory"],
                    ':Description' => $_POST["Description"],
                    ':revtypeID' => $_POST["revtypeID"]
                )
        );
        if (!empty($result)) {
            echo 'Data Updated';
        }
    }
}
?>



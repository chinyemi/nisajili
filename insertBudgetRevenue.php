<?php

require_once('header.php');
?>
<?php

include('functionExpenseType.php');

if (isset($_POST["operation"])) {
    if ($_POST["operation"] == "Add") {




        $statement = $connection->prepare("
			INSERT INTO budget_revenue (Type , Amount , DateRecorded,Description,Site,glsyear ) 
			VALUES (:Type, :Amount, :DateRecorded,:Description,:Site,:glsyear)
		");
        $result = $statement->execute(
                array(
                    ':Type' => $_POST["Type"],
                    ':Amount' => $_POST["Amount"],
                    ':DateRecorded' => $_POST["DateRecorded"],
                     ':Description' => $_POST["Description"],
                     ':Site' => $_POST["Site"],
                      ':glsyear' => $_POST["glsyear"],
                    
                )
        );
        if (!empty($result)) {
            echo 'Data Inserted';
        }
    }
    if ($_POST["operation"] == "Edit") {

        $statement = $connection->prepare(
                "UPDATE budget_revenue 
			SET Type = :Type, Amount = :Amount, DateRecorded = :DateRecorded,Description=:Description,Site=:Site,glsyear=:glsyear
			WHERE revenueID = :revenueID
			"
        );
        $result = $statement->execute(
                array(
                     ':revenueID' => $_POST["revenueID"],
                   ':Type' => $_POST["Type"],
                    ':Amount' => $_POST["Amount"],
                    ':DateRecorded' => $_POST["DateRecorded"],
                     ':Description' => $_POST["Description"],
                     ':Site' => $_POST["Site"],
                     ':glsyear' => $_POST["glsyear"],
                )
        );
        if (!empty($result)) {
            echo 'Data Updated';
        }
    }
}
?>



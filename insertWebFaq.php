<?php

require_once('header.php');
?>
<?php

include('functionWebFaq.php');

if (isset($_POST["operation"])) {
    if ($_POST["operation"] == "Add") {




        $statement = $connection->prepare("
			INSERT INTO webfaq (category, quiz, answer) 
			VALUES (:category, :quiz, :answer)
		");
        $result = $statement->execute(
                array(
                    ':category' => $_POST["category"],
                    ':quiz' => $_POST["quiz"],
                    ':answer' => $_POST["answer"],
                )
        );
        if (!empty($result)) {
            echo 'Data Inserted';
        }
    }
    if ($_POST["operation"] == "Edit") {

        $statement = $connection->prepare(
                "UPDATE webfaq 
			SET category = :category, quiz = :quiz, answer = :answer
			WHERE id = :id
			"
        );
        $result = $statement->execute(
                array(
                    ':category' => $_POST["category"],
                    ':quiz' => $_POST["quiz"],
                    ':answer' => $_POST["answer"],
                    ':id' => $_POST["id"]
                )
        );
        if (!empty($result)) {
            echo 'Data Updated';
        }
    }
}
?>



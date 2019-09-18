<?php
    session_destroy();
    echo  "<div style='text-align:center;' class='alert alert-success'>
    <strong>Você saiu do sistema, até a próxima ;) </strong>
    </div>";
	header("Refresh:3; url=../index.php");
?>
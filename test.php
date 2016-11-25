<style type="text/css">
	* {
		margin: 0;
		padding: 0;
	}
</style>
<?php
    require_once 'conf/db.php';
    $result = $db->query("SELECT * from brand WHERE id=100");
    var_dump($result)

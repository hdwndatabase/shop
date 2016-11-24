<?php
    class Fetch_Cat
    {
        public $result;
        function __construct($db) {
            $this->result = $db->query("SELECT * FROM category");
        }

        function display_select() {
            echo "<select name='cat'>";
            echo "<option value='all'>全部</option>";
            while($category = $this->result->fetch_assoc()) {
                echo "<option value=".$category['id'].">".
                    $category['name']."</option>";
            }
            echo "</select>";
        }

        function display_bar() {
            while($category = $this->result->fetch_assoc()) {

            }
        }
    /*$result = $db->query("SELECT * FROM category");
    echo "<select name='cat'>";
    echo "<option value='all'>全部</option>";
    while($category = $result->fetch_assoc()) {
    echo "<option value=".$category['id'].">".
    $category['name']."</option>";
    }
    echo "</select>";*/
    }
?>
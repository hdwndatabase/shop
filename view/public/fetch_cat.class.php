<?php
    class Fetch_Cat
    {
        public $result;
        function __construct($db) {
            $this->result = $db->query("SELECT * FROM category");
        }

        //显示分类的下拉列表
        function display_select() {
            echo "<select name='cat'>";
            echo "<option value='all'>全部</option>";
            while($category = $this->result->fetch_assoc()) {
                echo "<option value=".$category['id'].">".
                    $category['name']."</option>";
            }
            echo "</select>";
        }

        //显示搜索结果中的分类选择
        function display_bar() {
            $query = $_GET['q'];
            echo "<div><ul>";
            while($category = $this->result->fetch_assoc()) {
                ?>
                <li><a href="search.php?q=<?php echo $query.'&catId='.$category['id'];?>"><?php echo $category['name']; ?></a></li>
                <?php
            }
            echo "</ul></div>";
        }
    }
?>
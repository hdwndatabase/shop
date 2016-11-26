<?php
    class Fetch_Cat
    {
        public $result;
        function __construct($db) {
            $this->result = $db->query("SELECT * FROM category");
        }

        //显示分类的下拉列表
        function display_select() {
            echo "<select name='cat' class='sel'>";
            echo "<option value='all'>全部</option>";
            while($category = $this->result->fetch_assoc()) {
                echo "<option value=".$category['id'].">".
                    $category['name']."</option>";
            }
            echo "</select>";
        }

        //显示搜索结果中的分类选择(不是全部显示)
        function display_bar() {
            while ($cat = $categories->fetch_assoc()) {
                ?>
                <ul class="cat">
                    <li><a href="<?php echo $_SERVER['REQUEST_URI'].'&catId='.$cat['categoryId'];?>"><?php echo $cat['categoryName'];?></a></li>
                </ul>
                <?php
            }
        }
    }
?>
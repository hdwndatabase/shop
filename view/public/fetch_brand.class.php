<?php
class Fetch_Brand
{
    public $result;
    function __construct($db,$filter) {
        if ($filter == '') {
            $this->result = $db->query("SELECT * FROM brand");
        } else {
            $this->result = $db->query("SELECT * FROM brand WHERE ");
        }
    }

    //显示品牌的下拉列表
    function display_select() {
        echo "<select name='brand' class='sel'>";
        while($category = $this->result->fetch_assoc()) {
            echo "<option value=".$category['id'].">".
                $category['name']."</option>";
        }
        echo "</select>";
    }

    //显示搜索结果中的品牌选择
    function display_bar() {
        $query = $_GET['q'];
        echo "<div class='cat'><ul class='cat'>";
        while($category = $this->result->fetch_assoc()) {
            ?>
            <li><a href="search.php?q=<?php echo $query.'&catId='.$category['id'];?>"><?php echo $category['name']; ?></a></li>
            <?php
        }
        echo "</ul></div>";
    }
}
?>
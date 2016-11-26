<?php
    class search
    {
        public $db;
        public $query_str;
        public $result;

        function __construct($db) {
            $this->db = $db;
            $this->query_str = "SELECT good.id as id,good.name AS goodName, brand.id AS brandId,brand.name AS brandName ,category.id AS categoryId, category.name AS categoryName,price,category_id,store_count,sale_count,img_name FROM good INNER JOIN brand ON good.brand_id = brand.id INNER JOIN category ON good.category_id = category.id";
        }

        function search($appendix) {
            $this->result = $this->db->query($this->query_str.$appendix) or die("查询失败");
            return $this->result;
        }

        function search2($prefix,$appendix1,$appendix2) {
            $this->result = $this->db->query($prefix.$this->query_str.$appendix1.$appendix2) or die("查询失败");
            return $this->result;
        }
    }
?>
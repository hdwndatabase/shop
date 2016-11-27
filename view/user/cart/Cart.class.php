<?php
    class Cart
    {
        protected $db;
        function __construct($db) {
            $this->db = $db;
        }

        function getStoreCount($id) {
            $result = $this->db->query("SELECT store_count FROM good WHERE id='$id'");
            $result = $result->fetch_assoc();
            return intval($result['store_count']);
        }

        function checkGoodsNumber($id) {
            $store_count = $this->getStoreCount($id);
            if(!$store_count) {
                return false;
            }
            return true;
        }

        function addCart($id,$title,$price,$quantity,$imgName=null) {
            $flag = false;
            $id_col = array_column($_SESSION['cart'],'id');
            for ($i = 0; $i < count($id_col); $i++) {
                if($id_col[$i] == $id) {
                    $_SESSION['cart'][$i]['quantity']+=$quantity;
                    $flag = true; break;
                }
            }
            if($flag === false) {
                array_push($_SESSION['cart'],array('id'=>$id,'title'=>$title,
                    'price'=>$price,
                    'quantity'=>intval($quantity),'imgName'=>$imgName
                    ));
            }
        }

        function addCart1($id) {
            $id_col = array_column($_SESSION['cart'],'id');
            for ($i = 0; $i < count($id_col); $i++) {
                if($id_col[$i] == $id) {
                    $_SESSION['cart'][$i]['quantity']++;
                }
            }
        }

        function removeFromCart($id) {
            $id_col = array_column($_SESSION['cart'],'id');
            for ($i = 0; $i < count($id_col); $i++) {
                if($id_col[$i] == $id) {
                    if($_SESSION['cart'][$i]['quantity']>0) {
                        $_SESSION['cart'][$i]['quantity']--;
                        if($_SESSION['cart'][$i]['quantity']==0) {
                            array_splice($_SESSION['cart'],$i,1);
                        }
                        break;
                    }
                }
            }

        }
    }
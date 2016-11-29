<?php
    class Cart
    {
        protected $db;
        function __construct($db) {
            $this->db = $db;
        }

        function getUserId() {
            @$username = $_SESSION['user'];
            $result = $this->db->query("SELECT id FROM user WHERE name='$username'");
            $result = $result->fetch_assoc();
            return $result['id'];
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
            if(isset($_SESSION['user'])) {
                $userid = $this->getUserId();
                $result = $this->db->query("SELECT * FROM shopcart WHERE user_id='$userid' AND good_id='$id'");
                if($result->num_rows) {
                    $this->db->query("UPDATE shopcart SET good_count=good_count+".$quantity." WHERE user_id='$userid' AND good_id='$id'");
                } else {
                    $this->db->query("INSERT INTO shopcart VALUE ('$userid','$id','$quantity')");
                }
            } else {
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
        }

        function addCart1($id) {
            if(isset($_SESSION['user'])) {
                $userid = $this->getUserId();
                $this->db->query("UPDATE shopcart SET good_count=good_count+1 WHERE user_id='$userid' AND good_id='$id'");
            } else {
                $id_col = array_column($_SESSION['cart'],'id');
                for ($i = 0; $i < count($id_col); $i++) {
                    if($id_col[$i] == $id) {
                        $_SESSION['cart'][$i]['quantity']++;
                    }
                }
            }
        }

        function removeFromCart($id) {
            if(isset($_SESSION['user'])) {
                $userid = $this->getUserId();
                $count = $this->db->query("SELECT good_count FROM shopcart WHERE user_id='$userid' AND good_id='$id'");
                $count = $count->fetch_assoc();
                if($count = $count['good_count'] > 0) {
                    $this->db->query("UPDATE shopcart SET good_count=good_count-1 WHERE user_id='$userid' AND good_id='$id'");
                }
                /*if($count-1 === 0) {
                    $this->db->query("DELETE FROM shopcart WHERE user_id='$userid' AND good_id='$id'");
                }*/
            } else {
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

        function synchronize() {
            $userid = $this->getUserId();
            for ($i = 0; $i < count(@$_SESSION['cart']); $i++) {
                $id = $_SESSION['cart'][$i]['id'];
                $quantity = $_SESSION['cart'][$i]['quantity'];
                $this->db->query("INSERT INTO shopcart VALUE ('$userid','$id','$quantity')");
            }
        }

        function checkDBOrderNums() {
            $userid = $this->getUserId();
            $result = $this->db->query("SELECT * FROM shopcart WHERE user_id='$userid'");
            return $result->num_rows;
        }
    }

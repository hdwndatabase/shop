<?php if (mb_ereg('sort=[0-9]', $_SERVER['REQUEST_URI']) === false) { echo $_SERVER['REQUEST_URI'] . '&sort=' . addslashes($_GET['sort']); } else {
    echo preg_replace('/sort=[0-9]/', 'sort=' . addslashes($_GET['sort']), $_SERVER['REQUEST_URI']);
} ?>
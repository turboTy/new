<?php
require_once '../include.php';
// $mysqli = connect();
// $sql = "select * from imooc_admin";
// $rows = fetchAll($mysqli, $sql);
// $url = $_SERVER['PHP_SELF'];
// // var_dump($rows);
// $pageSize = 3;
// $totalRows = getResultNum($mysqli, $sql);
// $totalPage = ceil($totalRows/$pageSize);
// // $page = $_REQUEST['page']?(int)$_REQUEST['page']:1;
// if ($_REQUEST['page']){
//     $page = $_REQUEST['page'];
// }else{
//     $page = 1;
// }
// if ($page<1 || $page == null || !is_numeric($page)){
//     $page = 1;
// }elseif ($page>$totalPage){
//     $page = $totalPage;
// }
// // var_dump($page);
// // exit();
// $offset = $pageSize * ($page-1); 
// $sql2 = "select * from imooc_admin limit {$offset}, {$pageSize}";
// $rows = fetchAll($mysqli, $sql2);
// foreach ($rows as $row){
//     echo "管理员名称:".$row['username']."<br>";
//     echo "管理员邮箱:".$row['email']."<hr>";
// }

function showPage($page,$totalPage,$where=null,$sep="&nbsp;"){
    $url = $_SERVER['PHP_SELF'];
    $where = ($where == null) ? null : "&" . $where;
    $prevPage = ($page >= 1) ? $page - 1 : $page;
    $nextPage = ($page >= $totalPage) ? $totalPage : $page + 1;
    $totalText = "总共" . $totalPage . "页/当前第{$page}页";
    $index = ($page == 1) ? "首页" : "<a href='{$url}?page=1{$where}'>首页</a>";
    $prev = ($page == 1) ? "上一页" : "<a href='{$url}?page={$prevPage}{$where}'>上一页</a>";
    $next = ($page == $totalPage) ? "下一页" : "<a href='{$url}?page={$nextPage}{$where}'>下一页</a>";
    $last = ($page == $totalPage) ? "尾页" : "<a href='{$url}?page={$totalPage}{$where}'>尾页</a>";
    for ($i = 1; $i <= $totalPage; $i ++) {
        if ($i == $page) {
            // 当前页无链接
            $p .= "[{$i}]";
        } else {
            $p .= "<a href='{$url}?page={$i}{$where}'>[{$i}]</a>";
        }
    }
    $pageStr = $totalText . $sep . $index . $sep . $prev . $sep . $p . $sep . $next . $sep . $last;
    return $pageStr;
}




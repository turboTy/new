<?php
// require_once '../include.php';

/**显示页码
 * @param int $page
 * @param int $totalPage
 * @param string $where
 * @param string $sep
 * @return string
 */
function showPage($page,$totalPage,$where=null,$sep="&nbsp;"){
    $url = $_SERVER['PHP_SELF'];
    $where = ($where == null) ? null : "&" . $where;
    $prevPage = ($page >= 1) ? $page - 1 : $page;
    $nextPage = ($page >= $totalPage) ? $totalPage : $page + 1;
    $totalText = "总共" . $totalPage . "页/当前第{$page}页";
    $index = ($page == 1) ? "<span>首页</span>" : "<a href='{$url}?page=1{$where}'>首页</a>";
    $prev = ($page == 1) ? "<span>上一页</span>" : "<a href='{$url}?page={$prevPage}{$where}'>上一页</a>";
    $next = ($page == $totalPage) ? "<span>下一页</span>" : "<a href='{$url}?page={$nextPage}{$where}'>下一页</a>";
    $last = ($page == $totalPage) ? "<span>尾页</span>" : "<a href='{$url}?page={$totalPage}{$where}'>尾页</a>";
    for ($i = 1; $i <= $totalPage; $i ++) {
        if ($i == $page) {
            // 当前页无链接
            $p .= "<b>[{$i}]</b>";
        } else {
            $p .= "<a href='{$url}?page={$i}{$where}'>[{$i}]</a>";
        }
    }
    $pageStr = $totalText . $sep . $index . $sep . $prev . $sep . $p . $sep . $next . $sep . $last;
    return $pageStr;
}




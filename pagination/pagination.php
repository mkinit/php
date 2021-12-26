<?php
/*
PHP分页功能
 */
$total = 99; //总页数
$current = intval($_GET['page']); //当前
$num = 8; //要显示的分页数
$side_num = ceil($num / 2); //当前页两端的分页数量
$offset = $current - $side_num; //左偏移量
$max_offset = $total - $num; //右偏移量
$pagination_html = '<div class="pagination">';

for ($i = 1; $i <= $num; $i++) {
	if ($offset < $side_num) {
		//防止小于1
		$page = ($current - $side_num) + $i - $offset;
	} elseif ($offset >= $max_offset) {
		//防止大于总页数
		$page = ($current - $side_num) + $i - ($offset - $max_offset);
	} else {
		$page = ($current - $side_num) + $i;
	}

	//当前页不需要链接
	if ($page == $current) {
		$pagination_html .= '<span>' . $page . '</span>';
	} else {
		$pagination_html .= '<a href="/?page=' . $page . '">' . $page . '</a>';
	}

}

if ($current < $total - $side_num - 1) {
	$pagination_html .= '...';
}
if ($current < $total - $side_num) {
	$pagination_html .= '<a href="/?page=' . $total . '">' . $total . '</a>';
}
$pagination_html .= '</div>';
echo $pagination_html;
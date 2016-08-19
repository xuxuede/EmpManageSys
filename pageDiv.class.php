<?php
    class PageDiv{
        
        public $pageSize;//指定每页显示的数据条数
        public $res_array;//这是显示的数据
        public $rowCount;//这是数据库中取出的
        public $pageNow;//这是用户指定的，一个超链接
        public $pageCount;//这是由rowCount以及size计算出来的
        public $navigate1;//分页导航 上一页
        public $navigate2;//分页导航 下一页 分页导航要区分 
        public $navigate3;//分页导航 下一页 分页导航要区分 
        public $gotoUrl;
        
        
        
        
        
    }
?>
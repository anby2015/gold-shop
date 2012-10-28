bug list

1.留言板
2.新闻发布
3.会员管理
4.当日金价
5.网站调查
6.系列管理
7.menu及其内容管理
待补充

框架布局：
1.install.php->完成web系统中要用到的数据库、表的创建，
数据库
gold_shop
1.留言板guest_book(id int,name varchar(15),phone varchar(15),qq varchar(11),content txt, insert_time timestamp,ip varchar(15),is_show bool);
2.新闻发布表news(id int, title text, content text,add_time timestamp,author varchar(15), is_show bool);
3.会员管理member(id int, mem_num int, name varchar(16), md5_passwd varchar(32),regist_time timestamp, vip_level int, phone varchar(15),qq varchar(15), is_show bool);
4.当日金价:普通黄金价格，万足黄金价格，中国黄金价格 price(id int, pq_price decimal(10,2),wz_price decimal(10,2),zh_price decimal(10,2));
5.有奖网站调查research(id int,ways int,add_time timestamp)（通过何种途径了解到网站）


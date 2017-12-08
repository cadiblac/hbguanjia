/* This file is created by MySQLReback 2017-12-08 09:06:18 */
 /* 创建表结构 `lj_access` */
 DROP TABLE IF EXISTS `lj_access`;/* MySQLReback Separation */ CREATE TABLE `lj_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lj_access` */
 INSERT INTO `lj_access` VALUES ('1','31','3',''),('1','30','3',''),('1','29','3',''),('1','34','3',''),('1','35','3',''),('1','36','3',''),('1','28','3',''),('1','33','2',''),('1','32','3',''),('2','34','3',''),('2','35','3',''),('2','36','3',''),('2','33','2',''),('2','32','3',''),('2','31','3',''),('2','30','3',''),('2','29','3',''),('2','28','3',''),('2','27','2',''),('2','39','3',''),('2','38','2',''),('2','47','3',''),('2','46','3',''),('2','48','3',''),('2','45','2',''),('2','44','3',''),('2','43','3',''),('2','42','3',''),('2','41','3',''),('2','40','2',''),('2','9','3',''),('2','7','3',''),('2','6','3',''),('2','98','3',''),('2','57','3',''),('2','5','2',''),('2','15','3',''),('2','70','3',''),('2','20','3',''),('2','19','3',''),('2','18','3',''),('2','17','3',''),('2','71','3',''),('1','27','2',''),('1','39','3',''),('1','38','2',''),('1','47','3',''),('1','46','3',''),('1','48','3',''),('1','45','2',''),('1','44','3',''),('1','43','3',''),('1','42','3',''),('1','41','3',''),('1','40','2',''),('1','15','3',''),('1','70','3',''),('1','20','3',''),('1','19','3',''),('1','18','3',''),('1','17','3',''),('1','71','3',''),('1','14','2',''),('1','25','3',''),('1','24','3',''),('1','22','2',''),('1','87','3',''),('1','86','2',''),('1','84','3',''),('1','83','3',''),('1','82','2',''),('1','81','3',''),('1','80','3',''),('1','79','3',''),('1','78','2',''),('2','14','2',''),('2','25','3',''),('2','24','3',''),('2','22','2',''),('2','87','3',''),('2','86','2',''),('2','84','3',''),('1','56','3',''),('1','55','3',''),('2','83','3',''),('2','82','2',''),('2','81','3',''),('2','80','3',''),('2','79','3',''),('2','78','2',''),('2','56','3',''),('2','55','3',''),('1','54','3',''),('1','53','3',''),('1','52','2',''),('1','51','3',''),('2','54','3',''),('2','53','3',''),('2','52','2',''),('2','51','3',''),('2','50','3',''),('2','49','2',''),('2','59','3',''),('2','62','3',''),('2','61','3',''),('2','58','2',''),('2','85','3',''),('2','77','3',''),('2','76','3',''),('2','75','3',''),('2','74','2',''),('2','73','3',''),('2','72','2',''),('2','1','1',''),('1','50','3',''),('1','49','2',''),('1','59','3',''),('1','58','2',''),('1','85','3',''),('1','77','3',''),('1','76','3',''),('1','75','3',''),('1','74','2',''),('1','1','1','');/* MySQLReback Separation */
 /* 创建表结构 `lj_article` */
 DROP TABLE IF EXISTS `lj_article`;/* MySQLReback Separation */ CREATE TABLE `lj_article` (
  `attrid` int(10) unsigned DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `keywords` varchar(30) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `content` text,
  `time` int(10) unsigned NOT NULL,
  `click` int(10) unsigned DEFAULT '0',
  `cid` int(10) DEFAULT NULL,
  `del` int(1) unsigned NOT NULL DEFAULT '0',
  `pic` varchar(255) DEFAULT NULL,
  `author` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lj_article_attr` */
 DROP TABLE IF EXISTS `lj_article_attr`;/* MySQLReback Separation */ CREATE TABLE `lj_article_attr` (
  `attrid` int(10) unsigned DEFAULT NULL,
  `artid` int(10) unsigned DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lj_atlas` */
 DROP TABLE IF EXISTS `lj_atlas`;/* MySQLReback Separation */ CREATE TABLE `lj_atlas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(200) NOT NULL COMMENT '图片地址',
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文章id',
  `gid` int(10) NOT NULL DEFAULT '0' COMMENT '商品id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lj_attr` */
 DROP TABLE IF EXISTS `lj_attr`;/* MySQLReback Separation */ CREATE TABLE `lj_attr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lj_attr` */
 INSERT INTO `lj_attr` VALUES ('1','首页推荐');/* MySQLReback Separation */
 /* 创建表结构 `lj_auth_group` */
 DROP TABLE IF EXISTS `lj_auth_group`;/* MySQLReback Separation */ CREATE TABLE `lj_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lj_auth_group_access` */
 DROP TABLE IF EXISTS `lj_auth_group_access`;/* MySQLReback Separation */ CREATE TABLE `lj_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lj_auth_rule` */
 DROP TABLE IF EXISTS `lj_auth_rule`;/* MySQLReback Separation */ CREATE TABLE `lj_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lj_banner` */
 DROP TABLE IF EXISTS `lj_banner`;/* MySQLReback Separation */ CREATE TABLE `lj_banner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `img` varchar(100) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `sort` int(10) unsigned NOT NULL DEFAULT '100',
  `type` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lj_cate` */
 DROP TABLE IF EXISTS `lj_cate`;/* MySQLReback Separation */ CREATE TABLE `lj_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(15) NOT NULL,
  `keywords` char(50) DEFAULT NULL,
  `description` char(80) DEFAULT NULL,
  `sort` int(6) unsigned NOT NULL DEFAULT '100',
  `pid` int(10) unsigned NOT NULL,
  `model` varchar(10) NOT NULL,
  `pic` varchar(200) DEFAULT NULL,
  `en` varchar(20) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `stauts` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lj_class` */
 DROP TABLE IF EXISTS `lj_class`;/* MySQLReback Separation */ CREATE TABLE `lj_class` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `classname` varchar(32) NOT NULL COMMENT '商品分类名',
  `pid` int(10) NOT NULL COMMENT '上级分类id',
  `sort` int(10) NOT NULL DEFAULT '100' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lj_collect` */
 DROP TABLE IF EXISTS `lj_collect`;/* MySQLReback Separation */ CREATE TABLE `lj_collect` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `site` varchar(60) NOT NULL,
  `url` varchar(160) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `liurl` varchar(30) DEFAULT NULL,
  `author` varchar(30) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `hits` varchar(30) DEFAULT NULL,
  `content` varchar(30) DEFAULT NULL,
  `img` varchar(30) DEFAULT NULL,
  `aid` int(10) DEFAULT NULL,
  `list` varchar(30) NOT NULL,
  `ntitle` varchar(30) DEFAULT NULL,
  `charset` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lj_collect_list` */
 DROP TABLE IF EXISTS `lj_collect_list`;/* MySQLReback Separation */ CREATE TABLE `lj_collect_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) NOT NULL,
  `title` varchar(60) NOT NULL,
  `url` varchar(160) NOT NULL,
  `state` int(1) unsigned NOT NULL DEFAULT '0',
  `img` varchar(60) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `author` varchar(30) DEFAULT NULL,
  `hits` varchar(30) DEFAULT NULL,
  `ntitle` varchar(30) NOT NULL,
  `content` varchar(30) NOT NULL,
  `aid` int(10) DEFAULT NULL,
  `charset` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lj_conf` */
 DROP TABLE IF EXISTS `lj_conf`;/* MySQLReback Separation */ CREATE TABLE `lj_conf` (
  `id` int(10) NOT NULL,
  `confing` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lj_conf` */
 INSERT INTO `lj_conf` VALUES ('0','a:10:{s:9:\"MAIL_HOST\";s:12:\"mail.dpwl.cn\";s:13:\"MAIL_SMTPAUTH\";s:4:\"true\";s:13:\"MAIL_USERNAME\";s:21:\"sales@hubeishunye.com\";s:13:\"MAIL_PASSWORD\";s:6:\"112233\";s:13:\"MAIL_FROMNAME\";s:42:\"湖北顺业农机有限公司网站系统\";s:9:\"MAIL_FROM\";s:21:\"sales@hubeishunye.com\";s:12:\"MAIL_CHARSET\";s:5:\"utf-8\";s:11:\"MAIL_ISHTML\";s:4:\"true\";s:7:\"partner\";s:14:\"20889xxxxxxxxx\";s:3:\"key\";s:28:\"8066iwfyofXXXXXXXXXXXXXXXXXX\";}');/* MySQLReback Separation */
 /* 创建表结构 `lj_gbook` */
 DROP TABLE IF EXISTS `lj_gbook`;/* MySQLReback Separation */ CREATE TABLE `lj_gbook` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(6) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(12) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `title` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `time` int(12) unsigned NOT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `retime` int(12) unsigned DEFAULT NULL,
  `cid` int(10) unsigned NOT NULL,
  `ip` varchar(15) NOT NULL,
  `reuser` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lj_goods` */
 DROP TABLE IF EXISTS `lj_goods`;/* MySQLReback Separation */ CREATE TABLE `lj_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) NOT NULL COMMENT '栏目id',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `keywords` varchar(100) DEFAULT NULL COMMENT '关键词',
  `description` varchar(300) DEFAULT NULL COMMENT '描述',
  `pic` varchar(100) DEFAULT NULL COMMENT '题图',
  `price` decimal(10,0) NOT NULL COMMENT '单价',
  `memprice` decimal(10,0) DEFAULT NULL COMMENT '优惠价活动价',
  `stock` varchar(10) DEFAULT NULL COMMENT '库存量',
  `classid` int(10) DEFAULT NULL COMMENT '商品类别',
  `content` text COMMENT '内容',
  `brand` varchar(50) DEFAULT NULL COMMENT '品牌',
  `unit` varchar(10) DEFAULT NULL COMMENT '计数单位',
  `weight` varchar(10) DEFAULT NULL COMMENT '商品重量',
  `isref` int(1) NOT NULL DEFAULT '0' COMMENT '是否精品',
  `ishot` int(1) NOT NULL DEFAULT '0' COMMENT '是否热卖',
  `isdis` int(1) NOT NULL DEFAULT '0' COMMENT '是否特价',
  `time` varchar(10) NOT NULL COMMENT '发布日期',
  `click` int(20) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `del` int(1) NOT NULL DEFAULT '0' COMMENT '是否隐藏',
  PRIMARY KEY (`id`),
  KEY `分类` (`classid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lj_info` */
 DROP TABLE IF EXISTS `lj_info`;/* MySQLReback Separation */ CREATE TABLE `lj_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `content` text,
  `cid` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lj_jobs` */
 DROP TABLE IF EXISTS `lj_jobs`;/* MySQLReback Separation */ CREATE TABLE `lj_jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL COMMENT '标题',
  `jobname` varchar(20) NOT NULL COMMENT '招聘职位',
  `jobadd` varchar(255) DEFAULT NULL COMMENT '工作地点',
  `qty` int(10) NOT NULL DEFAULT '1' COMMENT '招聘人数',
  `salary` varchar(100) DEFAULT NULL COMMENT '工资待遇',
  `time` int(12) unsigned NOT NULL COMMENT '发布时间',
  `cid` int(10) unsigned NOT NULL COMMENT '栏目id',
  `useful` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '有效期',
  `jobdut` varchar(255) NOT NULL COMMENT '工作职责',
  `jobrequire` varchar(255) NOT NULL COMMENT '招聘要求',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lj_link` */
 DROP TABLE IF EXISTS `lj_link`;/* MySQLReback Separation */ CREATE TABLE `lj_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `url` varchar(100) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `stauts` int(1) unsigned NOT NULL DEFAULT '0',
  `remark` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lj_link` */
 INSERT INTO `lj_link` VALUES ('1','大鹏网络','http://www.dpwl.net','/Upload/image/2016-03-31/56fc9a9f29f63.jpg','0','湖北大鹏网络');/* MySQLReback Separation */
 /* 创建表结构 `lj_member` */
 DROP TABLE IF EXISTS `lj_member`;/* MySQLReback Separation */ CREATE TABLE `lj_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '账号',
  `pass` varchar(32) NOT NULL COMMENT '密码',
  `realname` varchar(10) DEFAULT NULL COMMENT '真实姓名',
  `tel` varchar(20) DEFAULT NULL COMMENT '电话',
  `address` varchar(60) DEFAULT NULL COMMENT '邮递地址',
  `QQ` int(15) unsigned DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `state` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `regtime` int(10) unsigned NOT NULL COMMENT '注册时间',
  `regip` varchar(20) NOT NULL COMMENT '注册ip',
  `usertype` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '用户等级',
  `integral` int(10) DEFAULT '0' COMMENT '会员积分',
  `logintime` int(10) unsigned DEFAULT NULL COMMENT '登录时间',
  `loginip` varchar(20) DEFAULT NULL COMMENT '登录ip',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=10000 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lj_node` */
 DROP TABLE IF EXISTS `lj_node`;/* MySQLReback Separation */ CREATE TABLE `lj_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lj_node` */
 INSERT INTO `lj_node` VALUES ('1','Website','网站后台','1','','1','0','1'),('14','System','系统设置','1','','1','1','2'),('15','updataSystem','修改公司名','1','','1','14','3'),('5','Rbac','Rbac控制器','1','','1','1','2'),('6','index','用户列表','1','','1','5','3'),('7','role','角色列表','1','','1','5','3'),('8','node','节点列表','1','','1','5','3'),('9','addUser','添加用户','1','','1','5','3'),('10','addRole','添加角色','1','','1','5','3'),('11','addNode','添加节点','1','','1','5','3'),('12','access','配置权限','1','','1','5','3'),('13','setAccess','修改权限','1','','1','5','3'),('71','userpwd','修改密码','1','','1','14','3'),('17','addbanner','添加banner','1','','1','14','3'),('18','sort','banner排序','1','','1','14','3'),('19','updatabanner','修改banner','1','','1','14','3'),('20','delbanner','删除banner','1','','1','14','3'),('70','banner','banner图','1','','1','14','3'),('22','Cate','栏目设置','1','','1','1','2'),('23','addCate','添加栏目','1','','1','22','3'),('24','sortCate','栏目排序','1','','1','22','3'),('25','updataCate','修改栏目','1','','1','22','3'),('26','delCate','删除栏目','1','','1','22','3'),('27','Article','文章设置','1','','1','1','2'),('28','add','添加文章','1','','1','27','3'),('29','updata','修改文章','1','','1','27','3'),('30','toTrash','放入回收站','1','','1','27','3'),('31','trash','回收站视图','1','','1','27','3'),('32','delete','删除文章','1','','1','27','3'),('33','Attr','文章属性','1','','1','1','2'),('34','addAttr','添加文章属性','1','','1','33','3'),('35','delAttr','删除文章属性','1','','1','33','3'),('36','updataAttr','修改文章属性','1','','1','33','3'),('38','Info','单页设置','1','','1','1','2'),('39','updata','更新单页','1','','1','38','3'),('40','Atlas','图集设置','1','','1','1','2'),('41','add','添加图集','1','','1','40','3'),('42','updata','修改图集','1','','1','40','3'),('43','toTrash','图集回收站','1','','1','40','3'),('44','delete','删除图集','1','','1','40','3'),('45','Jobs','招聘控制器','1','','1','1','2'),('46','add','添加招聘','1','','1','45','3'),('47','updata','修改招聘','1','','1','45','3'),('48','delete','删除招聘','1','','1','45','3'),('49','Gbook','留言控制器','1','','1','1','2'),('50','replay','查看/回复留言','1','','1','49','3'),('51','delete','删除留言','1','','1','49','3'),('52','Link','友链控制器','1','','1','1','2'),('53','addLink','添加友链','1','','1','52','3'),('54','lock','锁定友链','1','','1','52','3'),('55','updata','修改友链','1','','1','52','3'),('56','delete','删除友链','1','','1','52','3'),('57','lock','锁定用户','1','','1','5','3'),('58','Bak','数据库管理','1','','1','1','2'),('59','backup','备份数据','1','','1','58','3'),('60','RL','还原数据','1','','1','58','3'),('61','Del','删除备份','1','','1','58','3'),('62','download','下载备份','1','','1','58','3'),('72','Member','会员管理','1','','1','1','2'),('73','updata','审核/锁定/解锁会员','1','','1','72','3'),('74','Goods','产品模型','1','','1','1','2'),('75','add','添加','1','','1','74','3'),('76','updata','更新产品','1','','1','74','3'),('77','delete','删除产品','1','','1','74','3'),('78','Assort','产品分类','1','','1','1','2'),('79','addCate','添加分类','1','','1','78','3'),('80','updataCate','修改分类','1','','1','78','3'),('81','delCate','删除分类','1','','1','78','3'),('82','Orders','订单管理','1','','1','1','2'),('83','updata','修改订单','1','','1','82','3'),('84','status','订单发货','1','','1','82','3'),('85','toTrash','回收站','1','','1','74','3'),('86','Index','首页控制器','1','','1','1','2'),('87','search','快捷搜索','1','','1','86','3'),('88','Collect','采集控制器','1','','1','1','2'),('89','add','添加采集规则','1','','1','88','3'),('90','updata','修改规则','1','','1','88','3'),('91','del','删除规则','1','','1','88','3'),('92','test','采集测试','1','','1','88','3'),('93','doNote','文章入库','1','','1','88','3'),('94','note','文章记录','1','','1','88','3'),('95','article','文章内容入库','1','','1','88','3'),('96','delete','删除文章记录','1','','1','88','3'),('98','modify','重置用户密码','1','','1','5','3'),('99','lockRole','锁定角色','1','','1','5','3'),('100','meter','扩展设置','1','','1','14','3');/* MySQLReback Separation */
 /* 创建表结构 `lj_orders` */
 DROP TABLE IF EXISTS `lj_orders`;/* MySQLReback Separation */ CREATE TABLE `lj_orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '记录id主键',
  `uid` int(10) unsigned NOT NULL COMMENT '会员id',
  `uname` varchar(10) DEFAULT NULL COMMENT '收货人姓名',
  `pid` int(10) unsigned NOT NULL COMMENT '商品id',
  `order` varchar(32) NOT NULL DEFAULT '' COMMENT '订单号',
  `price` decimal(10,0) NOT NULL COMMENT '单价',
  `num` int(32) NOT NULL COMMENT '订购数量',
  `sumprice` decimal(50,0) NOT NULL COMMENT '总价',
  `buytime` varchar(10) DEFAULT NULL COMMENT '购买时间',
  `paytime` varchar(10) DEFAULT NULL COMMENT '付款时间',
  `status` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态0预购1下单2支付3已发货4已收货',
  `tel` varchar(15) DEFAULT NULL,
  `adress` char(100) DEFAULT NULL COMMENT '邮递地址',
  `remark` char(255) DEFAULT NULL COMMENT '备注',
  `pname` varchar(100) NOT NULL COMMENT '产品名称',
  `buyer_alipay` varchar(255) DEFAULT NULL COMMENT '用户支付宝账号',
  `trade` varchar(255) DEFAULT NULL COMMENT '支付宝交易号',
  `total_fee` varchar(10) DEFAULT NULL COMMENT '支付金额',
  `trade_status` varchar(10) DEFAULT NULL COMMENT '支付宝交易状态',
  PRIMARY KEY (`id`,`order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lj_role` */
 DROP TABLE IF EXISTS `lj_role`;/* MySQLReback Separation */ CREATE TABLE `lj_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lj_role` */
 INSERT INTO `lj_role` VALUES ('1','Editor','0','1','网站编辑'),('2','Admin','0','1','普通管理员');/* MySQLReback Separation */
 /* 创建表结构 `lj_role_user` */
 DROP TABLE IF EXISTS `lj_role_user`;/* MySQLReback Separation */ CREATE TABLE `lj_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lj_session` */
 DROP TABLE IF EXISTS `lj_session`;/* MySQLReback Separation */ CREATE TABLE `lj_session` (
  `session_id` varchar(255) NOT NULL,
  `session_expire` int(11) NOT NULL,
  `session_data` blob,
  UNIQUE KEY `session_id` (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lj_session` */
 INSERT INTO `lj_session` VALUES ('se9n50sbntt6pmlv788g47v587','1512702376','uid|s:1:\"1\";username|s:8:\"lj_admin\";name|s:12:\"大鹏网络\";logintime|s:17:\"17-12-07 16:18:50\";loginip|s:9:\"127.0.0.1\";superadmin|b:1;');/* MySQLReback Separation */
 /* 创建表结构 `lj_user` */
 DROP TABLE IF EXISTS `lj_user`;/* MySQLReback Separation */ CREATE TABLE `lj_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL,
  `password` char(32) NOT NULL,
  `logintime` int(10) unsigned NOT NULL,
  `loginip` varchar(30) NOT NULL,
  `lock` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `用户名` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lj_user` */
 INSERT INTO `lj_user` VALUES ('1','lj_admin','2d1154ddc80567c150177ca4fc4de010','1512695165','127.0.0.1','0','大鹏网络');/* MySQLReback Separation */
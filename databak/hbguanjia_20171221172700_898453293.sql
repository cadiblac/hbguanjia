/* This file is created by MySQLReback 2017-12-21 17:27:00 */
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
 INSERT INTO `lj_access` VALUES ('1','35','3',''),('1','34','3',''),('1','33','2',''),('1','39','3',''),('1','38','2',''),('1','48','3',''),('1','47','3',''),('1','46','3',''),('1','45','2',''),('2','34','3',''),('2','33','2',''),('2','39','3',''),('2','38','2',''),('2','48','3',''),('2','47','3',''),('2','46','3',''),('2','45','2',''),('2','44','3',''),('2','43','3',''),('2','42','3',''),('2','41','3',''),('2','40','2',''),('2','32','3',''),('2','31','3',''),('2','30','3',''),('2','29','3',''),('2','28','3',''),('2','27','2',''),('2','9','3',''),('2','7','3',''),('2','6','3',''),('2','98','3',''),('2','57','3',''),('2','5','2',''),('2','15','3',''),('2','70','3',''),('2','20','3',''),('2','19','3',''),('2','18','3',''),('2','17','3',''),('2','71','3',''),('2','14','2',''),('2','25','3',''),('1','44','3',''),('1','43','3',''),('1','42','3',''),('1','41','3',''),('1','40','2',''),('1','32','3',''),('1','31','3',''),('1','30','3',''),('1','29','3',''),('1','28','3',''),('1','27','2',''),('1','15','3',''),('1','70','3',''),('1','20','3',''),('1','19','3',''),('1','18','3',''),('1','17','3',''),('1','71','3',''),('1','14','2',''),('1','25','3',''),('1','24','3',''),('1','22','2',''),('1','87','3',''),('1','86','2',''),('1','104','3',''),('1','103','3',''),('1','102','3',''),('1','101','2',''),('1','84','3',''),('1','83','3',''),('1','82','2',''),('1','59','3',''),('2','24','3',''),('2','22','2',''),('2','87','3',''),('2','86','2',''),('2','105','3',''),('2','104','3',''),('2','103','3',''),('1','58','2',''),('1','56','3',''),('2','102','3',''),('2','101','2',''),('2','84','3',''),('2','83','3',''),('2','82','2',''),('2','59','3',''),('2','61','3',''),('2','62','3',''),('1','55','3',''),('1','54','3',''),('1','53','3',''),('1','52','2',''),('2','58','2',''),('2','56','3',''),('2','55','3',''),('2','54','3',''),('2','53','3',''),('2','52','2',''),('2','81','3',''),('2','80','3',''),('2','79','3',''),('2','78','2',''),('2','85','3',''),('2','77','3',''),('2','76','3',''),('2','75','3',''),('2','74','2',''),('2','73','3',''),('2','72','2',''),('2','1','1',''),('1','81','3',''),('1','80','3',''),('1','79','3',''),('1','78','2',''),('1','85','3',''),('1','77','3',''),('1','76','3',''),('1','75','3',''),('1','74','2',''),('1','1','1',''),('1','36','3',''),('1','49','2',''),('1','51','3',''),('1','50','3',''),('2','35','3',''),('2','36','3',''),('2','49','2',''),('2','51','3',''),('2','50','3','');/* MySQLReback Separation */
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
  `tel` varchar(11) DEFAULT NULL COMMENT '查询手机号',
  `jf` int(10) unsigned DEFAULT '0' COMMENT '积分',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lj_article` */
 INSERT INTO `lj_article` VALUES ('','1','环保顾问服务','','您可以将您公司的所有环保事务委托我们进行物业式环境管理，这样您真正可以省心、省事、省力，并且我们会以优质、价优的方案解决您的环保事务','<p style=\"text-align:center\"><img src=\"/upload/image/20171214/1513232633749140.png\" title=\"1500799997689110.png\" alt=\"111.png\" width=\"1237\" height=\"142\"/></p><p style=\"font-family: 微软雅黑, 宋体, Arial; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 15px; white-space: normal; line-height: 2em;\"><span style=\"font-family: 宋体, Verdana, Arial, Helvetica, sans-serif; color: rgb(102, 102, 102); line-height: 24px; font-size: 20px; \">&nbsp; &nbsp;&nbsp;<strong style=\"font-family: 微软雅黑, 宋体, Arial;\"><span style=\"font-family: 黑体, SimHei; line-height: 24px;\">您可以将您公司的所有环保事务委托我们进行物业式环境管理，这样您真正可以省心、省事、省力，并且我们会以优质、价优的方案解决您的环保事务。</span></strong></span></p><p style=\"font-family: 微软雅黑, 宋体, Arial; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 15px; white-space: normal;\"><span style=\"font-family: 宋体, Verdana, Arial, Helvetica, sans-serif; color: rgb(102, 102, 102); line-height: 24px; font-size: 20px; background-color: rgb(253, 253, 238);\"><br style=\"font-family: 微软雅黑, 宋体, Arial;\"/></span></p><p style=\"font-family: 微软雅黑, 宋体, Arial; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 15px; white-space: normal;\"><span style=\"font-family: 宋体, Verdana, Arial, Helvetica, sans-serif; color: rgb(102, 102, 102); line-height: 24px; font-size: 20px; background-color: rgb(253, 253, 238);\"><br style=\"font-family: 微软雅黑, 宋体, Arial;\"/></span></p><p style=\"font-family: 微软雅黑, 宋体, Arial; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 15px; white-space: normal; text-align: center;\"><img src=\"/upload/image/20171214/1513232633954186.png\" title=\"1500800909673447.png\" alt=\"20140718125337813.png\" width=\"1172\" height=\"570\"/></p><p style=\"font-family: 微软雅黑, 宋体, Arial; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 15px; white-space: normal;\"><span style=\"font-family: 宋体, Verdana, Arial, Helvetica, sans-serif; color: rgb(102, 102, 102); line-height: 24px; font-size: 20px; background-color: rgb(253, 253, 238);\"><br style=\"font-family: 微软雅黑, 宋体, Arial;\"/></span></p><p style=\"font-family: 微软雅黑, 宋体, Arial; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 15px; white-space: normal;\"><span style=\"font-family: 宋体, Verdana, Arial, Helvetica, sans-serif; color: rgb(102, 102, 102); line-height: 24px; font-size: 20px; background-color: rgb(253, 253, 238);\"><br style=\"font-family: 微软雅黑, 宋体, Arial;\"/></span></p><p style=\"font-family: 微软雅黑, 宋体, Arial; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 15px; white-space: normal;\"><br/></p><p style=\"font-family: 黑体, SimHei; margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; float: left; color: rgb(102, 102, 102); font-size: 24px; line-height: 2em; \"><strong style=\"font-family: 微软雅黑, 宋体, Arial;\">建设项目和企业日常环保事务委托管理服务：</strong></p><p style=\"font-family: 微软雅黑, 宋体, Arial; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 15px; white-space: normal;\"><br style=\"font-family: 宋体, Verdana, Arial, Helvetica, sans-serif; color: rgb(102, 102, 102); font-size: 14px; line-height: 24px; background-color: rgb(253, 253, 238);\"/></p><p><span style=\"font-family: 微软雅黑, 宋体, Arial; font-size: 20px;\"><br/></span></p><p><span style=\"font-family: 微软雅黑, 宋体, Arial; font-size: 20px;\">——全程委托管理企业建设项目环评手续、三同时、试生产、委托监测、环保竣工验收等建设项目环保事务。<br/>——委托管理企业的日常相关环保事务。</span></p><p><span style=\"font-family: 宋体, Verdana, Arial, Helvetica, sans-serif; float: left; color: rgb(102, 102, 102); line-height: 24px; font-size: 24px;\"></span><span style=\"font-family: 宋体, Verdana, Arial, Helvetica, sans-serif; float: left; color: rgb(102, 102, 102); line-height: 24px; font-size: 20px; background-color: rgb(253, 253, 238);\"><br style=\"font-family: 微软雅黑, 宋体, Arial;\"/></span><span style=\"font-family: 宋体, Verdana, Arial, Helvetica, sans-serif; float: left; color: rgb(102, 102, 102); font-size: 14px; line-height: 24px; background-color: rgb(253, 253, 238);\"></span><span style=\"font-family: 宋体, Verdana, Arial, Helvetica, sans-serif; color: rgb(102, 102, 102); line-height: 24px; font-size: 20px; background-color: rgb(253, 253, 238);\"><br style=\"font-family: 微软雅黑, 宋体, Arial;\"/></span></p><p style=\"font-family: 微软雅黑, 宋体, Arial; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 15px; white-space: normal;\"><span style=\"font-family: 宋体, Verdana, Arial, Helvetica, sans-serif; color: rgb(102, 102, 102); line-height: 24px; font-size: 20px; background-color: rgb(253, 253, 238);\"><br style=\"font-family: 微软雅黑, 宋体, Arial;\"/></span></p><p style=\"font-family: 微软雅黑, 宋体, Arial; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 15px; white-space: normal; text-align: center;\"><span style=\"font-family: 宋体, Verdana, Arial, Helvetica, sans-serif; color: rgb(102, 102, 102); line-height: 24px; font-size: 20px; \"><img src=\"/upload/image/20171214/1513232633916878.png\" title=\"1500801080255651.png\" alt=\"2.png\" width=\"954\" height=\"403\"/></span></p><p><br/></p>','1502726400','57','2','0','/Upload/image/2017-12-14/5a321a1056694.jpg','大鹏网络','0','0');/* MySQLReback Separation */
 /* 插入数据 `lj_article` */
 INSERT INTO `lj_article` VALUES ('','2','黄冈市安达装卸运输公司安达码头','','现状评估','<p><br/></p><p class=\"jbxx\">基本信息</p><table style=\"width:100%;\" cellpadding=\"2\" cellspacing=\"0\" border=\"1\" bordercolor=\"#000000\"><tbody><tr class=\"firstRow\"><td>合同号</td><td><br/></td></tr><tr><td>项目名称</td><td style=\"word-break: break-all;\">黄冈市安达装卸运输公司安达码头</td></tr><tr><td style=\"word-break: break-all;\">建设单位</td><td style=\"word-break: break-all;\">黄冈市安达装卸运输有限公司</td></tr><tr><td>约定完成日期</td><td><br/></td></tr><tr><td>预付款</td><td><br/></td></tr><tr><td style=\"word-break: break-all;\">项目负责人及联系方式</td><td style=\"word-break: break-all;\">余传琼 &nbsp;13871995529</td></tr></tbody></table><p><br/></p><p class=\"xmjd\">项目进度</p><table style=\"width:100%;\" cellpadding=\"2\" cellspacing=\"0\" border=\"1\" bordercolor=\"#000000\"><tbody><tr class=\"firstRow\"><td>现场踏勘</td><td><br/></td><td>第十章</td><td><br/></td></tr><tr><td>资料情况</td><td><br/></td><td>第十一章<br/></td><td><br/></td></tr><tr><td>一次公示</td><td><br/></td><td>第十二章<br/></td><td><br/></td></tr><tr><td>监测方案</td><td><br/></td><td>第十三章<br/></td><td><br/></td></tr><tr><td>监测报告</td><td><br/></td><td>第十四章<br/></td><td><br/></td></tr><tr><td>标准申请</td><td><br/></td><td>第十五章<br/></td><td><br/></td></tr><tr><td>标准批复</td><td><br/></td><td>二次公示</td><td><br/></td></tr><tr><td>报告编制</td><td><br/></td><td>公参调查</td><td><br/></td></tr><tr><td>前言</td><td><br/></td><td>一级审核</td><td><br/></td></tr><tr><td>第一章</td><td><br/></td><td>二级审核</td><td><br/></td></tr><tr><td>第二章<br/></td><td><br/></td><td>三级审核</td><td><br/></td></tr><tr><td>第三章<br/></td><td><br/></td><td>资质申请</td><td><br/></td></tr><tr><td>第四章<br/></td><td><br/></td><td>装订报告</td><td><br/></td></tr><tr><td>第五章<br/></td><td><br/></td><td>报审申请及送审</td><td><br/></td></tr><tr><td>第六章<br/></td><td><br/></td><td>评审会</td><td><br/></td></tr><tr><td>第七章<br/></td><td><br/></td><td>会后修改</td><td><br/></td></tr><tr><td>第八章<br/></td><td><br/></td><td>项目报批</td><td><br/></td></tr><tr><td>第九章<br/></td><td><br/></td><td>尾款</td><td><br/></td></tr><tr><td colspan=\"4\" style=\"word-break: break-all;\">备注：项目暂停 &nbsp;报告登记未定</td></tr></tbody></table><p><br/></p>','1513316700','0','1','0','','大鹏网络','13636014027','2'),('','3','需要花积分兑换的文章','','需要花积分兑换的文章需要花积分兑换的文章需要花积分兑换的文章需要花积分兑换的文章需要花积分兑换的文章需要花积分兑换的文章','<p>需要花积分兑换的文章需要花积分兑换的文章需要花积分兑换的文章需要花积分兑换的文章需要花积分兑换的文章</p>','1513323720','30','2','0','','大鹏网络','intval','1');/* MySQLReback Separation */
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lj_banner` */
 INSERT INTO `lj_banner` VALUES ('1','banner图1','/Upload/image/2017-12-12/5a2fa059edb69.jpg','','100','1');/* MySQLReback Separation */
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lj_cate` */
 INSERT INTO `lj_cate` VALUES ('1','项目进度','','','100','0','Article','','','','0'),('2','积分文章','','','100','0','Article','','','','0'),('3','环保商城','','','100','0','Goods','','','','0'),('4','环境影响评价','','','100','3','Goods','/Upload/image/2017-12-13/5a30a279e0406.jpg','','','0'),('5','环保竣工验收','','','100','3','Goods','/Upload/image/2017-12-13/5a30a2a17cd1d.jpg','','','0'),('6','环境工程','','','100','3','Goods','/Upload/image/2017-12-13/5a30a2b824b5e.jpg','','','0'),('7','环境监测','','','100','3','Goods','/Upload/image/2017-12-13/5a30a2d359ed3.jpg','','','0');/* MySQLReback Separation */
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
 INSERT INTO `lj_conf` VALUES ('0','a:16:{s:9:\"MAIL_HOST\";s:12:\"mail.dpwl.cn\";s:13:\"MAIL_SMTPAUTH\";s:4:\"true\";s:13:\"MAIL_USERNAME\";s:12:\"800@dpwL.net\";s:13:\"MAIL_PASSWORD\";s:6:\"112233\";s:13:\"MAIL_FROMNAME\";s:24:\"湖北大鹏网络科技\";s:9:\"MAIL_FROM\";s:12:\"800@dpwL.net\";s:12:\"MAIL_CHARSET\";s:5:\"utf-8\";s:11:\"MAIL_ISHTML\";s:4:\"true\";s:7:\"partner\";s:14:\"20889xxxxxxxxx\";s:3:\"key\";s:28:\"8066iwfyofXXXXXXXXXXXXXXXXXX\";s:5:\"Appid\";s:18:\"wx5ae5faf938adf927\";s:9:\"AppSecret\";s:32:\"e412e9d67bbb2ae65de320c41026bd8d\";s:5:\"mchid\";s:10:\"1494238382\";s:6:\"mchkey\";s:32:\"sLBgDm6BXiSooFmNLZ61INImrHbZVcKd\";s:4:\"alid\";s:16:\"LTAIwd8XkfGLbvL4\";s:9:\"aliSecret\";s:30:\"Q6yxiK7i72aH29mWpJZvGuSOhGFYlY\";}');/* MySQLReback Separation */
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
  `price` decimal(10,2) NOT NULL COMMENT '单价',
  `memprice` decimal(10,2) DEFAULT NULL COMMENT '优惠价活动价',
  `stock` varchar(10) DEFAULT NULL COMMENT '库存量',
  `classid` int(10) DEFAULT NULL COMMENT '商品类别',
  `content` text COMMENT '内容',
  `brand` varchar(50) DEFAULT NULL COMMENT '品牌',
  `unit` varchar(10) DEFAULT NULL COMMENT '计数单位',
  `weight` varchar(10) DEFAULT NULL COMMENT '商品重量',
  `isref` int(1) DEFAULT '0' COMMENT '是否精品',
  `ishot` int(1) DEFAULT '0' COMMENT '是否热卖',
  `isdis` int(1) DEFAULT '0' COMMENT '是否特价',
  `time` varchar(10) NOT NULL COMMENT '发布日期',
  `click` int(20) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `del` int(1) NOT NULL DEFAULT '0' COMMENT '是否隐藏',
  PRIMARY KEY (`id`),
  KEY `分类` (`classid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lj_goods` */
 INSERT INTO `lj_goods` VALUES ('1','4','商城产品测试','','','/Upload/image/2017-12-21/5a3b28e6ea462.jpg','100.00','0.01','','','<p>这是一个测试商品</p>','','','','','','1','1513826146','0','0');/* MySQLReback Separation */
 /* 创建表结构 `lj_info` */
 DROP TABLE IF EXISTS `lj_info`;/* MySQLReback Separation */ CREATE TABLE `lj_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `content` text,
  `cid` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `lj_jf` */
 DROP TABLE IF EXISTS `lj_jf`;/* MySQLReback Separation */ CREATE TABLE `lj_jf` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `mid` int(10) NOT NULL COMMENT '用户id',
  `stutas` int(1) NOT NULL COMMENT '0是消费1是增加',
  `jf` int(10) NOT NULL COMMENT '积分值',
  `aid` int(10) DEFAULT NULL COMMENT '文章id',
  `gid` int(10) DEFAULT NULL COMMENT '产品id',
  `beizhu` varchar(100) DEFAULT NULL COMMENT '备注信息',
  `time` int(10) NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lj_jf` */
 INSERT INTO `lj_jf` VALUES ('1','10002','1','500','','','首次认证','1513668186');/* MySQLReback Separation */
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
  `openid` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL COMMENT '昵称',
  `sex` int(1) DEFAULT NULL COMMENT '性别',
  `photo` varchar(200) DEFAULT NULL COMMENT '头像',
  `realname` varchar(10) DEFAULT NULL COMMENT '真实姓名',
  `tel` varchar(20) DEFAULT NULL COMMENT '电话',
  `address` varchar(60) DEFAULT NULL COMMENT '邮递地址',
  `QQ` varchar(15) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `state` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `regtime` int(10) unsigned NOT NULL COMMENT '注册时间',
  `regip` varchar(20) NOT NULL COMMENT '注册ip',
  `usertype` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '用户等级',
  `integral` int(10) DEFAULT '0' COMMENT '会员积分',
  `logintime` int(10) unsigned DEFAULT NULL COMMENT '登录时间',
  `fx` decimal(10,2) DEFAULT '0.00' COMMENT '分销积分',
  `yqrid` int(10) DEFAULT NULL COMMENT '邀请人id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=10007 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lj_member` */
 INSERT INTO `lj_member` VALUES ('10002','oUUPD1aBExeZcIVPIpldP9YqJSwA','混江龙','1','http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTIM5icsOStbNUr8qib79N4glZyPWvPqXh4o5icCvGBdesqxVjckufzJuDJngf0atFOOnXP1200KJ59Xg/132','李俊','15871295812','孝感市孝南区乾坤大道馨都上层2201','528051088','ljuyx@163.com','1','1513057765','','0','600','1513753658','',''),('10003','oUUPD1UH8rgvIyPi62OF5b9w3r70','胡华川','1','http://wx.qlogo.cn/mmopen/vi_32/PiajxSqBRaEKJia5vUrdjxEAlS5MaUZQg79ibA5OEPfkia6RVvz6ARiaIBffkO1PE2ibfvdFWnKysqe8vM6BliaeP5Fcw/132','','','','','','0','1513147944','','0','0','','0.00',''),('10004','oUUPD1Z047j8fnBomaw4zTHt-_Z0','A 湖北大鹏网络 李俊','0','http://wx.qlogo.cn/mmopen/vi_32/NyMMF3qibHRRicZjFr9TC3oIpjSciaOoJD4cjlkjt2KSeibdvlkL3WgH3wh0kEicaDtv3XbEjdGzia4KrpPRzIKIGumQ/132','','','','','','0','1513154645','','0','0','','0.00',''),('10005','oUUPD1UFlX37vTlFgIs84yVcsJR4','A-湖北大鹏网络-邓芳','0','http://wx.qlogo.cn/mmopen/vi_32/rNbxxfmHSZwan7Dzldl5UIxHMpKyphJghMYXCraiaaLetOwk8LY3ibrv8Dib1gn4OFdyOWlMZ6BYKPjIeLdnia7rQA/132','','','','','','0','1513158142','','0','0','','0.00',''),('10006','oUUPD1bwcFf1u5UqcxUBFKGmfgKs','怒放的生命','1','http://wx.qlogo.cn/mmopen/vi_32/QwqoxHlWohksr4XDXlEdI4Oia24Bhc1U8PR2dSic67IZ8ZXwia1Lh0icJNjbhfUVoj23w1XvrzmEMHMcXk7Ec4Jnng/132','','','','','','0','1513595964','','0','0','','0.00','');/* MySQLReback Separation */
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
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lj_node` */
 INSERT INTO `lj_node` VALUES ('1','Website','网站后台','1','','1','0','1'),('14','System','系统设置','1','','1','1','2'),('15','updataSystem','修改公司名','1','','1','14','3'),('5','Rbac','Rbac控制器','1','','1','1','2'),('6','index','用户列表','1','','1','5','3'),('7','role','角色列表','1','','1','5','3'),('8','node','节点列表','1','','1','5','3'),('9','addUser','添加用户','1','','1','5','3'),('10','addRole','添加角色','1','','1','5','3'),('11','addNode','添加节点','1','','1','5','3'),('12','access','配置权限','1','','1','5','3'),('13','setAccess','修改权限','1','','1','5','3'),('71','userpwd','修改密码','1','','1','14','3'),('17','addbanner','添加banner','1','','1','14','3'),('18','sort','banner排序','1','','1','14','3'),('19','updatabanner','修改banner','1','','1','14','3'),('20','delbanner','删除banner','1','','1','14','3'),('70','banner','banner图','1','','1','14','3'),('22','Cate','栏目设置','1','','1','1','2'),('23','addCate','添加栏目','1','','1','22','3'),('24','sortCate','栏目排序','1','','1','22','3'),('25','updataCate','修改栏目','1','','1','22','3'),('26','delCate','删除栏目','1','','1','22','3'),('27','Article','文章设置','1','','1','1','2'),('28','add','添加文章','1','','1','27','3'),('29','updata','修改文章','1','','1','27','3'),('30','toTrash','放入回收站','1','','1','27','3'),('31','trash','回收站视图','1','','1','27','3'),('32','delete','删除文章','1','','1','27','3'),('33','Attr','文章属性','1','','1','1','2'),('34','addAttr','添加文章属性','1','','1','33','3'),('35','delAttr','删除文章属性','1','','1','33','3'),('36','updataAttr','修改文章属性','1','','1','33','3'),('38','Info','单页设置','1','','1','1','2'),('39','updata','更新单页','1','','1','38','3'),('40','Atlas','图集设置','1','','1','1','2'),('41','add','添加图集','1','','1','40','3'),('42','updata','修改图集','1','','1','40','3'),('43','toTrash','图集回收站','1','','1','40','3'),('44','delete','删除图集','1','','1','40','3'),('45','Jobs','招聘控制器','1','','1','1','2'),('46','add','添加招聘','1','','1','45','3'),('47','updata','修改招聘','1','','1','45','3'),('48','delete','删除招聘','1','','1','45','3'),('49','Gbook','留言控制器','1','','1','1','2'),('50','replay','查看/回复留言','1','','1','49','3'),('51','delete','删除留言','1','','1','49','3'),('52','Link','友链控制器','1','','1','1','2'),('53','addLink','添加友链','1','','1','52','3'),('54','lock','锁定友链','1','','1','52','3'),('55','updata','修改友链','1','','1','52','3'),('56','delete','删除友链','1','','1','52','3'),('57','lock','锁定用户','1','','1','5','3'),('58','Bak','数据库管理','1','','1','1','2'),('59','backup','备份数据','1','','1','58','3'),('60','RL','还原数据','1','','1','58','3'),('61','Del','删除备份','1','','1','58','3'),('62','download','下载备份','1','','1','58','3'),('72','Member','会员管理','1','','1','1','2'),('73','updata','审核/锁定/解锁会员','1','','1','72','3'),('74','Goods','产品模型','1','','1','1','2'),('75','add','添加','1','','1','74','3'),('76','updata','更新产品','1','','1','74','3'),('77','delete','删除产品','1','','1','74','3'),('78','Assort','产品分类','1','','1','1','2'),('79','addCate','添加分类','1','','1','78','3'),('80','updataCate','修改分类','1','','1','78','3'),('81','delCate','删除分类','1','','1','78','3'),('82','Orders','订单管理','1','','1','1','2'),('83','updata','修改订单','1','','1','82','3'),('84','status','订单发货','1','','1','82','3'),('85','toTrash','回收站','1','','1','74','3'),('86','Index','首页控制器','1','','1','1','2'),('87','search','快捷搜索','1','','1','86','3'),('88','Collect','采集控制器','1','','1','1','2'),('89','add','添加采集规则','1','','1','88','3'),('90','updata','修改规则','1','','1','88','3'),('91','del','删除规则','1','','1','88','3'),('92','test','采集测试','1','','1','88','3'),('93','doNote','文章入库','1','','1','88','3'),('94','note','文章记录','1','','1','88','3'),('95','article','文章内容入库','1','','1','88','3'),('96','delete','删除文章记录','1','','1','88','3'),('98','modify','重置用户密码','1','','1','5','3'),('99','lockRole','锁定角色','1','','1','5','3'),('100','meter','扩展设置','1','','1','14','3'),('101','Comment','评论管理','1','','1','1','2'),('102','lists','评论列表','1','','1','101','3'),('103','shen','审核','1','','1','101','3'),('104','huif','回复','1','','1','101','3'),('105','delte','删除','1','','1','101','3');/* MySQLReback Separation */
 /* 创建表结构 `lj_orders` */
 DROP TABLE IF EXISTS `lj_orders`;/* MySQLReback Separation */ CREATE TABLE `lj_orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '记录id主键',
  `uid` int(10) unsigned NOT NULL COMMENT '会员id',
  `uname` varchar(10) DEFAULT NULL COMMENT '收货人姓名',
  `pid` int(10) unsigned NOT NULL COMMENT '商品id',
  `order` varchar(32) NOT NULL DEFAULT '' COMMENT '订单号',
  `price` decimal(10,2) NOT NULL COMMENT '单价',
  `num` int(32) NOT NULL COMMENT '订购数量',
  `sumprice` decimal(50,2) NOT NULL COMMENT '总价',
  `buytime` varchar(10) DEFAULT NULL COMMENT '购买时间',
  `paytime` varchar(10) DEFAULT NULL COMMENT '付款时间',
  `status` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态0预购1下单2支付3已发货4已收货',
  `tel` varchar(15) DEFAULT NULL,
  `adress` char(100) DEFAULT NULL COMMENT '邮递地址',
  `remark` char(255) DEFAULT NULL COMMENT '备注',
  `pname` varchar(100) NOT NULL COMMENT '产品名称',
  `buyer_alipay` varchar(255) DEFAULT NULL COMMENT '用户支付宝账号',
  `trade` varchar(255) DEFAULT NULL COMMENT '交易号',
  `total_fee` decimal(10,2) DEFAULT NULL COMMENT '支付金额',
  `dk` decimal(10,2) DEFAULT NULL COMMENT '抵扣金额',
  `trade_status` varchar(10) DEFAULT NULL COMMENT '交易状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order` (`order`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lj_orders` */
 INSERT INTO `lj_orders` VALUES ('1','10002','','1','A17138268891221','0.00','1','0.00','1513826889','','0','','','','商城产品测试','','','','',''),('2','10002','','1','A17138346431221','0.01','2','0.02','1513834643','','0','','','','商城产品测试','','','','',''),('3','10002','','1','A17138347511221','0.01','3','0.03','1513834751','','0','','','','商城产品测试','','','','',''),('4','10002','','1','B17138405251221','0.01','1','0.01','1513840525','','1','','','','商城产品测试','','','','',''),('5','10002','','1','B17138414351221','0.01','2','0.02','1513841435','','1','','','','商城产品测试','','','','','');/* MySQLReback Separation */
 /* 创建表结构 `lj_ping` */
 DROP TABLE IF EXISTS `lj_ping`;/* MySQLReback Separation */ CREATE TABLE `lj_ping` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `fz` varchar(20) NOT NULL COMMENT '分组',
  `hfid` int(10) DEFAULT NULL COMMENT '回复',
  `neir` text NOT NULL COMMENT '内容',
  `dis` int(1) NOT NULL DEFAULT '0' COMMENT '审核',
  `time` int(10) NOT NULL COMMENT '时间',
  `mid` int(10) NOT NULL COMMENT '留言人id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lj_ping` */
 INSERT INTO `lj_ping` VALUES ('1','Article_1','0','我发一个评论测试一下','1','1513303500','10002'),('2','Article_1','1','评论成功了，回复一下','0','1513304778','0');/* MySQLReback Separation */
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
 INSERT INTO `lj_session` VALUES ('i42t7q5h88bfl0s7gkvmn79iv5','1513848636','userOpenid|s:28:\"oUUPD1aBExeZcIVPIpldP9YqJSwA\";userSex|i:1;userNickname|s:9:\"混江龙\";userHeadimgurl|s:125:\"http://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTIM5icsOStbNUr8qib79N4glZyPWvPqXh4o5icCvGBdesqxVjckufzJuDJngf0atFOOnXP1200KJ59Xg/132\";userID|s:5:\"10002\";'),('74p2npuos92r2588a0djclhbf3','1513855617','uid|s:1:\"1\";username|s:8:\"lj_admin\";name|s:12:\"大鹏网络\";logintime|s:17:\"17-12-21 11:15:31\";loginip|s:13:\"111.178.7.207\";superadmin|b:1;');/* MySQLReback Separation */
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
 INSERT INTO `lj_user` VALUES ('1','lj_admin','2d1154ddc80567c150177ca4fc4de010','1513848382','127.0.0.1','0','大鹏网络');/* MySQLReback Separation */
 /* 创建表结构 `lj_yzm` */
 DROP TABLE IF EXISTS `lj_yzm`;/* MySQLReback Separation */ CREATE TABLE `lj_yzm` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `tel` varchar(11) NOT NULL COMMENT '手机号',
  `code` varchar(6) NOT NULL COMMENT '验证码',
  `time` int(10) NOT NULL COMMENT '发送时间',
  PRIMARY KEY (`id`,`tel`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `lj_yzm` */
 INSERT INTO `lj_yzm` VALUES ('1','2147483647','008003','1513663162'),('2','15871295812','012372','1513668172');/* MySQLReback Separation */
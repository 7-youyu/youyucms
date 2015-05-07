
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `youyu_comment`;
CREATE TABLE `youyu_comment` (
  `id` int(10) unsigned NOT NULL COMMENT '评论ID',
  `pid` int(10) unsigned NOT NULL COMMENT '评论上级ID',
  `document_id` int(10) unsigned NOT NULL COMMENT '文档ID',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户ID',
  `author` char(30) NOT NULL DEFAULT '' COMMENT '评论者',
  `comment_date` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论时间',
  `comment_content` text NOT NULL COMMENT '评论内容',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '数据状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文档评论表';


INSERT INTO `youyu_comment` (`id`, `pid`, `document_id`, `user_id`, `author`, `comment_date`, `comment_content`, `status`) VALUES
(1, 0, 10, 1, '游渔', 1429179041, '评论1', 1),
(2, 0, 10, 1, '游渔', 1429179056, '评论2', 1);

DROP TABLE IF EXISTS `youyu_config`;
CREATE TABLE `youyu_config` (
  `id` int(10) unsigned NOT NULL COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置类型',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '配置说明',
  `group` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置分组',
  `extra` varchar(255) NOT NULL DEFAULT '' COMMENT '配置值',
  `remark` varchar(100) NOT NULL COMMENT '配置说明',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `value` text NOT NULL COMMENT '配置值',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序'
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='配置表';


INSERT INTO `youyu_config` (`id`, `name`, `type`, `title`, `group`, `extra`, `remark`, `create_time`, `update_time`, `status`, `value`, `sort`) VALUES
(1, 'WEB_SITE_TITLE', 1, '网站标题', 1, '', '网站标题前台显示标题', 1378898976, 1379235274, 1, '游渔实验室内容管理系统', 0),
(2, 'WEB_SITE_DESCRIPTION', 2, '网站描述', 1, '', '网站搜索引擎描述', 1378898976, 1379235841, 1, '游渔实验室内容管理系统', 1),
(3, 'WEB_SITE_KEYWORD', 2, '网站关键字', 1, '', '网站搜索引擎关键字', 1378898976, 1381390100, 1, '实验室，内容管理系统', 2),
(4, 'WEB_SITE_CLOSE', 4, '关闭站点', 1, '0:关闭,1:开启', '站点关闭后其他用户不能访问，管理员可以正常访问', 1378898976, 1379235296, 1, '1', 3),
(5, 'CONFIG_TYPE_LIST', 3, '配置类型列表', 4, '', '主要用于数据解析和页面表单的生成', 1378898976, 1379235348, 1, '0:数字1:字符2:文本3:数组4:枚举', 50),
(6, 'WEB_SITE_ICP', 1, '网站备案号', 1, '', '设置在网站底部显示的备案号', 1378900335, 1379235859, 1, 'Copyright©2015 游渔实验室内容管理系统 | 由 游渔 制作, 长沙大学创新训练基地使用 powered by youyucms', 2),
(7, 'CONFIG_GROUP_LIST', 3, '配置分组', 4, '', '配置分组', 1379228036, 1384418383, 1, '1:基本2:内容3:用户4:系统', 50),
(8, 'AUTH_CONFIG', 3, 'Auth配置', 4, '', '自定义Auth.class.php类配置', 1379409310, 1379409564, 1, 'AUTH_ON:1\r\nAUTH_TYPE:2', 8),
(9, 'WEB_COMMENT_CLOSE', 0, '关闭评论', 0, '', '', 0, 0, 1, '1', 3),
(10, 'WEB_VERIFY_CLOSE', 0, '关闭审核', 0, '', '', 0, 0, 1, '1', 3),
(11, 'DATA_BACKUP_PATH', 1, '数据库备份根路径', 4, '', '路径必须以 / 结尾', 1381482411, 1381482411, 1, './Data/', 5),
(12, 'DATA_BACKUP_PART_SIZE', 0, '数据库备份卷大小', 4, '', '该值用于限制压缩后的分卷最大长度。单位：B；建议设置20M', 1381482488, 1381729564, 1, '20971520', 7),
(13, 'DATA_BACKUP_COMPRESS', 4, '数据库备份文件是否启用压缩', 4, '0:不压缩\r\n1:启用压缩', '压缩备份文件需要PHP环境支持gzopen,gzwrite函数', 1381713345, 1381729544, 1, '1', 9),
(14, 'DATA_BACKUP_COMPRESS_LEVEL', 4, '数据库备份文件压缩级别', 4, '1:普通\r\n4:一般\r\n9:最高', '数据库备份文件的压缩级别，该配置在开启压缩时生效', 1381713408, 1381713408, 1, '9', 10),
(15, 'ALLOW_VISIT', 3, '不受限控制器方法', 0, '', '', 1386644047, 1386644741, 1, '0:article/draftbox1:article/mydocument2:Category/tree3:Index/verify4:file/upload5:file/download6:user/updatePassword7:user/updateNickname8:user/submitPassword9:user/submitNickname10:file/uploadpicture', 40),
(16, 'DENY_VISIT', 3, '超管专限控制器方法', 0, '', '仅超级管理员可访问的控制器方法', 1386644141, 1386644659, 1, '0:Addons/addhook1:Addons/edithook2:Addons/delhook3:Addons/updateHook4:Admin/getMenus5:Admin/recordList6:AuthManager/updateRules7:AuthManager/tree', 40),
(17, 'WEB_REGISTER_CLOSE', 0, '关闭注册', 0, '', '', 0, 0, 1, '1', 3),
(18, 'ADMIN_ALLOW_IP', 2, '后台允许访问IP', 4, '', '多个用逗号分隔，如果不配置表示不限制IP访问', 1387165454, 1387165553, 1, '', 12),
(19, 'NEWS_SIDEBAR', 0, '新闻侧边栏', 0, '', '', 0, 0, 1, '<p>新闻侧边栏</p>', 4),
(20, 'DOC_SIDEBAR', 0, '文章侧边栏', 0, '', '', 0, 0, 1, '<p>文章侧边栏</p>', 4);



DROP TABLE IF EXISTS `youyu_document`;
CREATE TABLE `youyu_document` (
  `id` int(10) unsigned NOT NULL COMMENT '文档ID',
  `username` char(30) NOT NULL DEFAULT '' COMMENT '作者',
  `title` char(80) NOT NULL DEFAULT '' COMMENT '标题',
  `menu_id` int(10) unsigned NOT NULL COMMENT '所属分类',
  `description` char(140) NOT NULL DEFAULT '' COMMENT '描述',
  `position` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '推荐位',
  `display` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '可见性',
  `cover_id` int(10) NOT NULL DEFAULT '0' COMMENT '封面ID',
  `show_url` varchar(255) NOT NULL DEFAULT '' COMMENT '演示地址',
  `view` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  `comment` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后评论时间/UID',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '数据状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文档模型基础表';

INSERT INTO `youyu_document` (`id`, `username`, `title`, `menu_id`, `description`, `position`, `display`, `cover_id`, `show_url`, `view`, `comment`, `create_time`, `update_time`, `status`) VALUES
(1, 'admin', '新闻一', 8, '新闻一', 0, 1, 0, '', 0, 0, 1429178671, 1429178671, 1),
(2, 'admin', '公告一', 9, '公告一', 0, 1, 0, '', 5, 0, 1429178680, 1429178680, 1),
(3, 'admin', '项目一', 3, 'baidubaidu', 0, 1, 9, 'www.baidu.com', 0, 0, 1429178718, 1429178718, 1),
(4, 'admin', '项目二', 3, 'google', 0, 1, 10, 'www.google.hk.com', 0, 0, 1429178746, 1429178746, 1),
(5, 'ABC', '奖章1', 10, '', 0, 1, 11, '', 0, 0, 1429178798, 1429178798, 1),
(6, 'def', '奖项二', 11, '', 0, 1, 12, '', 0, 0, 1429178814, 1429178814, 1),
(7, '老师', '指导老师', 12, '', 0, 1, 13, '', 0, 0, 1429178835, 1429178835, 1),
(8, '成员1', '成员1', 13, '', 0, 1, 14, '', 0, 0, 1429178849, 1429178849, 1),
(9, 'admin', '资料一', 15, '资料一', 0, 1, 15, '', 1, 0, 1429178884, 1429178884, 1),
(10, '游渔', '谈论一', 20, '谈论一', 0, 1, 0, '', 3, 1429179056, 1429178896, 1429178896, 1);


DROP TABLE IF EXISTS `youyu_document_article`;
CREATE TABLE `youyu_document_article` (
  `document_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文档ID',
  `content` text NOT NULL COMMENT '文章内容',
  `bookmark` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数',
  `praise` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '赞数'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文档模型文章表';

INSERT INTO `youyu_document_article` (`document_id`, `content`, `bookmark`, `praise`) VALUES
(1, '&lt;p&gt;新闻一&lt;/p&gt;', 0, 0),
(2, '&lt;p&gt;公告一&lt;/p&gt;', 0, 0),
(3, '&lt;p&gt;baidubaidu&lt;/p&gt;', 0, 0),
(4, '&lt;p&gt;google&lt;/p&gt;', 0, 0),
(9, '&lt;p&gt;资料一&lt;/p&gt;', 0, 0),
(10, '&lt;p&gt;谈论一&lt;/p&gt;', 0, 0);


DROP TABLE IF EXISTS `youyu_lab_top`;
CREATE TABLE `youyu_lab_top` (
  `id` int(10) unsigned NOT NULL COMMENT '首页信息ID',
  `title` varchar(40) NOT NULL DEFAULT '' COMMENT '标题',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接',
  `description` varchar(120) NOT NULL DEFAULT '' COMMENT '描述',
  `cover_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '封面',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '数据状态',
  `class` tinyint(4) DEFAULT '0' COMMENT '分类'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='首页信息表';


INSERT INTO `youyu_lab_top` (`id`, `title`, `url`, `description`, `cover_id`, `sort`, `status`, `class`) VALUES
(1, '第一张图片', '', '这是第一张图片', 1, 0, 1, 1),
(2, '第二张图片', '', '这是第二张图片这是第二张图片', 2, 0, 1, 1),
(3, '第三张图片', '', '这是第三张图片', 3, 0, 1, 1),
(4, '人物一', '', '人物一人物一', 4, 0, 1, 2),
(5, '人物二', '', '人物二', 5, 0, 1, 2),
(6, '人物三', '', '人物三', 6, 0, 1, 2),
(7, '简介一', '', '简介一简介一简介一简介一简介一', 7, 0, 1, 3),
(8, '简介二', '', '简介二简介二简介二', 8, 0, 1, 3);


DROP TABLE IF EXISTS `youyu_menu`;
CREATE TABLE `youyu_menu` (
  `id` int(10) unsigned NOT NULL COMMENT '菜单ID',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '英文标题',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '地址',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `description` varchar(255) NOT NULL DEFAULT '',
  `reply` tinyint(3) NOT NULL DEFAULT '0',
  `check` tinyint(3) NOT NULL DEFAULT '0',
  `pid` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='菜单表';


INSERT INTO `youyu_menu` (`id`, `name`, `title`, `url`, `status`, `sort`, `description`, `reply`, `check`, `pid`) VALUES
(1, '首页', 'home', 'index/index', 1, 0, '', 0, 0, 0),
(2, '新闻公告', 'News Bulletin', 'index/news', 1, 1, '', 0, 0, 0),
(3, '项目成果', 'Project Results', 'index/project', 1, 2, '', 0, 0, 0),
(4, '奖章奖项', 'Medal Award', 'index/award', 1, 3, '', 0, 0, 0),
(5, '历届成员', 'Previous Members', 'index/member', 1, 4, '', 0, 0, 0),
(6, '学习资源', 'Learning Resources', 'index/lesson', 1, 5, '', 0, 0, 0),
(7, '交流讨论', 'Discussion', 'index/discus', 1, 6, '', 0, 0, 0),
(8, '新闻', '', 'index/news?id=', 1, 0, '', 0, 0, 2),
(9, '公告', '', 'index/news?id=', 1, 1, '', 0, 0, 2),
(10, '程序设计奖', '', '', 1, 0, '', 0, 0, 4),
(11, '项目竞赛奖', '', '', 1, 1, '', 0, 0, 4),
(12, '指导老师', '', '', 1, 0, '', 0, 0, 5),
(13, '2011届成员', '', '', 1, 50, '', 0, 0, 5),
(14, '2010届成员', '', '', 1, 51, '', 0, 0, 5),
(15, 'C/C++', '', 'index/lesson?id=', 1, 0, '', 0, 0, 6),
(16, 'PHP', '', 'index/lesson?id=', 1, 1, '', 0, 0, 6),
(17, 'Android', '', 'index/lesson?id=', 1, 2, '', 0, 0, 6),
(18, '嵌入式', '', 'index/lesson?id=', 1, 3, '', 0, 0, 6),
(19, '算法', '', 'index/lesson?id=', 1, 4, '', 0, 0, 6),
(20, '求助交流', '', '', 1, 0, '', 0, 0, 7),
(21, '经验分享', '', '', 1, 1, '', 0, 0, 7),
(22, '项目发布', '', '', 1, 2, '', 0, 0, 7);



DROP TABLE IF EXISTS `youyu_picture`;
CREATE TABLE `youyu_picture` (
  `id` int(10) unsigned NOT NULL COMMENT '主键id自增',
  `path` varchar(255) NOT NULL DEFAULT '' COMMENT '路径',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '图片链接',
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='图片表';

INSERT INTO `youyu_picture` (`id`, `path`, `url`, `status`, `create_time`) VALUES
(1, '/Uploads/Picture/2015-04-16/552f88245e5b2.png', '', 0, 0),
(2, '/Uploads/Picture/2015-04-16/552f88453614d.png', '', 0, 0),
(3, '/Uploads/Picture/2015-04-16/552f886734f8c.png', '', 0, 0),
(4, '/Uploads/Picture/2015-04-16/552f888834f2d.jpg', '', 0, 0),
(5, '/Uploads/Picture/2015-04-16/552f8892bebea.jpg', '', 0, 0),
(6, '/Uploads/Picture/2015-04-16/552f88a023510.jpg', '', 0, 0),
(7, '/Uploads/Picture/2015-04-16/552f88f67c708.jpg', '', 0, 0),
(8, '/Uploads/Picture/2015-04-16/552f89059909f.jpg', '', 0, 0),
(9, '/Uploads/Picture/2015-04-16/552f8953e1933.png', '', 0, 0),
(10, '/Uploads/Picture/2015-04-16/552f896fb0251.png', '', 0, 0),
(11, '/Uploads/Picture/2015-04-16/552f89a6b9c21.jpg', '', 0, 0),
(12, '/Uploads/Picture/2015-04-16/552f89ba85342.jpg', '', 0, 0),
(13, '/Uploads/Picture/2015-04-16/552f89d0618f3.jpg', '', 0, 0),
(14, '/Uploads/Picture/2015-04-16/552f89e060f30.jpg', '', 0, 0),
(15, '/Uploads/Picture/2015-04-16/552f8a028fccf.jpg', '', 0, 0);



DROP TABLE IF EXISTS `youyu_rule`;
CREATE TABLE `youyu_rule` (
  `id` int(10) unsigned NOT NULL COMMENT '权限ID',
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '名称',
  `description` varchar(120) NOT NULL DEFAULT '' COMMENT '描述',
  `allow_menu` varchar(255) NOT NULL DEFAULT '' COMMENT '允许访问的菜单'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='权限信息表';


INSERT INTO `youyu_rule` (`id`, `name`, `description`, `allow_menu`) VALUES
(1, '普通管理员', '发布新闻', 'a:3:{i:0;s:7:"content";i:1;s:4:"btop";i:2;s:8:"approval";}');


DROP TABLE IF EXISTS `youyu_user`;
CREATE TABLE `youyu_user` (
  `uid` int(10) unsigned NOT NULL COMMENT '用户ID',
  `username` char(30) NOT NULL DEFAULT '' COMMENT '昵称',
  `email` char(30) NOT NULL DEFAULT '' COMMENT '邮箱',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `sex` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '性别',
  `birthday` date NOT NULL DEFAULT '0000-00-00' COMMENT '生日',
  `qq` char(12) NOT NULL DEFAULT '' COMMENT 'qq号',
  `score` mediumint(8) NOT NULL DEFAULT '0' COMMENT '用户积分',
  `login` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `cover_id` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '会员状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户表';



DROP TABLE IF EXISTS `youyu_user_rule`;
CREATE TABLE `youyu_user_rule` (
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '权限ID',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='权限中间信息表';


--
-- Indexes for dumped tables
--

--
-- Indexes for table `youyu_comment`
--
ALTER TABLE `youyu_comment`
  ADD PRIMARY KEY (`id`), ADD KEY `comment_status` (`status`), ADD KEY `comment_pid` (`pid`), ADD KEY `comment_document_id` (`document_id`);

--
-- Indexes for table `youyu_config`
--
ALTER TABLE `youyu_config`
  ADD PRIMARY KEY (`id`), ADD KEY `config_name` (`name`), ADD KEY `config_type` (`type`);

--
-- Indexes for table `youyu_document`
--
ALTER TABLE `youyu_document`
  ADD PRIMARY KEY (`id`), ADD KEY `doc_status` (`status`), ADD KEY `doc_menu_id` (`menu_id`);

--
-- Indexes for table `youyu_document_article`
--
ALTER TABLE `youyu_document_article`
  ADD KEY `document_id` (`document_id`);

--
-- Indexes for table `youyu_lab_top`
--
ALTER TABLE `youyu_lab_top`
  ADD PRIMARY KEY (`id`), ADD KEY `lab_top_status` (`status`);

--
-- Indexes for table `youyu_menu`
--
ALTER TABLE `youyu_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youyu_picture`
--
ALTER TABLE `youyu_picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youyu_rule`
--
ALTER TABLE `youyu_rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youyu_user`
--
ALTER TABLE `youyu_user`
  ADD PRIMARY KEY (`uid`), ADD UNIQUE KEY `user_username` (`username`), ADD UNIQUE KEY `user_email` (`email`), ADD KEY `user_status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `youyu_comment`
--
ALTER TABLE `youyu_comment`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论ID',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `youyu_config`
--
ALTER TABLE `youyu_config`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `youyu_document`
--
ALTER TABLE `youyu_document`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文档ID',AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `youyu_lab_top`
--
ALTER TABLE `youyu_lab_top`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '首页信息ID',AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `youyu_menu`
--
ALTER TABLE `youyu_menu`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '菜单ID',AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `youyu_picture`
--
ALTER TABLE `youyu_picture`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id自增',AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `youyu_rule`
--
ALTER TABLE `youyu_rule`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '权限ID',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `youyu_user`
--
ALTER TABLE `youyu_user`
  MODIFY `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',AUTO_INCREMENT=5;

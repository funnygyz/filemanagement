# Host: localhost  (Version: 5.5.53)
# Date: 2017-03-14 10:47:48
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "adminuser"
#

DROP TABLE IF EXISTS `adminuser`;
CREATE TABLE `adminuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `profile` text COLLATE utf8_unicode_ci,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "adminuser"
#

INSERT INTO `adminuser` VALUES (1,'root','root','$2y$13$RZ20K81ZdERPDyFq2EM31e6KjmmdNRtGmCC6Fq9NST3hWhcgoPqUy','gyz32c@qq.com','$2y$13$RZ20K81ZdERPDyFq2EM31e6KjmmdNRtGmCC6Fq9NST3hWhcgoPqUy','$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu',NULL,'zmMYS2zDsMTF'),(2,'gyz3','奥德赛','$2y$13$RZ20K81ZdERPDyFq2EM31e6KjmmdNRtGmCC6Fq9NST3hWhcgoPqUy','gyz32c@qq.com','gyz32c@qq.com','$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu',NULL,'zmMYS2zDsMTF'),(3,'kx1','阿斯顿','$2y$13$RZ20K81ZdERPDyFq2EM31e6KjmmdNRtGmCC6Fq9NST3hWhcgoPqUy','gyz32c@qq.com','a testing user','$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu',NULL,'zmMYS2zDsMTF'),(4,'gyz','阿斯达','*','gyzzzzz@qq.com','the test','$2y$13$I3JquH3qw/99VHU6BS/5Qu2E9TpA4LkfCTzaHpFKTkt.yu81fetZi',NULL,'eIY2DeunOTbcHVzbGTLMc1YRxDelQN9N'),(5,'wsy','阿斯蒂芬','','gyz3222c@qq.com','gyz3222c@qq.com','$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu',NULL,'zmMYS2zDsMTF');

#
# Structure for table "auth_rule"
#

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "auth_rule"
#


#
# Structure for table "auth_item"
#

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "auth_item"
#

INSERT INTO `auth_item` VALUES ('admin',1,'管理员',NULL,NULL,1489023512,1489023512),('approveComment',2,'审核评论',NULL,NULL,1489023512,1489023512),('commentAuditor',1,'评论审核员',NULL,NULL,1489023512,1489023512),('createPost',2,'新增文章',NULL,NULL,1489023510,1489023510),('deletePost',2,'删除文章',NULL,NULL,1489023512,1489023512),('postAdmin',1,'文章管理员',NULL,NULL,1489023512,1489023512),('postOperator',1,'文章操作员',NULL,NULL,1489023512,1489023512),('updatePost',2,'修改文章',NULL,NULL,1489023512,1489023512);

#
# Structure for table "auth_item_child"
#

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "auth_item_child"
#

INSERT INTO `auth_item_child` VALUES ('admin','commentAuditor'),('admin','postAdmin'),('commentAuditor','approveComment'),('postAdmin','createPost'),('postAdmin','deletePost'),('postAdmin','updatePost'),('postOperator','deletePost');

#
# Structure for table "auth_assignment"
#

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "auth_assignment"
#

INSERT INTO `auth_assignment` VALUES ('admin','1',1489034403),('admin','2',1489393121),('admin','4',1489034419),('admin','5',1489035478),('commentAuditor','1',1489034403),('commentAuditor','2',1489393121),('commentAuditor','4',1489034419),('commentAuditor','5',1489035478),('postAdmin','1',1489034403),('postAdmin','2',1489393121),('postAdmin','4',1489034419),('postAdmin','5',1489035478),('postOperator','1',1489034403),('postOperator','2',1489393121),('postOperator','3',1489023512),('postOperator','4',1489034419),('postOperator','5',1489035478);

#
# Structure for table "commentstatus"
#

DROP TABLE IF EXISTS `commentstatus`;
CREATE TABLE `commentstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "commentstatus"
#

INSERT INTO `commentstatus` VALUES (1,'待审核',1),(2,'已审核',2);

#
# Structure for table "migration"
#

DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "migration"
#

INSERT INTO `migration` VALUES ('m000000_000000_base',1462597684),('m130524_201442_init',1462597693),('m140506_102106_rbac_init',1489021785);

#
# Structure for table "poststatus"
#

DROP TABLE IF EXISTS `poststatus`;
CREATE TABLE `poststatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "poststatus"
#

INSERT INTO `poststatus` VALUES (1,'草稿',1),(2,'已发布',2),(3,'已归档',3);

#
# Structure for table "post"
#

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_post_author` (`author_id`),
  KEY `FK_post_status` (`status`),
  CONSTRAINT `FK_post_author` FOREIGN KEY (`author_id`) REFERENCES `adminuser` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_post_status` FOREIGN KEY (`status`) REFERENCES `poststatus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "post"
#

INSERT INTO `post` VALUES (1,'简单爱','作词：徐若瑄 作曲：周杰伦\r\n演唱：周杰伦\r\n\r\n说不上为什麽 我变得很主动\r\n若爱上一个人 什麽都会值得去做\r\n我想大声宣布 对你依依不舍\r\n连隔壁邻居都猜到我现在的感受\r\n\r\n河边的风 在吹着头发飘动\r\n牵着你的手 一阵莫名感动\r\n我想带你 回我的外婆家\r\n一起看着日落 一直到我们都睡着\r\n\r\n我想就这样牵着你的手不放开\r\n爱能不能够永远单纯没有悲哀\r\n我想带你骑单车 我想和你看棒球\r\n想这样没担忧 唱着歌 一直走\r\n\r\n我想就这样牵着你的手不放开\r\n爱可不可以简简单单没有伤害\r\n你靠着我的肩膀 你在我胸口睡着\r\n像这样的生活 我爱你 你爱我\r\n\r\n想 简 简 单 单 爱\r\n想 简 简 单 单 爱\r\n\r\n我想大声宣布 对你依依不舍\r\n连隔壁邻居都猜到我现在的感受\r\n\r\n河边的风 在吹着头发飘动\r\n牵着你的手 一阵莫名感动\r\n我想带你 回我的外婆家\r\n一起看着日落 一直到我们都睡着\r\n\r\n我想就这样牵着你的手不放开\r\n爱能不能够永远单纯没有悲哀\r\n我想带你骑单车 我想和你看棒球\r\n想这样没担忧 唱着歌 一直走\r\n\r\n我想就这样牵着你的手不放开\r\n爱可不可以简简单单没有伤害\r\n你靠着我的肩膀 你在我胸口睡着\r\n像这样的生活 我爱你 你爱我\r\n\r\n想 简 简 单 单 爱\r\n想 简 简 单 单 爱\r\n\r\n我想就这样牵着你的手不放开\r\n爱能不能够永远单纯没有悲哀\r\n我想带你骑单车 我想和你看棒球\r\n想这样没担忧 唱着歌 一直走\r\n\r\n我想就这样牵着你的手不放开\r\n爱可不可以简简单单没有伤害\r\n你靠着我的肩膀 你在我胸口睡着\r\n像这样的生活 我爱你 你爱我','婚礼歌手，幸福情歌精选',1,1489031052,1489372485,1),(2,'告白气球','<p>告白气球\r\n</p>\r\n<p>词：方文山\r\n</p>\r\n<p>曲：周杰伦\r\n</p>\r\n<p>演唱：周杰伦\r\n</p>\r\n<p>塞纳河畔 左岸的咖啡\r\n</p>\r\n<p>我手一杯 品尝你的美\r\n</p>\r\n<p>留下唇印的嘴\r\n</p>\r\n<p>花店玫瑰 名字写错谁\r\n</p>\r\n<p>告白气球 风吹到对街\r\n</p>\r\n<p>微笑在天上飞\r\n</p>\r\n<p>你说你有点难追 想让我知难而退\r\n</p>\r\n<p>礼物不需挑最贵 只要香榭的落叶\r\n</p>\r\n<p>喔 营造浪漫的约会 不害怕搞砸一切\r\n</p>\r\n<p>拥有你就拥有 全世界\r\n</p>\r\n<p>亲爱的 爱上你 从那天起\r\n</p>\r\n<p>甜蜜的很轻易\r\n</p>\r\n<p>亲爱的 别任性 你的眼睛\r\n</p>\r\n<p>在说我愿意\r\n</p>\r\n<p>塞纳河畔 左岸的咖啡\r\n</p>\r\n<p>我手一杯 品尝你的美\r\n</p>\r\n<p>留下唇印的嘴\r\n</p>\r\n<p>花店玫瑰 名字写错谁\r\n</p>\r\n<p>告白气球 风吹到对街\r\n</p>\r\n<p>微笑在天上飞\r\n</p>\r\n<p>你说你有点难追 想让我知难而退\r\n</p>\r\n<p>礼物不需挑最贵 只要香榭的落叶\r\n</p>\r\n<p>喔 营造浪漫的约会 不害怕搞砸一切\r\n</p>\r\n<p>拥有你就拥有 全世界\r\n</p>\r\n<p>亲爱的 爱上你 从那天起\r\n</p>\r\n<p>甜蜜的很轻易\r\n</p>\r\n<p>亲爱的 别任性 你的眼睛\r\n</p>\r\n<p>在说我愿意\r\n</p>\r\n<p>亲爱的 爱上你 恋爱日记\r\n</p>\r\n<p>飘香水的回忆\r\n</p>\r\n<p>一整瓶 的梦境 全都有你\r\n</p>\r\n<p>搅拌在一起\r\n</p>\r\n<p>亲爱的别任性 你的眼睛\r\n</p>\r\n<p>在说我愿意\r\n</p>','周杰伦 music\r\n',2,1489046474,1489046555,1),(3,'夜曲','<h2>歌词</h2><p>夜曲<br>作词:方文山<br>作曲:周杰伦<br>演唱:周杰伦<br>一群嗜血的蚂蚁 被腐肉所吸引<br>我面无表情 看孤独的风景<br>失去你 爱恨开始分明<br>失去你 还有什么事好关心<br>当鸽子不再象征和平<br>我终于被提醒<br>广场上喂食的是秃鹰<br>我用漂亮的押韵<br>形容被掠夺一空的爱情<br><br>啊 乌云开始遮蔽 夜色不干净<br>公园里 葬礼的回音 在漫天飞行<br>送你的 白色玫瑰<br>在纯黑的环境凋零<br>乌鸦在树枝上诡异的很安静<br>静静听 我黑色的大衣<br>想温暖你 日渐冰冷的回忆<br>走过的 走过的 生命<br>啊 四周弥漫雾气<br>我在空旷的墓地<br>老去后还爱你<br>为你弹奏萧邦的夜曲<br>纪念我死去的爱情<br>跟夜风一样的声音<br>心碎的很好听<br>手在键盘敲很轻<br>我给的思念很小心<br>你埋葬的地方叫幽冥<br><br>为你弹奏萧邦的夜曲<br>纪念我死去的爱情<br>而我为你隐姓埋名<br>在月光下弹琴<br>对你心跳的感应<br>还是如此温热亲近<br>怀念你那鲜红的唇印<br><br>那些断翅的蜻蜓 散落在这森林<br>而我的眼睛 没有丝毫同情<br>失去你 泪水混浊不清<br>失去你 我连笑容都有阴影<br>风在长满青苔的屋顶<br>嘲笑我的伤心<br>像一口没有水的枯井<br>我用凄美的字型<br>描绘后悔莫及的那爱情<br>为你弹奏萧邦的夜曲<br>纪念我死去的爱情<br>跟夜风一样的声音<br>心碎的很好听<br>手在键盘敲很轻<br>我给的思念很小心<br>你埋葬的地方叫幽冥<br><br>为你弹奏萧邦的夜曲<br>纪念我死去的爱情<br>而我为你隐姓埋名 在月光下弹琴<br>对你心跳的感应 还是如此温热亲近<br>怀念你那鲜红的唇印<br><br>一群嗜血的蚂蚁 被腐肉所吸引<br>我面无表情 看孤独的风景<br>失去你 爱恨开始分明<br>失去你 还有什么事好关心<br>当鸽子不再象征和平<br>我终于被提醒<br>广场上喂食的是秃鹰<br>我用漂亮的押韵<br>形容被掠夺一空的爱情</p>','jay\r\n',3,1489046665,1489046665,3),(4,'发如雪','作曲:周杰伦\r\n作词:方文山\r\n演唱:周杰伦\r\n\r\n狼牙月 伊人憔悴\r\n我举杯 饮尽了风雪\r\n是谁打翻前世柜 惹尘埃是非\r\n缘字诀 几番轮回\r\n你锁眉 哭红颜唤不回\r\n纵然青史已经成灰 我爱不灭\r\n繁华如三千东流水\r\n我只取一瓢爱了解 只恋你化身的蝶\r\n你发如雪 凄美了离别\r\n我焚香感动了谁\r\n邀明月 让回忆皎洁\r\n爱在月光下完美\r\n你发如雪 纷飞了眼泪\r\n我等待苍老了谁\r\n红尘醉 微醺的岁月\r\n我用无悔 刻永世爱你的碑\r\nRap：\r\n你发如雪 凄美了离别\r\n我焚香感动了谁\r\n邀明月 让回忆皎洁\r\n爱在月光下完美\r\n你发如雪 纷飞了眼泪\r\n我等待苍老了谁\r\n红尘醉 微醺的岁月\r\n\r\n狼牙月 伊人憔悴\r\n我举杯 饮尽了风雪\r\n是谁打翻前世柜 惹尘埃是非\r\n缘字诀 几番轮回\r\n你锁眉 哭红颜唤不回\r\n纵然青史已经成灰 我爱不灭\r\n繁华如三千东流水\r\n我只取一瓢爱了解 只恋你化身的蝶\r\n你发如雪 凄美了离别\r\n我焚香感动了谁\r\n邀明月 让回忆皎洁\r\n爱在月光下完美\r\n你发如雪 纷飞了眼泪\r\n我等待苍老了谁\r\n红尘醉 微醺的岁月\r\n我用无悔 刻永世爱你的碑\r\nRap：\r\n你发如雪 凄美了离别\r\n我焚香感动了谁\r\n邀明月 让回忆皎洁\r\n爱在月光下完美\r\n你发如雪 纷飞了眼泪\r\n我等待苍老了谁\r\n红尘醉 微醺的岁月\r\n\r\n你发如雪 凄美了离别\r\n我焚香感动了谁\r\n邀明月 让回忆皎洁\r\n爱在月光下完美\r\n你发如雪 纷飞了眼泪\r\n我等待苍老了谁\r\n红尘醉 微醺的岁月\r\n我用无悔 刻永世爱你的碑\r\n啦儿啦 啦儿啦 啦儿啦儿啦\r\n啦儿啦 啦儿啦 啦儿啦儿啦\r\n铜镜映无邪 扎马尾 你若撒野\r\n今生我把酒奉陪\r\n啦儿啦 啦儿啦 啦儿啦儿啦\r\n啦儿啦 啦儿啦 啦儿啦儿啦\r\n铜镜映无邪 扎马尾 你若撒野\r\n今生我把酒奉陪','十一月的萧邦',1,1489369498,1489369498,4),(5,'青花瓷','青花瓷\r\n作词：方文山\r\n作曲：周杰伦\r\n演唱：周杰伦\r\n\r\n素胚勾勒出青花笔锋浓转淡\r\n瓶身描绘的牡丹一如你初妆\r\n冉冉檀香透过窗心事我了然\r\n宣纸上走笔至此搁一半\r\n釉色渲染仕女图韵味被私藏\r\n而你嫣然的一笑如含苞待放\r\n你的美一缕飘散\r\n去到我去不了的地方\r\n天青色等烟雨 而我在等你\r\n炊烟袅袅升起 隔江千万里\r\n在瓶底书刻隶仿前朝的飘逸\r\n就当我为遇见你伏笔\r\n天青色等烟雨 而我在等你\r\n月色被打捞起 晕开了结局\r\n如传世的青花瓷自顾自美丽\r\n你眼带笑意\r\n\r\n色白花青的锦鲤跃然于碗底\r\n临摹宋体落款时却惦记着你\r\n你隐藏在窑烧里千年的秘密\r\n极细腻犹如绣花针落地\r\n帘外芭蕉惹骤雨门环惹铜绿\r\n而我路过那江南小镇惹了你\r\n在泼墨山水画里\r\n你从墨色深处被隐去\r\n天青色等烟雨 而我在等你\r\n炊烟袅袅升起 隔江千万里\r\n在瓶底书刻隶仿前朝的飘逸\r\n就当我为遇见你伏笔\r\n天青色等烟雨　而我在等你\r\n月色被打捞起　晕开了结局\r\n如传世的青花瓷自顾自美丽 你眼带笑意\r\n天青色等烟雨 而我在等你\r\n炊烟袅袅升起 隔江千万里\r\n在瓶底书刻隶仿前朝的飘逸\r\n就当我为遇见你伏笔\r\n天青色等烟雨 而我在等你\r\n月色被打捞起 晕开了结局\r\n如传世的青花瓷自顾自美丽 你眼带笑意','我很忙',1,1489371830,1489371830,1);

#
# Structure for table "tag"
#

DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `frequency` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "tag"
#

INSERT INTO `tag` VALUES (86,'周杰伦 music',1),(87,'jay',1),(88,'十一月的萧邦',1),(89,'我很忙',1),(90,'婚礼歌手，幸福情歌精选',1);

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'root','root','pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF','$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu',NULL,'daxzxcd@qq.com',10,1462597929,1489051339),(2,'wsy','阿斯达在','pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF','$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu',NULL,'gousheng@123.com',10,1462597929,1462597929),(3,'kx','单萨大','pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF','$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu',NULL,'kuangdan@234.com',10,1462597929,1462597929),(4,'qcx','猪猪侠','pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF','$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu',NULL,'daxzxcd@qq.com2',10,1462597929,1462597929),(5,'test','测试','848JYD8FTWj9NSqxrqsEnQW6TB5xM7F7','$2y$13$HHIFwqEE4KjQBfkvGPsGeOhatsqBi.xf13Xy/f2PSZEK5.3asVARu',NULL,'gyzzc@qq.com',10,1489035994,1489035994),(6,'feifei','菲菲','QahmeFj3fWLRYlS1aWQ1C9N6F8mYJQm6','$2y$13$BvTVuvmrKXH6/EHBPIWUFOGiYJYM19QSzsemOlVwQxa.eb5mkBqUy',NULL,'gyzz23c@qq.com',10,1489375887,1489375887),(7,'daz','大众','oa8e7D3TRINWBavabjfwNwX2I6qXDxdB','$2y$13$QzMzBCQ.p9M8Gv7SMzldZ.UmeNM5NB/YqhNtipVjhX7WIldy2Msy6',NULL,'gyzads@qq.com',10,1489376022,1489376022);

#
# Structure for table "comment"
#

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comment_post` (`post_id`),
  KEY `FK_comment_user` (`userid`),
  KEY `FK_comment_status` (`status`),
  CONSTRAINT `FK_comment_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_comment_status` FOREIGN KEY (`status`) REFERENCES `commentstatus` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_comment_user` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "comment"
#

INSERT INTO `comment` VALUES (1,'啊啊啊啊啊周杰伦',2,1489023512,1,'1123@qq.com',NULL,1),(2,'test2222',2,1489390738,1,'daxzxcd@qq.com',NULL,1),(3,'test2222',2,1489366557,1,'daxzxcd@qq.com',NULL,1),(4,'test333',2,1489390738,2,'daxzxcd@qq.com',NULL,1),(5,'test333',2,1489390738,2,'daxzxcd@qq.com',NULL,1),(6,'test444',1,1489366557,2,'daxzxcd@qq.com',NULL,2),(7,'test5555',1,1489366557,3,'daxzxcd@qq.com',NULL,2),(8,'巴拉巴拉小魔仙',1,1489390738,4,'daxzxcd@qq.com',NULL,2),(9,'巴拉巴拉小魔仙',2,1489392467,5,'daxzxcd@qq.com',NULL,2);

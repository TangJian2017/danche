--
-- 数据库: `danche`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `begintime` varchar(50) DEFAULT NULL,
  `desc1` varchar(200) DEFAULT NULL,
  `tname` varchar(10) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `type`, `img`, `sex`, `begintime`, `desc1`, `tname`, `tel`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '超级管理员', '0', NULL, NULL, NULL, NULL, NULL),
(3, '222222', 'e3ceb5881a0a1fdaad01296d7554868d', '管理员', '1705102.jpg', '女', '2012-10-02', '', '李小', '13985623652'),
(2, '111222', '00b7691d86d96aebd21dd9e138f90840', '管理员', '9723718.jpg', '女', '2012-11-13', '备注', '李红', '15236222222'),
(4, '1111', 'b59c67bf196a4758191e42f76670ceba', '管理员', '3123027.jpg', '男', '2017-10-30', '备注备注备注备注备注备注', '刘旭', '15236222222'),
(5, 'dff', 'ffbbfcd692e84d6b82af1b5c0e6f5446', '管理员', '1501684.jpg', '女', '2012-11-05', 'dfdf', 'dadf', '15236222222');

-- --------------------------------------------------------

--
-- 表的结构 `baoxiu`
--

CREATE TABLE IF NOT EXISTS `baoxiu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carsid` int(11) DEFAULT '0' COMMENT '车辆id',
  `content` varchar(250) DEFAULT NULL COMMENT '详细',
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) DEFAULT '维修中' COMMENT '状态',
  `eacherid` int(11) DEFAULT '0' COMMENT '人员id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `baoxiu`
--

INSERT INTO `baoxiu` (`id`, `carsid`, `content`, `addtime`, `status`, `eacherid`) VALUES
(1, 1, '车轮坏了，修好了', '2017-12-05 13:08:31', '完成', 2),
(2, 1, '把坏了', '2017-12-05 14:22:24', '完成', 1);

-- --------------------------------------------------------

--
-- 表的结构 `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` int(11) DEFAULT '0' COMMENT '品牌',
  `colors` varchar(50) DEFAULT NULL COMMENT '颜色',
  `title` varchar(50) DEFAULT NULL COMMENT '车牌号',
  `img` varchar(50) DEFAULT NULL,
  `ages` varchar(11) DEFAULT NULL COMMENT '车龄',
  `status` varchar(10) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `cars`
--

INSERT INTO `cars` (`id`, `categoryid`, `colors`, `title`, `img`, `ages`, `status`) VALUES
(1, 1, '红色', 'A25232', NULL, '5', '正常'),
(2, 2, '黄色', 'B25262', NULL, '1', '正常'),
(3, 1, '黄色', 'A58263', NULL, '2', '正常'),
(4, 2, '黄色', 'G25262', NULL, '1', '正常'),
(5, 1, '黄色', 'C58263', NULL, '1', '正常'),
(6, 3, '黄色', 'AA58263', NULL, '2', '借出'),
(7, 3, '红色', 'df52666', '8935693.jpg', '新车', '借出'),
(8, 3, '红色', 'a3343', '9467919.jpg', '新车', '借出'),
(9, 1, '红色', '223231', '1447964.jpg', '新车', '正常');

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'id自然编号',
  `title` varchar(60) NOT NULL COMMENT '名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(4, '小鸣单车'),
(3, '酷骑单车'),
(2, '永安行'),
(1, '膜拜');

-- --------------------------------------------------------

--
-- 表的结构 `eacher`
--

CREATE TABLE IF NOT EXISTS `eacher` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `begintime` varchar(50) DEFAULT NULL,
  `desc1` varchar(200) DEFAULT NULL,
  `tname` varchar(10) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `eacher`
--

INSERT INTO `eacher` (`id`, `username`, `password`, `img`, `sex`, `begintime`, `desc1`, `tname`, `tel`) VALUES
(1, '1', '21232f297a57a5a743894a0e4a801fc3', '2679125.jpg', '男', '2017-11-06', '是个好人', '张旭', '15236222222'),
(2, '123123', '4297f44b13955235245b2497399d7a93', '1716137.jpg', '女', '2012-10-28', '备注备注备注备注备注备注', '何兰1', '13985623652'),
(3, '112', '7f6ffaa6bb0b408017b62254211691b5', '3501708.jpg', '男', '2012-11-28', '1212', '112', '15236222222');

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` varchar(50) DEFAULT '0' COMMENT '学生id',
  `carsid` int(11) DEFAULT '0' COMMENT '车辆id',
  `price` decimal(11,0) DEFAULT '0' COMMENT '预计价格',
  `begintime` date DEFAULT NULL COMMENT '开始时间',
  `endtime` date DEFAULT NULL COMMENT '结束时间',
  `addtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加时间',
  `status` varchar(50) DEFAULT NULL,
  `carstitle` varchar(50) DEFAULT NULL COMMENT '车牌号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`id`, `studentid`, `carsid`, `price`, `begintime`, `endtime`, `addtime`, `status`, `carstitle`) VALUES
(1, '23232', 5, '22', '2017-12-05', '2017-12-07', '2017-12-05 12:21:20', '已归还', 'C58263'),
(2, '111112', 9, '30', '2017-12-05', '2017-12-28', '2017-12-05 14:23:20', '已归还', '223231');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `studentid` varchar(64) NOT NULL COMMENT '学号',
  `stuname` varchar(50) NOT NULL COMMENT '姓名',
  `password` char(32) NOT NULL COMMENT '密码',
  `banji` varchar(50) DEFAULT NULL COMMENT '班级',
  `addtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  `img` varchar(255) DEFAULT NULL COMMENT '头像',
  `sex` varchar(255) DEFAULT NULL COMMENT '性别',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `tel` varchar(50) DEFAULT NULL COMMENT '电话',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`studentid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `studentid`, `stuname`, `password`, `banji`, `addtime`, `img`, `sex`, `status`, `tel`) VALUES
(1, '111111', '李明1', '96e79218965eb72c92a549dd5a330112', '大一三班', '2017-12-05 14:09:51', '9870576.jpg', '男', 0, '15236222222'),
(2, '111112', '3有扔', '96e79218965eb72c92a549dd5a330112', '大一三班', '2017-12-05 14:20:29', '677384.jpg', '男', 0, '15236222222');

-- --------------------------------------------------------

--
-- 表的结构 `yajin`
--

CREATE TABLE IF NOT EXISTS `yajin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT '0' COMMENT '学生id',
  `price` decimal(11,0) NOT NULL DEFAULT '0' COMMENT '金额',
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '时间',
  `studentid` varchar(50) DEFAULT NULL COMMENT '学号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `yajin`
--

INSERT INTO `yajin` (`id`, `userid`, `price`, `addtime`, `studentid`) VALUES
(1, 1, '325', '2017-12-05 14:10:28', '111111'),
(2, 2, '270', '2017-12-05 14:21:06', '111112');


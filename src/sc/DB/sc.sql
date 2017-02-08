/*
Navicat MySQL Data Transfer

Source Server         : LocalHost
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : sc

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-02-09 00:35:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `sc_admin`
-- ----------------------------
DROP TABLE IF EXISTS `sc_admin`;
CREATE TABLE `sc_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of sc_admin
-- ----------------------------
INSERT INTO `sc_admin` VALUES ('1', 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad');

-- ----------------------------
-- Table structure for `sc_building`
-- ----------------------------
DROP TABLE IF EXISTS `sc_building`;
CREATE TABLE `sc_building` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of sc_building
-- ----------------------------
INSERT INTO `sc_building` VALUES ('b0001', '逸夫楼203');
INSERT INTO `sc_building` VALUES ('b0002', '教研楼201');
INSERT INTO `sc_building` VALUES ('b0003', 'A-101');
INSERT INTO `sc_building` VALUES ('b0004', '教研楼302');

-- ----------------------------
-- Table structure for `sc_course`
-- ----------------------------
DROP TABLE IF EXISTS `sc_course`;
CREATE TABLE `sc_course` (
  `id` varchar(50) NOT NULL,
  `course_name` varchar(50) NOT NULL COMMENT '课程名',
  `course_property` tinyint(4) NOT NULL COMMENT '课程属性',
  `course_type` tinyint(4) NOT NULL COMMENT '课程类型',
  `course_credit` tinyint(4) NOT NULL COMMENT '学分',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of sc_course
-- ----------------------------
INSERT INTO `sc_course` VALUES ('c0001', '计算机基础', '0', '0', '2');
INSERT INTO `sc_course` VALUES ('c0002', '大学英语', '0', '0', '4');
INSERT INTO `sc_course` VALUES ('c0003', '高等数学', '0', '0', '4');
INSERT INTO `sc_course` VALUES ('c0004', '思想道德修养与法律基础', '0', '0', '3');
INSERT INTO `sc_course` VALUES ('c0005', '程序设计基础', '0', '0', '2');
INSERT INTO `sc_course` VALUES ('c0006', '马克思主义基本原理概论', '0', '0', '2');

-- ----------------------------
-- Table structure for `sc_department`
-- ----------------------------
DROP TABLE IF EXISTS `sc_department`;
CREATE TABLE `sc_department` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of sc_department
-- ----------------------------
INSERT INTO `sc_department` VALUES ('', '化学系 ');
INSERT INTO `sc_department` VALUES ('d0001', '计算机系');
INSERT INTO `sc_department` VALUES ('d0002', '外语系');
INSERT INTO `sc_department` VALUES ('d0003', '中文系');
INSERT INTO `sc_department` VALUES ('d0004', '数学系');
INSERT INTO `sc_department` VALUES ('d0005', '机械系');
INSERT INTO `sc_department` VALUES ('d0006', '建筑系');
INSERT INTO `sc_department` VALUES ('d0007', '工程系');
INSERT INTO `sc_department` VALUES ('d0008', '农业系');
INSERT INTO `sc_department` VALUES ('d0009', '金融系');
INSERT INTO `sc_department` VALUES ('d0011', '土木工程系');
INSERT INTO `sc_department` VALUES ('d0012', '经济系');
INSERT INTO `sc_department` VALUES ('d0013', '教育系');
INSERT INTO `sc_department` VALUES ('d0014', '地理系');
INSERT INTO `sc_department` VALUES ('d0015', '园艺系');
INSERT INTO `sc_department` VALUES ('d0016', '法律系');
INSERT INTO `sc_department` VALUES ('d0017', '文学系');
INSERT INTO `sc_department` VALUES ('d0018', '航海技术系');
INSERT INTO `sc_department` VALUES ('d0019', '气象系');
INSERT INTO `sc_department` VALUES ('d0020', '海洋科学系');

-- ----------------------------
-- Table structure for `sc_profession`
-- ----------------------------
DROP TABLE IF EXISTS `sc_profession`;
CREATE TABLE `sc_profession` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profession_id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of sc_profession
-- ----------------------------
INSERT INTO `sc_profession` VALUES ('p0001', '软件专业');
INSERT INTO `sc_profession` VALUES ('p0002', '应用数学');
INSERT INTO `sc_profession` VALUES ('p0003', '考古专业');
INSERT INTO `sc_profession` VALUES ('p0004', '新闻专业');
INSERT INTO `sc_profession` VALUES ('p0005', '影视表演');
INSERT INTO `sc_profession` VALUES ('p0006', '商务英语');
INSERT INTO `sc_profession` VALUES ('p0007', '经融贸易');
INSERT INTO `sc_profession` VALUES ('p0008', '会计专业');
INSERT INTO `sc_profession` VALUES ('p0009', '统计学专业');
INSERT INTO `sc_profession` VALUES ('p0010', '服装设计');
INSERT INTO `sc_profession` VALUES ('p0011', '工程管理');
INSERT INTO `sc_profession` VALUES ('p0012', '汽车制造');
INSERT INTO `sc_profession` VALUES ('p0013', '模具设计');
INSERT INTO `sc_profession` VALUES ('p0014', '中医专业');
INSERT INTO `sc_profession` VALUES ('p0015', '建筑设计');
INSERT INTO `sc_profession` VALUES ('p0016', '工程造价');
INSERT INTO `sc_profession` VALUES ('p0017', '工商管理');
INSERT INTO `sc_profession` VALUES ('p0018', '电子商务');
INSERT INTO `sc_profession` VALUES ('p0019', '网络通讯');
INSERT INTO `sc_profession` VALUES ('p0020', '运营管理');
INSERT INTO `sc_profession` VALUES ('p0021', '电子通信');

-- ----------------------------
-- Table structure for `sc_student`
-- ----------------------------
DROP TABLE IF EXISTS `sc_student`;
CREATE TABLE `sc_student` (
  `id` varchar(50) NOT NULL COMMENT '学号',
  `name` varchar(20) NOT NULL COMMENT '姓名',
  `department_id` varchar(50) NOT NULL COMMENT '系名',
  `profession_id` varchar(40) NOT NULL COMMENT '专业',
  `sex` tinyint(4) NOT NULL COMMENT '性别',
  `class` varchar(20) NOT NULL COMMENT '班级',
  `password` varchar(50) NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e' COMMENT '密码',
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of sc_student
-- ----------------------------
INSERT INTO `sc_student` VALUES ('s0001', 'LHF', 'd0001', 'p0001', '0', '1', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `sc_student` VALUES ('s0002', 'HK', 'd0001', 'p0001', '0', '2', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `sc_student` VALUES ('s0003', 'KL', 'd0002', 'p0002', '1', '2', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `sc_student` VALUES ('s0004', 'HT', 'd0003', 'p0002', '0', '3', '2221106d1554161b8bd54d16d060b231536c2aca', null, null);
INSERT INTO `sc_student` VALUES ('s0005', 'ui', 'd0001', 'p0001', '0', '1', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `sc_student` VALUES ('s0006', 'oo', 'd0001', 'p0001', '1', '1', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `sc_student` VALUES ('s0007', 'we', 'd0001', 'p0001', '0', '3', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `sc_student` VALUES ('s0008', 'de', 'd0001', 'p0001', '1', '1', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `sc_student` VALUES ('s0009', 'wer', 'd0001', 'p0001', '0', '1', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `sc_student` VALUES ('s0010', 'df', 'd0001', 'p0001', '1', '3', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `sc_student` VALUES ('s0020', 'HJ', 'd0001', 'p0001', '1', '1', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `sc_student` VALUES ('s0021', 'ty', 'd0001', 'p0001', '0', '4', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `sc_student` VALUES ('s0022', 'FC', 'd0001', 'p0001', '1', '1', 'ff8c14e259f0404ca3952b89fec9c739bc653b88', null, null);

-- ----------------------------
-- Table structure for `sc_student_course`
-- ----------------------------
DROP TABLE IF EXISTS `sc_student_course`;
CREATE TABLE `sc_student_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_course_id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of sc_student_course
-- ----------------------------

-- ----------------------------
-- Table structure for `sc_teacher`
-- ----------------------------
DROP TABLE IF EXISTS `sc_teacher`;
CREATE TABLE `sc_teacher` (
  `id` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL COMMENT '姓名',
  `department_id` varchar(50) NOT NULL COMMENT '系名',
  `sex` tinyint(4) NOT NULL COMMENT '性别',
  `password` varchar(50) NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e' COMMENT '密码',
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of sc_teacher
-- ----------------------------
INSERT INTO `sc_teacher` VALUES ('t0001', ' 马云', 'd0001', '1', 'e10adc3949ba59abbe56e057f20f883e', 'mayun@163.com', '13567890987');
INSERT INTO `sc_teacher` VALUES ('t0002', ' 王明', 'd0003', '1', 'e10adc3949ba59abbe56e057f20f883e', 'wm@qq.com', '12345678901');
INSERT INTO `sc_teacher` VALUES ('t0004', 'Jay', 'd0003', '0', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `sc_teacher` VALUES ('t0005', 'HL', 'd0001', '0', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `sc_teacher` VALUES ('t0010', 'GN', 'd0001', '0', '413d6c847f29deffbc00853decd85ddb174ee036', null, null);

-- ----------------------------
-- Table structure for `sc_teacher_course`
-- ----------------------------
DROP TABLE IF EXISTS `sc_teacher_course`;
CREATE TABLE `sc_teacher_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` varchar(50) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `course_building_id` varchar(50) NOT NULL,
  `course_start` datetime NOT NULL,
  `course_end` datetime NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of sc_teacher_course
-- ----------------------------

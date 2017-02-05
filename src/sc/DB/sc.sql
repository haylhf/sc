/*
Navicat MySQL Data Transfer

Source Server         : LocalHost
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : sc

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-02-05 20:55:48
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=gb2312;

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
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of sc_building
-- ----------------------------
INSERT INTO `sc_building` VALUES ('b01', 'A-101');
INSERT INTO `sc_building` VALUES (' b02', 'A-102');

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
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of sc_course
-- ----------------------------

-- ----------------------------
-- Table structure for `sc_department`
-- ----------------------------
DROP TABLE IF EXISTS `sc_department`;
CREATE TABLE `sc_department` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of sc_department
-- ----------------------------
INSERT INTO `sc_department` VALUES ('d01', ' 数学系');
INSERT INTO `sc_department` VALUES (' d02', ' 计算机科学系');

-- ----------------------------
-- Table structure for `sc_profession`
-- ----------------------------
DROP TABLE IF EXISTS `sc_profession`;
CREATE TABLE `sc_profession` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profession_id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of sc_profession
-- ----------------------------
INSERT INTO `sc_profession` VALUES ('p01', '软件专业');
INSERT INTO `sc_profession` VALUES ('p02', '应用数学');

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
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of sc_student
-- ----------------------------

-- ----------------------------
-- Table structure for `sc_student_course`
-- ----------------------------
DROP TABLE IF EXISTS `sc_student_course`;
CREATE TABLE `sc_student_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_course_id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of sc_student_course
-- ----------------------------

-- ----------------------------
-- Table structure for `sc_teacher`
-- ----------------------------
DROP TABLE IF EXISTS `sc_teacher`;
CREATE TABLE `sc_teacher` (
  `id` varchar(50) NOT NULL COMMENT '工号',
  `name` varchar(20) NOT NULL COMMENT '姓名',
  `department_id` varchar(40) NOT NULL COMMENT '系名',
  `sex` tinyint(4) NOT NULL COMMENT '性别',
  `password` varchar(50) NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e' COMMENT '密码',
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of sc_teacher
-- ----------------------------

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
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of sc_teacher_course
-- ----------------------------

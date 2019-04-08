# phpMyAdmin SQL Dump
# version 2.5.6
# http://www.phpmyadmin.net
#
# ȣ��Ʈ: localhost
# ó���� �ð�: 12-08-30 02:02 
# ���� ����: 4.0.18
# PHP ����: 4.3.6
# 
# �����ͺ��̽� : `db`
# 

# --------------------------------------------------------

#
# ���̺� ���� `board`
#

CREATE TABLE `board` (
  `no` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `subject` varchar(255) NOT NULL default '',
  `content` text NOT NULL,
  `wdate` datetime NOT NULL default '0000-00-00 00:00:00',
  UNIQUE KEY `no` (`no`)
) TYPE=MyISAM AUTO_INCREMENT=5 ;

#
# ���̺��� ���� ������ `board`
#

INSERT INTO `board` VALUES (2, '�������', '�����Դϴ�.�����Դϴ�.�����Դϴ�.�����Դϴ�.', '������������������\r\n������\r\n����\r\n����\r\n����\r\n��\r\n����������������������', '0000-00-00 00:00:00');
INSERT INTO `board` VALUES (3, '���뱸', '�����Դϴ�.', '�����Դϴ�.�����Դϴ�.�����Դϴ�.�����Դϴ�.�����Դϴ�.��\r\n\r\n\r\n���Դϴ�.�����Դϴ�.�����Դϴ�.', '2012-08-26 12:20:29');
INSERT INTO `board` VALUES (4, '������', '��������', 'dsfdsfsd\r\nfds\r\nfsd\r\nf\r\ndfdsfdsfds', '2012-08-26 13:40:59');

# --------------------------------------------------------

#
# ���̺� ���� `comment`
#

CREATE TABLE `comment` (
  `no` int(11) NOT NULL auto_increment,
  `boardnum` varchar(100) NOT NULL default '',
  `name` varchar(100) NOT NULL default '',
  `content` varchar(100) NOT NULL default '',
  UNIQUE KEY `no` (`no`)
) TYPE=MyISAM AUTO_INCREMENT=14 ;

#
# ���̺��� ���� ������ `comment`
#

INSERT INTO `comment` VALUES (5, '2', '%u3134%u3147%u3139%u3147%u3134%u3139', '%u3134%u3147%u3139%u3147%u3134');
INSERT INTO `comment` VALUES (6, '2', '%uBC15%uC644%uB85C', '%uAC15%uC815%uC624%uB298 %uC54A%uC0C0%uC74C');
INSERT INTO `comment` VALUES (7, '2', '%uC870%uC6A9%uAD6C', '%uC870%uC6A9%uAD6C%uC785%uB2C8%uB2E4.');
INSERT INTO `comment` VALUES (8, '3', '%uC870%uC6A9%uAD6C', '%uB313%uAE00%uC744 %uB2EC%uC558%uB2E4.');
INSERT INTO `comment` VALUES (9, '3', '%uC870%u3148%u3137%u3131%u3148%u3137%u3131', '%u3134%u3147%u3139%u3148%u3134%u3147');
INSERT INTO `comment` VALUES (10, '4', '%uBC15%uC644%uD638', '%uBC15%uAC15%uC815');
INSERT INTO `comment` VALUES (11, '4', '%uC804%uC6D0%uC900', '%uCE74%uD2B8%uB9DB%uC788%uCA61');
INSERT INTO `comment` VALUES (12, '2', 'wefwefwf', 'sadfasdfs');
INSERT INTO `comment` VALUES (13, '2', '%uD55C%uAE00%uC785%uB2C8%uB2E4.', '%uD55C%uAE00%uC785%uB2C8%uB2E4.');

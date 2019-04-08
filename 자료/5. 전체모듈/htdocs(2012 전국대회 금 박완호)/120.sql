# phpMyAdmin SQL Dump
# version 2.5.6
# http://www.phpmyadmin.net
#
# ȣ��Ʈ: localhost
# ó���� �ð�: 12-09-06 11:06 
# ���� ����: 4.0.18
# PHP ����: 4.3.6
# 
# �����ͺ��̽� : `120`
# 

# --------------------------------------------------------

#
# ���̺� ���� `board`
#

CREATE TABLE `board` (
  `idx` int(11) NOT NULL auto_increment,
  `subject` varchar(200) NOT NULL default '',
  `content` text NOT NULL,
  `name` varchar(200) NOT NULL default '',
  `email` varchar(200) NOT NULL default '',
  `date` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=32 ;

#
# ���̺��� ���� ������ `board`
#

INSERT INTO `board` VALUES (1, '���� ���е� ����� ��Ǯ���� ����', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (2, '��ȸ�ǿ� �����λ� ���׸Ӵ�', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (3, '�︪���� ��ǰ �԰Ÿ��� ã�Ƽ�', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (4, '�߼� �յ� ������� ��ǰ�� �Ǹ� 100�� ����', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (5, '���嵵 ������Ʈó�� ���ϰ�', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (6, '�뱸�� ���� �� ������ �庸�� ��� ��ȹ', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (7, '����� �Ϲ������� �������� �簢����', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (8, '�Ƚɿ������ ���� ���� �����ֹ� ���� �̷�����', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (9, '6������ ��� ���� ���� �������', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (10, '��ϴ뺴��-������������ �ǰ����� ����', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (11, '��� ���� ���� �����ϴ�.', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (12, '�߱�û �ֹ���ġ���� ���α׷� �濬��ȸ', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (13, '�Ҽȷ� �������� �ǽð� �����ؿ�', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (14, '������ �ϴ� �� �̷��� ���� �� �������', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (15, 'ĥ�� �ְ��� ���� ���б��� �λ�', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (16, 'ĥ� ��� ���ڸ� ã�Ƶ����', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (17, '������� �������� �󰡵��� �ѷ�', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (18, '������ �������ո���Ʈ���� ����', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (19, '����� �Ŷ�ô� �״�� ���ƿ���', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (20, '�����߼ұ�� �̿���� ���Ҵ�', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (21, '�����߼ұ�� �ܱ��η� �����η� ���� ����', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (22, '�߼ұ�� �ִ�Ը� �������� ����', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (23, '�������� �������� ���� �̳߰�', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (24, '�� ���� ���뱳ü �ٶ� �̽��϶� ȣ�ҳ� �λ�', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (25, '���þ� ������ ���� ����', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (26, '�����Ѥ��� ���� �� ù ���� ���� ����', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (27, '�뱸 �����ε� ��ȭ�� ����� ������', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (28, '�ܷο� ����� ������ ó�� ��������', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (29, '���� ȭ���� ����б��� �躸�� ��', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (30, 'Ÿ�̰� ���� 1��޷� �糪�� ���', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (31, '��������Ű�����Ǵ�ȸ 11�ϱ��� �뱸 ��Ű�弭', '', '', '', '0000-00-00');

# --------------------------------------------------------

#
# ���̺� ���� `default_menu`
#

CREATE TABLE `default_menu` (
  `idx` varchar(200) NOT NULL default '',
  `title` varchar(200) NOT NULL default '',
  `parent` varchar(200) NOT NULL default '',
  `od` int(11) NOT NULL default '0',
  `type` varchar(200) NOT NULL default 'HTML',
  `content` text NOT NULL,
  `lv` int(11) NOT NULL default '3',
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM;

#
# ���̺��� ���� ������ `default_menu`
#

INSERT INTO `default_menu` VALUES ('member', '�����������', '0', 0, 'HTML', '', 3);
INSERT INTO `default_menu` VALUES ('etc', '���������������', '0', 1, 'HTML', '', 3);
INSERT INTO `default_menu` VALUES ('login', '�α���', 'member', 0, '', '', 3);
INSERT INTO `default_menu` VALUES ('join', 'ȸ������', 'member', 1, '', '', 3);
INSERT INTO `default_menu` VALUES ('mypage', '�� ���� Ȯ��', 'member', 2, '', '', 3);
INSERT INTO `default_menu` VALUES ('sitemap', '����Ʈ��', 'etc', 0, '', '', 3);
INSERT INTO `default_menu` VALUES ('search', '�˻�', 'etc', 1, '', '', 3);

# --------------------------------------------------------

#
# ���̺� ���� `member`
#

CREATE TABLE `member` (
  `idx` int(11) NOT NULL auto_increment,
  `id` varchar(200) NOT NULL default '',
  `pw` varchar(200) NOT NULL default '',
  `name` varchar(200) NOT NULL default '',
  `email` varchar(200) NOT NULL default '',
  `sex` varchar(200) NOT NULL default '',
  `address` varchar(200) NOT NULL default '',
  `cell` varchar(200) NOT NULL default '',
  `phone` varchar(200) NOT NULL default '',
  `lv` int(11) NOT NULL default '2',
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

#
# ���̺��� ���� ������ `member`
#

INSERT INTO `member` VALUES (1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '������', 'admin@admin.net', '����', '������Ʈ', '053-0000-0000', '010-0000-0000', 2);

# --------------------------------------------------------

#
# ���̺� ���� `menu`
#

CREATE TABLE `menu` (
  `idx` int(11) NOT NULL auto_increment,
  `title` varchar(200) NOT NULL default '',
  `parent` varchar(200) NOT NULL default '',
  `od` int(11) NOT NULL default '0',
  `type` varchar(200) NOT NULL default 'HTML',
  `content` text NOT NULL,
  `lv` int(11) NOT NULL default '3',
  PRIMARY KEY  (`idx`)
) TYPE=MyISAM AUTO_INCREMENT=17 ;

#
# ���̺��� ���� ������ `menu`
#

INSERT INTO `menu` VALUES (1, '�Ұ�', '0', 0, 'HTML', '', 3);
INSERT INTO `menu` VALUES (2, '���հ˻�', '0', 1, 'HTML', '', 3);
INSERT INTO `menu` VALUES (3, 'ȸ������', '0', 2, 'HTML', '', 3);
INSERT INTO `menu` VALUES (4, '������', '0', 3, 'HTML', '', 3);
INSERT INTO `menu` VALUES (5, '�����Խ���', '0', 4, 'HTML', '', 3);
INSERT INTO `menu` VALUES (6, '�λ縻', '1', 0, 'HTML', '\r\n				<p class="photo_1 mt15">\r\n\r\n					<img src="/img/photo_1.png" title="�ȳ��Ͻʴϱ�" alt="�ȳ��Ͻʴϱ�" />\r\n\r\n				</p>\r\n\r\n				<p class="photo_1">\r\n\r\n				�׵��� ���� ��ǰ�� �ֿ��Ͽ� �ֽð� �׻� ������ ��￩ �ֽŵ� ���Ͽ� ������ ���縦 �帳�ϴ�. <br />\r\n\r\n				�޺��ϴ� ������� �������� ����� ��ȭ�� ����ȭ�� �̷�ǰ� �ΰ���Ȱ�� �������� ������ ȯ��������� ������ �䱸�ʿ� ���� �����ϰ� ����� ���������� â���ϱ� ���Ͽ� �� ���� ��ǰ���߿� ����ϰ� �ֽ��ϴ�. \r\n\r\n				�ƿ﷯ ��õ�� ���ô뿡 ���� <span class="bold">�Ｚ���հ����� ��ǰ���� ��ǰ�� �ż� ��Ȯ �ϰ� �������е鲲 �����̰��� ���ͳ� Ȩ�������� ����</span> �Ͽ����ϴ�. <br />\r\n\r\n				���� ���� ���Ӱ� ������ ���ͳ� Ȩ�������� ���� �� �������� ���� ������ ���� �� �ٰ����� ������ �ǵ��� ����ϰڽ��ϴ�. <br />\r\n\r\n				�����մϴ�.\r\n\r\n				</p>\r\n\r\n				<p>\r\n				 \r\n				<span class="bold">- ������ �ϵ�</span><br />\r\n\r\n				���� : &#x61;&#x64;&#x6d;&#x69;&#x6e;&#x40;&#x66;&#x75;&#x72;&#x6e;&#x69;&#x74;&#x75;&#x72;&#x65;&#x2e;&#x63;&#x6f;&#x2e;&#x6b;&#x72;\r\n\r\n				</p>\r\n\r\n				<p class="photo_2">\r\n\r\n					<img src="/img/photo_2.png" title="�λ縻" alt="�λ縻" />\r\n\r\n				</p>', 3);
INSERT INTO `menu` VALUES (7, '�뿩�ȳ�', '1', 0, 'HTML', '\r\n\r\n				<p class="photo_3">\r\n\r\n					<img src="/img/photo_3.png" title="�뿩�ȳ�" alt="�뿩�ȳ�" />\r\n\r\n				<p>\r\n\r\n				��ǰ/����� �����Ͻ��� �������� �ۼ��ؼ� �����ðų�, (02)501-6133�� ��ȭ�Ͻø� �������� �����帳�ϴ�.<br />\r\n				��Ż��� �Ⱓ, ǰ��, ���ſ뵵�� ���� �����˴ϴ�.<br />\r\n				  ���������� �����Ͻ� �� <span class="bold">����ڵ������ �൵</span>�� ÷���Ͽ� �ѽ��� �����ø� �˴ϴ�.<br />\r\n				��Ż��� �ſ� �����̸� ī��, �¶��γ��η� �����Ͻø� �˴ϴ�. <br />\r\n				 \r\n				 �����Ͻ� ��¥�� �ð��� ��Ȯ�� ��� �� <span class="bold">����� å��</span>�� �帮�� �ְ��� ��������\r\n				��ġ�����ص帳�ϴ�. <br />\r\n				  ��Ż�� ����� �̻��� �������� ���� �����Ͼ��� <span class="bold">�ż��� ����� A/S�� ���� ���� ����</span>�� �帮�ڽ��ϴ�. <br />\r\n				 \r\n				 ����� �Ⱓ ����� ���ÿ� ����� ��ȯ���� ����� ����˴ϴ�.<br />\r\n				���� �Ǵ� ������ ���Ͻø� ��ȭ���ֽø� �˴ϴ�. <br />\r\n				  �̿��� : �������, �������, �Ϲ� ���� ����ڵ������ ���� ���� ����� <br />\r\n\r\n				��Ż�Ⱓ : 1��~12��������  \r\n\r\n				</p>', 3);
INSERT INTO `menu` VALUES (8, '���հ˻�', '2', 0, 'HTML', '�������Դϴ�.', 3);
INSERT INTO `menu` VALUES (9, 'ȸ������', '3', 0, 'join', '', 3);
INSERT INTO `menu` VALUES (10, '������û', '3', 1, 'HTML', '�������Դϴ�.', 3);
INSERT INTO `menu` VALUES (11, '�뿩����', '3', 2, 'HTML', '�������Դϴ�.', 3);
INSERT INTO `menu` VALUES (12, '�뿩��Ȳ��ȸ', '3', 3, 'HTML', '�������Դϴ�.', 3);
INSERT INTO `menu` VALUES (13, '�ű԰������', '4', 0, 'HTML', '�������Դϴ�.', 3);
INSERT INTO `menu` VALUES (14, '��û������ȸ', '4', 1, 'HTML', '�������Դϴ�.', 3);
INSERT INTO `menu` VALUES (15, '�뿩������ȸ', '4', 2, 'HTML', '�������Դϴ�.', 3);
INSERT INTO `menu` VALUES (16, '�����Խ���', '5', 0, 'board_list', '', 3);

# phpMyAdmin SQL Dump
# version 2.5.6
# http://www.phpmyadmin.net
#
# 호스트: localhost
# 처리한 시간: 12-09-06 11:06 
# 서버 버전: 4.0.18
# PHP 버전: 4.3.6
# 
# 데이터베이스 : `120`
# 

# --------------------------------------------------------

#
# 테이블 구조 `board`
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
# 테이블의 덤프 데이터 `board`
#

INSERT INTO `board` VALUES (1, '지역 대학들 취업률 부풀리기 들통', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (2, '국회의원 세비인상 슬그머니', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (3, '울릉도의 명품 먹거리를 찾아서', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (4, '추석 앞둔 전통시장 상품권 판매 100억 번다', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (5, '시장도 대형마트처럼 편리하게', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (6, '대구시 시장 등 전직원 장보기 행사 계획', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (7, '뷔페는 일반음식점 위생관리 사각지대', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (8, '안심연료단지 이전 문제 지역주민 숙원 이뤄진다', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (9, '6월보다 언어 쉽고 수리 어려웠다', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (10, '경북대병원-농협지역본부 건강증진 협약', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (11, '사랑 나눔 축제 열립니다.', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (12, '중구청 주민자치센터 프로그램 경연대회', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (13, '소셜로 관광객과 실시간 소통해요', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (14, '남편이 하는 일 이렇게 힘든 줄 몰랐어요', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (15, '칠곡 왜관초 영어 명문학교로 부상', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (16, '칠곡군 희망 일자리 찾아드려요', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (17, '문경농협 낙과피해 농가돕기 총력', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (18, '울진군 오산종합리조트단지 추진', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (19, '금장대 신라시대 그대로 돌아오다', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (20, '지역중소기업 이웃사랑 뜻모았다', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (21, '지역중소기업 외국인력 전문인력 도입 박차', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (22, '중소기업 최대규모 구조조정 위기', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (23, '준중형차 내수시장 경쟁 뜨겁네', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (24, '일 정계 새대교체 바람 이시하라 호소노 부상', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (25, '러시아 담배와의 전쟁 돌입', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (26, '영국총ㅇ리 집권 후 첫 내각 개편 착수', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (27, '대구 예술인들 문화로 세계와 통통통', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (28, '외로운 광대로 변신한 처용 만나볼까', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (29, '상주 화북중 산골학교라 얕보지 마', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (30, '타이거 우즈 1억달러 사나이 등극', '', '', '', '0000-00-00');
INSERT INTO `board` VALUES (31, '전국고교하키선수권대회 11일까지 대구 하키장서', '', '', '', '0000-00-00');

# --------------------------------------------------------

#
# 테이블 구조 `default_menu`
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
# 테이블의 덤프 데이터 `default_menu`
#

INSERT INTO `default_menu` VALUES ('member', '멤버쉽페이지', '0', 0, 'HTML', '', 3);
INSERT INTO `default_menu` VALUES ('etc', '사용자편의페이지', '0', 1, 'HTML', '', 3);
INSERT INTO `default_menu` VALUES ('login', '로그인', 'member', 0, '', '', 3);
INSERT INTO `default_menu` VALUES ('join', '회원가입', 'member', 1, '', '', 3);
INSERT INTO `default_menu` VALUES ('mypage', '내 정보 확인', 'member', 2, '', '', 3);
INSERT INTO `default_menu` VALUES ('sitemap', '사이트맵', 'etc', 0, '', '', 3);
INSERT INTO `default_menu` VALUES ('search', '검색', 'etc', 1, '', '', 3);

# --------------------------------------------------------

#
# 테이블 구조 `member`
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
# 테이블의 덤프 데이터 `member`
#

INSERT INTO `member` VALUES (1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '관리자', 'admin@admin.net', '남자', '가구렌트', '053-0000-0000', '010-0000-0000', 2);

# --------------------------------------------------------

#
# 테이블 구조 `menu`
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
# 테이블의 덤프 데이터 `menu`
#

INSERT INTO `menu` VALUES (1, '소개', '0', 0, 'HTML', '', 3);
INSERT INTO `menu` VALUES (2, '통합검색', '0', 1, 'HTML', '', 3);
INSERT INTO `menu` VALUES (3, '회원서비스', '0', 2, 'HTML', '', 3);
INSERT INTO `menu` VALUES (4, '관리자', '0', 3, 'HTML', '', 3);
INSERT INTO `menu` VALUES (5, '자유게시판', '0', 4, 'HTML', '', 3);
INSERT INTO `menu` VALUES (6, '인사말', '1', 0, 'HTML', '\r\n				<p class="photo_1 mt15">\r\n\r\n					<img src="/img/photo_1.png" title="안녕하십니까" alt="안녕하십니까" />\r\n\r\n				</p>\r\n\r\n				<p class="photo_1">\r\n\r\n				그동안 저희 제품을 애용하여 주시고 항상 관심을 기울여 주신데 대하여 무한한 감사를 드립니다. <br />\r\n\r\n				급변하는 고도산업의 발전으로 기업의 문화는 세계화가 이룩되고 인간생활에 불편함이 없도록 환경디자인이 절실히 요구됨에 따라 쾌적하고 편안한 업무공간을 창조하기 위하여 더 좋은 제품개발에 노력하고 있습니다. \r\n\r\n				아울러 새천년 새시대에 저희 <span class="bold">삼성종합가구는 고품질의 상품을 신속 정확 하게 고객여러분들께 선보이고자 인터넷 홈페이지를 개설</span> 하였습니다. <br />\r\n\r\n				이제 저희가 새롭게 개설한 인터넷 홈페이지를 계기로 고객 여러분의 절대 만족에 한층 더 다가서는 가구가 되도록 노력하겠습니다. <br />\r\n\r\n				감사합니다.\r\n\r\n				</p>\r\n\r\n				<p>\r\n				 \r\n				<span class="bold">- 임직원 일동</span><br />\r\n\r\n				문의 : &#x61;&#x64;&#x6d;&#x69;&#x6e;&#x40;&#x66;&#x75;&#x72;&#x6e;&#x69;&#x74;&#x75;&#x72;&#x65;&#x2e;&#x63;&#x6f;&#x2e;&#x6b;&#x72;\r\n\r\n				</p>\r\n\r\n				<p class="photo_2">\r\n\r\n					<img src="/img/photo_2.png" title="인사말" alt="인사말" />\r\n\r\n				</p>', 3);
INSERT INTO `menu` VALUES (7, '대여안내', '1', 0, 'HTML', '\r\n\r\n				<p class="photo_3">\r\n\r\n					<img src="/img/photo_3.png" title="대여안내" alt="대여안내" />\r\n\r\n				<p>\r\n\r\n				제품/사양을 선택하신후 고객정보를 작성해서 보내시거나, (02)501-6133로 전화하시면 견적서를 보내드립니다.<br />\r\n				렌탈료는 기간, 품목, 고객신용도에 따라 결정됩니다.<br />\r\n				  견적서내에 서명하신 후 <span class="bold">사업자등록증과 약도</span>를 첨부하여 팩스로 보내시면 됩니다.<br />\r\n				렌탈료는 매월 선불이며 카드, 온라인납부로 결제하시면 됩니다. <br />\r\n				 \r\n				 예약하신 날짜와 시간에 정확한 운송 및 <span class="bold">배송을 책임</span>져 드리며 최고의 전문가가\r\n				설치까지해드립니다. <br />\r\n				  렌탈중 장비의 이상이 있을때는 전문 엔지니어의 <span class="bold">신속한 조언및 A/S를 통해 고객의 만족</span>을 드리겠습니다. <br />\r\n				 \r\n				 계약의 기간 만료와 동시에 장비의 반환으로 계약이 종료됩니다.<br />\r\n				연장 또는 해지를 원하시면 전화해주시면 됩니다. <br />\r\n				  이용자 : 국가기관, 공공기업, 일반 법인 사업자등록증을 필한 개인 사업자 <br />\r\n\r\n				렌탈기간 : 1일~12개월까지  \r\n\r\n				</p>', 3);
INSERT INTO `menu` VALUES (8, '통합검색', '2', 0, 'HTML', '공사중입니다.', 3);
INSERT INTO `menu` VALUES (9, '회원가입', '3', 0, 'join', '', 3);
INSERT INTO `menu` VALUES (10, '가구신청', '3', 1, 'HTML', '공사중입니다.', 3);
INSERT INTO `menu` VALUES (11, '대여예약', '3', 2, 'HTML', '공사중입니다.', 3);
INSERT INTO `menu` VALUES (12, '대여현황조회', '3', 3, 'HTML', '공사중입니다.', 3);
INSERT INTO `menu` VALUES (13, '신규가구등록', '4', 0, 'HTML', '공사중입니다.', 3);
INSERT INTO `menu` VALUES (14, '신청가구조회', '4', 1, 'HTML', '공사중입니다.', 3);
INSERT INTO `menu` VALUES (15, '대여업무조회', '4', 2, 'HTML', '공사중입니다.', 3);
INSERT INTO `menu` VALUES (16, '자유게시판', '5', 0, 'board_list', '', 3);

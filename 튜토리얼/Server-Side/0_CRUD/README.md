## 댓글 목록을 통한 튜토리얼
'댓글' 이라는 도메인을 통하여 MySQL에 대한 튜토리얼을 진행합니다.
참고링크 : http://junil-hwang.com/blog/php-mysql-crud/

### 댓글 목록 테이블 설계
댓글에 필요한 데이터 컬럼
1. 댓글 번호 : `idx` `정수`
2. 내용 : `content` `문자열`
3. 작성일 : `reg_date` `날짜`

### phpmyadmin 접속
http://localhost/phpmyadmin

### 데이터 베이스 생성
![image](https://user-images.githubusercontent.com/18749057/56145252-eae89400-5fde-11e9-9ac7-62bcb69a7ff9.png)

### 테이블 추가
```mysql
CREATE TABLE comment (
  `idx` INT AUTO_INCREMENT, # int : 정수형, auto_increment : 추가 시 자동 증가
  `content` TEXT,           # text : 문자열. 최대길이 = 65536 = 256 * 256 = 2^8 * 2^8
  `reg_date` DATETIME,      # 날짜 + 시간
  PRIMARY KEY (`idx`)       # idx를 기본키로 
)
```

**결과**
***
![image](https://user-images.githubusercontent.com/18749057/56146498-4451c280-5fe1-11e9-87e8-5cc0706699d3.png)

![image](https://user-images.githubusercontent.com/18749057/56146529-55023880-5fe1-11e9-9005-4afb1a419fa9.png)

![image](https://user-images.githubusercontent.com/18749057/56146589-6c412600-5fe1-11e9-8de0-d46bc3af58b2.png)

![image](https://user-images.githubusercontent.com/18749057/56146617-7400ca80-5fe1-11e9-8e6d-a57f9a726432.png)
***


### 데이터 입력
#### 기본문법 1) 단일 입력
```mysql
INSERT INTO `comment` (idx, content, reg_date) values (1, 'Lorem ipsum dolor sit.', now());
INSERT INTO `comment` (idx, content, reg_date) values (2, 'Ducimus animi neque molestiae?', now());
INSERT INTO `comment` (idx, content, reg_date) values (3, 'Accusamus omnis, modi suscipit.', now());
INSERT INTO `comment` (idx, content, reg_date) values (4, 'Alias libero perspiciatis itaque?', now());
INSERT INTO `comment` (idx, content, reg_date) values (5, 'Molestias, molestiae odio cupiditate!', now());
```

![image](https://user-images.githubusercontent.com/18749057/56147052-7152a500-5fe2-11e9-8828-7964a8d56607.png)

#### 기본문법 2) 다중 입력
```mysql
INSERT INTO `comment` (idx, content, reg_date) values
(6, 'Reprehenderit saepe praesentium obcaecati.', now()),
(7, 'Itaque optio delectus cumque!', now()),
(8, 'Libero a obcaecati perspiciatis.', now()),
(9, 'Aperiam cum reprehenderit nobis.', now()),
(10, 'Modi omnis voluptates, rem.', now());
```

![image](https://user-images.githubusercontent.com/18749057/56147091-89c2bf80-5fe2-11e9-8739-780c0118e669.png)

#### SET문법
```mysql
INSERT INTO `comment` SET `content` = 'Enim pariatur voluptatum modi.', `reg_date` = now();
INSERT INTO `comment` SET `content` = 'Inventore labore harum vitae.', `reg_date` = now();
INSERT INTO `comment` SET `content` = 'Laborum aperiam ex, nulla.', `reg_date` = now();
INSERT INTO `comment` SET `content` = 'Possimus itaque voluptatum, cumque?', `reg_date` = now();
INSERT INTO `comment` SET `content` = 'Quo illo dolorem ea.', `reg_date` = now();
```

![image](https://user-images.githubusercontent.com/18749057/56147173-afe85f80-5fe2-11e9-9828-e291a1120d01.png)

### 데이터 조회 명령어
```mysql
# 전체 다 가져오기
SELECT * FROM `comment`;
```
![image](https://user-images.githubusercontent.com/18749057/56147383-208f7c00-5fe3-11e9-8479-742642e8978d.png)


```mysql
# 내림 차순
SELECT * FROM `comment` order by idx DESC;
```
![image](https://user-images.githubusercontent.com/18749057/56147421-300ec500-5fe3-11e9-88f9-e8fa47b6f05e.png)


```mysql
# 오름 차순
SELECT * FROM `comment` order by idx ASC;
```
![image](https://user-images.githubusercontent.com/18749057/56147383-208f7c00-5fe3-11e9-8479-742642e8978d.png)


```mysql
# 갯수 제한
SELECT * FROM `comment` LIMIT 5;
```
![image](https://user-images.githubusercontent.com/18749057/56147474-4d439380-5fe3-11e9-8063-7a2f5a846dff.png)


```mysql
# 특정 위치로 부터 갯수 제한
# 5번째 부터, 3개 가져오기
SELECT * FROM `comment` LIMIT 5,3;
```
![image](https://user-images.githubusercontent.com/18749057/56147523-6e0be900-5fe3-11e9-9465-0ce03ad7292b.png)

```mysql
# 정렬 + 갯수제한
SELECT * FROM `comment` ORDER BY idx DESC LIMIT 3, 5;
![image](https://user-images.githubusercontent.com/18749057/56147602-90056b80-5fe3-11e9-8b72-69a109715183.png)

```mysql
# 한 개만 가져오기
SELECT * FROM `comment` where idx = 1;
```
![image](https://user-images.githubusercontent.com/18749057/56147642-a14e7800-5fe3-11e9-9a5c-8ea90a0c25c0.png)


```mysql
# 여러 개 가져오기
SELECT * FROM `comment` where idx in (1, 3, 5);
```
![image](https://user-images.githubusercontent.com/18749057/56147678-b2978480-5fe3-11e9-93c8-161dac4a5c4d.png)

```mysql
# 5보다 작으면서 1이 아닌 모든 데이터 가져오기
SELECT * FROM `comment` where idx != 1  and idx < 5
```
![image](https://user-images.githubusercontent.com/18749057/56147802-deb30580-5fe3-11e9-8cd7-dd402505cd85.png)


```mysql
# content에서 dol 검색하기
SELECT * FROM `comment` where `content` like '%dol%'
```
![image](https://user-images.githubusercontent.com/18749057/56147889-1c179300-5fe4-11e9-9add-0a427f5331ab.png)

**이 외에도 굉장히 많은 SELECT 명령어가 있습니다. 이것들은 추후에 정리하도록 하겠습니다.**

### 데이터 수정
```mysql
UPDATE `comment` SET `content` = 'test2' where idx = 1; # 단일 컬럼 수정
UPDATE `comment` SET `content` = 'test', reg_date = '2018-04-16' where idx = 1; # 다중 컬럼 수정
```
![image](https://user-images.githubusercontent.com/18749057/56147992-55e89980-5fe4-11e9-9881-30392d7c8aa6.png)

1번에 해당하는 데이터가 수정된 것을 확인할 수 있습니다.

### 데이터 삭제
```mysql
DELETE FROM `comment` WHERE idx = 1; # 단일 컬럼 삭제
DELETE FROM `comment` WHERE idx < 5; # 다중 컬럼 삭제 (1)
DELETE FROM `comment` WHERE idx in (6, 9, 15); # 다중 컬럼 삭제 (2)
```
![image](https://user-images.githubusercontent.com/18749057/56148198-b972c700-5fe4-11e9-87e7-e8da8283c850.png)

1, 5, 6, 9, 15번에 해당하는 데이터가 삭제된 것을 확인할 수 있습니다.

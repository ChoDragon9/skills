## MySQL 기본 명령어
```mysql
# 테이블 생성
create [table] (
  [column] [type] [option]
  ...
)
```
### 댓글 목록 테이블 만들기
댓글에 필요한 데이터 컬럼
1. 댓글 번호 `idx`
2. 내용 `content`
3. 작성일 `reg_date`

### 테이블 설계
```mysql
create comment (
  `idx` int auto_increment,
  `content` text,
  `reg_date` datetime,
  primary key (`idx`)
)
```
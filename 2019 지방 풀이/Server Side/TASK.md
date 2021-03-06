### 메뉴구성
Todo Blog는 아래와 같은 메뉴로 구성 한다. 각 메뉴는 요구하는 접근권한에 따라 사용자 의 접근을 제한다.
#### 사용자 권한
- 관리자 : AD
- 회원 : MP
- 비회원 : AN

#### 메뉴 권한
- 로그인 : AN
- 회원가입 : AN
- 내 블로그 : MP
- 블로그관리 : MP, AD

### 프로젝트와 작업설명
개발자는 제공된 레이아웃(Layout폴더)을 사용하여 요청하는 기능을 제작개발 한다. 제공된 파일은 개발자가 수정이 가능하다. 단 레이아웃 디자인을 변경 하여서는 안 된다.

#### [로그인]
- 비회원만 접근가능하고 이외 사용자가 접근시 경고 메시지를 보여주고 Main페이지로 이동한다.
- 회원의 아이디와 비밀번호를 입력하고 로그인 버튼을 클릭하면 정상적으로 로그인 된다.
- 회원정보와 일치하지 않는 아이디와 비밀번호로 로그인시 경고 메시지를 보여주고 Main 페이지로 이동한다.
- 로그인 후 로그인 메뉴는 로그아웃으로 변경된다.
- 메뉴의 로그아웃을 클릭하면 세션을 종료하고 로그아웃 되며 로그아웃 메뉴는 로그인으로 변경된다.

#### [회원가입]
- 비회원만 접근가능하고 이외 사용자가 접근시 경고 메시지를 보여주고 Main페이지로 이 동한다.
- 회원가입에 필요한 정보를 입력 받을 수 있는 폼이 제공되었다. 사용자가 아이디, 비밀번 호, 이름, 닉네임을 입력 하고 아래와 같은 형식의 이상 유무를 검사 후 회원가입 버튼을 클릭하면 정상적으로 회원가입이 완료된다.
    - 아이디 [이메일 형식]
    - 비밀번호 [영문숫자조합 5글자 이상]
    - 이름 [한글/영문]
    - 닉네임 [한글/영문/숫자 6글자 이하, 단 숫자만은 허용 안됨]
- 회원가입 후 Main페이지로 이동된다.
- 관리자 아이디는 admin, 비밀번호는 1234 이다.

#### [내 블로그]
- 비회원이 해당 메뉴 접근 시 “로그인 후 사용가능 합니다.” 메시지를 보여주고 로그인 페 이지로 이동한다.
- 회원이 해당 메뉴 접근 시 자신의 블로그 페이지로 접속한다. 블로그 페이지는 제공된 [myblog.html] 레이아웃 파일을 사용하여 새로운 창에서 열리도록 제작한다.
- 회원의 ID를 주소로 하는 고유 블로그URL을 제공하고 새로운 브라우저 창에서 이 URL로 접속하면 해당 회원의 블로그로 접속된다.
> 예) 회원ID가 userid인 경우
  블로그URL = http://127.0.0.1/userid/ 또는 http://localhost/userid/
  
- 블로그 메뉴에는 회원이 등록한 메뉴와 해당 메뉴에 등록 된 게시물 수가 보여 진다. 
- 메뉴를 클릭하면 해당 메뉴에 등록된 게시판의 게시물 리스트가 보여 진다. 만약 해당 메 뉴에 게시판이 등록되어 있지 않다면 “게시판이 등록되지 않은 메뉴입니다.” 메시지를 보여준다.
- 회원은 게시판에 글을 작성할 수 있고 본인이 작성한 글을 수정, 삭제 할 수 있다. 
- 자신의 블로그가 아닌 경우 게시판 글을 작성, 수정, 삭제 하면 “자신의 블로그만 게시물을 작성, 수정, 삭제 할 수 있습니다.” 메시지를 보여주고 글에 대한 처리를 하지 않는다.
- 회원은 답글을 작성할 수 있다. 답글 작성 후 게시물 리스트는 계층적으로 보여 진다.
- 회원은 글보기에서 해당 글에 댓글을 작성할 수 있고 본인이 작성한 댓글을 수정, 삭제 할 수 있다.
- 글보기에서 해당 글의 댓글 리스트가 작성 순 으로 모두 보여 진다. - 관리자는 모든 게시물과 댓글을 수정, 삭제 할 수 있다.

#### [블로그관리]
- 비회원이 해당 메뉴 접근 시 “로그인 후 사용가능 합니다.” 메시지를 보여주고 로그인 페 이지로 이동한다.
- 메뉴등록에서 메뉴를 등록 할 수 있다.(단, 기존 등록된 메뉴 이름과 동일한 메뉴를 등록 할 수 없다.)
- 메뉴관리는 메뉴등록에서 등록된 메뉴리스트가 등록 순으로 모두 보여 지고 메뉴리스트의 콤보박스에서 회원이 등록한 게시판 아이디를 선택 하고 등록 버튼을 클릭하면 해당 메뉴 에 선택한 게시판이 등록 된다.
- 메뉴관리에서 메뉴리스트의 삭제 버튼을 클릭하면 해당 메뉴가 삭제된다.
- 게시판등록에서 게시판을 생성할 수 있다. 게시판 아이디 입력하고 등록하기 버튼을 클릭 하면 정상적으로 등록 된다. 만약 회원이 등록한 게시판 중 아이디가 중복되면 등록을 제
한 한다. (단, 게시판 아이디는 영문과 숫자만 입력 가능 하다)
- 게시판리스트에서는 게시판등록에서 등록된 게시판리스트가 등록 순으로 모두 보여 지고
게시판리스트의 삭제 버튼을 클릭하면 해당 게시판과 게시물 데이터가 모두 삭제된다.
- 회원리스트 영역은 관리자로 로그인 한 경우에만 보여 진다.
- 회원리스트에는 관리자가 접근 시 회원리스트 모두 보여 진다. 리스트에는 아이디, 이름,
닉네임, 블로그URL, 삭제에 대한 정확한 정보를 보여준다.
- 회원리스트에서 “회원삭제”버튼을 클릭하면 해당 “정말삭제 하시겠습니까?” 메시지를 보
여주고 확인 버튼을 클릭하면 해당 회원과 해당회원의 모든 정보(블로그포함)가 정상적으 로 삭제된다.


#### [시스템요구사항]
- 코드는 가독성이 좋고 유지보수에 용이 하도록 쉽게 정리되고 적절한 주석이 포함 되었 다.
- 제공된 Layout폴더의 레이아웃이 사용 되었다.
- 디렉토리(폴더) 구조를 잘 조직하였다.
- 사용자 친화적인 URL(user-friendly URL)을 사용한다.
    - 잘못된 예) http://todo-blog.com?page=info
    - 잘된예)
        - http://todo-blog.com/info 또는
        - http://odo-blog.com/info.html
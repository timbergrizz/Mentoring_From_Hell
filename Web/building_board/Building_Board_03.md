 #Mentoring_Web #DB&PHP
이제 댓글 관리를 추가해야한다. 댓글 표시와 작성은 view 페이지 안에서 이루어져야 하고, 수정만 다른 페이지에서 이루어져야 한다. 

![](./img/3-01.png)

![](./img/3-02.png)

![](./img/3-03.png)

![](./img/3-04.png)

우선 뷰 페이지에 폼을 만들고, 만들어진 sql을 확인하는 코드를 작성했다. 

![](./img/3-05.png)

![](./img/3-06.png)

![](./img/3-07.png)

Sql 확인하는 코드로 쿼리를 완성시켰고, 정상적으로 생성되는 모습이다. 
이제 create는 됐으니 read를 해보도록 하자. read는 view 파일 단에서 이루어져야 한다.

![](./img/3-08.png)

![](./img/3-09.png)


댓글 표시창도 만들었다. 이제 수정 삭제만 하면되는데, 왜이렇게 힘드냐.

![](./img/3-10.png)

![](./img/3-11.png)

![](./img/3-12.png)


댓글 삭제부터 구현 했다. 이게 더 쉽기 때문.

![](./img/3-13.png)

![](./img/3-14.png)

댓글 수정도 구현이 완료된 모습이다. 문서가 끝으로 갈수록 성의가 없어진다. 사실 할 얘기가 별로 없었다 댓글은, 게시판을 만드는 과정에서 생성한 함수들을 이용해 충분히 만들 수 있었기 때문이다. 이거 모듈화 시키라고 하면 멘토링 나가야하나?

원래 파일 업로드 / 다운로드 구현까지가 과제였는데 아파치님께서 맛탱이가 가주셔서 끝났다. 소감을 좀 쓰자면, 음... 의외로 게시판 만드는건 쉬웠다. 세션도 그냥 올려만 두면 알아서 해결되는 문제였고, 나의 실수의 의한 문제가 아니라면 크게 시간을 잡아먹는 문제 자체가 아예 없었다.
그리고 든 생각이지만, 완전히 새로운 서비스는 없는 것 같다. 기존의 서비스들을 조합하여 작업을 하는게 약 70%는 될 것 같다. 그만큼 이미 만들어진 코드도 많고. 여튼 그러하다. 좀 아쉽다 파일 업 / 다운로드 구현을 못해서. 이런걸로 빼긴 싫은데.
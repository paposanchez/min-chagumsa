<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posts')->delete();
        
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'board_id' => 1,
                'user_id' => 1,
                'category_id' => 1,
                'is_secret' => NULL,
                'is_answered' => 0,
                'is_shown' => 1,
                'thumbnail' => NULL,
                'subject' => '\'옥자\' 측 "틸다 스윈튼·제이크 질렌할 내한, 조율중"',
            'content' => '서울=연합뉴스) 노효동 이상헌 김승욱 기자 = 문재인 대통령은 2일 "국내 정치는 소통하며 풀면 되지만 외교 문제는 걱정이고 당면 과제이니 반기문 전 사무총장께서 경험과 지혜를 빌려주셨으면 좋겠다"고 말했다.

문 대통령은 이날 청와대에서 반 전 총장과 오찬을 한 자리에서 이같이 언급하며 "앞으로도 새 정부의 외교 정책 수립과 외교 현안해결에 많은 조언을 부탁한다"고 밝혔다고 박수현 청와대 대변인이 브리핑에서 전했다.

문 대통령이 당선 이후 반 전 총장을 만난 것은 이번이 처음으로, 반 전 총장은 지난 4월 8일 미국으로 출국했다가 전날 일시 귀국했다.

이날 오찬은 예정된 70분을 훌쩍 넘긴 1시간 50분간 진행됐으며, 당면한 외교 현안에 대한 깊이 있는 대화가 이어졌다고 박 대변인은 밝혔다.

반 전 총장은 "새 정부 출발을 잘하셔서 국민 지지를 크게 받고 계시고, 미국 조야에서도 높은 평가와 기대를 한다"며 "문 대통령께서 어느 때보다 한반도 상황 등 힘든 여건에 처해 있어 잠 못 이루시는 밤이 많으시겠지만 지금 국민 지지도 높고 잘하고 계시다고 생각한다"고 말했다.

그러면서 "주로 버락 오바마 정부 인사들이기는 하지만 미국에서 만난 인사들도 한국에 대한 걱정을 많이 하면서도 취임 초부터 국민 지지를 높게 받는 새 정부에 대해 기대가 많다"고 덧붙였다.

반 전 총장은 이달 말 예정된 한미정상회담과 관련, "정중하면서도 당당하게 임하는 게 좋다. 한미동맹이 초석이라는 인식을 해야 한다"며 "북핵에 대한 한미 간 공통분모를 잘 활용하는 게 좋겠다. 북핵 문제를 포괄적·단계적·근원적으로 풀어가겠다는 문 대통령의 철학은 미국과 같은 입장이며, 북한 문제와 관련해 초기에는 미국과 긴밀히 협의하며 북한에 원칙적 자세 보여주는 게 중요하다"고 조언했다.',
            'name' => '나이름',
            'email' => 'test@test.com',
            'password' => '123',
            'hit' => 0,
            'ip' => '0.0.0.0',
            'created_at' => '2017-06-01 22:55:12',
            'updated_at' => '2017-06-02 16:03:21',
            'deleted_at' => NULL,
        ),
        1 => 
        array (
            'id' => 2,
            'board_id' => 1,
            'user_id' => 2,
            'category_id' => 2,
            'is_secret' => NULL,
            'is_answered' => 0,
            'is_shown' => 1,
            'thumbnail' => NULL,
            'subject' => '르노삼성, 9월출시 클리오 \'삼성 엠블럼 버리나\'',
            'content' => '내용입니다.2',
            'name' => '너이름',
            'email' => 'test2@test2.com',
            'password' => '123',
            'hit' => 0,
            'ip' => '0.0.0.0',
            'created_at' => '2017-06-01 22:55:12',
            'updated_at' => '2017-06-02 10:40:38',
            'deleted_at' => NULL,
        ),
        2 => 
        array (
            'id' => 3,
            'board_id' => 1,
            'user_id' => 3,
            'category_id' => 2,
            'is_secret' => NULL,
            'is_answered' => 0,
            'is_shown' => 1,
            'thumbnail' => NULL,
            'subject' => '밀려드는 주문에..현대차 아이오닉 \'실종 사건\'',
            'content' => '내용입니다.3',
            'name' => '마동석',
            'email' => 'test2@test2.com',
            'password' => '123',
            'hit' => 0,
            'ip' => '0.0.0.0',
            'created_at' => '2017-06-01 22:55:12',
            'updated_at' => '2017-06-02 10:40:38',
            'deleted_at' => NULL,
        ),
        3 => 
        array (
            'id' => 4,
            'board_id' => 1,
            'user_id' => 1,
            'category_id' => 2,
            'is_secret' => NULL,
            'is_answered' => 0,
            'is_shown' => 1,
            'thumbnail' => NULL,
            'subject' => '\'공휴일 적은 6월 노린다\'..파격 할인 이벤트 경쟁',
            'content' => '내용입니다.4',
            'name' => '김영철',
            'email' => 'test2@test2.com',
            'password' => '123',
            'hit' => 0,
            'ip' => '0.0.0.0',
            'created_at' => '2017-06-01 22:55:12',
            'updated_at' => '2017-06-02 10:40:38',
            'deleted_at' => NULL,
        ),
        4 => 
        array (
            'id' => 5,
            'board_id' => 1,
            'user_id' => 5,
            'category_id' => 2,
            'is_secret' => NULL,
            'is_answered' => 0,
            'is_shown' => 1,
            'thumbnail' => NULL,
            'subject' => '일론 머스크, 트럼프에 뿔났다 "자문단 탈퇴"',
            'content' => '내용입니다.5',
            'name' => '허경환',
            'email' => 'test2@test2.com',
            'password' => '123',
            'hit' => 0,
            'ip' => '0.0.0.0',
            'created_at' => '2017-06-01 22:55:12',
            'updated_at' => '2017-06-02 10:40:38',
            'deleted_at' => NULL,
        ),
        5 => 
        array (
            'id' => 6,
            'board_id' => 1,
            'user_id' => 1,
            'category_id' => 2,
            'is_secret' => NULL,
            'is_answered' => 0,
            'is_shown' => 1,
            'thumbnail' => NULL,
            'subject' => '지역의 이름을 담은 자동차들',
            'content' => '내용입니다.6',
            'name' => '조성모',
            'email' => 'test2@test2.com',
            'password' => '123',
            'hit' => 0,
            'ip' => '0.0.0.0',
            'created_at' => '2017-06-01 22:55:12',
            'updated_at' => '2017-06-02 10:40:38',
            'deleted_at' => NULL,
        ),
        6 => 
        array (
            'id' => 7,
            'board_id' => 1,
            'user_id' => 1,
            'category_id' => 2,
            'is_secret' => NULL,
            'is_answered' => 0,
            'is_shown' => 1,
            'thumbnail' => NULL,
            'subject' => '자동차 리콜, 갈수록 늘어날 수밖에 없는 이유',
        'content' => '반값\'에 아이스크림을 판매한다는 아이스크림 할인점이 인기다. 이들은 아이스크림을 권장소비자가격에서 50% 이상 할인된 가격에 판매한다. 대체 얼마에 아이스크림을 공급받길래 이렇게 싸게 팔 수 있을까?  복수의 아이스크림 할인점 프랜차이즈 관계자들은 할인점 판매가는 공급가(할인점이 아이스크림을 들여오는 가격)에서 30% 정도 마진을 붙여 책정된다고 설명했다.  반값 아이스크림 어떻게 싸게 팔까  800원으로 표시된 \'메가톤바\'를 아이스크림 할인점에서는 300~400원에 판다. 편의점에서 1,300원에 판매하는 \'설레임\'의 아이스크림 할인점 가격은 650원이다. 그야말로 권장소비자가격대비 \'반값\'이다.  어떻게 이렇게 싸게 팔까? 이유는 간단하다. 아이스크림을 반값에 팔아도 이윤이 남을 만큼 공급받는 가격이 싸다는 것이다.  한 아이스크림 할인점 프랜차이즈 관계자는 "우리가 특별히 싸게 아이스크림을 공급받는 것은 아닐 것"이라면서 "할인점 판매가격은 공급가 대비 30% 정도 마진을 붙여 책정된다"고 설명했다. 다른 아이스크림 할인점 프랜차이즈 관계자도 "공급가 대비 33% 정도 마진이 붙어 판매가격이 정해진다"고 말했다.    예를 들어 돼지바 같은 800원짜리 바 형태 아이스크림의 경우 할인점이 제조사(빙과업체)나 유통업체에서 300원에 공급받아 100원의 이윤을 붙여 400원에 판매하는 식이다. 할인점의 이윤에는 할인점 운영비, 인건비 등이 포함돼 있다.  그런데 만약 300원에 공급받아 권장소비자가격인 800원에 판매한다면 500원이 남는다. 그러니까 편의점처럼 아이스크림을 권장소비자가격에 판매하는 소매점은 상대적으로 아이스크림 할인점보다 훨씬 많은 이익을 남긴다는 얘기다.  ',
            'name' => '조인성',
            'email' => 'test2@test2.com',
            'password' => '123',
            'hit' => 0,
            'ip' => '0.0.0.0',
            'created_at' => '2017-06-01 22:55:12',
            'updated_at' => '2017-06-02 16:15:15',
            'deleted_at' => NULL,
        ),
        7 => 
        array (
            'id' => 8,
            'board_id' => 1,
            'user_id' => 1,
            'category_id' => 2,
            'is_secret' => NULL,
            'is_answered' => 0,
            'is_shown' => 1,
            'thumbnail' => NULL,
            'subject' => '자동차, 넌 타니? 나는 난다..한국은 언제쯤',
            'content' => '지난해 시뻘건 래커로 도배됐던 박근혜 전 대통령 대구 생가터 조형물은 성난 민심의 상징이었다.

지역민의 분노를 비껴가지 못한 박 전 대통령의 생가터 표지판이 철거된 지 반년이 지났다.

그 사이 헌정 사상 첫 탄핵 대통령이라는 불명예를 안은 박 전 대통령은 청와대에서 쫓겨나 수감자 신세로 전락했다.

예언하듯 박 전 대통령보다 앞서 철퇴를 맞은 생가터 표지판은 다시 복원됐을까.

◇박수치며 세운 표지판…3년 8개월 만에 쫓기듯 철거',
            'name' => '강동건',
            'email' => 'test2@test2.com',
            'password' => '123',
            'hit' => 0,
            'ip' => '0.0.0.0',
            'created_at' => '2017-06-01 22:55:12',
            'updated_at' => '2017-06-02 16:05:09',
            'deleted_at' => NULL,
        ),
        8 => 
        array (
            'id' => 9,
            'board_id' => 1,
            'user_id' => 2,
            'category_id' => 2,
            'is_secret' => NULL,
            'is_answered' => 0,
            'is_shown' => 1,
            'thumbnail' => NULL,
            'subject' => '문재인 정부의 징벌적 손해배상, 자동차까지 가능할까?',
        'content' => '(포천=연합뉴스) 최재훈 기자 = 경기도 포천시 지장산에서 실종됐던 인도인 근로자가 실종 약 18시간만에 건강한 상태로 발견됐다.

2일 포천경찰서는 전날 실종됐던 A(43ㆍ인도국적)씨를 오후 1시께 지장산의 한 산길에서 발견했다.

A씨는 지난 1일 산악안내판 교체작업을 하러 지장산에 올랐다. 2인 1조로 작업하던 A씨는 오후 7시 30분께 작업을 마치고 산에서 내려오다 동료와 헤어진 직후 실종됐다.

이틀에 걸쳐 수색 작업을 하던 경찰은 A씨와 동료의 발자국을 발견하고 좇아 좁은 산길에 웅크리고 앉아 있는 A씨를 발견했다.

A씨는 동료와 헤어진 직후 길을 잃어 산을 헤맨 것으로 조사됐다. 다행히 밤에도 온도가 많이 떨어지지 않고, 마실 계곡 물도 주변에 있어 건강에는 큰 문제가 없는 것으로 전해졌다.

jhch793@yna.co.kr',
            'name' => '김우빈',
            'email' => 'test2@test2.com',
            'password' => '123',
            'hit' => 0,
            'ip' => '0.0.0.0',
            'created_at' => '2017-06-01 22:55:12',
            'updated_at' => '2017-06-02 16:04:41',
            'deleted_at' => NULL,
        ),
        9 => 
        array (
            'id' => 10,
            'board_id' => 1,
            'user_id' => 5,
            'category_id' => 2,
            'is_secret' => NULL,
            'is_answered' => 0,
            'is_shown' => 1,
            'thumbnail' => NULL,
            'subject' => '이 달 출시 예정인 \'혼다, 올 뉴 시빅\' 디자인과 성능은?',
        'content' => '(세종=연합뉴스) 민경락 기자 = 김상조 공정거래위원장 후보자는 2일 "지난 세월 동안 기업이나 정부로부터 연구비·사외이사 자리 등을 모두 거절해왔다"라고 말했다.

김 후보자는 이날 국회 정무위원회에서 열린 공정거래위원장 후보자 청문회에서 대기업을 비판하는 학자로서 특혜를 받은 것 아니냐는 의혹에 대해 이같이 밝혔다.

김 후보자는 "기업을 상대로 시민운동을 하는 동안 칼날 위에 서 있는 긴장감을 유지했다"라며 "특혜 시비에 얽히게 되면 저뿐만 아니라 시민단체 성과도 무너지는 것이기 때문에 철저히 관리하려고 노력했다"라고 말했다.

종합소득 신고 때 소액 강의료 수입 신고를 23%가량 누락했다는 지적에 대해서는 "누락률이 20%에 달한다는 것은 내가 아는 것과 다르다. 사실관계를 확인해보겠다"라고 답했다.

이어 "1년에 수십 건의 외부 강연·토론을 하는데 세무사 얘기를 들어봐도 지급자 사업자 번호 확인해서 홈택스에 일일이 기재하는 것이 쉬운 일이 아니다"며 "소득 누락이 있었더라도 의도한 것은 아니다"고 말했다.',
            'name' => '김현철',
            'email' => 'test2@test2.com',
            'password' => '123',
            'hit' => 0,
            'ip' => '0.0.0.0',
            'created_at' => '2017-06-01 22:55:12',
            'updated_at' => '2017-06-02 16:04:41',
            'deleted_at' => NULL,
        ),
        10 => 
        array (
            'id' => 11,
            'board_id' => 1,
            'user_id' => 4,
            'category_id' => 2,
            'is_secret' => NULL,
            'is_answered' => 0,
            'is_shown' => 1,
            'thumbnail' => NULL,
            'subject' => '막대한 돈 들여 전투기 도입..기술 이전 못 받은 이유는',
            'content' => '다가오는 6월 6일은 사실 현충일인데요. 몇년 전부터 이 날짜 숫자의 발음에서 \'고기 육\' 자가 좀 연상이 된다고. 이 시기에 고기 할인을 집중적으로 하는 곳들이 나오기 시작했습니다.

일단 국내 최대 대형마트가 오는 7일까지 일주일 동안, 한우 전 품목에 대해서 40% 할인해 줍니다.

한우 1플러스 등급 등심 100그램이, 최근 마트 소매가가 계속 8천원 대 후반이었는데, 5천100원에 나왔고요, 국거리랑 불고기가 2천990원. 양지가 4천700원대입니다.

또다른 대형마트에서는 항생제 테스트 같은 걸 거치는 농협 안심한우, 전 등급을 할인가로 내놨는데요. 안심한우로 1플러스 등심 100그램이 6천790원입니다.

그리고 요새 삼겹살값, 안 그래도 비싼데 또 계속 오르고 있다고 뉴스도 계속 나왔잖아요. 1등급 이상 삼겹살이랑 목심이 100그램당 1천690원에 나왔습니다.

특히 돼지고기는 지난해보다 물량을 30% 정도 늘렸다고 하니까, 주말에 오랜만에 가족들과 고기 구워드시고 싶은 분들 찾아 보셔도 좋을 것 같아요.

<앵커>

본격적으로 나들이 철이 되면서 항상 고기를 많이 먹을 때라서 많은 분들이 관심을 가지실 것 같습니다.

<기자>

네. 어제 대형 마트 정육코너에 사람이 정말 많더라고요. 한우를 할인하니까 좀 챙겨가신 분들이 자기는 원래 한우를 좋아하는데, 요새 수입산 점점 많이 드신다고 하면서 많이 사가셨습니다.

',
            'name' => '강민경',
            'email' => 'test2@test2.com',
            'password' => '123',
            'hit' => 0,
            'ip' => '0.0.0.0',
            'created_at' => '2017-06-01 22:55:12',
            'updated_at' => '2017-06-02 16:04:41',
            'deleted_at' => NULL,
        ),
        11 => 
        array (
            'id' => 12,
            'board_id' => 1,
            'user_id' => 3,
            'category_id' => 2,
            'is_secret' => NULL,
            'is_answered' => 0,
            'is_shown' => 1,
            'thumbnail' => NULL,
            'subject' => '"이건희 개인 돈"이라면서..삼성병원 공사비로 지출?',
            'content' => '권장소비자가격 제조사 마음대로 못 내려

\'반값 아이스크림\'이라는 말이 아이스크림을 직접 만드는 빙과업체 입장에서 달가울 리 없다. 소비자들이 아이스크림 가격을 못 믿게 되고, 아이스크림 가격에 거품이 끼어있다는 의미가 되기 때문이다.

이에 빙과업체는 권장소비자가격을 낮춰서라도 \'반값 아이스크림\'이라는 말을 없애고 싶은 입장이다. 하지만 권장소비자가격을 빙과업체 마음대로 하기도 어려운 상황이라는 게 문제다.

한 빙과업체 관계자는 "반값 아이스크림 문제 때문에 제조사 입장에서도 최근 몇 년간 권장소비자가격을 낮추려고 노력하고 있다"면서도 "하지만 마트 주인 같은 유통점주들의 목소리가 상대적으로 아이스크림 제조사보다 훨씬 큰 상황에서 권장소비자가격을 제조사 마음대로 낮추기는 어렵다"고 설명했다.

슈퍼마켓 등 마트에서는 \'아이스크림 반값 할인\' 등으로 아이스크림을 미끼 상품으로 쓰다 보니 아이스크림 가격이 높게 표시된 것이 유리하다. 때문에 유통점주들은 표시가격 자체를 낮추려는 제조사의 움직임에 반발할 수밖에 없다. 결국, 구조적으로 반값 아이스크림이 사라지기는 어려운 상황이다.

정재우기자 (jjw@kbs.co.kr)',
            'name' => '박보영',
            'email' => 'test2@test2.com',
            'password' => '123',
            'hit' => 0,
            'ip' => '0.0.0.0',
            'created_at' => '2017-06-01 22:55:12',
            'updated_at' => '2017-06-02 16:04:41',
            'deleted_at' => NULL,
        ),
        12 => 
        array (
            'id' => 13,
            'board_id' => 1,
            'user_id' => 2,
            'category_id' => 2,
            'is_secret' => NULL,
            'is_answered' => 0,
            'is_shown' => 1,
            'thumbnail' => NULL,
            'subject' => '"센서 기술, AI 플랫폼과 더 강력하게 융합"',
            'content' => '[2017 키플랫폼]<인터뷰>메튜 제일러 클라리파이 창업자 겸 CEO
[머니투데이 김상희 기자] [[2017 키플랫폼]<인터뷰>메튜 제일러 클라리파이 창업자 겸 CEO]

메튜 제일러 클라리파이 창업자 겸 CEO가 머니투데이와 인터뷰 하고 있다. /사진=정진우 기자
메튜 제일러 클라리파이 창업자 겸 CEO가 머니투데이와 인터뷰 하고 있다. /사진=정진우 기자
더 이상의 확인은 무의미하다. 마침내 AI(인공지능)는 현 시점 바둑 세계 최강자인 커제마저 압승으로 이기며, AI가 얼마나 뛰어날 수 있는지에 대한 논란의 마침표를 찍었다.

이제 AI가 "이 만큼이나 발전했구나"하고 놀랄 시점은 지났다. AI를 어떻게 인간의 삶에 유익하게 활용하느냐를 고민해야 할 시점이다.

머니투데이는 지난 4월 27~28일 서울 여의도 콘래드호텔에서 열린 글로벌 콘퍼런스 \'2017 키플랫폼\'에서 대혼란의 시대, 앞으로 3년 후 세계가 어떻게 변해갈지를 담은 \'2020 글로벌 시나리오\'를 발표했다. 글로벌 시나리오에서 2020년 미래를 결정지을 주요 요인으로 꼽은 것 중 하나가 디지털 경제 시대 진입에 따른 세상의 변화이며, 그 중심에 AI가 있었다.

머니투데이가 글로벌 시나리오를 위해 만난 AI 전문가 중 한 명인 미국의 이미지 인식 전문 기업 \'클라리파이\'의 메튜 제일러 창업자 겸 CEO(최고경영자)와의 인터뷰를 통해 AI의 미래에 대해 들어봤다.

-AI가 발전할 수록 인간의 일자리를 빼앗을 것이라는 우려가 있다. 이에 대해 어떻게 생각하나.
▶AI가 인간의 능력을 더욱 강화시켜 줄 것이다. 더 정교하면서도 빠른 작업이 가능해 지고 인간이 잘하지 못하는 작업도 할 수 있도록 돕게 될 것이라는 의미다. 반복적이고 규칙적인 업무는 더 이상 존재하지 않게 될 것이다.

-AI가 가장 유용하게 활용될 분야는 어디인가.
▶이제 어느 곳이나 이미지 또는 비디오 콘텐츠가 있다. 클라리파이도 의료, 여행, 결혼, 물류, SNS(사회관계망서비스), 브랜드 분석, 소비자, 미디어 등 같은 많은 산업 분야의 고객을 보유하고 있다. 또한 지속적으로 다른 산업에 대한 확장도 추구한다. AI는 모든 곳에서 있을 것이다. 이로 인해 경제 성장이 가속화 하고 사회 개선에 도움이 될 것이다.

-AI 외에 산업 패러다임을 변화시킬 만한 파괴적인 기술이 있다면?
▶향후 10년 동안 로보틱스 분야가 크게 개선될 것이다. 다만 아직은 인간을 대체 할 수 있을만큼 충분히 가격이 싸지는 않다는 문제가 있다. 또 다른 분야로는 센서 분야다. 시각, 음성, 촉각 등을 더 정밀하게 인식하는 다양한 시도가 진행되고 있고, 여전히 개선해야 할 부분도 많다. 센서 기술이 발달할 수록 AI 플랫폼으로 더욱 강력하게 융합될 것으로 예상한다.

-혁신 기술에서 가장 앞선 국가 또는 기업은 어디인가.
▶미국이다. 구글, 애플, 마이크로소프트, 페이스북, 아마존 등 많은 기업이 혁신에서 앞서가고 있다. 이 외에도 영국 런던이 AI 관련 많은 시도가 있으며, 한국, 중국, 일본도 많은 흥미로운 기술을 보유하고 있어 혁신 측면에서 빠른 속도로 성장하고 있다.

김상희 기자 ksh15@mt.co.kr',
            'name' => '김민희',
            'email' => 'test2@test2.com',
            'password' => '123',
            'hit' => 0,
            'ip' => '0.0.0.0',
            'created_at' => '2017-06-01 22:55:12',
            'updated_at' => '2017-06-02 16:15:15',
            'deleted_at' => NULL,
        ),
        13 => 
        array (
            'id' => 14,
            'board_id' => 1,
            'user_id' => NULL,
            'category_id' => NULL,
            'is_secret' => NULL,
            'is_answered' => 3,
            'is_shown' => 5,
            'thumbnail' => NULL,
        'subject' => '강경화 "북핵 해결 최우선..위안부 합의 의아스러워"(상보)',
        'content' => '<figure class="figure_frm origin_fig" dmcf-pid="nO6KH7Hkg0" dmcf-ptype="figure" style="margin-right: auto; margin-bottom: 30px; margin-left: auto; display: table; padding: 0px; clear: left; max-width: 100%; color: rgb(51, 51, 51); font-family: AppleSDGothicNeo-Regular, "Malgun Gothic", "맑은 고딕", dotum, 돋움, sans-serif; font-size: 17px; letter-spacing: -0.34px;"><p class="link_figure" style="margin-bottom: 0px; padding: 0px; position: relative;"><img alt="강경화 외교부장관 후보자가 7일 오전 서울 여의도 국회 외교통일위원회에서 열린 인사청문회에 출석해 관계자와 대화를 하고 있다. 2017.6.7/뉴스1 © News1 박세연 기자" class="thumb_g" dmcf-mid="nvArfOIWVs" dmcf-mtype="image" height="1035" src="http://img3.daumcdn.net/thumb/R658x0.q70/?fname=http://t1.daumcdn.net/news/201706/07/NEWS1/20170607111348558fspm.jpg" width="1400" style="border-style: none; vertical-align: top; display: block; max-width: 100%; margin: 0px auto; width: 658px; height: auto;"></p><figcaption class="txt_caption default_figure" style="margin: 11px auto 0px; font-size: 13px; line-height: 18px; color: rgb(145, 145, 145); max-width: 100%; display: table-caption; caption-side: bottom; word-break: break-word;">강경화 외교부장관 후보자가 7일 오전 서울 여의도 국회 외교통일위원회에서 열린 인사청문회에 출석해 관계자와 대화를 하고 있다. 2017.6.7/뉴스1 © News1 박세연 기자</figcaption></figure><p dmcf-pid="nJ5BbNS7rv" dmcf-ptype="general" style="margin-top: 35px; margin-bottom: 19px; padding: 0px; color: rgb(51, 51, 51); font-family: AppleSDGothicNeo-Regular, "Malgun Gothic", "맑은 고딕", dotum, 돋움, sans-serif; font-size: 17px; letter-spacing: -0.34px;">(서울=뉴스1) 정은지 기자,이정호 기자 = 강경화 외교부장관 후보자가 북핵문제 해결을 최우선 외교안보 정책으로 내세웠다.</p><p dmcf-pid="nBtaHTpATE" dmcf-ptype="general" style="margin-bottom: 19px; padding: 0px; color: rgb(51, 51, 51); font-family: AppleSDGothicNeo-Regular, "Malgun Gothic", "맑은 고딕", dotum, 돋움, sans-serif; font-size: 17px; letter-spacing: -0.34px;">또한 국익을 중심으로 한 동맹국 및 주변국과의 협력외교의 필요성을 강조하면서도 한일 위안부 합의에 대해서는 우회적으로 비판했다.</p><p dmcf-pid="nSx98dxh1p" dmcf-ptype="general" style="margin-bottom: 19px; padding: 0px; color: rgb(51, 51, 51); font-family: AppleSDGothicNeo-Regular, "Malgun Gothic", "맑은 고딕", dotum, 돋움, sans-serif; font-size: 17px; letter-spacing: -0.34px;">강경화 후보자는 7일 국회에서 열린 인사청문회에서 "북핵문제는 우리 국민의 생존에 직결되는 문제로 평화로운 한반도 구현을 위해 최우선적으로 해결돼야 할 과제"라며 "능동적이고 주도적인 노력을 펼쳐 나가야 한다"고 밝혔다.</p><p dmcf-pid="nXE3OaavYq" dmcf-ptype="general" style="margin-bottom: 19px; padding: 0px; color: rgb(51, 51, 51); font-family: AppleSDGothicNeo-Regular, "Malgun Gothic", "맑은 고딕", dotum, 돋움, sans-serif; font-size: 17px; letter-spacing: -0.34px;">그는 "북한의 도발에 대해 단호하게 대응할 것이며 북한의 핵미사일 능력 고도화 차단과 추가도발 억제를 위해 안보리 결의 등을 통한 국제 공조에 적극 참여하겠다"고 말했다.</p><p dmcf-pid="nSzkwPLpKw" dmcf-ptype="general" style="margin-bottom: 19px; padding: 0px; color: rgb(51, 51, 51); font-family: AppleSDGothicNeo-Regular, "Malgun Gothic", "맑은 고딕", dotum, 돋움, sans-serif; font-size: 17px; letter-spacing: -0.34px;">이어 "북한의 비핵화를 위해 대북 제재와 함께 대화 제개를 통한 공조 노력을 병행해 나갈 것"이라며 제제와 대화 병행을 강조했다.</p><p dmcf-pid="nZbdXv4ENP" dmcf-ptype="general" style="margin-bottom: 19px; padding: 0px; color: rgb(51, 51, 51); font-family: AppleSDGothicNeo-Regular, "Malgun Gothic", "맑은 고딕", dotum, 돋움, sans-serif; font-size: 17px; letter-spacing: -0.34px;">그는 우리나라의 독자적 제재 조치인 \'5.24\' 조치 해제 주장에 대해 "북핵 문제 해결을 위해 제재와 압박, 대화 등 모든 수단을 강구해야 한다"고 말했다.</p><p dmcf-pid="nbGZzSSvFS" dmcf-ptype="general" style="margin-bottom: 19px; padding: 0px; color: rgb(51, 51, 51); font-family: AppleSDGothicNeo-Regular, "Malgun Gothic", "맑은 고딕", dotum, 돋움, sans-serif; font-size: 17px; letter-spacing: -0.34px;">특히 강 후보자는 국제사회와 함께 해당 문제를 풀어나가겠다고 말했다. 그는 "다만 (5.24 조치) 이후 국제적 환경이 많이 변했기 때문에 긴밀한 공조 하에 주변국과 논의를 통해 국제사회의 지지를 받은 방향으로 해야한다"고 덧붙였다.</p><p dmcf-pid="nbRv0zPowh" dmcf-ptype="general" style="margin-bottom: 19px; padding: 0px; color: rgb(51, 51, 51); font-family: AppleSDGothicNeo-Regular, "Malgun Gothic", "맑은 고딕", dotum, 돋움, sans-serif; font-size: 17px; letter-spacing: -0.34px;">또한 "북한 주민과의 교류 취지는 공감하지만 그 방법에 있어 국제사회 제재틀이 훼손되지 않는 범위 내에서 이뤄져야 한다"며 "유엔을 통해 인도 지원을 모색하는 것이 첫 조치가 될 수 있다"고 언급했다.</p>',
            'name' => '테스터 신규',
            'email' => 'admin@2by.kr',
            'password' => 'asd#123',
            'hit' => 0,
            'ip' => '1.222.46.18',
            'created_at' => '2017-06-07 03:47:34',
            'updated_at' => '2017-06-07 03:47:34',
            'deleted_at' => NULL,
        ),
    ));
        
        
    }
}
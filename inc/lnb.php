<div class="lnb_wrap">
  <h2 class="lnb_title">
    <a href="javascript:void(0);" class="btn_local">지역캠페인</a>
    <ul class="depth02">
      <h4>전체지역</h4>
      <li>
        <a href="./campaignList.php?search=<?=$search?>&cate1=서울&cate2=<?=$cate2?>&sort=<?=$sort?>">서울</a>
        <ul class="local_list">
          <li><a href="./campaignList.php?search=<?=$search?>&cate1=강남/논현/서초&cate2=<?=$cate2?>&sort=<?=$sort?>">강남 · 논현 · 서초</a></li>
          <li><a href="./campaignList.php?search=<?=$search?>&cate1=송파/잠실/강동&cate2=<?=$cate2?>&sort=<?=$sort?>">송파 · 잠실 · 강동</a></li>
          <li><a href="./campaignList.php?search=<?=$search?>&cate1=압구정/신사/교대/사당/삼성/선릉&cate2=<?=$cate2?>&sort=<?=$sort?>">압구정 · 신사 · 교대 · 사당 · 삼성 · 선릉</a></li>
          <li><a href="javascript:void(0);">노원 · 강북 · 수유 · 동대문</a></li>
          <li><a href="javascript:void(0);">종로 · 대학로 · 명동 · 이태원</a></li>
          <li><a href="javascript:void(0);">홍대 · 마포 · 은평 · 신촌 · 이대</a></li>
          <li><a href="javascript:void(0);">관악 · 신림 · 동작</a></li>
          <li><a href="javascript:void(0);">여의도 · 영등포 · 강서 · 목동</a></li>
        </ul>
      </li>
      <li>
        <a href="javascript:void(0);">경기 · 인천</a>
        <ul class="local_list">
          <li><a href="javascript:void(0);">인천 · 부천 · 부평</a></li>
          <li><a href="javascript:void(0);">파주 · 김포 · 의정부 · 남양주</a></li>
          <li><a href="javascript:void(0);">가평 · 양평 · 여주</a></li>
          <li><a href="javascript:void(0);">하남 · 광주</a></li>
          <li><a href="javascript:void(0);">성남 · 용인 · 분당 · 수원</a></li>
          <li><a href="javascript:void(0);">기타 경기</a></li>
        </ul>
      </li>
      <li>
        <a href="javascript:void(0);">기타 지역</a>
        <ul class="local_list">
          <li><a href="javascript:void(0);">대전 · 충청</a></li>
          <li><a href="javascript:void(0);">대구 · 경북</a></li>
          <li><a href="javascript:void(0);">부산 · 경남</a></li>
          <li><a href="javascript:void(0);">광주 · 전라</a></li>
          <li><a href="javascript:void(0);">세종</a></li>
          <li><a href="javascript:void(0);">울산</a></li>
          <li><a href="javascript:void(0);">강원</a></li>
          <li><a href="javascript:void(0);">제주 </a></li>
        </ul>
      </li>
    </ul>
  </h2>
  <ul class="lnb">
    <li class="on"><a href="javascript:void(0);">전체</a></li>
    <li><a href="javascript:void(0);">맛집</a></li>
    <li><a href="javascript:void(0);">뷰티</a></li>
    <li><a href="javascript:void(0);">숙박</a></li>
    <li><a href="javascript:void(0);">문화</a></li>
    <li><a href="javascript:void(0);">기타</a></li>
  </ul>
  <span class="lnb_bar"></span>
</div>
<div class="snb_wrap">
  <ul class="snb">
    <li class="pc_sns"><a href="javascript:void(0);" class="btn_sns_all">전체</a></li>
    <li class="pc_sns"><a href="javascript:void(0);" class="btn_blog">블로그</a></li>
    <li class="pc_sns"><a href="javascript:void(0);" class="btn_insta">인스타그램</a></li>
    <li class="pc_sns"><a href="javascript:void(0);" class="btn_youtube">유튜브</a></li>
    <li class="m_select">
      <div class="select">전체</div>
      <ul class="depth02 array_select1">
        <li>
          <div class="option">
            <input type="radio" name="group" id="blog" checked>
            <label for="blog"><span>블로그</span></label>
          </div>
        </li>
        <li>
          <div class="option">
            <input type="radio" name="group" id="insta">
            <label for="insta"><span>인스타그램</span></label>
          </div>
        </li>
        <li>
          <div class="option">
            <input type="radio" name="group" id="youtube">
            <label for="youtube"> <span>유튜브</span></label>
          </div>
        </li>
      </ul>
    </li>
    <li class="select_wrap">
      <div class="select">최신순</div>
      <ul class="depth02 array_select">
        <li>
          <div class="option">
            <input type="radio" name="group1" id="new" checked>
            <label for="new"><span>최신순</span></label>
          </div>
        </li>
        <li>
          <div class="option">
            <input type="radio" name="group1" id="popular">
            <label for="popular"><span>인기순</span></label>
          </div>
        </li>
        <li>
          <div class="option">
            <input type="radio" name="group1" id="deadline">
            <label for="deadline"> <span>마감순</span></label>
          </div>
        </li>
        <li>
          <div class="option">
            <input type="radio" name="group1" id="sel_High">
            <label for="sel_High"> <span>선정 높은순</span></label>
          </div>
        </li>
        <li>
          <div class="option">
            <input type="radio" name="group1" id="sel_deadline">
            <label for="sel_deadline"> <span>선정 마감순</span></label>
          </div>
        </li>
      </ul>
    </li>
  </ul>

    </div>
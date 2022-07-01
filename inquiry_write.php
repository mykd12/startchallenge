<!DOCTYPE html>
<html lang="ko">
<?php include_once("inc/mainVO.php"); ?>
<head>
  <?php include("inc/head.php");?>
	<script type="text/javascript" src="./mgr/SE/js/HuskyEZCreator.js" charset="utf-8"></script>
</head>

<body>
  <div id="wrapper">
    <!----- 헤더 시작 ----->
    <?php include("inc/header.php"); ?>
    <!-----  메인 시작 ----->
    <main id="main" class="sub_main mypage_01 mypage_02 reviews inquiry_write campaignView">
      <div class="sub_inner">
        <div class="top_cp">
          <!-- 문의내용 시작-->
          <section class="section1">
            <h2 class="con_ti">1:1 문의하기</h2>
            <!-- 내용시작 -->
            <div class="content on">
              <form id="inqWrite_form" name="frm">
								<input type="hidden" name="mode" id="mode" value="<?=$mode?>"/>
								<input type="hidden" name="MET_IDX" id="MET_IDX" value="<?=$MET_IDX?>"/>
								<input type="hidden" name="QNT_IDX" id="QNT_IDX" value="<?=$QNT_IDX?>"/>
                <div class="row ti_wrap">
                  <div class="select_box">
                    <select class="inq_select" title="카테고리" id="QNT_CATE1" name="QNT_CATE1">
                      <option value="">문의 유형 선택</option>
                      <option value="캠페인 관련" <?if($QNT_CATE1=='캠페인 관련'){ echo "selected"; }?>>캠페인 관련</option>
                      <option value="서비스 이용" <?if($QNT_CATE1=='서비스 이용'){ echo "selected"; }?>>서비스 이용</option>
                      <option value="광고 문의" <?if($QNT_CATE1=='광고 문의'){ echo "selected"; }?>>광고 문의</option>
                      <option value="회원탈퇴 문의" <?if($QNT_CATE1=='회원탈퇴 문의'){ echo "selected"; }?>>회원탈퇴 문의</option>
                    </select>
                  </div>
                  <div class="ti_box">
                    <input type="text" title="제목" placeholder="제목을 입력해주세요." name="QNT_TITLE" id="QNT_TITLE" value="<?=$QNT_TITLE?>">
                  </div>
                </div>
                <div class="row text_box">
                  <textarea title="내용" rows="15" name="QNT_CONTENT"
                    id="QNT_CONTENT"><?if($mode=='QNINSERT'){?>■ 캠페인명 :	<br/><br/><br/>■ 문의내용 :	<?}else{?><?=$QNT_CONTENT?><?}?></textarea>
                </div>
                <div class="btn_box">
                  <a href="javascript:void(0);" class="btn_emt" id="SAVE_BTN" style="padding:7px 30px;" ><?if($mode=='QNINSERT'){ echo "등록하기"; }else{ echo "수정하기"; }?></a>
                  <a href="myInquiry.php?pageNo=<?=$pageNo?>" class="btn_list">목록으로</a>
                </div>
            </div>
            <!--//inquiry-form-container-->
            </fieldset>
            </form>
          </section>
          <? include("inc/my_side.php"); ?>
        </div>
      </div>
    </main>
    <!-- 모바일하단메뉴 -->
    <? include("inc/bottom_menu.php"); ?>
    <!----- 푸터 시작 ----->
    <? include("inc/footer.php"); ?>
    <!-- top버튼 -->
    <div id="gotop">
      <a href="javascript:void(0);" class="btn_top"><i class="xi-angle-up-thin"></i><span>TOP</span></a>
    </div>
  </div>

</body>

</html>
<script type="text/javascript">
<!--
	$(document).ready(function(){
		//전역변수선언
		var editor_object = [];

		nhn.husky.EZCreator.createInIFrame({
			oAppRef: editor_object,
			elPlaceHolder: "QNT_CONTENT",
			sSkinURI: "./mgr/SE/SmartEditor2Skin.html",
			htParams : {
				// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
				bUseToolbar : true,
				// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
				bUseVerticalResizer : true,
				// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
				bUseModeChanger : true,
			}
		});

		$("#SAVE_BTN").click(function(){
			//id가 smarteditor인 textarea에 에디터에서 대입
			editor_object.getById["QNT_CONTENT"].exec("UPDATE_CONTENTS_FIELD", []);
			var ir1 = $("#QNT_CONTENT").val();
			
			if($("#QNT_CATE1").val() ==""){
				var QNT_CATE1 = document.getElementById("QNT_CATE1");
				QNT_CATE1.focus();
				alert("문의 유형을 선택 해주세요.");
				return false;
			}

			if($("#QNT_TITLE").val() ==""){
				var QNT_TITLE = document.getElementById("QNT_TITLE");
				QNT_TITLE.focus();
				alert("문의 제목을 입력 해주세요.");
				return false;
			}


			if(ir1 =="" || ir1 == null || ir1 == '&nbsp;' || ir1 == '<p>&nbsp;</p>'){
				var QNT_CONTENT = document.getElementById("QNT_CONTENT");
				editor_object.getById["QNT_CONTENT"].exec("FOCUS");
				alert("문의 내용을 입력 해주세요.");
				return false;
			}

			var action = "../inc/mainDAO.php";
			//폼 submit
			$('#inqWrite_form').attr("enctype","multipart/form-data");
			$('#inqWrite_form').attr("action",action);
			$('#inqWrite_form').attr('action',action).attr('method', 'post').submit();
			return true;
		});

	});

//-->
</script>

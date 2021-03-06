<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wx2f3a32d7659540d0", "724b2c25abf17a825ecb870098a6194a");
$signPackage = $jssdk->GetSignPackage();

$counterFile = "counter.txt";
if (!file_exists($counterFile))
{
    file_put_contents($counterFile, 0);
}
$num = intval(file_get_contents($counterFile));
$num ++;
file_put_contents($counterFile, $num);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width ,initial-scale=1.0,maximum-scale=1.0,user-scalable=0;" />
	<meta name="sharecontent" data-msg-img="http://game.hisihi.com/solo/area/images/home/sharelogo.png" data-msg-title="轰炸设计师" data-msg-content="轰炸设计师" data-msg-callBack="" data-line-img="http://game.hisihi.com/solo/area/images/home/sharelogo.png" data-line-title="轰炸设计师" data-line-callBack=""/>
	<meta name="description" content="在15秒之内，答对题目累计积分。连击翻倍，答对加分，答错不扣分题目无上限,比比你的反应力吧！" />
	<meta name="keywords" content="嘿设汇,反应力,ps快捷键" />
    <title>轰炸设计师</title>
	<link href="area/css/home.css" rel="stylesheet/less" />
	<script src="area/js/less-1.3.3.min.js"></script>
</head>
<body>
  <img src="http://game.hisihi.com/solo/area/images/home/sharelogo1.png" id="noAttentionImg" height="0" width="0"/>
  <div class="wrapper">
        <div class="contentWrapper wrapperItem">
             <div class="aboutGameNotice btnsItem"></div>
            <div class="header">
                <div class="gameTitle"></div>
            </div>
            <div class="btnsContents">
                <div class="btns">
                    <div class="startGame btnsItem"></div>
                    <div class="showRecord btnsItem"></div>
                </div>
            </div>
            <div class="footer"></div>
            <div class="gameNotice">
                <div class="closeGameNotice btnsItem"></div>
                <p>在30秒之内，</p>
                <p>答对题目累计积分，</p>
                <p>连击翻倍，答对加时1s，答错扣时3s。</p>
                <p>题目无上限，比比你的反应力吧！</p>
            </div>
            <div class="gameRecords">
                <div class="closeGameRecords btnsItem"></div>
                <div class="gameRecordsContent">
                    <table><tbody></tbody></table>
                    <p>第一次玩吧，一边自个儿玩去！</p>
                </div>
            </div>
        </div>
        <div class="gameContentWrapper wrapperItem">
            <div class="gameContentHeader"><div class="questionNum">第&nbsp;<span id="totalDoneQuestionsNum">1</span>&nbsp;题</div></div>
            <div class="gameContentPeople"></div>
            <div class="gameContentTime"><span></span><label class="timeDetailInfo"></label></div>
            <div class="moreInfoSeeHisihi"><a href="http://www.hisihi.com/download.php" target="_blank"></a></div>
            <div class="gameContentQuestion"><p>在ps中，ctrl+v是复制的快捷键么</p></div>
            <div class="doubleHitInfo"><p>&nbsp;×<span class="doubleHitNums"></span>&nbsp;</p></div>
            <div class="wrongAnsweInfo"></div>
            <div class="rightAnsweInfo"></div>
            <div class="gameContentBtns">
                    <div class="btnYes btnsItem"></div>
                    <div class="btnNo btnsItem"></div>
            </div>
        </div>

        <div class="gameOverWrapper wrapperItem">
            <div class="gameResultPanel">
                <div class="scoresWrapper">
                    <div class="scoresLevel scoreLevelHide"></div>
                    <div class="scroresBg"><p>本局累计积分</p><p><span id="totalScores"">0</span>分</p></div>
                    <div class="scroresDescription">
                        <p>你已超过 &nbsp;&nbsp;<span id="defeatPeopleCounts"></span>&nbsp;&nbsp;名设计师</p>
                        <p>获得&nbsp;&nbsp;<span id="yourHonor"></span>&nbsp;&nbsp;称号！！</p>
                    </div>
                    <div class="gameResultBtns">
                        <div class="shareToFriends btnsItem"></div>
                        <div class="oneMoreTime btnsItem"></div>
                    </div>
                </div>
            </div>
			<div class="shareToFriendsTips"></div>
            <div class="gameOverAndTips gameOverAndTipsHide">
               <div class="showCorrectAnswers"><a href="http://www.hisihi.com/download.php" target="_blank"></a></div>
                <div class="showCorrectAnswersPerson"></div>
            </div>
            <div class="gameOverFooter"><a href="http://hisihi.com" target="_blank"></a></div>
        </div>

    </div>
	<script src="area/js/jquery-1.8.2.min.js"></script>
    <script src="area/js/prefixfree.min.js"></script>
    <script src="area/js/home.js"></script>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
  /*
   * 注意：
   * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
   * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
   * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
   *
   * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
   * 邮箱地址：weixin-open@qq.com
   * 邮件主题：【微信JS-SDK反馈】具体问题
   * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
   */
  wx.config({
    debug: false,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
        'checkJsApi','chooseImage','onMenuShareAppMessage','onMenuShareQQ','onMenuShareWeibo','onMenuShareQZone','onMenuShareTimeline'
    ]
  });
  wx.ready(function () {
    // 在这里调用 APIs
    wx.onMenuShareAppMessage({
      title: '轰炸设计师', // 分享标题
      desc: '不服来solo！！！', // 分享描述
      link: 'http://game.hisihi.com/solo/start.php', // 分享链接
      imgUrl: 'http://game.hisihi.com/solo/area/images/home/sharelogo.png', // 分享图标
      type: 'link', // 分享类型,music、video或link，不填默认为link
      dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
	  trigger:function(){
		this.desc= '噢耶！我得到了 '+ window.shareGameResults.levelName + ' 等级，获得了" ' + window.shareGameResults.scorcesName + '" 的称号，已超过 ' + window.shareGameResults.defeatNum + ' 名设计师，不服来solo！！！';
	  },
      success: function () {
        // 用户确认分享后执行的回调函数
      },
      cancel: function () {
        // 用户取消分享后执行的回调函数
      }
    });
	
	wx.onMenuShareQQ({
      title: '轰炸设计师', // 分享标题
      desc: '不服来solo！！！', // 分享描述
      link: 'http://game.hisihi.com/solo/start.php', // 分享链接
      imgUrl: 'http://game.hisihi.com/solo/area/images/home/sharelogo.png', // 分享图标
	  type: 'link', // 分享类型,music、video或link，不填默认为link
      dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
	  trigger:function(){
		this.desc= '噢耶！我得到了 '+ window.shareGameResults.levelName + ' 等级，获得了" ' + window.shareGameResults.scorcesName + '" 的称号，已超过 ' + window.shareGameResults.defeatNum + ' 名设计师，不服来solo！！！';
	  },
      success: function () {
        // 用户确认分享后执行的回调函数
      },
      cancel: function () {
        // 用户取消分享后执行的回调函数
      }
    });
	
	wx.onMenuShareWeibo({
      title: '轰炸设计师', // 分享标题
      desc: '不服来solo！！！', // 分享描述
      link: 'http://game.hisihi.com/solo/start.php', // 分享链接
      imgUrl: 'http://game.hisihi.com/solo/area/images/home/sharelogo.png', // 分享图标
	  type: 'link', // 分享类型,music、video或link，不填默认为link
      dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
	  trigger:function(){
		this.desc= '噢耶！我得到了 '+ window.shareGameResults.levelName + ' 等级，获得了" ' + window.shareGameResults.scorcesName + '" 的称号，已超过 ' + window.shareGameResults.defeatNum + ' 名设计师，不服来solo！！！';
	  },
      success: function () {
        // 用户确认分享后执行的回调函数
      },
      cancel: function () {
        // 用户取消分享后执行的回调函数
      }
    });

    wx.onMenuShareQZone({
      title: '轰炸设计师', // 分享标题
      desc: '不服来solo！！！', // 分享描述
      link: 'http://game.hisihi.com/solo/start.php', // 分享链接
      imgUrl: 'http://game.hisihi.com/solo/area/images/home/sharelogo.png', // 分享图标
	  type: 'link', // 分享类型,music、video或link，不填默认为link
      dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
	  trigger:function(){
		this.desc= '噢耶！我得到了 '+ window.shareGameResults.levelName + ' 等级，获得了" ' + window.shareGameResults.scorcesName + '" 的称号，已超过 ' + window.shareGameResults.defeatNum + ' 名设计师，不服来solo！！！';
	  },
      success: function () {
        // 用户确认分享后执行的回调函数
      },
      cancel: function () {
        // 用户取消分享后执行的回调函数
      }
    });
	
	wx.onMenuShareTimeline({
      title: '轰炸设计师', // 分享标题
      link: 'http://game.hisihi.com/solo/start.php', // 分享链接
      imgUrl: 'http://game.hisihi.com/solo/area/images/home/sharelogo.png', // 分享图标	 
	  trigger:function(){
		this.title= '轰炸设计师 ——— 噢耶！我得到了 '+ window.shareGameResults.levelName + ' 等级，获得了" ' + window.shareGameResults.scorcesName + '" 的称号，已超过 ' + window.shareGameResults.defeatNum + ' 名设计师，不服来solo！！！';
	  },
      success: function () {
        // 用户确认分享后执行的回调函数
      },
      cancel: function () {
        // 用户取消分享后执行的回调函数
      }
});
	
	wx.checkJsApi({
      jsApiList: ['chooseImage','onMenuShareAppMessage'], // 需要检测的JS接口列表，所有JS接口列表见附录2,
      success: function(res) {
        // 以键值对的形式返回，可用的api值true，不可用为false
        // 如：{"checkResult":{"chooseImage":true},"errMsg":"checkJsApi:ok"}
      }
    });
  });

/*  weixin://contacts/profile/wxe567cacaccd3a88f*/

  wx.error(function(res){
    // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。
  });


</script>
</html>

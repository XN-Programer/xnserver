<?php
namespace Home\Controller;
use Think\Controller;

Class ScoreController extends CommonController {
    Public function index() {
        $grade = $_SESSION['UserGrade']; //得到成绩
        $nowYear = date('Y');  //当前年份
        $endIndex = $nowYear - $grade + 1; //数组长度是 ：当前年份-年级 + 1 
        $xn = array();
        $xn[0] = '请选择学年';
        $startYear = $nowYear - 1;
        $endYear = $nowYear;
        for ($i=1, $tmp=0; $i < $endIndex; $i++) { 
            $xn[$i] = $startYear-- . '-' . $endYear--;
        }
        $this->assign('xn',$xn)->display();
    }

    Public function getScore() {
        $ak = C('ak');  //获取ak config.php中已经配置
        $userId = $_SESSION['UserCardCode']; //接口需要
        $CardCode = $userId;
        $StuCode = $_SESSION['UserCardCode'];   //并不清楚接口为什么要两个相同的参数 --。
        $XN = null;
        $XQ = null;
        $sign = md5("userId=" . $userId . "CardCode=" . $StuCode . "XN=" . $XN . "XQ=" . $XQ . $ak);

        //不得已才这么刚！
        $url ='http://app.hnis.org/MUIInterface.asmx/ResultsQuery?callback=loadCJ_JsonpCallback&userId=' . $userId . '&CardCode=' . $CardCode . '&XN=&XQ=&ak=' . $ak . '&sign=' . $sign . '&_=1489828870784';

        $result = file_get_contents($url);
        //由于得到的json串比较乱所以需要处理，方法比较死板，但是能用，希望日后学弟能用更好的办法解决
        $result = substr($result, 21);
        $reslen = strlen($result);
        $result = substr($result, 0, $reslen-1);
        $data = json_decode($result, true);
        return $data;
    }

    Public function handle() {
        // if (!IS_AJAX) halt("页面不存在");
        $cjarr = array(
                'xn' => I('xn'),
                'xq' => I('xq')
            );
        /*$cjarr = array(
                'xn' => '2016-2017',
                'xq' => '秋季'
            );*/
        $data = $this->getScore();

        $cj = array();

        if ($data['Status']) {

            for ($i=0; $i < $data['rowCount']; $i++) { 
                if ($cjarr['xn'] == $data['rList'][$i]['XN'] && $cjarr['xq'] == $data['rList'][$i]['XQ']) {
                    $cj[$i] = $data['rList'][$i];
                }
            }
            
        } else {
            E('找不到你的成绩哦');
        }

        if (!empty($cj)) {
            // dump($cj);
            $cj = array_merge($cj);
            $this->AjaxReturn($cj);
        }
        
    }
}

?>
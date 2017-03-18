<?php
namespace Home\Controller;
use Think\Controller;

Class ScoreController extends Controller {
    Public function index() {
        // $data = $this->getScore();
        // dump($data);
        // echo $data['rList'][0]['XM'];
        // dump($data.rList['0']['XM']);
        // die();
        // $this->assign('data',$data)->display();
        $this->display();


    }
    Public function getScore() {
        $ak = C('ak');  //获取ak config.php中已经配置
        $userId = $_SESSION['UserCardCode']; //接口需要
        $CardCode = $userId;
        $StuCode = $_SESSION['UserCardCode'];   //并不清楚接口为什么要两个相同的参数 --。
        $XN = null;
        $XQ = null;
        $sign = md5("userId=" . $userId . "CardCode=" . $StuCode . "XN=" . $XN . "XQ=" . $XQ . $ak);
        $url = C('url'). '/MUIInterface.asmx/ResultsQuery';

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
}

?>
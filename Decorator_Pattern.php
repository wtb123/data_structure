<?php
/**
 * 名称：装饰器模式
 * 如果已有对象的部分内容或功能发生改变，但是不需要修改原始对象的结构，那么
 * 使用装饰器设计模式最合适
 */
?>

<?php
class CD
{
    public $trackList;
    public function __construct()
    {
        $this->trackList=array();
    }

    public function addTrack($track)
    {
       $this->trackList[]=$track;
    }

    public function getTrackList()
    {
        $output='';
        foreach($this->trackList as $num=>$track)
        {
            $output.=($num+1)."){$track}.";
        }
        return $output;
    }
}

//为了使用这个CD对象，需要执行下面的代码
$tracksFromExternalSource=array('What It Means','brr','Goodbye');
$myCD=new CD();
foreach($tracksFromExternalSource as $track)
{
    $myCD->addTrack($track);
}
print "该CD包含如下曲目：".$myCD->getTrackList();
?>

<?php
//这时候需求发生了变动，要求输出的每一个音轨都要采用大写的形式，对于这样小的变化，
//最佳做法并非修改基类或者创建父-子关系，而是创建一个基于装饰器设计模式的对象
class CDTrackListDecoratorCaps
{
    private $_cd;
    public function __construct(CD $cd)
    {
        $this->_cd=$cd;
    }

    public function makeCaps()
    {
        foreach($this->_cd->trackList as & $track)
        {
            $track=strtoupper($track);
        }
    }
}

//如下所示，为了在原有实例中加入装饰器，需要添加新的CDTrackListDecoratorCaps类
$myCD=new CD();
foreach ($tracksFromExternalSource as $track)
{
    $myCD->addTrack($track);
}
$myCDCaps=new CDTrackListDecoratorCaps($myCD);
$myCDCaps->makeCaps();
print "该CD包含如下曲目：".$myCD->getTrackList();
?>

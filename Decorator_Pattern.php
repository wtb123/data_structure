<?php
/**
 * 名称：装饰器模式
 * 指在不改变现有对象结构的情况下，动态地给该对象增加其额外功能的模式
 * 使用装饰器设计模式最合适
 *
 * 应用场景：
 * 1.当需要给一个现有类添加附加职责，而又不能采用生成子类的方法进行扩充时。例如，该类被隐藏或者该类是终极类或者采用继承方式会产生大量的子类。
 * 2.当需要通过对现有的一组基本功能进行排列组合而产生非常多的功能时，采用继承关系很难实现，而采用装饰模式却很好实现。
 * 3.当对象的功能要求可以动态地添加，也可以再动态地撤销时。
 *
 * 笔记：
 * 1.已有专家认为继承不是最好的复用模式，因为有很多父类中的方法，属性并不是子类所需要的，而是在继承中被强制拥有的。
 * 所以为了避免这种情况，提倡把特定的功能封装到装饰器中，在自由组合使用，从而避免继承的先天问题
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

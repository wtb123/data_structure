<?php
/**
 *名称：工厂
 * 工厂模式提供获取某个对象的新实例的一个接口，
 * 同时调用代码避免确定实际实例化基类的步骤
 */
$type='enhanced';
$band='black panther';
$title='Good';
$tracksFromExternalSource=array('What It Means','Brrr','Goodbye');
$cd=CDFactory::create($type);
$cd->setBand($band);
$cd->setTitle($title);
foreach ($tracksFromExternalSource as $track)
{
    $cd->tracks[]=$track;
}
?>


<?php
class CD                          //CD类
{
    public $title='';            //标题
    public $band='';           //乐队名称
    public $tracks=array();   //曲目列表

    public function __construct()
    {}
    public function setTitle($title)
    {
        $this->title=$title;
    }
    public function setBand($band)
    {
        $this->band=$band;
    }
    public function addTack($track)
    {
        $this->tracks[]=$track;
    }

}
class enhancedCD extends CD    //增强型CD类
{
    public function __construct()
{
    $this->tracks[]='DATA TRACK';
}

}
class CDFactory          //CD工厂类，根据条件生产CD类或增强型CD类
{
    public static function create($type)
    {
        $class=strtolower($type)."CD";
        return new $class;
    }
}
?>



<?php
/**
 *名称：原型模式
 * 原型模式是一种创建型设计模式，创建对象的方式是复制和克隆初始对象或原型，
 * 这种方式比创建新的实列更为有效。
 */

/**
 * 原型模式的使用场景：
 * 1. 在需要一个类的大量对象的时候，使用原型模式是最佳选择，因为原型模式是在内存中对这个对象进行拷贝，
 *   要比直接new这个对象性能要好很多，在这种情况下，需要的对象越多，原型模式体现出的优点越明显。
 * 2.如果一个对象的初始化需要很多其他对象的数据准备或其他资源的繁琐计算，那么可以使用原型模式。
 * 3.当需要一个对象的大量公共信息，少量字段进行个性化设置的时候，也可以使用原型模式拷贝出现有对象的副本进行加工处理。
 */
class CD{
public $band='';
public $title='';
public $trackList=array();
public function __construct($id)
{
    $handle=mysql_connect('localhost','user','pass');
    mysql_select_db('CD',$handle);
    $query="SELECT band,title from CDs where id={$id}";
    $results=mysql_query($query,$handle);
    if($row=mysql_fetch_assoc($results))
    {
        $this->band=$row['band'];
        $this->title=$row['title'];
    }
}
public function but()
{
    //cd buying magic here
    var_dump($this);
}
}

class MixtapeCD extends CD{
    public function __clone()
    {
        $this->title='Maxtape';
    }
}
?>
<?php
$externalPurchaseInfoBandID=12;
$bandMixProto=new MixtapeCD($externalPurchaseInfoBandID);
$externalPurchaseInfo=array();
$externalPurchaseInfo[]=array('brrr','goodbye');
$externalPurchaseInfo[]=array('what it means','brrr');

foreach ($externalPurchaseInfo as $mixed)
{
    $cd=clone $bandMixProto;
    $cd->trackList=$mixed;
    $cd->buy();
}
?>

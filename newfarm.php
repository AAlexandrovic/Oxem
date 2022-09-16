<?php

abstract class FarmMethods
{

    abstract protected function registernumber($value);

    abstract protected function dayswork($values,$min,$max);

    abstract protected function addbeast($val);
}

class Farm  extends FarmMethods{

    public $a;////Массив из уникальных id животных
    public $count;
    public $day;
    public $uniq;


////метод для создания уникальных  id для всех животных
   protected function registernumber($value){


        foreach (range(1,$value) as $key=>$value){

            $value . $this->uniq .=",".uniqid();


        }
        $this->a = explode(",",$this->uniq);

        $this->count=count($this->a)-1;

    }
////метод подсчета произведённой продукции за день
    protected function dayswork($values,$min,$max)
    {
        $oneday = 0;
        foreach (range(1,$values) as $item){
            $oneday += mt_rand($min,$max);
        }

        return $this->day=$oneday;
    }


 ////метод для добавления новых животных  можно поставить по-умолчанию   $val = 1 тогда в контроллере метод нужно будет повторить нужно кол-во раз
    protected function addbeast($val){

        self::registernumber($val);

    }


}

class cows extends Farm{

    const name = "Коровы";
     function registernumber($value)
    {
        parent::registernumber($value);
    }
    function dayswork($values, $min, $max)
    {
        parent::dayswork($values, 8, 12);
    }
    function addbeast($val){
        parent::addbeast($val);
    }

    //Пример добавление других методов
//    function test()
//    {
//        echo "test";
//    }


}


class chikens extends Farm{

    const name = "Курицы";
    function registernumber($value)
    {
        parent::registernumber($value);
    }
    function dayswork($values, $min, $max)
    {
        parent::dayswork($values, 0, 1);
    }
    function addbeast($val){
        parent::addbeast($val);
    }
}




global $sum;/// глобальная переменная для сложения собранной продукции
$sum = array();
///Класс содержащий методы для вызова нужных функций
Class main
{

    public $a;
    public $b;
    public $weeksum;

//метод для изначальной инициализации скрипта
    function startfunction(Farm $farm,$value){
        $farm->registernumber($value);
    }
//метод для получения количества животных
    function getanimals(Farm $farm)
    {
        $this->a=$farm::name;
        $this->b=$farm->count;
        return true;
    }
//метод для подсчета количества собранной продукции за неделю
    function weekwork(Farm $farm,$min,$max)
    {

//    $farm->registernumber($value);

//    $farm->dayswork($farm->count,$min,$max);
        $weeksum=0;
        for ($i = 1; $i <= 7; $i++) {
            $farm->dayswork($farm->count,$min,$max);

            $weeksum += $farm->day;
        }


        return $this->weeksum = $weeksum;

    }
/// метод для добавления новых животных здесь я сделал для удобства возможность добавлять сразу несколько животных. В задании Сказано сделать добавление по одному, в таком случае нужно по умолчанию ставить аргумент функции =1 и делать 5 раз итерацию
    function addanimals(Farm $farm,$value)
    {
        $farm->addbeast($value);
    }
/// метод для добавления значений собранной продукции в глобальную переменную
    function globals()
    {
            $GLOBALS['sum'][]=$this->weeksum;

    }

}

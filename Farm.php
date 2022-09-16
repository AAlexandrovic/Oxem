<?php

///Функция выполняющая роль контроллера
function ScriptController($val,$val2,$val3)
{

    $main=new main;
    $main->startfunction($val,$val2);
    $main->getanimals($val);
    echo  "<br><br>Животные :".$main->a .";    Количество:".$main->b;
    $main->weekwork($val,null,null);
    echo "<br><br> Собрано продукции за первую неделю:";
    echo $firstweek=$main->weeksum;
    $main->globals();

    //@$_SESSION['a'].=$firstweek.",";
    echo "<br><br>После поездки на рынок:";
    if($val3>0) {
        $main->addanimals($val, $val3);
    }
    $main->getanimals($val);
    echo  "<br><br>Животные :".$main->a .";    Количество:".$main->b;
    $main->weekwork($val,null,null);
    echo "<br><br>Собрано продукции за вторую неделю:";
    echo $secondweek=$main->weeksum;
    $main->globals();
    //@$_SESSION['b'].=$secondweek.",";

    ////пример реализации других методов в контроллерe
    //    if($val=new cows){
//        $val->test();
//    }

}

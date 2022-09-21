<?php

namespace AppClasses\Catalog;

/**
 * Интерфейс ObjectToAdvert это что-либо (что можно рекламировать), 
 * реализующее метод getProportyMsg()
 * 
 * Основная причина реализации этого интерфейса заключается в том,
 * что мы можем еще больше расширить наш каталог,добавив новые классы 
 * которые реализуют метод getProportyMsg(), и которых 
 * можно рассматривать как объекты для рекламы.
 */
interface ObjectToAdvert
{
    function getProportyMsg(): string;
}

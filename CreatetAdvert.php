<?php
require_once "Advert.php";
require_once "ParseAdvert.php";
require_once "RentAdvert.php";


    function cut_num($num) {
        $num = (0+str_replace(",","",$num));

        if(!is_numeric($num)) {
            exit("Указан неверный формат данных!");
        } else {

            if ($num > 1000000000) return round(($num / 1000000000), 1) . ' миллиард.';
            else if ($num > 1000000) return round(($num / 1000000), 1) . ' миллион';
            else if ($num > 1000) return round(($num / 1000), 1) . ' тысяч';
        }
        return strval(number_format($num, thousands_separator: ' '));
    }

    function create_adds($adv) {
        $addCategory = $adv->getCategory();
        $addRooms = $adv->getRooms();
        $addType = $adv->getAdType();
        $addPrice = $adv->getPrice();



        $rename_category = match ($addCategory) {
            'sale' => "Продам",
            'rent' => "Сдам",
        };

        $rename_type = match ($addType) {
            'dom' => 'дом',
            'kvartira' => 'квартиру',
        };

        $num_room = match ($addType) {
            'dom' => "{$addRooms}-комнатный",
            'kvartira' => "{$addRooms}-комнатную",
        };

        $cut_num = cut_num($addPrice);

        $create_header = $rename_category . " " . $rename_type . " " . $num_room . " " . " за {$cut_num} тг";

        if ($addCategory === 'rent') {
            $addPeriod = $adv->getPeriod();
            $choice_period = match ($addPeriod) {
                'month' => 'в месяц',
                'day' => 'в сутки',
                'year' => 'в год'
            };
            $create_header .= " {$choice_period}";
        }

        return $create_header;
    }

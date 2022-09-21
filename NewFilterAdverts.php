<?php
require_once("InterfaceNewAdvertFilter.php");
require_once("FilterAdverts.php");


class NewFilterAdverts implements InterfaceNewAdvertFilter
{

    public function filter_adverts($adverts = null, $filter = null)
    {
        $tempAdverts = [];
        $defaultFilter = ['room' => ['start' => 0, 'end' => 9999], 'category' => false, 'price' => ['start' => 0, 'end' => 9999999999], 'type' => false, 'period' => false];
        if (is_array($adverts) && is_array($filter)) {
            $tempAdverts = [...$adverts];
            $filterOptions = [...$defaultFilter, ...$filter];

            if (is_array($filterOptions['room'])) {
                $filterClass = new FilterAdverts($tempAdverts);
                $tempAdverts = [...$filterClass->filter_by_room($filterOptions['room']['start'], $filterOptions['room']['end'])];
            }
            if ($filterOptions['category']) {
                $filterClass = new FilterAdverts($tempAdverts);
                $tempAdverts = [...$filterClass->filter_by_category($filterOptions['category'])];
            }
            if (is_array($filterOptions['price'])) {
                $filterClass = new FilterAdverts($tempAdverts);
                $tempAdverts = [...$filterClass->filter_by_price($filterOptions['price']['start'], $filterOptions['price']['end'])];
            }
            if ($filterOptions['type']) {
                $filterClass = new FilterAdverts($tempAdverts);
                $tempAdverts = [...$filterClass->filter_by_type($filterOptions['type'])];
            }
            if ($filterOptions['period']) {
                $filterClass = new FilterAdverts($tempAdverts);
                $tempAdverts = [...$filterClass->filter_by_period($filterOptions['period'])];
            }
        } else {
            echo "Объявления не переданы или параметры фильтра!";
        }
        return $tempAdverts;
    }
}

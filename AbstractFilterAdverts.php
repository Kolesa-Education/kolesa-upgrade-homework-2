<?php 
abstract class AbstractFilterAdverts
{

    abstract protected function filter_by_room($roomStart, $roomEnd);

    abstract protected function filter_by_category($category);

    abstract protected function filter_by_price($priceStart, $priceEnd);

    abstract protected function filter_by_type($type);

    abstract protected function filter_by_period($period);
}

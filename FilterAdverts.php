<?php

abstract class AbstractFilterAdverts
{

    abstract protected function filter_by_room($roomStart, $roomEnd);

    abstract protected function filter_by_category($category);

    abstract protected function filter_by_price($priceStart, $priceEnd);

    abstract protected function filter_by_type($type);

    abstract protected function filter_by_period($period);
}


class FilterAdverts extends AbstractFilterAdverts
{

    protected $allAdverts;

    public function __construct($adverts)
    {
        $this->allAdverts = $adverts;
    }

    public function filter_by_room($roomStart = 0, $roomEnd = 9999)
    {
        return array_filter($this->allAdverts, function ($advert) use ($roomStart, $roomEnd) {
            return $advert['rooms'] >= $roomStart && $advert['rooms'] <= $roomEnd;
        });
    }

    public function filter_by_category($category = null)
    {
        if (!is_null($category)) {
            return array_filter($this->allAdverts, function ($advert) use ($category) {
                return $advert['category'] === $category;
            });
        } else {
            return $this->allAdverts;
        };
    }

    public function filter_by_price($priceStart = 0, $priceEnd = 999999999999)
    {
        return array_filter($this->allAdverts, function ($advert) use ($priceStart, $priceEnd) {
            return $advert['price'] >= $priceStart && $advert['price'] <= $priceEnd;
        });
    }

    public function filter_by_type($type = null)
    {
        if (!is_null($type)) {
            return array_filter($this->allAdverts, function ($advert) use ($type) {
                return $advert['type'] === $type;
            });
        } else {
            return $this->allAdverts;
        }
    }

    public function filter_by_period($period = null)
    {
        if (!is_null($period)) {
            return array_filter($this->allAdverts, function ($advert) use ($period) {
                return array_key_exists('period', $advert) && $advert['period'] == $period;
            });
        } else {
            return $this->allAdverts;
        }
    }
}

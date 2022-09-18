<?php

interface Rentable
{
    public function getPeriod(): string;

    public function setPeriod(string $period): void;
}
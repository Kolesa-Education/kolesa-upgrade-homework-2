<?php

interface Ad {
    // Made interface for required methods implementing
    public function getCategory(): string;
    public function getAdType(): string;
    public function getPrice(): int;
}

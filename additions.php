<?php
    enum Category: string{
        case Sale = "sale";
        case Rent = "rent";
    }


    enum Type: string{
        case House = "dom";
        case Flat = "kvartira";
    }


    enum Period: string{
        case Month = "month";
        case Day = "day";
        case None = " ";

    }
?>
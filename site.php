<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


    <?php





    interface Advert{

      public function showTitle() :string;
    }

    class EstateAdvert implements Advert{
      public  $rooms;
      public  $category;
      public  $price;
      public  $type;


      public function __construct($r,$c,$p,$t){
        $this->rooms=$r;
        $this->category=$c;
        $this->price=$p;
        $this->type=$t;
      }


      public function showTitle() :string{
        return "I $this->category a $this->type with $this->rooms rooms for $this->price pounds ";
      }


    }


    class RentAdvert extends EstateAdvert{

      public $period;

      public function __construct($r,$p,$t,$period){
        parent::__construct($r,"rent",$p,$t);
        $this->period=$period;
      }


      public function showTitle() :string{
        return parent::showTitle() . "per $this->period";
      }

    }


    class SaleAdvert extends EstateAdvert{

      public $saletime;
      protected $documents;

      public function __construct($r,$p,$t,$saletime,$documents){
        parent::__construct($r,"sell",$p,$t);
        $this->saletime=$saletime;
        $this->documents = $documents;
      }


      public function showTitle() :string{
        return parent::showTitle() ."The offer is active for $this->saletime";
      }

    }

    $adverts = [
      ['rooms' => 5, 'category' => 'sell', 'price' => 55000000, 'type' => 'house','saletime'=>"6 months",'documents'=>"asdsadsada"],
      ['rooms' => 2, 'category' => 'sell', 'price' => 21500000, 'type' => 'flat','saletime'=>"5 days",'documents'=>"lklklklk"],
      ['rooms' => 2, 'category' => 'rent', 'price' => 200000, 'type' => 'flat', 'period' => 'month'],
      ['rooms' => 1, 'category' => 'rent', 'price' => 15000, 'type' => 'flat', 'period' => 'day'],
    ];



    $newAdArr =  array();

    for($i=0;$i<count($adverts);$i++){
      if($adverts[$i]["category"]=="sell")
        $newAdArr[$i]=new SaleAdvert($adverts[$i]["rooms"],$adverts[$i]["price"],$adverts[$i]["type"],$adverts[$i]["saletime"],$adverts[$i]["documents"]);

      elseif($adverts[$i]["category"]=="rent")
        $newAdArr[$i]=new RentAdvert($adverts[$i]["rooms"],$adverts[$i]["price"],$adverts[$i]["type"],$adverts[$i]["period"]);


    }



    for ($i=0; $i <count($newAdArr); $i++) {
      echo("<h2>Offer No. $i</h2>");
      echo( " <br>". $newAdArr[$i]->showTitle());
    }










    ?>




  </body>
</html>

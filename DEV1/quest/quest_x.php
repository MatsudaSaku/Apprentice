<?php
class VendingMachine
{
    public $name;
    public $coin = 0;
    public $cup = 1;

    public function pressButton($drink){

    if($this->cup > 0){
        if($this->coin > Item::$cola_price && $drink->product == 'cola'){
            $this->cup -= 1;
            return 'cola';
        }
        else if($this ->coin > Item::$cider_price && $drink->product == 'cider'){
            $this->cup -= 1;
            return 'cider';
        }
        else if($this ->coin > Item::$hotCupCofee_price && $drink->product == 'hot'){
            $this->cup -= 1;
            return 'hot cup cofee';
        }

        else{
            return '[]';
        }
    }
    else{
        return 'カップがありません。追加してください。';
    }

    }

    private function pressManufacturerName(){
        return $this->name;
    }

    public function __construct($company)
    {
       $this->name = $company;
    }
    
    public function depositCoin($coin){
        if($coin == 100){
            $this->coin += $coin;
        }
        else{
            return false;
        }
    }

    public function addCup($num){
        if($this->cup < 100){
            $this->cup += $num; 
        }
    }
}

/*$vendingMachine = new VendingMachine();
//echo $vendingMachine->pressButton();

//$vendingMachine = new VendingMachine('サントリー');
//echo $vendingMachine->pressManufacturerName();


$vendingMachine = new VendingMachine('サントリー');
echo $vendingMachine->pressButton();

$vendingMachine->depositCoin(150);
echo $vendingMachine->pressButton();

$vendingMachine->depositCoin(100);
echo $vendingMachine->pressButton();

try{
echo $vendingMachine->pressManufacturerName();
}catch(Exception $e){
   echo 'Caught exception:';
}
*/

class Item
{
    static $cola_price = 100;
    static $cider_price = 150;
    static $hotCupCofee_price = 100;
    public $product;

    public function getProduct() {
        return $this->product;
    }
    public function setProduct($choose) {
        return $this->product = $choose;
    }
}

/*$cola = new Item('cola');
$vendingMachine = new VendingMachine('サントリー');
$vendingMachine->depositCoin(100);
echo $vendingMachine->pressButton("cola");
$vendingMachine->depositCoin(100);
echo $vendingMachine->pressButton("cola");
*/

class Drink extends Item{
    public function __construct($choose){
        parent::setProduct($choose);
    }
}

class Cup extends Item{
    public $hot_ice;
    public function __construct($choose){
        parent::setProduct($choose) ;
    }
}

$hotCupCoffee = new Cup('hot');
$cider = new Drink('cider');
$vendingMachine = new VendingMachine('サントリー');
$vendingMachine->depositCoin(100);
$vendingMachine->depositCoin(100);
echo $vendingMachine->pressButton($cider);

echo $vendingMachine->pressButton($hotCupCoffee);
$vendingMachine->addCup(1);
echo $vendingMachine->pressButton($hotCupCoffee);
?>
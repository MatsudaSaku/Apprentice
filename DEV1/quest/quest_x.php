<?php
class VendingMachine
{
    public $name;
    public $coin = 0;

    public function pressButton($drink){
        if($this->coin > Item::$cola && $drink == 'cola'){
            return 'cola';
        }
        else if($this ->coin > Item::$cider && $drink == 'cider'){
            return 'cider';
        }
        else{
            return '[]';
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
    static $cola = 100;
    static $cider = 150;
}

$cola = new Item('cola');
$vendingMachine = new VendingMachine('サントリー');
$vendingMachine->depositCoin(100);
echo $vendingMachine->pressButton("cola");
$vendingMachine->depositCoin(100);
echo $vendingMachine->pressButton("cola");
?>
<?php
class VendingMachine
{
    public $name;
    public $coin;

    public function pressButton(){
        if($this->coin == 100){
        return 'cider';
        }
        else{
            return "[]";
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
            $this->coin = $coin;
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

}

$cola = new Item('cola');
$vendingMachine = new VendingMachine('サントリー');
$vendingMachine.depositCoin(100);
echo $vendingMachine.pressButton(cola);
$vendingMachine.depositCoin(100);
echo $vendingMachine.pressButton(cola);
?>
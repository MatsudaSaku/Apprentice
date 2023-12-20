<?php
class VendingMachine
{
    public $name;
    public $coin = 0;

    public function pressButton($drink)
    {
        if ($drink->cup > 0) {
            if ($this->coin > Item::$cola_price && $drink->drink == 'cola') {
                $drink->cup -= 1;
                return 'cola';
            } elseif ($this->coin > Item::$cider_price && $drink->drink == 'cider') {
                $drink->cup -= 1;
                return 'cider';
            } elseif ($this->coin > Item::$hotCupCofee_price && $drink->drink == 'hotCupCofee') {
                $drink->cup -= 1;
                return 'hot cup cofee';
            } else {
                return '[]';
            }
        } else {
            return 'カップがありません。追加してください。';
        }
    }

    private function pressManufacturerName()
    {
        return $this->name;
    }

    public function __construct($company)
    {
        $this->name = $company;
    }

    public function depositCoin($coin)
    {
        if ($coin == 100) {
            $this->coin += $coin;
        } else {
            return false;
        }
    }

    public function addCup($num)
    {
        if ($num->cup < 100) {
            $num->cup += 1;
        }
    }
}

class Item
{
    static $cola_price = 100;
    static $cider_price = 150;
    static $hotCupCofee_price = 100;
}

class Drink extends Item
{
    public $drink;
    public $cup;

    public function __construct($choose)
    {
        $this->drink = $choose;
        $this->cup = 0; // カップの初期化
    }
}

class Cup extends Item
{
    public $hot;

    public function __construct($choose)
    {
        $this->hot = $choose;
    }
}

$hotCupCoffee = new Cup('hot');
$cider = new Drink('cider');
$vendingMachine = new VendingMachine('サントリー');
$vendingMachine->depositCoin(100);
$vendingMachine->depositCoin(100);
echo $vendingMachine->pressButton($cider) . PHP_EOL;

echo $vendingMachine->pressButton($hotCupCoffee) . PHP_EOL;
$vendingMachine->addCup($hotCupCoffee);
echo $vendingMachine->pressButton($hotCupCoffee) . PHP_EOL;
?>

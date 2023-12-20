<?php
class VendingMachine
{
    public $name;
    public $coin = 0;
    public $cup = 1;

    public function pressButton($drink)
    {

        if ($this->coin > $drink->get_Price() && $drink->product == 'snack') {
            $this->coin -= $drink->get_Price();
            return 'potato chips';
        } else if ($this->coin < $drink->get_Price() && $drink->product == 'snack') {
            return 'お金が足りません。';
        } else {
            if ($this->cup > 0) {
                if ($this->coin > $drink->get_Price() && $drink->product == 'cola') {
                    $this->cup -= 1;
                    $this->coin -= $drink->get_Price();
                    return 'cola';
                } else if ($this->coin > $drink->get_Price() && $drink->product == 'cider') {
                    $this->cup -= 1;
                    $this->coin -= $drink->get_Price();
                    return 'cider';
                } else if ($this->coin > $drink->get_Price() && $drink->product == 'hot') {
                    $this->cup -= 1;
                    $this->coin -= $drink->get_Price();
                    return 'hot cup cofee';
                } else {
                    return 'お金が足りません。';
                }
            } else {
                return 'カップがありません。追加してください。';
            }
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
        if ($this->cup < 100) {
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
    public $cola_price = 100;
    public $cider_price = 150;
    public $hotCupCofee_price = 100;
    public $snack_price = 150;
    public $product;

    public function getcider()
    {
        return $this->cider_price;
    }

    public function gethot()
    {
        return $this->hotCupCofee_price;
    }

    public function getsnack()
    {
        return $this->snack_price;
    }

    public function getcola()
    {
        return $this->cola_price;
    }

    public function getProduct()
    {
        return $this->product;
    }
    public function setProduct($choose)
    {
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

class Drink extends Item
{
    public function get_Price()
    {
        return parent::getcider();
        //コーラと条件分岐をしてみたけど失敗。とりあえずサイダーだけ
    }

    public function __construct($choose)
    {
        parent::setProduct($choose);
    }
}

class Cup extends Item
{
    public $hot_ice;
    public function get_Price()
    {
        return parent::gethot();
    }
    public function __construct($choose)
    {
        parent::setProduct($choose);
    }
}

/*$hotCupCoffee = new Cup('hot');
$cider = new Drink('cider');
$vendingMachine = new VendingMachine('サントリー');
$vendingMachine->depositCoin(100);
$vendingMachine->depositCoin(100);
echo $vendingMachine->pressButton($cider);

echo $vendingMachine->pressButton($hotCupCoffee);
$vendingMachine->addCup(1);
echo $vendingMachine->pressButton($hotCupCoffee);
*/

class Snack extends Item
{
    public function get_Price()
    {
        return parent::getsnack();
    }
    public function __construct($choose)
    {
        parent::setProduct($choose);
    }
}

$hotCupCoffee = new Cup('hot');
$cider = new Drink('cider');
$snack = new Snack('snack');
$vendingMachine = new VendingMachine('サントリー');
$vendingMachine->depositCoin(100);
$vendingMachine->depositCoin(100);
echo $vendingMachine->pressButton($cider);

echo $vendingMachine->pressButton($hotCupCoffee);
$vendingMachine->addCup(1);
echo $vendingMachine->pressButton($hotCupCoffee);

echo $vendingMachine->pressButton($snack);
$vendingMachine->depositCoin(100);
$vendingMachine->depositCoin(100);
echo $vendingMachine->pressButton($snack);

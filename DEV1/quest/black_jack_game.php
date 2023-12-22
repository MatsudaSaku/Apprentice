<?php
//ゲームの制御、勝敗
class BlackJackGame{
    public $deck;
    public $player;
    public $dealer;
    public $card;

    public function __construct()
    {
        $this->deck = new Deck();
        $this->player = new Player();
        $this->dealer = new Dealer();
        $this->card = new Card();
    }

    public function gamestart()
    {
        echo 'ブラックジャックを開始します。'. PHP_EOL;
        $cntp = 0;
        $cntd = 0;

        $this->deck->DeckShuffle();

        $this->DrawPlayerHand();
        $this->player->GetHand($cntp);
        $cntp++;
        $this->DrawPlayerHand();
        $this->player->GetHand($cntp);
        $cntp++;

        $this->DrawDealerHand();
        $this->dealer->GetHand($cntd);
        $cntd++;
        $this->DrawDealerHand();
        $this->dealer->GetHand($cntd);
        $cntd++;

        $res = $this->player->DrawOrStand();

        while($res == 'y' || $res == 'Y') {
            $this->DrawPlayerHand();
            $this->player->GetHand($cntp);
            $cntp++;
            $res = $this->player->DrawOrStand();
        }

        
    }

    public function DrawPlayerHand(){
        
        $this->card->SetCard($this->deck);

        $this->player->SetPlayer($this->card);
        
    }

    public function DrawDealerHand(){
        
        $this->card->SetCard($this->deck);
        //var_dump($this->card);
        $this->dealer->SetDealer($this->card);
        //var_dump($this->player);
    }
}
//カード生成
class Card{
    public $suit;
    public $number;

    public function SetCard($deck){
        $cardNumber = $deck->GetDeck();
        //var_dump($cardNumber);
        $num = $this->CreateSuit($cardNumber);
        $this->CreatePictureCard($num);
        //var_dump($this->number);
        //var_dump($this->suit); 
    }

    public function CreatePictureCard($num){
        if($num == 1){
            $this->number = 'A';
        }
        else if($num == 11){
            $this->number = 'J';
        }
        else if($num == 12){
            $this->number = 'Q';
        }
        else if($num == 13){
            $this->number = 'K';
        }
        else{
            $this->number = $num;
        }
    }

    public function CreateSuit($num){
        if($num >= 1 && $num <= 13){
            $this->suit = 'クラブ'; 
            return $num;
        }
        else if($num >= 14 && $num <= 26){
            $this->suit = 'スペード';
            return $num -13;
        }
        else if($num >= 27 && $num <= 39){
            $this->suit = 'ダイヤ';
            return $num -26;
        }
        else{
            $this->suit = 'ハート';
            return $num -39;
        } 
    }

   

    public function GetSuit(){
        return $this->suit;
    }

    public function GetNumber(){
        return $this->number;
    }
}

//デッキの初期化
class Deck{
    public $deck;

    public function DeckShuffle(){
            $this->deck = range(1,52);
            shuffle($this->deck); 
            //確認用　var_dump($this->deck);
    }

    public function GetDeck(){
        //確認用　var_dump($this->deck);
        return array_shift($this->deck);
    }


}
//プレイヤーの得点、手札
class Player{
    public $hand = [];
    public $score = 0;

    public function SetPlayer($card){
        $this->hand []= $card;
        //var_dump($this->hand);
    }

    public function GetHand($turn){

        $card = $this->hand[$turn];
        echo 'あなたの引いたカードは'.$card->GetSuit().'の'.$card->GetNumber().'です。'. PHP_EOL;
        
        $score = $card->GetNumber();

        if($score == 'A'){
            $this->score += 1;
        }
        else if($score == 'J' || $score == 'Q' || $score == 'K'){
            $this->score += 10;
        }
        else{
            $this->score += $score;
        }
    }

    public function DrawOrStand(){
        if($this->score < 21){
        echo 'あなたの現在の得点は'.$this->score.'です。カードを引きますか？(Y/N)'. PHP_EOL;
        $res = trim(fgets(STDIN));
        return $res;
        }
    }

    /*public function GetHand(){
        foreach($this->hand as $card){
            echo 'あなたの引いたカードは'.$card->GetSuit().'の'.$card->GetNumber().'です。';
        }
    }
      */  




}
//ディーラーの得点、手札
class Dealer{
public $hand = [];
public $score = 0;

public function SetDealer($card){
    $this->hand []= $card;
    //var_dump($this->hand);
}

public function GetHand($turn){

    $card = $this->hand[$turn];

    if($turn != 1){
   
    echo 'ディーラーの引いたカードは'.$card->GetSuit().'の'.$card->GetNumber().'です。'. PHP_EOL;
    }
    else{
        echo 'ディーラーの引いた2枚目のカードはわかりません。'. PHP_EOL;
    }

    $cardnum = $card->GetNumber();

        if($cardnum == 'A'){
            $this->score += 1;
        }
        else if($cardnum == 'J' || $cardnum =='Q' || $cardnum =='K'){
            $this->score += 10;
        }
        else{
            $this->score += $cardnum;
        }
        var_dump($this->score);
}
}

$blackjack = new BlackJackGame();
$blackjack->gamestart();





/*始まってすぐにデッキを作成。
デッキ内からランダムに二枚プレイヤーとディーラーに手札を渡す。
カードを表示。
プレイヤーがカードをさらに引くか選ぶ。
ディーラーはランダム？
どちらが引いても、引いた時点でバーストか否かの判定。
互いに引かないを選んだ時に判定。
勝利者と得点の表示。
*/

?>
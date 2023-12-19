<body>
    <?php

    function hello()
    {
        for($i = 0; $i < 100; $i++){
            echo "こんにちは！\n";
        }
    }

    //hello();


    function sheep($n){
        for($i = 1; $i == $n; $i++){
            echo "羊が", $i , "匹\n";
        }
    }

    sheep(3);

    function sum_1_100(){
        $sum = 0;
        for($i = 1; $i<=100; $i++){
            $sum += $i;
        }

        echo $sum,"\n";
    }

    sum_1_100();


    function sum($x, $y){
        $sum = 0;
        for($i = $x; $i<=$y; $i++){
            $sum += $i;
        }

        echo $sum,"\n";
    }
    
    sum(10, 80);

    function fibonacci($n){

        if($n == 0){
             return 0;
        }
        else if ($n == 1){
             return 1;
        }
        else{
                return fibonacci($n - 1)+ fibonacci($n - 2);
            }
    }
    

    echo fibonacci(0),"\n";
    echo fibonacci(1),"\n";
    echo fibonacci(2),"\n";
    echo fibonacci(3),"\n";
    echo fibonacci(4),"\n";
    echo fibonacci(7),"\n";
    echo fibonacci(30),"\n";


    ?>
</body>
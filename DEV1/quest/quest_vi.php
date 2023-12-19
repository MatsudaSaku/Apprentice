<body>
    <?php

    function greater($x, $y)
    {
        if($x > $y){
            echo "x > y\n";
        }
        else if($x < $y){
            echo "x < y\n";
        }
        else
            echo "x == c\n";
    }

    greater(5, 4);
    greater(-50, -40);
    greater(10, 10);


    function train_fare($age)
    {
        if($age >= 12){
            echo "200\n";
        }
        else if($age >= 6){
            echo "100\n";
        }
        else{
            echo "0\n";
        }

    }

    train_fare(12);
    train_fare(6);
    train_fare(5);


    function Custom_Xor($x, $y)
    {
        if(($x == true && $y == true) || ($x == false && $y == false)){
            echo "false\n";
        }
        else{
            echo "true\n";
        }
    }

    Custom_Xor(true, true);
    Custom_Xor(true, false);
    Custom_Xor(false, true);
    Custom_Xor(false, false);

    ?>
</body>
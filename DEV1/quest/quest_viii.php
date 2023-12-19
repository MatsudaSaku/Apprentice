<body>
    <?php

    function print_names($names){
        foreach($names as $ID => $name){
            echo "{$ID}.{$name}\n";
        }
    }

    $names = [1=>'上田',2=>'田仲' ,3=>'堀田'];

    print_names($names);

    function custom_pow($number){
        return pow($number, 2);
    }

    function square($numbers){
        return array_map('custom_pow', $numbers);
    }

    $squared_numbers = square([5, 7, 10]);
    print_r($squared_numbers);


    function select_even_numbers($numbers){
        return array_filter($numbers, "odd");
    }

    function odd($var){
        if($var % 2 == 0){
            return true;
        }
        else{
            return false;
        }
    }

    $even_numbers = select_even_numbers([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
    print_r($even_numbers);
    ?>
</body>
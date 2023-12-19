<body>
    <?php

    function Custom_Time($s)
    {
    if($s >= 3600){
        echo floor($s / 3600).":";
        $s %= 3600;
    }
    else{
        echo "0:";
    }

    if($s >= 60){
        echo floor($s / 60).":";
        $s %=60;
    }
    else{
        echo "0:";
    }
    echo $s."\n";
    }

    $s = readline('秒単位の時間を入力してください。');

    Custom_Time($s);

    ?>
</body>
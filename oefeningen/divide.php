<?php
    

    $kinderen1 = 3;
    $kinderen2 = 11;
    $kinderen3 = 12;

    $pepernoten1 = 16;
    $pepernoten2 = 100;
    $pepernoten3 = 144;

    $first =  $pepernoten1 % $kinderen1;
    $second = $pepernoten2 % $kinderen2;
    $therd = $pepernoten3 % $kinderen3;

    $result1 = ($pepernoten1 -  $first) / $kinderen1 ;
    $result2 = ($pepernoten2 -  $second) / $kinderen2 ;
    $result3 = ($pepernoten3 -  $therd) / $kinderen3 ;



    echo " als we ".$pepernoten1. " pepernoten door " . $kinderen1. " kinderen verdelen, krijgt elke kind " . $result1 . " pepernoten en blijft " .  $first . " er over." ;
    echo "<br>";
    echo " als we".$pepernoten2. " pepernoten door " . $kinderen2. " kinderen verdelen, krijgt elke kind " . $result2 . " pepernoten en blijft " .  $second . " er over." ;
    echo "<br>";
    echo " als we".$pepernoten3. " pepernoten door " . $kinderen3. " kinderen verdelen, krijgt elke kind " . $result3 . " pepernoten en blijft " .  $therd . " er over." ;
?>

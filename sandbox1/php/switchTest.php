<?php

$params = [
    "highSchool" => "",
    "highSchoolDeviationValue" => "",
];

// var_dump($param);

foreach ($params as $key => $value) {
    // var_dump($key = $value);
    switch ($key) {
        case 'highSchool':
            // echo "ok";
            if ($value === "") {
                $value = null;
                echo "highSchool";
            }
        case 'highSchoolDeviationValue':
            if ($value === "") {
                $value = null;
                echo "highSchoolDeviationValue";

            }
            break;
    };
}

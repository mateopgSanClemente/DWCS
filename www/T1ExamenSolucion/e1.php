<?php

function isPar($input)
{
    $result = array();

    foreach ($input as $key => $value) {
        if (is_int($value)) {
            if ($value % 2 == 0) {
                $result[] = true;
            } else {
                $result[] = false;
            }
        } else {
            $result[] = false;
        }
    }

    return $result;
}

function isImpar($input)
{
    $result = array();
    
    foreach ($input as $key => $value) {
        if (is_int($value)) {
            if ($value % 2 != 0) {
                $result[] = true;
            } else {
                $result[] = false;
            }
        } else {
            $result[] = false;
        }
    }

    return $result;
}

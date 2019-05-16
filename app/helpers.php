<?php

if ( ! function_exists('getInstanceOf') ) {
    function getInstanceOf($class, $returnIdOnly = true) {
        $instance = $class::inRandomOrder()->first() ?? factory($class)->create();
        return $returnIdOnly ? $instance->id : $instance;
    }
}
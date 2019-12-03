<?php


namespace SimplifiedMagento\FirstModule\Model;


class HeavyService
{
    public function __construct()
    {
        echo "Heavy Service has been instantiated"."<br/>";
    }

    public function printProxyMessage() {
        echo "This is just for testing proxy message";
    }
}
<?php


namespace SimplifiedMagento\FirstModule\Plugin;


class PluginSolution
{
    public function beforeSetName(\Magento\Catalog\Model\Product $subject, $name) {
        return "Before Plugin: ". $name;
    }

//    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result) {
//        return $result . " After Plugin";
//    }
}
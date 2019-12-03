<?php


namespace SimplifiedMagento\HelloWorld\ViewModel;


use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class HelloView implements ArgumentInterface
{
    protected $product;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->product = $productRepository;
    }

    public function getProductName() {
        $product = $this->product->get('24-MB01');
        return $product->getName();
    }

    public function getHelloWorld() {
        return "This is form custom block";
    }

    public function getArray() {
        $array = ['Good', 'Very Good', 'Excellent'];
        return $array;
    }
}
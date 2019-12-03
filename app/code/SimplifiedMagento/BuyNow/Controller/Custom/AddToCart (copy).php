<?php

namespace SimplifiedMagento\BuyNow\Controller\Custom;

use Magento\Catalog\Model\Product;
use Magento\Checkout\Model\Cart;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Data\Form\FormKey;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Framework\Controller\ResultFactory;

class AddToCart extends Action
{
    protected $jsonFactory;
    protected $formKey;
    protected $cart;
    protected $product;
    protected $checkoutSession;
    private $quoteRepository;
    private $attributeRepository;

    /** @var \Magento\Catalog\Model\ProductRepository $productRepository */
    private $productRepository;

    public function __construct(
        JsonFactory $jsonFactory,
        FormKey $formKey,
        Cart $cart,
        Product $product,
        CheckoutSession $checkoutSession,
        \Magento\Quote\Model\QuoteRepository $quoteRepository,
        \Magento\Catalog\Model\ProductRepository $productRepository,
        \Magento\Catalog\Model\Product\Attribute\Repository $attributeRepository,
        Context $context)
    {
        $this->jsonFactory = $jsonFactory;
        $this->formKey = $formKey;
        $this->cart = $cart;
        $this->product = $product;
        $this->checkoutSession = $checkoutSession;
        $this->quoteRepository = $quoteRepository;
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;

        parent::__construct($context);
    }

    public function execute()
    {
        $resultJson = $this->jsonFactory->create();

        $response = array(
            'status'=>'error',
            'message'=>'Error, Please try again'
        );

        $params = $this->getRequest()->getParams();

        //$productId = $params['product'];

//        if($productId > 0)
//        {
//            try {
//
//                echo $this->checkoutSession->getQuoteId();
//                exit;
//
//                $allItems = $this->checkoutSession->getQuote()->getItemsCollection();
//                foreach ($allItems as $item) {
//                    $itemId = $item->getItemId();
//                    $this->cart->removeItem($itemId)->save();
//                }
//
//                $_product = $this->product->load($productId);
//                $this->cart->addProduct($_product, $params);
//                $this->cart->save();
//
//                $response['status'] = 'success';
//                $response['message'] = 'Product added to cart successfully.';
//            }
//            catch(\Exception $e) {
//                $response['message'] = $e->getMessage();
//            }
//        }
//
//        return $resultJson->setData($response);

        $allItems = $this->checkoutSession->getQuote()->getItemsCollection();
        foreach ($allItems as $item) {
            $itemId = $item->getItemId();
            $this->cart->removeItem($itemId)->save();
        }

        $request = $this->getRequest();

        $cartId = $this->checkoutSession->getQuoteId();
        $productId = $request->getParam('product');
        $sku = $request->getParam('sku');
        $qty = $request->getParam('qty');

        $quote = $this->quoteRepository->get($cartId);
        $product = $this->productRepository->getById($productId);

        if ($quote && $product) {
            if ($product->getTypeId() == \Magento\GroupedProduct\Model\Product\Type\Grouped::TYPE_CODE) {
                $typedProduct = $product->getTypeInstance();
                foreach ($params['super_group'] as $key => $val) {
                    if($val > 0) {
                        $_product = $this->productRepository->getById($key);
                        $quote->addProduct($_product, $this->makeAddRequest($_product, $sku, '1'));
                    }
                }
            } else {
                $quote->addProduct($product, $this->makeAddRequest($product, $sku, $qty));
            }
            $this->quoteRepository->save($quote);
            $response['status'] = 'success';
            $response['message'] = 'Product added to cart successfully.';
        } else {
            $response['message'] = 'Add to cart fail.';
        }

        return $resultJson->setData($response);

    }

    private function makeAddRequest(\Magento\Catalog\Model\Product $product, $sku = null, $qty = 1)
    {
        $data = [
            'product' => $product->getEntityId(),
            'qty' => $qty
        ];

        switch ($product->getTypeId()) {
            case \Magento\ConfigurableProduct\Model\Product\Type\Configurable::TYPE_CODE:
                $data = $this->setConfigurableRequestOptions($product, $sku, $data);
                break;
            case \Magento\Bundle\Model\Product\Type::TYPE_CODE:
                $data = $this->setBundleRequestOptions($product, $data);
                break;
        }

        $request = new \Magento\Framework\DataObject();
        $request->setData($data);

        return $request;
    }

    private function setConfigurableRequestOptions(\Magento\Catalog\Model\Product $product, $sku, array $data)
    {
        /** @var \Magento\ConfigurableProduct\Model\Product\Type\Configurable $typedProduct */
        $typedProduct = $product->getTypeInstance();

        $childProduct = $this->productRepository->get($sku);
        $productAttributeOptions = $typedProduct->getConfigurableAttributesAsArray($product);

        $superAttributes = [];
        foreach ($productAttributeOptions as $option) {
            $superAttributes[$option['attribute_id']] = $childProduct->getData($option['attribute_code']);
        }

        $data['super_attribute'] = $superAttributes;
        return $data;
    }

    private function setBundleRequestOptions(\Magento\Catalog\Model\Product $product, array $data)
    {
        /** @var \Magento\Bundle\Model\Product\Type $typedProduct */
        $typedProduct = $product->getTypeInstance();

        $selectionCollection = $typedProduct->getSelectionsCollection($typedProduct->getOptionsIds($product), $product);

        $options = [];
        foreach ($selectionCollection as $proselection) {
            $options[$proselection->getOptionId()] = $proselection->getSelectionId();
        }

        $data['bundle_option'] = $options;
        return $data;
    }

}
?>
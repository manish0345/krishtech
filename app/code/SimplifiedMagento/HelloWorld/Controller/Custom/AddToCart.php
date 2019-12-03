<?php


namespace SimplifiedMagento\HelloWorld\Controller\Custom;


use Magento\Catalog\Model\Product;
use Magento\Checkout\Model\Cart;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Data\Form\FormKey;

class AddToCart extends Action
{
    protected $jsonFactory;
    protected $formKey;
    protected $cart;
    protected $product;

    public function __construct(
        JsonFactory $jsonFactory,
        FormKey $formKey,
        Cart $cart,
        Product $product,
        Context $context)
    {
        $this->jsonFactory = $jsonFactory;
        $this->formKey = $formKey;
        $this->cart = $cart;
        $this->product = $product;

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
        $productId = isset($params['product']) ? (int)$params['product'] : 0;

        if($productId > 0)
        {
            try {
                $params['form_key'] = $this->formKey->getFormKey();
                $_product = $this->product->load($productId);
                $this->cart->addProduct($_product, $params);
                $this->cart->save();

                $response['status'] = 'success';
                $response['message'] = 'Product added to cart successfully.';
            }
            catch(\Exception $e) {
                $response['message'] = $e->getMessage();
            }
        }

        return $resultJson->setData($response);

    }
}
<?php


/**
 * Class Pay
 */
class Pay extends Controller
{
    /**
     * inheritDoc
     */
    function execute()
    {
        if(!empty($_POST['stripeToken'])){
            $stripePayment = new StripePayment();
            $stripeResponse = $stripePayment->chargeAmountFromCard($_POST);
            $orderModel = $this->model('OrderModel');
            $status = $orderModel->saveOrder($_POST,$stripeResponse->id);
            if($status){
                unset($_SESSION['cart']);
                echo "<script>
                    alert('Pay successfully');
                    window.location.href = '?url=Home';
                </script>";
            }
        }
    }
}

<?php
    require_once 'fpdf/fpdf.php';
    require_once '../Service/UserService.php';
    require_once '../Service/OrderService.php';

    $userService = UserService::getInstance();
    $orderService = OrderService::getInstance();
    $orderID = $_POST['orderID'];

    $order = $orderService->getOrderByOrderID($orderID);

    if (isset($_SESSION[$orderID]))
    {
        $pdf = new CustomFPDF(); // custom fpdf that extends the fpdf to change font and color and some margins

        $pdfContent = 'Mr/Ms ' . $order->getUser()->getName() . '\nOrderID:' . $order->getOrderID() .
            '\nEvent: ' . $order->getEvent()->getArtist() . '\nTime: ' . $order->getEvent()->getEventDateTime() . '\nTotal Price:' . $order->getOrderPrice()
            . '\nTHANK YOU FOR YOUR PURCHASE';

        $pdf->AddPage();
        //$pdf->SetFont("Arial", 'I', 15);
        //$pdf->Cell(100,30, $pdfContent, 1, 0, 'C');
        $pdf->Cell($pdfContent);
        $pdf->Output();

        echo $pdf;


    }


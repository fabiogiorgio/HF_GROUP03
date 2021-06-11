<div class="container">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-home">Festival</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container-fluid" style="background: #f3f3f3;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-timeline px-2 border-none">
                    <ul class="bs4-order-tracking d-flex align-items-center justify-content-center">
                        <li class="step active">
                            <div class="text-center same-step step-active">
                                <span class="step-title">Review Order</span>
                            </div>
                        </li>
                        <li class="step">
                            <div class="text-center same-step step-normal">
                                <span class="step-title">Payment</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container px-4 py-5 mx-auto">
    <div class="row">
    <?php if(!empty($data['tickets'])): ?>
        <div class="col-md-6 cart">
            <table class="table-cart">
                <tr>
                    <th><i class="fas fa-book"></i></th>
                    <th><i class="fas fa-users"></i></th>
                    <th><i class="fas fa-tag"></i></th>
                    <th><i class="far fa-times-circle"></i></th>
                </tr>
                    <?php $total = 0; foreach ($data['tickets'] as $ticket): ?>
                        <tr>
                            <td>
                                <span style="word-wrap: normal; width: 150px"><?= $ticket['title']; ?></span>
                                <p>
                                    <?= date('D', strtotime($ticket['from'])) .' '.date('d', strtotime($ticket['from'])) .' '.date('M', strtotime($ticket['from'])); ?> - <?= date('D', strtotime($ticket['to'])) .' '.date('d', strtotime($ticket['to'])) .' '.date('M', strtotime($ticket['to'])); ?>
                                </p>
                            </td>
                            <td><?= $_SESSION['cart'][$ticket['id']]['qty']; ?></td>
                            <td>€ <?= $ticket['price']; ?>.00</td>
                            <td><a href="?url=order/deleteItem/<?= $ticket['id']; ?>"><i class="far fa-times-circle"></i></a></td>
                        </tr>
                    <?php $total+= $ticket['price']; endforeach; ?>
                    <div class="total">
                        <span>TOTAL</span>
                        <span>€ <?= $total; ?></span>
                    </div>
            </table>
        </div>
        <div class="col-md-6 payment-login d-flex justify-content-around align-items-center">
            <?php if(isset($_SESSION['id'])): ?>
                <a href="?url=order/detail" style="color: #fff; background: #004ed4">Checkout</a>
            <?php else: ?>
                <div>Please login to checkout</div>
                <a href="?url=login">Login</a>
            <?php endif; ?>
            <div class="payment-online">
                <img src="./public/images/payment-online.png" width=300 alt="">
            </div>
        </div>
        <?php else: ?>
            <div>No items, please click <a href="?url=food">here</a> to book the ticket</div>
        <?php endif; ?>
    </div>
</div>

<div class="container">
    <div class="row mb-5">
        <span class="center mt-5 mb-5">Find more exciting activities to join</span>
        <div class="col-4 category-event category-event-food">
            <img src="./public/images/food.png" alt="">
            <div class="category-event-content">
                <span class="category-event-content-title">Haarlem Festival</span><br>
                <span class="category-event-content-title-bold">Food</span><br><br>
                <a href="?url=food" class="category-event-content-learn-more">Learn More</a>
            </div>
        </div>
        <div class="col-4 ml-3 mr-3 category-event category-event-jazz">
            <img src="./public/images/jazz.png" alt="">
            <div class="category-event-content">
                <span class="category-event-content-title">Haarlem Festival</span><br>
                <span class="category-event-content-title-bold">Jazz</span><br><br>
                <a href="?url=jazz" class="category-event-content-learn-more">Learn More</a>
            </div>
        </div>
        <div class="col-4 category-event category-event-dance">
            <img src="./public/images/dance.png" alt="">
            <div class="category-event-content">
                <span class="category-event-content-title">Haarlem Festival</span><br>
                <span class="category-event-content-title-bold">Dance</span><br><br>
                <a href="?url=dance" class="category-event-content-learn-more">Learn More</a>
            </div>
        </div>
    </div>
</div>

<?php require_once "./mvc/views/pages/section-01.php" ?>

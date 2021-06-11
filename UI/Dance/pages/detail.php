<div class="container">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-home">Festival</a></li>
                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-home">Cart</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: #000">Your Details</li>
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
                            <div class="text-center same-step step-normal">
                                <span class="step-title" style="white-space: nowrap">Review Order <i class="far fa-check-circle"></i></span>
                            </div>
                        </li>
                        <li class="step">
                            <div class="text-center same-step step-active">
                                <span class="step-title">Payment</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-8">
            <h3>CONTACT INFORMATION</h3>
            <?php $total = 0; foreach ($data['tickets'] as $ticket): ?>
            <?php $total+= $ticket['price']; endforeach; ?>
            <form action="?url=pay" method="POST" id="checkout-form">
                <input type="hidden" name='currency_code' value='USD'>
                <input type="hidden" name="amount" value="<?= $total ?>">
                <input type="hidden" name="customer_id" value="<?= $_SESSION['id'] ?>">
                <input type="text" id="card-name" name="name" class="form-control form-control-lg mb-3" value='<?= $data['customer']['fullname'] ?>' readonly>
                <input type="text" name="email" class="form-control form-control-lg mb-3" value='<?= $data['customer']['email'] ?>' readonly>
                <h3>CARD DETAILS</h3>
                <div class="row mb-3">
                    <div class="col">
                        <label for="card-number">Card number</label>
                        <input type="text" class="form-control form-control-lg" id="card-number" required>
                    </div>
                    <div class="col">
                        <label for="card-expiry-month">Month</label>
                        <select id="card-expiry-month" class="form-control form-control-lg" required>
                            <?php for($i = 1;$i<=12;$i++): ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="card-expiry-year">Year</label>
                        <select id="card-expiry-year" class="form-control form-control-lg" required>
                            <?php for($i = 2022;$i<=2030;$i++): ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="card-cvc">CVC</label>
                        <input type="text" id="card-cvc" class="form-control form-control-lg" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="payment-btn">PAYMENT</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-4">
            <table class="table-cart">
                <tr>
                    <th><i class="fas fa-book"></i></th>
                    <th><i class="fas fa-users"></i></th>
                    <th><i class="fas fa-tag"></i></th>
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
                    </tr>
                <?php $total+= $ticket['price']; endforeach; ?>
            </table>
<!--            <div class="vat">-->
<!--                <span>VAT</span>-->
<!--                <span>€ 52.50</span>-->
<!--            </div>-->
            <div class="total">
                <span>TOTAL</span>
                <span>€ <?= $total; ?></span>
            </div>
        </div>
    </div>
</div>
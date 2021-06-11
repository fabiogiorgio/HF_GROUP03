<div class="container mb-2 bt-2">
    <?php require_once "./mvc/views/pages/alert_message.php" ?>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 bg-res">
        </div>
        <div class="blue-pick">
            <a href="?url=Home">PICK FOR ME</a>
        </div>
    </div>
</div>
<div class="container-fluide" style="background: #f3f3f3;">
    <div class="container">
        <div class="row text-center">
            <h1 style="color: #1a4ed4;padding: 20px 0;">Restaurants To Choose From</h1>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    <div class="row row-cols-4">
        <?php foreach ($data['tickets'] as $ticket): ?>
        <div class="col mb-5">
            <div class="card h-100 res-page">
                <h5 class="title">Rectangle</h5>
                <img src="./public/images/<?= $ticket['image']; ?>" class="card-img-top" alt="...">
                <small>Dutch, fish and seafood, European</small>
                <div class="card-body">
                    <p class="card-text"><?= $ticket['description']; ?></p>
                </div>
                <div class="group d-flex justify-content-center">
                    <span>€<?= $ticket['price']; ?>.00</span>
                    <form action="?url=order/addToCart" method="POST">
                        <input type="hidden" name="id" value="<?= $ticket['id']; ?>">
                        <input class="quantity" min="1" name="quantity" value="1" type="hidden">
                        <button type="submit">ADD TO CART</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 bg-res2">
        </div>
    </div>
</div>
<div class="container">
    <div class="row mb-5">
        <div class="col-2"></div>
        <div class="col-4">
            <a href="?url=jazz">
                <img src="./public/images/event1.png" alt="">
            </a>
        </div>
        <div class="col-4">
            <a href="?url=dance">
                <img src="./public/images/event2.png" alt="">
            </a>
        </div>
    </div>
</div>
</div>
<?php require_once "./mvc/views/pages/section-01.php" ?>
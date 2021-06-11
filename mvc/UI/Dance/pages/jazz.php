<div class="container mb-2 bt-2">
    <?php require_once "./mvc/views/pages/alert_message.php" ?>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 bg-jazz">
            <div class="bg-jazz-content">
                <span class="bg-jazz-title">Haarlem Festival</span><br>
                <span class="bg-jazz-title-small">Enjoy the Jazz Shows</span><br><br>
                <a href="" class="book-ticket">Book your ticket</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mb-5" style="margin-top: 100px">
        <?php foreach ($data['days'] as $day): ?>
            <div class="col-3 event-day <?= $day['active'] == 1 ? 'active' : ''; ?>">
                <a href="?url=jazz/execute/<?= $day['day'] ?>"><?= $day['day'] ?>th | <?= $day['dayOfWeed']; ?></a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php if (!empty($data['special']['id'])): ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 bg-jazz-001">
            <div class="bg-jazz-001-content">
                <div class="bg-jazz-001-list">
                    <ul>
                        <li>
                            <i class="far fa-check-circle"></i>
                            <span class="bg-jazz-001-list-title">Enjoy Any Show!</span>
                        </li>
                        <li>
                            <i class="far fa-check-circle"></i>
                            <span class="bg-jazz-001-list-title">To Any Venue!</span>
                        </li>
                        <li>
                            <i class="far fa-check-circle"></i>
                            <span class="bg-jazz-001-list-title">Huge Saving!</span>
                        </li>
                        <li>
                            <i class="far fa-check-circle"></i>
                            <span class="bg-jazz-001-list-title">Deal of the Day!</span>
                        </li>
                    </ul>
                </div>
                <div class="all-access">
                    <span class="big-title">Don't Miss Out!</span><br>
                    <span class="small-title">All Access Pass</span><br><br>
                    <form action="?url=order/addToCart" method="POST">
                        <input type="hidden" name="id" value="<?= $data['special']['id']; ?>"/>
                        <input min="1" name="quantity" value="1" type="hidden"/>
                        <button type="submit" class="bg-jazz-001-a">GET IT NOW</button>
                    </form>
                </div>
                <div class="price-title">
                    €<?= $data['special']['price']; ?>.<sup>00</sup>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="container mt-5 mb-5">
    <div class="row">
        <?php foreach ($data['tickets'] as $ticket): ?>
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $ticket['title']; ?></h5>
                        <div class="card-maps">
                        <span class="time"><i class="fas fa-stopwatch"></i>
                            <?= date('H.m', strtotime($ticket['from'])); ?> - <?= date('H.m', strtotime($ticket['to'])); ?>
                        </span><br>
                            <span class="maps"><i class="fas fa-map-marker-alt"></i> <?= $ticket['location']; ?></span>
                        </div>
                        <div class="card-info">
                            <div class="card-info-image">
                                <img src="./public/images/<?= $ticket['image']; ?>" width=240 alt="">
                            </div>
                            <div class="card-info-price">
                                <span class="currency">€</span>
                                <span class="card-info-base-price"><?= $ticket['price']; ?>.<sup>00</sup></span>
                            </div>
                        </div>

                        <div class="card-add-to-cart-input" style="padding: 0">
                            <form action="?url=order/addToCart" class="form-<?= $ticket['id']; ?>" method="POST" style="width: 100%;">
                                <input type="hidden" name="id" value="<?= $ticket['id']; ?>">
                                <div class="number-input md-number-input d-flex justify-content-between pb-3 pt-3">
                                    <a onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus" style="cursor: pointer">-</a>
                                    <input class="quantity" min="1" name="quantity" value="1" type="number">
                                    <a onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus" style="cursor: pointer">+</a>
                                </div>
                                <div class="card-add-to-cart">
                                    <button type="submit" class="add-to-cart">Add to cart</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>
<?php require_once "./mvc/views/pages/section-01.php" ?>
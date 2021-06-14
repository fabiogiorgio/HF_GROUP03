<div class="container mb-2 bt-2">
    <?php require_once "./mvc/views/pages/alert_message.php" ?>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 bg-jazz">
            <div class="bg-jazz-content">
                <span class="bg-jazz-title">Haarlem Festival</span><br>
                <span class="bg-jazz-title-small">Enjoy the Dance Shows</span><br><br>
                <a href="" class="book-ticket">Book your ticket</a>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-6 text-center">
            <h2>LINE UP</h2>
            <div class="row row-cols-3">
                <img src="public/images/dj.PNG" style="width:100%;"/>
            </div>
        </div>
        <div class="col-6 text-center">
            <h2>SCHEDULE</h2>
            <table class="access-table" style="width: 100%;background: #1a4ed4;color: #fff;font-size: 21px;">
                <tr>
                    <th><img src="./public/images/icon1.png" alt=""></th>
                    <th><img src="./public/images/icon2.png" alt=""></th>
                    <th><img src="./public/images/icon3.png" alt=""></th>
                    <th><img src="./public/images/icon4.png" alt=""></th>
                </tr>
                <?php foreach ($data['all'] as $key => $value): ?>
                    <tr>
                        <td><?= date('D M d', strtotime($key)); ?>th</td>
                        <td>
                            <?php foreach ($value as $t): ?>
                                <p><?= $t['title']; ?></p>
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <?php foreach ($value as $l): ?>
                                <p><?= $l['location']; ?></p>
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <?php foreach ($value as $time): ?>
                                <p><?= date('H:i', strtotime($time['from'])); ?></p>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <div class="row text-center mt-5" style="padding: 20px;background: #e4e4e4;">
        <h2 class="text-center">
            <span style="border-bottom: 2px solid #000; font-size: 50px;width: fit-content;">TICKETS</span>
        </h2>
        <div class="container">
            <div class="row mb-5 d-flex justify-content-center" style="margin-top: 100px">
                <?php foreach ($data['days'] as $day): ?>
                    <div class="col-3 event-day <?= $day['active'] == 1 ? 'active' : ''; ?>">
                        <a href="?url=dance/execute/<?= $day['day'] ?>"><?= $day['day'] ?>th
                            | <?= $day['dayOfWeed']; ?></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <table class="table" style="font-size: 23px;">
            <thead>
            <tr>
                <th scope="col">Pass</th>
                <th scope="col">Session</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['tickets'] as $ticket): ?>
                <tr>
                    <th scope="row"><?= $ticket['title']; ?></th>               
                    <td><?= $ticket['session']; ?></td>
                    <td>€<?= $ticket['price']; ?>.00</td>
                    <td>
                        <form action="?url=order/addToCart" method="POST">
                            <input type="hidden" name="id" value="<?= $ticket['id']; ?>">
                            <input class="quantity" min="1" name="quantity" value="1" type="hidden">
                            <button type="submit" class="add-to-cart">ADD TO CART</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <h4 style="font-weight: bold;">
            * The capacity of the Club sessions is very limited. Availability for All-Access pass holders can not be
            guaranteed due to safety regulations.
        </h4>
    </div>
    <?php if (!empty($data['special']['id'])): ?>
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
    <?php endif; ?>
    <?php require_once "./mvc/views/pages/section-01.php" ?>
</div>
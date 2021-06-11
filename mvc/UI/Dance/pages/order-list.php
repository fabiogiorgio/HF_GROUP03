<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Order
                    <small>List</small>
                </h1>

                <?php require_once "./mvc/views/pages/alert_message.php" ?>
            </div>

            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>#ID</th>
                    <th>Customer name</th>
                    <th>Ticket name</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($data['order'] as $row): ?>
                        <tr>
                            <td><?= $row['order_code'] ?></td>
                            <td><?= $row['c_name'] ?></td>
                            <td><?= $row['t_name'] ?></td>
                            <td><?= $row['created_at'] ?></td>
                            <td>
                                <?php
                                    if($row['status'] == "0"){
                                        echo "pending";
                                    }elseif($row['status'] == "1"){
                                        echo "paid";
                                    }else{
                                        echo "cancle";
                                    }
                                ?>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Select
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="?url=order/see/<?= $row['order_code']; ?>">See</a></li>
                                        <li><a href="?url=order/paid/<?= $row['order_code']; ?>">Paid</a></li>
                                        <li><a href="?url=order/cancle/<?= $row['order_code']; ?>">Cancle</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
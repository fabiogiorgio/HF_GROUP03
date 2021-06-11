<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tickets
                    <small>List</small>
                </h1>

                <?php require_once "./mvc/views/pages/alert_message.php" ?>
            </div>

            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>#ID</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Title</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['tickets'] as $ticket): ?>
                    <tr>
                        <td><?= $ticket['id']; ?></td>
                        <td>
                            <img src="./public/images/<?= $ticket['image']; ?>" alt="" height="50" width="50">
                        </td>
                        <td>
                            <?php
                                switch ($ticket['category']) {
                                    case 1:
                                        echo 'Jazz';
                                        break;
                                    case 2:
                                        echo 'Dance';
                                        break;
                                    case 3:
                                        echo 'Food';
                                        break;
                                    default:
                                        echo 'Not fount';
                                }
                            ?>
                        </td>
                        <td><?= $ticket['price']; ?></td>
                        <td><?= $ticket['title']; ?></td>
                        <td><?= $ticket['from']; ?></td>
                        <td><?= $ticket['to']; ?></td>
                        <td><?= $ticket['qty']; ?></td>
                        <td>
                            <a href="?url=ticket/edit/<?= $ticket['id']; ?>">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <a href="?url=ticket/delete/<?= $ticket['id']; ?>"
                               onclick="return confirm('Are you sure you want to delete the record?');"
                               style="margin:0 1rem;">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </a>
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
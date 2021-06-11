<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Customer
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
                    <th>Email</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['customer'] as $customer): ?>
                    <tr>
                        <td><?= $customer['id']; ?></td>
                        <td><?= $customer['fullname']; ?></td>
                        <td><?= $customer['email']; ?></td>
                        <td><?= $customer['created_at']; ?></td>
                        <td>
                            <a href="?url=customer/edit/<?= $customer['id']; ?>">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <a href="?url=customer/delete/<?= $customer['id']; ?>"
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
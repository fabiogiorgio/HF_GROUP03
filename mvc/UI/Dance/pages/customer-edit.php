<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Customer
                    <small><?= isset($data['customer']['id']) ? 'Update' : 'Add new'; ?></small>
                </h1>
                <?php require_once "./mvc/views/pages/alert_message.php" ?>

                <form action="?url=customer/update"
                      method="POST"
                      enctype="multipart/form-data"
                      style="margin-bottom:1rem;">

                    <input type="hidden" name="id" value="<?= isset($data['customer']['id']) ? $data['customer']['id'] : ''; ?>" />
                    <div class="form-group">
                        <label for="fullname">Full name</label>
                        <input type="text"
                               class="form-control"
                               id="fullname"
                               name="fullname"
                               value="<?= isset($data['customer']['fullname']) ? $data['customer']['fullname'] : ''; ?>"
                               required
                               maxlength="255">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email"
                               class="form-control"
                               id="email"
                               name="email"
                               value="<?= isset($data['customer']['email']) ? $data['customer']['email'] : ''; ?>"
                               required
                               maxlength="255">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"
                               class="form-control"
                               id="password"
                               name="password"
                               value="<?= isset($data['customer']['password']) ? $data['customer']['password'] : ''; ?>"
                               required
                               minlength="6"
                               maxlength="24">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <?= isset($data['customer']['id']) ? 'Update' : 'Add new'; ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

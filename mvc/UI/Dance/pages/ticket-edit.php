<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ticket
                    <small><?= isset($data['ticket']['id']) ? 'Update' : 'Add new'; ?></small>
                </h1>
                <?php require_once "./mvc/views/pages/alert_message.php" ?>

                <form action="?url=ticket/update"
                      method="POST"
                      enctype="multipart/form-data"
                      style="margin-bottom:1rem;">

                    <input type="hidden" name="id" value="<?= isset($data['ticket']['id']) ? $data['ticket']['id'] : ''; ?>" />
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" required class="form-control">
                            <option value="">Please select a category</option>
                            <?php if (isset($data['ticket']['category']) && $data['ticket']['category'] == 1): ?>
                                <option value="1" selected>Jazz</option>
                            <?php else: ?>
                                <option value="1">Jazz</option>
                            <?php endif; ?>
                            <?php if (isset($data['ticket']['category']) && $data['ticket']['category'] == 2): ?>
                                <option value="2" selected>Dance</option>
                            <?php else: ?>
                                <option value="2">Dance</option>
                            <?php endif; ?>
                            <?php if (isset($data['ticket']['category']) && $data['ticket']['category'] == 3): ?>
                                <option value="3" selected>Food</option>
                            <?php else: ?>
                                <option value="3">Food</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file"
                               id="image"
                               name="image"
                               accept="image/*"
                               <?= isset($data['ticket']['image']) ? '' : 'required'; ?>
                               maxlength="255">
                    </div>
                    <?php if (isset($data['ticket']['image'])): ?>
                        <img src="./public/images/<?= $data['ticket']['image']; ?>" alt="" width="50" height="50">
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number"
                               class="form-control"
                               id="price"
                               name="price"
                               value="<?= isset($data['ticket']['price']) ? $data['ticket']['price'] : ''; ?>"
                               required
                               min="50">
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"
                               class="form-control"
                               id="title"
                               name="title"
                               value="<?= isset($data['ticket']['title']) ? $data['ticket']['title'] : ''; ?>"
                               required
                               maxlength="255">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description"
                                  id="description"
                                  class="form-control"
                                  rows="5"><?= isset($data['ticket']['description']) ? $data['ticket']['description'] : ''; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="from">From</label>
                        <input type="datetime-local"
                               class="form-control"
                               id="from"
                               name="from"
                               value="<?= isset($data['ticket']['from']) ? strftime('%Y-%m-%dT%H:%M:%S', strtotime($data['ticket']['from'])) : ''; ?>"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="to">To</label>
                        <input type="datetime-local"
                               class="form-control"
                               id="to"
                               name="to"
                               value="<?= isset($data['ticket']['to']) ? strftime('%Y-%m-%dT%H:%M:%S', strtotime($data['ticket']['to'])) : ''; ?>"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="qty">Quantity</label>
                        <input type="number"
                               class="form-control"
                               id="qty"
                               name="qty"
                               value="<?= isset($data['ticket']['qty']) ? $data['ticket']['qty'] : ''; ?>"
                               required
                               min="1">
                    </div>

                    <div class="form-group">
                        <label for="location">Location</label>
                        <textarea name="location"
                                  id="location"
                                  class="form-control"
                                  rows="5"><?= isset($data['ticket']['location']) ? $data['ticket']['location'] : ''; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="session">Session</label>
                        <input type="text"
                               class="form-control"
                               id="session"
                               name="session"
                               value="<?= isset($data['ticket']['session']) ? $data['ticket']['session'] : ''; ?>"
                               required
                               maxlength="255">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <?= isset($data['ticket']['id']) ? 'Update' : 'Add new'; ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

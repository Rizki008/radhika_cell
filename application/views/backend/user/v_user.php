<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4><?= $title ?></h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- basic table  Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Basic Table</h4>
                    </div>
                    <div class="pull-right">
                        <a href="#basic-table" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="modal" role="button"><i class="fa fa-plus"></i> Tambah User</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Level</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($user as $key => $value) { ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $value->username ?></td>
                                <td><?= $value->password ?></td>
                                <td><?php if ($value->level == 1) { ?>
                                        <span class="badge badge-primary">Admin</span>
                                    <?php } else { ?>
                                        <span class="badge badge-success">Pemilik</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm scroll-click" data-backdrop="static" data-toggle="modal" data-target="#login-modal<?= $value->id_user ?>" type="button">Update</a>
                                    <a href="#" class="btn btn-danger btn-sm scroll-click" data-backdrop="static" data-toggle="modal" data-target="#delete-modal<?= $value->id_user ?>" type="button">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- basic table  End -->
        </div>
        <div class="modal fade" id="basic-table" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary"><?= $title ?></h2>
                        </div>
                        <?php echo
                        form_open('user/add');
                        ?>
                        <div class="input-group custom">
                            <input type="text" class="form-control form-control-lg" name="username" placeholder="Username">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="password" class="form-control form-control-lg" name="password" placeholder="**********">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <select name="level" id="level" class="form-control">
                                <option>--Pilih level User--</option>
                                <option value="1">Admin</option>
                                <option value="2">Pemilik</option>
                            </select>
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-user1"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">
                                    <!-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a> -->
                                    <button type="button" class="btn btn-secondary btn-lg btn-block" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Save changes</button>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
        <?php foreach ($user as $key => $value) { ?>
            <div class="modal fade" id="login-modal<?= $value->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="login-box bg-white box-shadow border-radius-10">
                            <div class="login-title">
                                <h2 class="text-center text-primary"><?= $title ?></h2>
                            </div>
                            <?php echo
                            form_open('user/update/' . $value->id_user);
                            ?>
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" name="username" value="<?= $value->username ?>" placeholder="Username">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" name="password" value="<?= $value->password ?>" placeholder="**********">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <select name="level" id="level" class="form-control">
                                    <option value="<?= $value->level ?>"><?php if ($value->level == 1) { ?>
                                            Admin
                                        <?php } else { ?>
                                            Pemilik
                                        <?php } ?> </option>
                                    <option>--Pilih level User--</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Pemilik</option>
                                </select>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <!-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a> -->
                                        <button type="button" class="btn btn-secondary btn-lg btn-block" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Update changes</button>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php foreach ($user as $key => $value) { ?>
            <div class="modal fade" id="delete-modal<?= $value->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="login-box bg-white box-shadow border-radius-10">
                            <div class="login-title">
                                <h2 class="text-center text-primary"><?= $title ?></h2>
                            </div>
                            <?php echo
                            form_open('user/delete/' . $value->id_user);
                            ?>
                            <p>Apakah Anda Yakin Akan Hapus Data User <?= $value->username ?></p>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <!-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a> -->
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Delete</button>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
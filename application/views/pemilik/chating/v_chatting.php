<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Chat</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chat</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="bg-white border-radius-4 box-shadow mb-30">
                <div class="row no-gutters">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="chat-list bg-light-gray">
                            <div class="chat-search">
                                <span class="ti-search"></span>
                                <input type="text" placeholder="Search Contact">
                            </div>
                            <div class="notification-list chat-notification-list customscroll">
                                <ul>
                                    <?php foreach ($pesan as $key => $value) { ?>
                                    <?php } ?>
                                    <li>
                                        <a href="#">
                                            <img src="<?= base_url() ?>deskapp-master/vendors/images/img.jpg" alt="">
                                            <h3 class="clearfix"><?= $value->username ?></h3>
                                            <p><i class="fa fa-circle text-light-green"></i> online</p>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                        <div class="chat-detail">
                            <div class="chat-profile-header clearfix">
                                <div class="left">
                                    <div class="clearfix">
                                        <div class="chat-profile-photo">
                                            <img src="<?= base_url() ?>deskapp-master/vendors/images/profile-photo.jpg" alt="">
                                        </div>
                                        <div class="chat-profile-name">
                                            <h3>Admin</h3>
                                            <span>Radhika Celluler</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="right text-right">
                                    <div class="dropdown">
                                    </div>
                                </div>
                            </div>
                            <div class="chat-box">
                                <div class="chat-desc customscroll">
                                    <ul>
                                        <?php foreach ($pesan as $key => $value) {
                                            $id_pelanggan = $value->id_pelanggan;
                                            if ($value->pesan != '0') {
                                        ?>
                                                <li class="clearfix admin_chat">
                                                    <span class="chat-img">
                                                        <img src="<?= base_url() ?>deskapp-master/vendors/images/chat-img2.jpg" alt="">
                                                    </span>
                                                    <div class="chat-body clearfix">
                                                        <p><?= $value->pesan ?></p>
                                                        <div class="chat_time"><?= $value->time_chatting ?></div>
                                                    </div>
                                                </li>
                                            <?php } elseif ($value->balas != '0') { ?>
                                                <li class="clearfix">
                                                    <span class="chat-img">
                                                        <img src="<?= base_url() ?>deskapp-master/vendors/images/chat-img1.jpg" alt="">
                                                    </span>
                                                    <div class="chat-body clearfix">
                                                        <p><?= $value->balas ?></p>
                                                        <div class="chat_time"><?= $value->time_chatting ?></div>
                                                    </div>
                                                </li>
                                        <?php }
                                        } ?>
                                    </ul>
                                </div>
                                <div class="chat-footer">
                                    <?php echo form_open('chating/send') ?>
                                    <div class="file-upload"><a href="#"><i class="fa fa-paperclip"></i></a></div>
                                    <div class="chat_text_area">
                                        <textarea name="pesan" placeholder="Type your message…"></textarea>
                                        <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>">
                                    </div>
                                    <div class="chat_send">
                                        <button class="btn btn-link" type="submit"><i class="icon-copy ion-paper-airplane"></i></button>
                                    </div>
                                    <?php echo form_close() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<body>
    <!-- <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo"><img src="vendors/images/deskapp-logo.svg" alt=""></div>
            <div class='loader-progress' id="progress_div">
                <div class='bar' id='bar1'></div>
            </div>
            <div class='percent' id='percent1'>0%</div>
            <div class="loading-text">
                Loading...
            </div>
        </div>
    </div> -->
    <?php
    $jml_chatting = $this->m_chatting->jml_chatting();
    $daftar_chat = $this->m_chatting->daftar_chat();
    ?>
    <div class="header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu"></div>
            <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
            <div class="header-search">
            </div>
        </div>
        <div class="header-right">
            <div class="dashboard-setting user-notification">
            </div>
            <div class="user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                        <i class="icon-copy dw dw-notification"></i>
                        <span class="badge notification-active"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="notification-list mx-h-350 customscroll">
                            <ul>
                                <?php
                                foreach ($daftar_chat as $key => $value) {
                                ?>
                                    <li>
                                        <a href="<?= base_url('chating/pesan/' . $value->id_pelanggan) ?>">
                                            <img src="<?= base_url() ?>deskapp-master/vendors/images/img.jpg" alt="">
                                            <h3><?= $value->username ?></h3>
                                            <p><?= $value->pesan ?></p>
                                        </a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="<?= base_url() ?>deskapp-master/vendors/images/photo1.jpg" alt="">
                        </span>
                        <span class="user-name">Admin</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <!-- <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
                        <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                        <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a> -->
                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class="dw dw-logout"></i> Log Out</a>
                    </div>
                </div>
            </div>
            <!-- <div class="github-link">
                <a href="https://github.com/dropways/deskapp" target="_blank"><img src="<?= base_url() ?>deskapp-master/vendors/images/github.svg" alt=""></a>
            </div> -->
        </div>
    </div>
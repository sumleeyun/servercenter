<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>กกม.ศคพ.สอ.ทอ. </p>

                <?php if (!Yii::$app->user->isGuest) {
                    $username1 = Yii::$app->user->identity->username; ?>

                    <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $username1; ?></a>
<?php } ?>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form  Yii::$app->user->isGuest ?  -->
        <?php if (!Yii::$app->user->isGuest) { ?>
            <?=
            dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                        'items' => [
                            ['label' => 'MENU SERVER', 'options' => ['class' => 'header']],
                            ['label' => 'dashboard', 'icon' => 'th', 'url' => ['/dashboard/index'],],
                             ['label' => 'ข้อมูลระบบงาน', 'icon' => 'tasks', 'url' => ['/systemsoftware/index'],],
                            [ 'label' => 'server', 'icon' => 'desktop', 'url' => ['/server/index']],
                            ['label' => 'website', 'icon' => 'dribbble', 'url' => ['/website/index'],],
                            ['label' => 'mailreng', 'icon' => 'inbox', 'url' => ['/mailreng/index'],],
                            ['label' => 'ขอมูลการใช้งาน ทอ.', 'icon' => 'user', 'url' => ['/capa/capauser/index'],],
                            ['label' => 'ลิงค์ระบบงาน', 'icon' => 'th', 'url' => ['/menu/index'],],
                            
                            ['label' => 'จัดดำเนินงาน', 'icon' => 'sitemap', 'url' => ['/work/index']],
                             [
                                'label' => 'support', 'icon' => 'suitcase', 'url' => ['/support_service/index'],
                                'items' => [
                                    ['label' => 'งานให้บริการ', 'icon' => 'circle-o', 'url' => ['/support_service/index']],
                                    ['label' => 'ประเภทให้บริการ', 'icon' => 'circle-o', 'url' => ['/support_service_type/index']],
                                    //['label' => 'service', 'icon' => 'circle-o', 'url' => ['/service/index']],
                                ]
                            ],
                            
                           
                            ['label' => 'license', 'icon' => 'tasks', 'url' => ['/license/index'],],
                            ['label' => 'DataStores', 'icon' => 'database', 'url' => ['/datastore/index']],
                            ['label' => 'VCenter', 'icon' => 'tasks', 'url' => ['/vcenter/index']], 
                            
                            [
                                'label' => 'CheckSecurity', 'icon' => 'ship', 'url' => ['/checksecurity/index'],
                                'items' => [
                                    ['label' => 'CheckSecurity', 'icon' => 'ship', 'url' => ['/checksecurity/index']],
                                    ['label' => 'รายการตรวจสอบ', 'icon' => 'circle-o', 'url' => ['/checkname/index']],
                                ]
                            ],
                            ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                            [
                                'label' => 'Mail',
                                'icon' => 'inbox',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'จัดการเมล์', 'icon' => 'file-code-o', 'url' => 'http://comm.rtaf.mi.th/rtafmail/admin.aspx', 'target' => '_blank',],
                                    ['label' => 'Mail Restore', 'icon' => 'file-code-o', 'url' => ['/mailresto/index'],],
                                    ['label' => 'Mail Block ', 'icon' => 'dashboard', 'url' => ['/debug'],],
                                    [
                                        'label' => 'จัดการระบบMail',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'เมล์เล้ก', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Dabases', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Exchange', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                    ['label' => 'คู่มือการจัดการเมล์ ', 'icon' => 'archive', 'url' => ['/debug'],],
                                ],
                            ],
                            [
                                'label' => 'ตั้งค่า',
                                'icon' => 'cog ',
                                'url' => '#',
                                'items' => [
                                    
                                    ['label' => 'หน่วยขึ้นตรง', 'icon' => 'circle-o', 'url' => ['/department/index'],],
                                    ['label' => 'ส่วนราชการ', 'icon' => 'circle-o', 'url' => ['/components/index'],],
                                    ['label' => 'จนท.ดูแลระบบ', 'icon' => 'circle-o', 'url' => ['/admindetail/index'],],
                                    ['label' => 'ชื่อระบบงาน', 'icon' => 'circle-o', 'url' => ['/systemsoftware/index'],],
                                    ['label' => 'ข้อมูลUser:password', 'icon' => 'circle-o', 'url' => ['/usersystem/index'],],
                                    ['label' => 'ประเภท', 'icon' => 'circle-o', 'url' => ['/servertype/index'],],
                                    ['label' => 'โปรแกรม', 'icon' => 'circle-o', 'url' => ['/program/index'],],
                                    ['label' => 'บริษัท', 'icon' => 'circle-o', 'url' => ['/company/index'],],
                                    [
                                        'label' => 'Level One',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                            [
                                                'label' => 'Level Two',
                                                'icon' => 'circle-o',
                                                'url' => '#',
                                                'items' => [
                                                    ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                                    ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            ['label' => 'Manual', 'icon' => 'th', 'url' => ['/manual/index'],],
                        ],
                    ]
            )
            ?>
            <?php
        }
        ?>
    </section>

</aside>

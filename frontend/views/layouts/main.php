<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'Mail', 'items' => [
                        ['label' => 'ระบบจัดการเมล์', 'url' => 'http://comm.rtaf.mi.th/rtafmail/Admin_Login.aspx'],
                        ['label' => 'checkMailUser', 'url' => 'http://10.107.1.66/checkMailUser.asp'],
                         ['label' => 'ระบบตรวจสอบเมล์ ironport', 'url' => 'https://119.46.201.134:8443/'],
                    ]],
                
                ['label' => 'security', 'items' => [
                        ['label' => 'โปรแกรม IMPERVAR', 'url' => 'https://119.46.201.167:8083'],
                        ['label' => 'RSA Security Analytics โปรแกรม LOGS', 'url' => 'https://10.224.224.10/login'],
                        ['label' => 'โปรแกรมตรวจจับด้าน Security Onion', 'url' => 'https://10.226.82.52/app/kibana'],
                    ['label' => 'โปรแกรมกำจัด mailware Deepinstinct', 'url' => 'https://rtaf.poc.deepinstinctweb.com/#/'],
                    ['label' => 'โปรแกรมWebRoot', 'url' => 'https://my.webrootanywhere.com/'],
                        
                    ]],
                ['label' => 'Monitor', 'items' => [
                        ['label' => 'โปรแกรม solarwinds', 'url' => 'https://10.107.0.145/Orion/Login.aspx?ReturnUrl=%2f'],
                        ['label' => 'servermonitoring (spicework)', 'url' => 'www.servermonitoring.rtaf.mi.th:8080'],
                        
                    ]],
                ['label' => 'remote desktop', 'items' => [
                        ['label' => 'ระบบติดตามการปฏิบัติผู้ดูและระบบภายใน', 'url' => 'https://pam.rtaf.mi.th'],
                    ['label' => 'ระบบติดตามการปฏิบัติผู้ดูและระบบ นขต.', 'url' => 'https://10.107.1.113/PasswordVault/v10/logon'],
                    ['label' => 'ระบบยืนยันตัวบุคคลหลายปัจจัย twofacter', 'url' => 'https://twofactor.rtaf.mi.th/console/'],
                        
                        
                    ]],
                ['label' => 'BACKUP', 'items' => [
                        ['label' => 'arcerve DC', 'url' => 'https://10.229.4.19:8015/management/'],
                    ['label' => 'arcerve DR', 'url' => 'https://10.235.0.181:8015/management/'],
                        
                        
                    ]],
                
                ['label' => 'จัดเก็บข้อมูล', 'items' => [
                        ['label' => 'box101', 'url' => 'https://box101.rtaf.mi.th'],
                    ['label' => 'AirWatch SSP', 'url' => 'https://box.rtaf.mi.th'],
                        
                        
                    ]],
                
                
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>';
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container">
            <?=
            Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ])
            ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

                <p class="pull-right"><?php echo "Powered by sumlee_y"; //Yii::powered("sumlee_y")  ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

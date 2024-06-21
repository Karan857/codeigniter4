<div class="container-fluid ">
    <a class="navbar-brand text-white" href="<?= base_url(); ?>"><h1>Visit Nakhonphathom</h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menubar" aria-controls="menubar"
         aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse d-flex justify-content-around" id="menubar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>home">หน้าหลัก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>attractions">สถานที่ท่องเที่ยว</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>food">ร้านอาหาร</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>history">ประวัติ</a>
                </li>

            <?php if (session()->get('logged_in')): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        จัดการ
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url(); ?>user">จัดการผู้ใช้</a></li>
                        <li><a class="dropdown-item" href="<?= base_url(); ?>manage">จัดการสถานที่ท่องเที่ยว</a></li>
                        <li><a class="dropdown-item" href="<?= base_url(); ?>product">จัดการร้านอาหาร</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $loggedUser['name']; ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url(); ?>profile">ข้อมูลของฉัน</a></li>
                        <li><a class="dropdown-item" href="<?= base_url(); ?>logout">ออกจากระบบ</a></li>
                    </ul>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>login">เข้าสู่ระบบ</a>
                </li>
            <?php endif ?>
        </ul>
    </div>
</div>
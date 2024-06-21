<div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url(); ?>">ร้านขายดี</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menubar" aria-controls="menubar"
         aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse d-flex justify-content-between" id="menubar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>home">หน้าหลัก</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>shop">สินค้า</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>me">me</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    เกี่ยวกับ
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?= base_url(); ?>about/shipping">ข้อมูลจัดส่ง</a></li>
                    <li><a class="dropdown-item" href="<?= base_url(); ?>about/contact">ข้อมูลติดต่อ</a></li>
                </ul>
            </li>

            <?php if (session()->get('logged_in')): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>user">จัดการผู้ใช้</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>product">จัดการสินค้า</a>
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
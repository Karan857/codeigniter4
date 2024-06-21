<script>
    <?php if ($error): ?>
        Swal.fire({
            title: "เพิ่มร้านอาหารไม่สำเร็จ",
            text: "<?= $message ?>",
            icon: "error"
        }).then(function() {
            window.location.href = "<?= base_url() ?>product/create";
        });
    <?php else: ?>
        Swal.fire({
            title: "เพิ่มร้านอาหารสำเร็จ!",
            text: "<?= $message ?>",
            icon: "success"
        }).then(function() {
            window.location.href = "<?= base_url() ?>product";
        });
    <?php endif; ?>
</script>
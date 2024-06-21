<script>
    <?php if ($error): ?>
        Swal.fire({
            title: "ลบสถานที่ท่องเที่ยวไม่สำเร็จ",
            text: "<?= $message ?>",
            icon: "error"
        }).then(function() {
            window.location.href = "<?= base_url() ?>manage";
        });
    <?php else: ?>
        Swal.fire({
            title: "ลบสถานที่ท่องเที่ยวสำเร็จ!",
            text: "<?= $message ?>",
            icon: "success"
        }).then(function() {
            window.location.href = "<?= base_url() ?>manage";
        });
    <?php endif; ?>
</script>
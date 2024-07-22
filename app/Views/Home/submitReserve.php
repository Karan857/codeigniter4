<script>
    <?php if ($error) : ?>
        Swal.fire({
            title: "จองรถยนต์ไม่สำเร็จ",
            text: "<?= $message ?>",
            icon: "error"
        }).then(function() {
            window.location.href = "<?= base_url() ?>list/detail";
        });
    <?php else : ?>
        Swal.fire({
            title: "จองรถยนต์สำเร็จ!",
            text: "<?= $message ?>",
            icon: "success"
        }).then(function() {
            window.location.href = "<?= base_url() ?>list/detail";
        });
    <?php endif; ?>
</script>
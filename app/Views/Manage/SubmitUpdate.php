<script>
    <?php if ($error): ?>
        Swal.fire({
            title: "แก้ไขสถานที่ท่องเที่ยวไม่สำเร็จ",
            text: "<?= $message ?>",
            icon: "error"
        }).then(function() {
            window.location.href = "<?= base_url() ?>manage/update/<?= $id ?>";
        });
    <?php else: ?>
        Swal.fire({
            title: "แก้ไขสถานที่ท่องเที่ยวสำเร็จ!",
            text: "<?= $message ?>",
            icon: "success"
        }).then(function() {
            window.location.href = "<?= base_url() ?>manage";
        });
    <?php endif; ?>
</script>
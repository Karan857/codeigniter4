<script>
<?php if ($error): ?>
Swal.fire({
    title: "ลบรถยนต์ไม่สำเร็จ",
    text: "<?= $message ?>",
    icon: "error"
}).then(function() {
    window.location.href = "<?= base_url() ?>admin/product";
});
<?php else: ?>
Swal.fire({
    title: "ลบรถยนต์สำเร็จ!",
    text: "<?= $message ?>",
    icon: "success"
}).then(function() {
    window.location.href = "<?= base_url() ?>admin/product";
});
<?php endif; ?>
</script>
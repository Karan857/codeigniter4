<script>
<?php if ($error): ?>
Swal.fire({
    title: "เพิ่มรถยนต์ไม่สำเร็จ",
    text: "<?= is_array($message) ? implode(' ', $message) : $message ?>",
    icon: "error"
}).then(function() {
    window.location.href = "<?= base_url() ?>admin/product/create";
});
<?php else: ?>
Swal.fire({
    title: "เพิ่มรถยนต์สำเร็จ!",
    text: "<?= is_array($message) ? implode(' ', $message) : $message ?>",
    icon: "success"
}).then(function() {
    window.location.href = "<?= base_url() ?>admin/product";
});
<?php endif; ?>
</script>

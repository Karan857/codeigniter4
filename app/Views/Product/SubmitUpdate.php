<script>
<?php if ($error): ?>
Swal.fire({
    title: "แก้ไขรถยนต์ไม่สำเร็จ",
    text: "<?= $message ?>",
    icon: "error"
}).then(function() {
    window.location.href = "<?= base_url() ?>admin/product/update/<?= $id ?>";
});
<?php else: ?>
Swal.fire({
    title: "แก้ไขรถยนต์สำเร็จ!",
    text: "<?= $message ?>",
    icon: "success"
}).then(function() {
    window.location.href = "<?= base_url() ?>admin/product";
});
<?php endif; ?>
</script>
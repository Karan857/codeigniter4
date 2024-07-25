<div class="md:container md:mx-auto px-[50px] py-[50px]">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-cyan-800 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <i class="fas fa-user text-2xl"></i>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone Number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <button type="button" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a href="<?= base_url() . 'user/create'; ?>">เพิ่มผู้ใช้งาน</a></button>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $index => $row) : ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= ($index + 1); ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $row['username']; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['name']; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['email']; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['phone_number']; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['address']; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['role']; ?>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="<?= base_url() . 'user/update/' . $row['user_id']; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:text-blue-900 mx-2"><i class="fas fa-pencil"></i></a>

                            <button action="delete" data-id="<?= $row['user_id']; ?>" class="font-medium text-red-600 dark:text-red-500 hover:text-yellow-500"><i class="fa fa-trash delete-icon"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
    <script>
        document.addEventListener('click', function(event) {
            var target = event.target;
            if (target.matches('.delete-icon')) {
                event.preventDefault();
                Swal.fire({
                    title: "ยืนยันการลบ?",
                    text: "ต้องการที่จะลบข้อมูลหรือไม่",
                    icon: "question",
                    showCancelButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        var userId = target.closest('button').getAttribute('data-id');
                        location.href = '<?= base_url() . 'user/delete/' ?>' + userId;
                    }
                });
            }
        });
    </script>
</div>
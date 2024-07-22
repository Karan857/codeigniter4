<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $title; ?></title>

<style>
.detail {
    width: 100%;

    .container {
        margin: 2rem;
        border-radius: 1rem;
        background: gray;
        width: auto;
        display: flex;
        flex-wrap: wrap;

        .image {
            flex: 3;
            object-fit: cover;
        }

        .content {
            flex: 2;
            width: 100%;
            padding: 2rem;
            position: relative;

            p {
                color: red;

                span {
                    color: orange;
                    position: relative;
                    padding-right: 1rem;
                }
            }

            button {
                position: absolute;
                bottom: 2rem;
                right: 2rem;
                padding: 0.25rem 1rem;
                border-radius: 1rem;
                background: teal;
            }

        }


    }
}
</style>


<link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css">
<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
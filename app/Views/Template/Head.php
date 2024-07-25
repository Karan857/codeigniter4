<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $title; ?></title>
<style>
    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: scale(0.1);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes blur {
        0% {
            filter: blur(30%);
        }

        45%,
        55% {
            filter: blur(0);
        }

        100% {
            filter: blur(30%);
        }
    }





    .contract_2 {
        margin: 1rem 4rem;
        border-radius: 1rem;
        padding: 2rem;
        border: 2px solid #cdcdcd;

        h1 {
            text-align: center;
            font-size: 2rem;
        }

        form {
            .container {
                display: flex;
                flex-direction: row;
                margin: auto;

                div {
                    display: flex;
                    flex-direction: column;
                    flex: 1;

                    div {

                        input,
                        textarea {
                            gap: 1rem;
                            width: 80vh;
                            padding: 0.5rem;
                            border-radius: 0.5rem;
                            border: 1px solid #ccc;
                            margin: 0.5rem;
                        }
                    }
                }
            }

            .contract {
                margin: 2rem;
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 1rem;
            }

            button {
                align-items: center;
                display: flex;
                justify-content: center;
            }

        }


    }
</style>

<link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css">
<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
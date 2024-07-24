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



    .detail {


        .blur {
            animation: blur linear both;
            animation-timeline: view();
            font-size: 4rem;

        }


        .image {
            margin: 0;
            padding: 0;
            width: 100%;
            height: auto;
            position: relative;
            display: flex;
            justify-content: center;

            img {
                width: 100vw;
                height: 100vh;
                object-fit: cover;
                z-index: 0;
            }

            .desc {
                position: absolute;
                bottom: 2.5em;
                color: white;
                font-size: 1.5rem;
                text-align: center;
                justify-content: center;
                align-items: center;
                z-index: 2;


                h1 {
                    margin-bottom: 20px;
                    font-size: 1.5rem
                }

                a {
                    border-radius: 5px;
                    border: 1px solid white;
                    padding: 3px 2em;
                    width: 100px;
                    height: 40px;
                    background-color: transparent;
                    color: white;
                    font-size: 1em;
                    transition: 0.2s linear;
                    background-color: transparent;
                    backdrop-filter: blur(10px);

                }

            }


        }

        .image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 1));
            z-index: 1;
        }

        .intro {
            width: 100%;
            height: 100vh;
            position: relative;

            img {
                width: 100%;
                height: 100%;
                filter: brightness(15%);
                transform: scaleX(-1);


            }

            .intro-text {
                position: absolute;
                top: 7em;
                left: 50%;
                transform: translateX(-50%);
                color: white;

                animation: fadeUp both;
                animation-timeline: view(50% auto);
                animation-range: entry 50% cover 50%;


                h1 {
                    font-size: 3rem;
                    font-weight: bold;
                    text-transform: uppercase;
                    letter-spacing: 8px;
                }

                h2 {
                    font-size: 4rem;
                    font-weight: bold;
                    text-transform: uppercase;
                    letter-spacing: 8px;
                    color: red;
                }
            }






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
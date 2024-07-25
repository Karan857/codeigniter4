<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parallax Example</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap');

        @keyframes fade {
            from {
                opacity: 0;
                transform: translateY(-100px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideLeft {
            from {
                opacity: 0;
                transform: translateY(-100px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideRight {
            from {
                opacity: 0;
                transform: translateY(300px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes left {
            from {
                opacity: 0;
                transform: translateX(300px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes text {
            from {
                opacity: 0;
                transform: scale(0.2);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes fadeOnly {
            from {
                opacity: 0;

            }

            to {
                opacity: 1;

            }
        }

        @keyframes opacity {
            from {
                opacity: 0;

            }

            to {
                opacity: 1;

            }
        }

        @keyframes slide {
            from {
                transform: translateX(-200px)
            }

            to {
                transform: translateX(0)
            }
        }

        .detail {

            .image {
                width: 100%;
                height: 100vh;
                background-image: url('<?= base_url($rowProduct['preview_image']); ?>');
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                position: relative;



                .desc {
                    position: absolute;
                    bottom: 2.5em;
                    color: white;
                    font-size: 1.5rem;
                    text-align: center;
                    z-index: 2;
                    left: 50%;
                    margin-bottom: 6rem;
                    transform: translateX(-50%);

                    animation: fadeOnly 3s linear;



                    h1 {
                        margin-bottom: 20px;
                        font-size: 1.5rem;
                    }

                    a {
                        border-radius: 5px;
                        border: 1px solid white;
                        padding: 10px 80px;
                        background-color: transparent;
                        color: white;
                        font-size: 1.5rem;
                        transition: 0.2s linear;
                        backdrop-filter: blur(10px);
                        transition: 0.3s ease-in-out;
                    }

                    a:hover {
                        background-color: white;

                        color: black;
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
        }

        .intro {
            width: 100%;
            height: 100vh;
            background: black;
            color: white;
            position: relative;

            .text {
                position: absolute;
                color: gray;
                top: 2em;
                left: 50%;
                transform: translateX(-50%);

                h2 {
                    font-size: 15rem;
                    letter-spacing: 3rem;
                    font-family: "Permanent Marker", cursive;
                    font-weight: 400;
                    font-style: normal;
                    animation: text 5s both;
                    animation-timeline: view(50% auto);

                }

                h1 {
                    position: absolute;
                    top: 8rem;
                    font-size: 15rem;
                    left: 30%;
                    background: linear-gradient(to right, darkred, orange);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    font: uppercase;
                    font-weight: bold;
                    letter-spacing: 1rem;
                    animation: text 8s both;
                    animation-timeline: view(50% auto);
                }
            }
        }

        .inside {
            display: flex;
            height: 100vh;

            .image {
                flex: 2;


                img {
                    object-fit: cover;
                }
            }

            .image::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(to right,
                        rgba(0, 0, 0, 0) 0%,
                        rgba(0, 0, 0, 0.8) 50%,
                        rgba(0, 0, 0, 1) 100%);
                z-index: 1;
            }

            .text {
                background: linear-gradient(to left, rgba(0, 0, 0, 1), rgba(0, 0, 0, 1));
                flex: 1;
                justify-content: center;
                align-items: left;
                display: flex;
                flex-direction: column;
                right: 0;
                color: white;
                height: 100%;
                z-index: 2;

                .eee {
                    margin-right: 1rem;
                    border: 3px solid red;
                    width: 300px;
                    transform: translateX(-180px) translateY(70px) rotate(90deg);
                    backdrop-filter: blur(20px);
                }

                h5 {
                    font-weight: bold;

                    animation: slideRight 0.5s both;
                    animation-timeline: view(50% auto);

                }

                h1 {
                    font-size: 2rem;
                    font-weight: bold;
                    text-transform: uppercase;
                    animation: slideRight 0.5s both;
                    animation-timeline: view(50% auto);


                    span {
                        color: red;
                        font-size: 2rem;
                        font-weight: bold;
                        text-transform: uppercase;
                    }
                }
            }
        }

        .intro_2 {
            display: flex;

            .text {
                flex: 1;
                justify-content: center;
                display: flex;
                flex-direction: column;
                background: black;
                color: white;
                text-align: right;
                padding-right: 2rem;


                .e {
                    transform: rotate(90deg) translateY(-370px) translateX(50px);
                    transform-origin: middle right;
                    width: 300px;
                    border: 3px solid red;

                }






                h5 {
                    font-weight: bold;
                    animation: slideLeft 0.5s both;
                    animation-timeline: view(50% auto);

                }

                h1 {
                    font-size: 2rem;
                    font-weight: bold;
                    text-transform: uppercase;
                    animation: slideLeft 0.5s both;
                    animation-timeline: view(50% auto);


                    span {
                        color: red;
                        font-size: 2rem;
                        font-weight: bold;
                        text-transform: uppercase;
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
                background: linear-gradient(to left,
                        rgba(0, 0, 0, 0.7) 0%,
                        rgba(0, 0, 0, 1) 100%);
                z-index: 1;
            }

            .image {
                flex: 2;

                img {
                    width: 100%;
                    height: auto;
                }
            }
        }

        .section {
            display: flex;
            height: 100vh;

            .image2 {
                flex: 2;

                .showimg {
                    height: 70%;
                    position: relative;


                    img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;

                        animation: opacity 1s both;
                        animation-timeline: view();

                    }

                    h3 {
                        position: absolute;
                        bottom: 3rem;
                        right: 10%;
                        color: white;
                        z-index: 888;
                        font-size: 2rem;
                        font-weight: bold;
                    }
                }

                .showimg2 {
                    height: 30%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    gap: 2rem;



                    img {
                        width: 200px;
                        height: 150px;
                        border: 2px solid black;
                        border-radius: 10px;

                    }
                }


            }

            .text {
                padding: 1rem;
                flex: 1;
                margin: 0;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                margin: 1rem;


                h1 {
                    font-size: 2rem;
                    font-weight: bold;
                    border-bottom: 2px solid gray;
                    width: fit-content;
                    padding-bottom: 1rem;
                    margin: 1rem;

                    animation: slideLeft 1s both;
                    animation-timeline: view();
                }

                h2 {
                    margin: 1rem 3rem;
                    animation: slideRight 1s both;
                    animation-timeline: view();
                }

                h3 {
                    float: right;

                }

                .select {
                    display: flex;
                    gap: 1rem;
                    justify-content: space-between;
                    align-items: center;
                    margin: 2rem;

                    animation: opacity 1s both;
                    animation-timeline: view();

                    .color {
                        display: flex;
                        gap: 2rem;


                    }

                    a {
                        border: 2px solid black;
                        border-radius: 10px;
                        color: black;
                        width: 200px;
                        padding: 5px;
                        font-weight: bold;
                        font-size: 1.5rem;
                        text-align: center;
                        transition: 0.5s ease-in-out;
                    }

                    a:hover {
                        background: black;
                        color: white;
                    }
                }

                .black {
                    width: 50px;
                    height: 50px;
                    border-radius: 50%;
                    background: black;
                    border: 3px solid red;
                    border-radius: 10px;
                }

                .red {
                    width: 50px;
                    height: 50px;
                    border-radius: 50%;
                    background: red;
                    border-radius: 10px;


                }
            }
        }
    </style>
</head>

<body>
    <div class="detail">
        <div class="image">
            <div class="desc">
                <h1>เริ่มต้น <br><b>THB <?= $rowProduct['price'] ?></b></h1>
                <a href="#">ซื้อตอนนี้</a>
            </div>
        </div>
        <div class="intro">
            <div class="text">
                <h2><?= $rowProduct['brand'] ?></h2>
                <h1><?= $rowProduct['name'] ?></h1>
            </div>
        </div>

        <div class="intro_2">
            <div class="text">
                <hr class="e">
                <h5>ดีไซต์ภายนอก</h5>
                <h1>unlock the <br><span>feature</span> </h1>
                <p>ดุดัน ไม่เกรงใจใคร</p>
                <div class="eee"></div>
            </div>
            <div class="image">
                <img src="<?= base_url($rowProduct['color_image1']); ?>" alt="image">
            </div>
        </div>
        <div class="inside">
            <div class="image">
                <img src="<?= base_url($rowProduct['inside_image']); ?>" alt="image">

            </div>
            <div class="text">

                <h5>
                    <div class="eee"></div>
                    &nbsp;ดีไซต์ภายใน
                </h5>
                <h1>unlock the <br><span>INTERIOR</span> </h1>
                <p>หรูหราทุกรายละเอียด บริการประทับใจ</p>
            </div>
        </div>
        <div class="section">
            <div class="image2">
                <div class="showimg">
                    <img id="productImage" src="<?= base_url() . $rowProduct['color_image1'] ?>" alt="img">
                    <h3>THB <?= $rowProduct['price'] ?></h3>
                </div>
                <div class="showimg2">
                    <img id="productImage2" src="<?= base_url() . $rowProduct['color_image1'] ?>" alt="img">
                    <img id="inside" src="<?= base_url() . $rowProduct['inside_image'] ?>" alt="img">
                </div>
            </div>
            <div class="text">
                <div class="detail">
                    <h1><?= $rowProduct['name'] ?></h1>
                    <h2><?= $rowProduct['desc'] ?></h2>
                </div>
                <div class="select">
                    <div class="color">
                        <div id="black" class="black"></div>
                        <div id="red" class="red"></div>

                    </div>
                    <a href="<?= base_url('product/' . $rowProduct['product_id'] . '/contact_1') ?>">จองรถ</a>
                </div>
            </div>
        </div>




    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const blackOption = document.getElementById('black');
            const redOption = document.getElementById('red');

            const productImage = document.getElementById('productImage');
            const productImage2 = document.getElementById('productImage2');

            const blackImageUrl = '<?= base_url($rowProduct['color_image1']); ?>';
            const redImageUrl = '<?= base_url($rowProduct['color_image2']); ?>';


            blackOption.addEventListener('click', function() {
                productImage.src = blackImageUrl;
                productImage2.src = blackImageUrl;
                blackOption.style.border = '2px solid red';
                redOption.style.border = 'none';


            });

            redOption.addEventListener('click', function() {
                productImage.src = redImageUrl;
                productImage2.src = redImageUrl;
                redOption.style.border = '3px solid black';
                blackOption.style.border = 'none';


            });
        });
    </script>

</body>

</html>
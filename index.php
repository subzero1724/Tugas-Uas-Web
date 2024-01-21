<?php
include 'include/db.php';

// Create a new instance of the Database class
$database = new Database();

// Fetch shoe data from the database
$sql = "SELECT * FROM shoes";
$result = $database->executeQuery($sql);

if(isset($_POST['cart'])){
    $prod_name = $_POST["Product_Name"];
    $price = $_POST["price"];
    $image = $_POST["image"];

    $quary = "INSERT INTO cart (product_name,price,image) VALUES('$prod_name','$price','$image')";
    $hasInsert = $database -> executeQuery($quary);

    if($hasInsert){
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Web HTML</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <!-- header section starts  -->

    <header>

        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>

        <a href="#" class="logo">sepatu<span>.</span></a>

        <nav class="navbar">
            <a href="#home">beranda</a>
            <a href="#about">tentang</a>
            <a href="#products">produk</a>
            <a href="#review">ulasan</a>
            <a href="#contact">kontak</a>
        </nav>

        <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-user"></a>
        </div>

    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>unsera sneakers</h3>
            <span> original & berkualitas </span>
            <p>"Sepatu adalah bagian penting dari penampilan Anda. Saya rasa jika pakaian Anda bukan sesuatu yang
                istimewa, maka alas kaki yang asyik adalah cara yang bagus untuk meramaikannya dan membuat setelan
                pakaian Anda lebih menarik."</p>
            <p>- Christian Siriano</p>
            <a href="#" class="btn">beli sekarang</a>
        </div>

    </section>

    <!-- home section ends -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <h1 class="heading"> <span> Tentang </span> Kami </h1>

        <div class="row">

            <div class="video-container">
                <video src="images/about-vid.mp4" loop autoplay muted></video>
                <h3>penjual sepatu terbaik</h3>
            </div>

            <div class="content">
                <h3>kenapa memilih kami?</h3>
                <p>Unsera Sneakers sudah menjual lebih dari 7000 produk sepatu dalam kurun waktu 3 bulan. sudah terjual
                    ke seluruh indonesia bahkan malaysia, vietnam dan thailand.</p>
                <p>Produk yang kami jual 100% Original dan Berkualitas. Sehingga sudah tidak diragukan lagi kepercayaan
                    Anda terhadap Unsera Sneakers.</p>
                <a href="#" class="btn">selanjutnya</a>
            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- icons section starts  -->

    <section class="icons-container">

        <div class="icons">
            <img src="images/icon-1.png" alt="">
            <div class="info">
                <h3>pengiriman gratis</h3>
                <span>pada semua pesanan</span>
            </div>
        </div>

        <div class="icons">
            <img src="images/icon-2.png" alt="">
            <div class="info">
                <h3>10 hari kembali</h3>
                <span>garansi uang kembali</span>
            </div>
        </div>

        <div class="icons">
            <img src="images/icon-3.png" alt="">
            <div class="info">
                <h3>penawaran & hadiah</h3>
                <span>pada semua pesanan</span>
            </div>
        </div>

        <div class="icons">
            <img src="images/icon-4.png" alt="">
            <div class="info">
                <h3>pembayaran yang aman</h3>
                <span>dilindungi oleh ojk</span>
            </div>
        </div>

    </section>

    <!-- icons section ends -->

    <!-- prodcuts section starts  -->



    <section class="products" id="products">
        <h1 class="heading"> produk <span>terbaru</span> </h1>

        <div class="box-container">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="box">
                            <span class="discount">-' . $row['discount'] . '%</span>
                            <div class="image">
                            <img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="">
                                <div class="icons">
                                    <a href="#" class="fas fa-heart"></a>
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="Product_Name" value='.$row['name'].'>
                                        <input type="hidden" name="price" value='.$row['price'].'>
                                        <input type="hidden" name="image" value='. base64_encode($row['image']).'>
                                        <button name="cart" class="tombol">add to cart</button>
                                    </form>

                                    <a href="#" class="fas fa-share"></a>
                                </div>
                            </div>
                            <div class="content">
                                <h3>' . $row['name'] . '</h3>
                                <div class="price"> Rp.' . $row['price'] . '<span>Rp.' . $row['original_price'] . '</span></div>
                            </div>
                        </div>';
                }
            } else {
                echo "No shoes available.";
            }
            $database->closeConnection();
            ?>
        </div>
        <a class="btn" id="viewMoreProductsBtn">Lihat Lebih Banyak</a>
    </section>




    <!-- prodcuts section ends -->

    <!-- review section starts  -->

    <section class="review" id="review">

        <h1 class="heading"> ulasan <span>pembeli</span> </h1>

        <div class="box-container">

            <div class="box">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>Bagus Bangett, sesuai dengan yang di gambar, kualitas nya bagus dengan harga segitu , masih sangat
                    terjangkau.</p>
                <div class="user">
                    <img src="images/pic-1.png" alt="">
                    <div class="user-info">
                        <h3>galang bhri</h3>
                        <span>senang</span>
                    </div>
                </div>
                <span class="fas fa-quote-right"></span>
            </div>

            <div class="box">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>bagus sepatunya bahannya juga enak buat dipake kemana mana.</p>
                <br><br><br><br>
                <div class="user">
                    <img src="images/pic-2.png" alt="">
                    <div class="user-info">
                        <h3>rivaldi ras</h3>
                        <span>senang</span>
                    </div>
                </div>
                <span class="fas fa-quote-right"></span>
            </div>

            <div class="box">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p>wah keren sih ini sepatunya, kemarin dipakai buat acara lamaran semakin pede.</p>
                <br><br>
                <div class="user">
                    <img src="images/pic-3.png" alt="">
                    <div class="user-info">
                        <h3>ahmad m</h3>
                        <span>senang</span>
                    </div>
                </div>
                <span class="fas fa-quote-right"></span>
            </div>

        </div>

    </section>

    <!-- review section ends -->

    <!-- contact section starts  -->

    <section class="contact" id="contact">

        <h1 class="heading"> <span> Hubungi </span> Kami </h1>

        <div class="row">

            <form action="">
                <input type="text" placeholder="nama" class="box">
                <input type="email" placeholder="email" class="box">
                <input type="number" placeholder="nomor" class="box">
                <textarea name="" class="box" placeholder="pesan" id="" cols="30" rows="10"></textarea>
                <input type="submit" value="kirim pesan" class="btn">
            </form>

            <div class="image">
                <img src="images/R.svg" alt="">
            </div>

        </div>

    </section>

    <!-- contact section ends -->

    <!-- footer section starts  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>Pintasan</h3>
                <a href="#home">beranda</a>
                <a href="#about">Tentang</a>
                <a href="#products">Produk</a>
                <a href="#review">review</a>
                <a href="#contact">Kontak</a>
            </div>

            <div class="box">
                <h3>Pintasan tambahan</h3>
                <a href="#">Akun saya</a>
                <a href="#">Pesanan saya</a>
                <a href="#">Favorit saya</a>
            </div>

            <div class="box">
                <h3>Lokasi</h3>
                <a href="#">Indonesia</a>
            </div>

            <div class="box">
                <h3>info kontak</h3>
                <a href="#">+62-896-5777-7301</a>
                <a href="#">rivaldirasyid2020@gmail.com</a>
                <a href="#">Serang, Indonesia - 42423</a>
                <img src="images/payment.png" alt="">
            </div>

        </div>

        <div class="credit"> dibuat oleh <span> kelompok tugas html </span> | all rights reserved </div>

    </section>

    <!-- footer section ends -->



</body>


</body>

</html>
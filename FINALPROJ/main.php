<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    </head>
<body>

<style>
         @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600&display=swap');

         *{
            font-family: 'Nunito', sans-serif;
            margin:0; padding:0;
            box-sizing: border-box;
            outline: none; border:none;
            text-decoration: none;
            transition: all .2s linear;
            text-transform: capitalize;
         }

         html{
            font-size: 62.5%;
            overflow-x: hidden;
         }
         
         body{
            background-image: url('https://asset.gecdesigns.com/img/wallpapers/blue-purple-beautiful-scenery-ultra-hd-wallpaper-4k-sr10012421-1706505497434-cover.webp');
            background-size: cover;
            background-position: center;
            height: 100vh;
         }
         .navbar {
            width: 100%;
            background-color: #111111;
            overflow: auto;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            opacity: 0.9;
         }

         .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 10px;
            padding-left: 20px;
         }

         .logo img {
            width: 50px; 
            height: 50px; 
            object-fit: cover;
            border-radius: 50px; 
         }

         .nav-menu {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
            padding-left: 650px;
            font-size: 15px;
         }

         .nav-item {
            margin: 0 10px;
         }
         .active{
            background-color: gray;
            border-radius: 10px;
         }

         .nav-link {
            color: #fff;
            text-decoration: none;
            padding: 14px 20px;
            display: block;
            padding-right: 20px;
         }

         .nav-link:hover {
            background-color: #575757;
            border-radius: 4px;
         }

         .search-box {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 4px;
            overflow: hidden;
         }

         .search-box input {
            border: none;
            padding: 10px;
            outline: none;
         }

         .search-box button {
            border: none;
            padding: 10px;
            background-color: #333;
            color: #fff;
            cursor: pointer;
         }

         .search-box button:hover {
            background-color: #575757;
         }


         .container{
            max-width: 1200px;
            margin:0 auto;
            padding:3rem 2rem;
            padding-top: 10rem;
         }

         .container .title{
            font-size: 3.5rem;
            color:#ffffff;
            margin-bottom: 3rem;
            text-transform: uppercase;
            text-align: center;
         }

         .container .products-container{
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
            gap:2rem;
         }

         .container .products-container .product{
            text-align: center;
            padding:3rem 2rem;
            background: #fff;
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
            outline: .1rem solid #ccc;
            outline-offset: -1.5rem;
            cursor: pointer;
         }

         .container .products-container .product:hover{
            outline: .2rem solid #222;
            outline-offset: 0;
         }

         .container .products-container .product img{
            height: 25rem;
         }

         .container .products-container .product:hover img{
            transform: scale(.9);
         }

         .container .products-container .product h3{
            padding:.5rem 0;
            font-size: 2rem;
            color:#444;
         }

         .container .products-container .product:hover h3{
            color:#27ae60;
         }

         .container .products-container .product .price{
            font-size: 2rem;
            color:#444;
         }

         .products-preview{
            position: fixed;
            top:0; left:0;
            min-height: 100vh;
            width: 100%;
            background: rgba(0,0,0,.8);
            display: none;
            align-items: center;
            justify-content: center;
            padding-top: 6rem;
         }

         .products-preview .preview{
            display: none;
            padding:2rem;
            text-align: center;
            background: #fff;
            position: relative;
            margin:2rem;
            width: 40rem;
         }

         .products-preview .preview.active{
            display: inline-block;
         }

         .products-preview .preview img{
            height: 25rem;
         }

         .products-preview .preview .fa-times{
            position: absolute;
            top:1rem; right:1.5rem;
            cursor: pointer;
            color:#444;
            font-size: 4rem;
         }

         .products-preview .preview .fa-times:hover{
            transform: rotate(90deg);
         }

         .products-preview .preview h3{
            color:#444;
            padding:.5rem 0;
            font-size: 2.5rem;
         }

         .products-preview .preview .stars{
            padding:1rem 0;
            font-size: 1.7rem;
         }

         .products-preview .preview .stars i{
            color:#27ae60;
         }

         .products-preview .preview .stars span{
            color:#999;
         }

         .products-preview .preview p{
            line-height: 1.5;
            padding:1rem 0;
            font-size: 1.1rem;
            color:#777;
         }

         .products-preview .preview .price{
            padding:1rem 0;
            font-size: 2.5rem;
            color:#27ae60;
         }

         .products-preview .preview .buttons{
            display: flex;
            gap:1.5rem;
            flex-wrap: wrap;
            margin-top: 1rem;
         }

         .products-preview .preview .buttons a{
            flex:1 1 16rem;
            padding:1rem;
            font-size: 1.8rem;
            color:#444;
            border:.1rem solid #444;
         }

         .products-preview .preview .buttons a.cart{
            background: #444;
            color:#fff;
         }

         .products-preview .preview .buttons a.cart:hover{
            background: #111;
         }

         .products-preview .preview .buttons a.buy:hover{
            background: #444;
            color:#fff;
         }


         @media (max-width:991px){


         }

         @media (max-width: 480px) {
            .product {
               width: 100%;
            }

            html{
               font-size: 55%;
            }

         }

         @media (max-width:768px){

            .products-preview .preview img{
               height: 25rem;
            }

         }

         @media (max-width:450px){

            html{
               font-size: 50%;
            }

         }
</style>

   <nav class="navbar">
      <div class="navbar-container">
         <a href="#" class="logo"><img src="images/istockphoto-1321617070-612x612.jpg" alt="Medical Products Logo"></a>
         <ul class="nav-menu">
            <li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Products</a></li>
            <li class="nav-item"><a href="#" class="nav-link">About</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
            <li class="nav-item"><a href="login.php" class="nav-link">Logout</a></li>
         </ul>
         <div class="search-box">
            <input type="text" placeholder="Search...">
            <button type="submit"><i class="fas fa-search"></i></button>
         </div>
      </div>
   </nav>
  
<div class="container">
   <div class="products-container">

      <div class="product" data-name="p-1">
         <img src="./images/bpapp1.jpg" alt="">
         <h3>Sphygmomanometer</h3>
         <div class="price">P800.00</div>
      </div>

      <div class="product" data-name="p-2">
         <img src="./images/digither2.jpg" alt="">
         <h3>Digital Thermometer</h3>
         <div class="price">P150.00</div>
      </div>

      <div class="product" data-name="p-3">
         <img src="./images/elastic3.jpg" alt="">
         <h3>Elastic Bandage</h3>
         <div class="price">P40.00</div>
      </div>

      <div class="product" data-name="p-4">
         <img src="./images/iodine4.jpg" alt="">
         <h3>Povidone Iodine</h3>
         <div class="price">P120.00</div>
      </div>

      <div class="product" data-name="p-5">
         <img src="./images/micropore5.jpg" alt="">
         <h3>Micropore tape</h3>
         <div class="price">P200.00</div>
      </div>

      <div class="product" data-name="p-6">
         <img src="./images/pad6.jpg" alt="">
         <h3>Gauze pad</h3>
         <div class="price">P30.00</div>
      </div>

   </div>

</div>

<div class="products-preview">

   <div class="preview" data-target="p-1">
      <i class="fas fa-times"></i>
      <img src="./images/bpapp1.jpg" alt="">
      <h3>Sphygmomanometer</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>A <strong>sphygmomanometer</strong> is used to indirectly measure arterial blood pressure. Sphygmomanometry is the process of manually measuring one's blood pressure. This is the blood pressure cuff that one would see in the Doctor's office, or in a medical clinical/setting.</p>
      <div class="price">P800.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-2">
      <i class="fas fa-times"></i>
      <img src="./images/digither2.jpg" alt="">
      <h3>Digital Thermometer</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p><strong>Digital thermometer</strong> work by using heat sensors that determine body temperature. They can be used to take temperature readings in the mouth, rectum, or armpit..</p>
      <div class="price">P150.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-3">
      <i class="fas fa-times"></i>
      <img src="./images/elastic3.jpg" alt="">
      <h3>Compression Bandage</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p>A <strong>compression bandage</strong> is a long strip of stretchable cloth that you can wrap around a sprain or strain. It's also called an elastic bandage or a Tensor bandage. The gentle pressure of the bandage helps reduce swelling, so it may help the injured area feel better.</p>
      <div class="price">P40.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-4">
      <i class="fas fa-times"></i>
      <img src="./images/iodine4.jpg" alt="">
      <h3>Povidone Iodine</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p><strong>Povidone Iodine</strong> is used on the skin to decrease risk of infection. This medicine is also used as a surgical hand scrub and to wash the skin and surface of the eye before surgery to help prevent infections.</p>
      <div class="price">P120.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-5">
      <i class="fas fa-times"></i>
      <img src="./images/micropore5.jpg" alt="">
      <h3>Micropore Tape</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p><strong>Micropore Tape</strong>is commonly used to secure bandages and dressings to the skin without leaving a sticky residue, micropore paper tape is hypoallergenic and can be used long-term without fear of skin irritation. Its adhesive sticks to the skin, underlying tape, or directly to dressing materials.</p>
      <div class="price">P200.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

   <div class="preview" data-target="p-6">
      <i class="fas fa-times"></i>
      <img src="./images/pad6.jpg" alt="">
      <h3>Gauze Pad</h3>
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star-half-alt"></i>
         <span>( 250 )</span>
      </div>
      <p><strong>Gauze Pads</strong> are great for treating minor cuts, scrapes, and burns. They can be used to absorb fluids and provide a semi-permeable barrier over a wound. They can also be used to apply ointments or rub cleansing fluids such as isopropyl alcohol onto a wound site or incision.</p>
      <div class="price">P30.00</div>
      <div class="buttons">
         <a href="#" class="buy">buy now</a>
         <a href="#" class="cart">add to cart</a>
      </div>
   </div>

</div>

<script>
let preveiwContainer = document.querySelector('.products-preview');
let previewBox = preveiwContainer.querySelectorAll('.preview');

document.querySelectorAll('.products-container .product').forEach(product =>{
  product.onclick = () =>{
    preveiwContainer.style.display = 'flex';
    let name = product.getAttribute('data-name');
    previewBox.forEach(preview =>{
      let target = preview.getAttribute('data-target');
      if(name == target){
        preview.classList.add('active');
      }
    });
  };
});

previewBox.forEach(close =>{
  close.querySelector('.fa-times').onclick = () =>{
    close.classList.remove('active');
    preveiwContainer.style.display = 'none';
  };
});
</script>

</body>
</html>

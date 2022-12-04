<?php
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="jumbotron h-50">
     <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
               <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
               <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
               <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
               <div class="carousel-item active" data-bs-interval="10000">
                    <img src="https://images.unsplash.com/photo-1489209909448-8926a2640f1f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1032&q=80"
                         class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                         <h5>First slide label</h5>
                         <p>Some representative placeholder content for the first slide.</p>
                    </div>
               </div>
               <div class="carousel-item" data-bs-interval="2000">
                    <img src="https://images.unsplash.com/photo-1518739745383-0ef26e9dd7fd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=842&q=80"
                         class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                         <h5>Second slide label</h5>
                         <p>Some representative placeholder content for the second slide.</p>
                    </div>
               </div>
               <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1494122474412-aeaf73d11da8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                         class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                         <h5>Third slide label</h5>
                         <p>Some representative placeholder content for the third slide.</p>
                    </div>
               </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
               data-bs-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
               data-bs-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Next</span>
          </button>
     </div>
</div>
<?php 
include('includes/footer.php');
include('includes/script.php');
include('message.php'); 
?>
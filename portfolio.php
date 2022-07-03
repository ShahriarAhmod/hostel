<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Hostel website - Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="http://code4berry.com" />
    <!-- css --> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/fancybox/jquery.fancybox.css" rel="stylesheet"> 
    <link href="css/flexslider.css" rel="stylesheet" />  

    <!-- Vendor Styles -->
    <link href="css/magnific-popup.css" rel="stylesheet"> 
    <!-- Block Styles -->
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/gallery-1.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper"> 

       <!-- start header -->
       <?php include('includes/header.php') ?>
       <!-- end header -->
       <section id="inner-headline">
           <div class="container">
              <div class="row">
                 <div class="col-lg-12">
                    <h2 class="pageTitle">Portfolio</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="content">
       <div class="container content">	 
          <div class="row"> 
             <div class="col-md-12">
                <div class="about-logo">
                   <h3>Our <span class="color">Gallery</span></h3>
                   <p>Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas</p>
                   <p>Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas</p>
               </div>  
           </div>
       </div> 

   </div>
</section>	
<!-- Start Gallery 1-2 -->
<section id="gallery-1" class="content-block section-wrapper gallery-1">
 <div class="container">

     <div class="editContent">
       <ul class="filter">
           <li class="HillSide"><a href="#" data-filter="*">All</a></li>
           <li><a class="waves-effect waves-dark" href="#" data-filter=".artwork">Artwork</a></li>
           <li><a class="waves-effect waves-dark" href="#" data-filter=".creative">Creative</a></li>
           <li><a class="waves-effect waves-dark" href="#" data-filter=".nature">Nature</a></li>
           <li><a class="waves-effect waves-dark" href="#" data-filter=".outside">Outside</a></li>
           <li><a class="waves-effect waves-dark" href="#" data-filter=".photography">Photography</a></li>
       </ul>
   </div>
   <!-- /.gallery-filter -->

   <div class="row">
    <div id="isotope-gallery-container">
        <div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper artwork creative">
            <div class="gallery-item">
                <div class="gallery-thumb">
                    <img src="img/works/std1.jpg" class="img-responsive" alt="1st gallery Thumb">
                    <div class="image-overlay"></div>
                    <a href="img/works/std1.jpg" class="gallery-zoom"><i class="fa fa-eye"></i></a>

                </div>
                <div class="gallery-details">
                   <div class="editContent">
                       <h5>1st gallery Item</h5>
                   </div>
                   <div class="editContent">
                       <p>Nullam id dolor id nibh ultricies vehicula.</p>
                   </div>
               </div>
           </div>
       </div>
       <!-- /.gallery-item-wrapper -->
       <div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper nature outside">
        <div class="gallery-item">
            <div class="gallery-thumb">
                <img src="img/works/std8.jpg" class="img-responsive" alt="2nd gallery Thumb">
                <div class="image-overlay"></div>
                <a href="img/works/std8.jpg" class="gallery-zoom"><i class="fa fa-eye"></i></a>

            </div>
            <div class="gallery-details">
               <div class="editContent">
                   <h5>2nd gallery Item</h5>
               </div>
               <div class="editContent">
                   <p>Nullam id dolor id nibh ultricies vehicula.</p>
               </div>
           </div>
       </div>
   </div>
   <!-- /.gallery-item-wrapper -->
   <div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper photography artwork">
    <div class="gallery-item">
        <div class="gallery-thumb">
            <img src="img/works/std7.jpg" class="img-responsive" alt="3rd gallery Thumb">
            <div class="image-overlay"></div>
            <a href="img/works/std7.jpg" class="gallery-zoom"><i class="fa fa-eye"></i></a>

        </div>
        <div class="gallery-details">
           <div class="editContent">
               <h5>3rd gallery Item</h5>
           </div>
           <div class="editContent">
               <p>Nullam id dolor id nibh ultricies vehicula.</p>
           </div>
       </div>
   </div>
</div>
<!-- /.gallery-item-wrapper -->
<div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper creative nature">
    <div class="gallery-item">
        <div class="gallery-thumb">
            <img src="img/works/std2.jpg" class="img-responsive" alt="4th gallery Thumb">
            <div class="image-overlay"></div>
            <a href="img/works/std2.jpg" class="gallery-zoom"><i class="fa fa-eye"></i></a>

        </div>
        <div class="gallery-details">
           <div class="editContent">
               <h5>4th gallery Item</h5>
           </div>
           <div class="editContent">
               <p>Nullam id dolor id nibh ultricies vehicula.</p>
           </div>
       </div>
   </div>
</div>
<!-- /.gallery-item-wrapper -->
<div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper nature">
    <div class="gallery-item">
        <div class="gallery-thumb">
            <img src="img/works/std3.jpg" class="img-responsive" alt="5th gallery Thumb">
            <div class="image-overlay"></div>
            <a href="img/works/std3.jpg" class="gallery-zoom"><i class="fa fa-eye"></i></a>

        </div>
        <div class="gallery-details">
           <div class="editContent">
               <h5>5th gallery Item</h5>
           </div>
           <div class="editContent">
               <p>Nullam id dolor id nibh ultricies vehicula.</p>
           </div>
       </div>
   </div>
</div>
<!-- /.gallery-item-wrapper -->
<div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper artwork creative">
    <div class="gallery-item">
        <div class="gallery-thumb">
            <img src="img/works/std4.jpg" class="img-responsive" alt="6th gallery Thumb">
            <div class="image-overlay"></div>
            <a href="img/works/std4.jpg" class="gallery-zoom"><i class="fa fa-eye"></i></a>

        </div>
        <div class="gallery-details">
           <div class="editContent">
               <h5>6th gallery Item</h5>
           </div>
           <div class="editContent">
               <p>Nullam id dolor id nibh ultricies vehicula.</p>
           </div>
       </div>
   </div>
</div>

</div>
<!-- /.isotope-gallery-container -->
</div>
<!-- /.row --> 
<!-- /.container -->
</div>
</section>
<!--// End Gallery 1-2 -->  
</div>
<?php include('includes/footer.php') ?>
</div>
<a href="#" class="scrollup waves-effect waves-dark"><i class="fa fa-angle-up HillSide"></i></a>
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="materialize/js/materialize.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>  
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<!-- Vendor Scripts -->
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/animate.js"></script> 
<script src="js/custom.js"></script>

</body>
</html>
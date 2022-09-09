<!DOCTYPE html>
<html lang="en">
	<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
		<title><?= $title ?> - Garsans</title>
		<!-- Bootstrap CSS -->
		<link href="<?= base_url() ?>assets/front/css/bootstrap.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/front/vendors/linericon/style.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/front/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/front/vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/front/vendors/lightbox/simpleLightbox.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/front/vendors/nice-select/css/nice-select.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/front/vendors/animate-css/animate.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/front/vendors/jquery-ui/jquery-ui.css" rel="stylesheet">
	    <link href="<?= base_url() ?>assets/front/profile/fontawesome/css/all.min.css" rel="stylesheet">



		<!-- main css -->
		<link href="<?= base_url() ?>assets/front/css/style.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/front/profile/css/mystyle.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/front/profile/css/too.css" rel="stylesheet">
	
		<style type="text/css">
			.cardnews {
				border: 1px solid;
				box-shadow: 3px 3px 4px 0 gray;
				transition: all 300ms ease 0s;
			} .cardnews:hover {
				background-color: #F7F7F7;
				transform:scale(1.07);
			} .judultnh {
				text-align: center;
				width: 50px;
			} .tnh {
				transition: all 200ms ease 0s;
			}
			.tnh:hover {
				background-color: #006AB4;
			}
			.slebew {
				height: 350px;
				transition: all 200ms ease 0s;
				color:white;
			} .slebew:hover {
				transform: scale(1.10);
			} @media screen and (max-width: 1000px) {
				.slebew2 {
					
					display: none;
				} 
			} @media screen and (max-width:776px) {
				.textalign {
					text-align: center;
					
				} .tengah {
				display: flex; 
				justify-content: center;
			}
			}
		</style>
		<link href="<?= base_url() ?>assets/front/profile/aos-master/dist/aos.css" rel="stylesheet">
	</head>
	<body>
        
		<!--================ Navigation ================-->
		<?php $this->load->view('front/layouts/_navbar') ?>
		<!--================ End of Navigation ================-->
			
		<!--================ Content =================-->
		<?php $this->load->view('front/pages/' . $page) ?>
		<!--================ End Content =================-->
        
		<!--================ start footer Area  =================-->	
		<?php $this->load->view('front/layouts/_footer') ?>
		<!--================ End footer Area  =================-->
          
      <!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src=" <?= base_url() ?>assets/front/js/jquery-3.2.1.min.js"></script>
		<script src=" <?= base_url() ?>assets/front/js/popper.js"></script>
		<script src=" <?= base_url() ?>assets/front/js/bootstrap.min.js"></script>
		<script src=" <?= base_url() ?>assets/front/js/stellar.js"></script>
		<script src=" <?= base_url() ?>assets/front/vendors/lightbox/simpleLightbox.min.js"></script>
		<script src=" <?= base_url() ?>assets/front/vendors/nice-select/js/jquery.nice-select.min.js"></script>
		<script src=" <?= base_url() ?>assets/front/vendors/isotope/imagesloaded.pkgd.min.js"></script>
		<script src=" <?= base_url() ?>assets/front/vendors/isotope/isotope-min.js"></script>
		<script src=" <?= base_url() ?>assets/front/vendors/owl-carousel/owl.carousel.min.js"></script>
		<script src=" <?= base_url() ?>assets/front/vendors/jquery-ui/jquery-ui.js"></script>
		<script src=" <?= base_url() ?>assets/front/js/jquery.ajaxchimp.min.js"></script>
		<script src=" <?= base_url() ?>assets/front/js/mail-script.js"></script>
		<script src=" <?= base_url() ?>assets/front/js/theme.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js" integrity="sha512-BdHyGtczsUoFcEma+MfXc71KJLv/cd+sUsUaYYf2mXpfG/PtBjNXsPo78+rxWjscxUYN2Qr2+DbeGGiJx81ifg==" crossorigin="anonymous"></script>


		<!-- <script src=" <?= base_url() ?>assets/front/profile/js/jquery-3.3.1.min.js"></script>
		<script src=" <?= base_url() ?>assets/front/profile/js/popper.min.js"></script>
		<script src=" <?= base_url() ?>assets/front/profile/js/bootstrap.min.js"></script>
		<script src=" <?= base_url() ?>assets/front/profile/js/jQuery.headroom.js"></script>
		<script src=" <?= base_url() ?>assets/front/profile/js/owl.carousel.min.js"></script>
		<script src=" <?= base_url() ?>assets/front/profile/js/smoothscroll.js"></script>
		
		<script src=" <?= base_url() ?>assets/front/profile/js/custom.js"></script>
	     -->
	    <script src="<?php echo base_url(); ?>assets/front/profile/aos-master/dist/aos.js"></script>
	    <script type="text/javascript">
	    	window.addEventListener('resize', function() {
	    		let sl = document.querySelector('.slebew3'); 
	    		if(window.innerWidth <= 1000) {
	    			
	    			console.log(sl);
	    			sl.setAttribute('class', 'col-md-12 slebew3')
	    		} else {
	    			sl.setAttribute('class', 'col-md-9 slebew3')
	    		}

	    	})

	    	 var typing=new Typed(".text", {
      		 	strings: ["", "Youtuber", "Freelancer", "Graphics Designer", "Web Designer", "Web Developer"],
       			typeSpeed: 100,
       			backSpeed: 40,
       			loop: true,
   			});
	    </script>
   </body>
</html>
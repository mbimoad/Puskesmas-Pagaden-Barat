<?php $this->load->helper('dateindo_helper')?>
<?php $this->load->helper('text_helper')?>
<?php $i=0; ?>
<!--================Home Banner Area =================-->
      <section class="banner_area">
            <div class="banner_inner d-flex align-items-center" style="background-image: url(<?= base_url('images/banner/' . $banner->photo) ?>)">
               <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
               <div class="container">
                  <div class="banner_content text-center">
                     <h2>Detail Berita</h2>
                     <div class="page_link">
                        <a href="<?= base_url('home') ?>">Home</a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
<!--================End Home Banner Area =================-->

<div class="container-fluid">
   <div class="row">
      <div class="col-md-9 col-sm-12 slebew3">
         <!--================News Aresa =================-->
         <section class="news_area single-post-area mt-5">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8">
                     <div class="main_blog_details">
                        <img class="img-fluid" src="<?= base_url("images/posting/large/$posting->photo") ?>" alt="">
                        <h4><?= $posting->title ?></h4>
                        <div class="user_details">
                           <div class="float-left">
                              <div class="media">
                                 <div class="media-body">
                                    <p><?= mediumdate_indo($posting->date) ?></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <p><?= $posting->content ?></p>
                     </div>
                  </div>
                  
               </div>
            </div>
         </section>
         <!--================End News Area =================-->   
      </div>      
      <div class="col-md-3 col-sm-1 slebew2">
         <h2 class="text-center my-3" style="margin-right: 30px">Berita lain</h2>
         <!-- Berita -->
            <section class="news_area mt-5">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12">
                        
                        <!-- Last News -->
                        <div class="latest_news d-flex justify-content-center flex-wrap">
                           <?php foreach($lastNews as $ln)  :?>
                              <?php if($i <= 2) { ?>
                                 <div class="card mr-3 mt-4" style="width: 18rem;">
                                   <img class="card-img-top" src="<?= base_url("images/posting/medium/$ln->photo") ?>" alt="Card image cap">
                                   <div class="card-body">
                                     <div class="date">
                                       </i><?= mediumdate_indo($ln->date) ?>
                                       </div>

                                          <a href="<?= base_url("blog/read/$ln->seo_title") ?>">
                                             <h4><?= $ln->title ?></h4>
                                          </a>
                                       <p><?= character_limiter($ln->content, 100) ?></p>
                                   </div>
                                 </div>
                              <?php 
                                 $i++;
                              } 
                                 else {
                                    break;
                                 }
                              ?>

                           <?php endforeach ?>
                        </div>
                     </div>      
                  </div>
               </div>
            </section>

      </div>
   </div>
</div>

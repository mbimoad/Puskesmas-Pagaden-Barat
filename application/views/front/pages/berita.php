<?php $this->load->helper('dateindo_helper')?>
<?php $this->load->helper('text_helper')?>


<!-- Berita -->
<section class="news_area mt-5">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="col-lg-8 mx-auto">
                <h2 class="text-center">Berita Harian Puskesmas Pagaden Barat</h2>
            </div>
            <!-- Last News -->
            <div class="latest_news d-flex justify-content-center flex-wrap">
               <?php foreach($lastNews as $ln)  :?>
                  <div class="card mr-3 mt-4 cardnews" style="width: 18rem;">
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
               <?php endforeach ?>
            </div>
         </div>      
      </div>
   </div>
</section>
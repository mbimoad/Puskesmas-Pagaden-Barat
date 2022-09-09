<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
   </div>

   <!-- Alert -->
   <div class="row">
      <div class="col">
         <?php if($this->session->flashdata('message')) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('message') ?>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
               </button>   
            </div>
         <?php endif ?>
      </div>
   </div>

   <!-- Content Row -->
   <div class="row">

   <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
         <div class="card-body">
            <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-s font-weight-bold text-danger text-uppercase mb-1">Posting</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                     <?= $total_posting ?>
                  </div>
               </div>
               <div class="col-auto">
               <i class="far fa-newspaper fa-3x text-gray-300"></i>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
         <div class="card-body">
            <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-s font-weight-bold text-success text-uppercase mb-1">Category</div>
                  <div class="h mb-0 font-weight-bold text-gray-800">
                     <?= $total_category ?>  
                  </div>
               </div>
               <div class="col-auto">
                  <i class="fas fa-clipboard-list fa-3x text-gray-300"></i>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
         <div class="card-body">
            <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-s font-weight-bold text-primary text-uppercase mb-1">Banner</div>
                  <div class="h mb-0 font-weight-bold text-gray-800">
                     <?= $total_banner ?>  
                  </div>
               </div>
               <div class="col-auto">
                  <i class="fas fa-desktop fa-3x text-gray-300"></i>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
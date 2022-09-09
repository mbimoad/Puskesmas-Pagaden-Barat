<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                        <?php echo $this->session->userdata('message') ?>

                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA PENDAFTARAN BPJS</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;">
        <?php echo anchor(site_url('pendaftaranbpjs/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
        <?php echo anchor(site_url('pendaftaranbpjs/cetak'), '<i class="fa fa-print" aria-hidden="true"></i> Cetak Data', 'class="btn btn-success btn-sm"'); ?>
        
        </div>
            </div>
            <div class='col-md-3'>
             <form action="<?php echo site_url('pendaftaranbpjs/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pendaftaran'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
            </div>
        
   
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                   
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
        <table class="table table-bordered tbr" style="margin-bottom: 10px" width="100%">
            <tr>
                <th>No Rawat</th>
                <th>No Rekmed</th>
                <th>No KTP </th>
                <th>No BPJS </th>
                <th>Status Pasien</th>
                <th>Nama Pasien</th>
                <th>Poli</th>
                <th>Dokter</th>
                <th>Diagnosa</th>
                <th>Keluhan</th>
                <th>Tindakan</th>
                <th>Action</th>
            </tr>
            <?php foreach ($pendaftaran_data as $pendaftaran) {  ?>

            <tr>
                <td><?php echo $pendaftaran->no_rawat ?></td>
                <td><?php echo $pendaftaran->no_rekamedis ?></td>
                <td><?php echo $pendaftaran->no_ktp ?></td>
                <td><?php echo $pendaftaran->no_bpjs ?></td>
                <td><?php echo $pendaftaran->status_pasien ?></td>
                <td><?php echo $pendaftaran->nama_pasien ?></td>
                <td><?php echo $pendaftaran->id_poli ?></td>
                <td><?php echo $pendaftaran->kode_dokter ?></td>
                <td><?php echo $pendaftaran->kode_diagnosa ?></td>
                <td><?php echo $pendaftaran->keluhan ?></td>
                <td><?php echo $pendaftaran->tindakan ?></td>

                <td style="text-align:center" width="200px">
                    <?php 
                    echo anchor(site_url('pendaftaranbpjs/update/'.$pendaftaran->no_rawat),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
                    echo '  '; 
                    echo anchor(site_url('pendaftaranbpjs/cetakantrian/'.$pendaftaran->no_rawat),'<i class="fa fa-print" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
                    echo '  '; 
                    echo anchor(site_url('pendaftaranbpjs/delete/'.$pendaftaran->no_rawat),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                    ?>
                </td>

            </tr>
            <?php } ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>

<script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
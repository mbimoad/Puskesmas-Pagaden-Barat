

<div class="content-wrapper">
    
    <section class="content">

    <div class="col-md-12">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">DATA PENDAFTARAN UMUM</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" id="form1" name="form1">
                    <table class='table table-bordered'>        

                        <tr>
                            <td width='200'>No Rawat <?php echo form_error('no_rawat') ?></td>
                            <td>
                                <input type="text" class="form-control" name="no_rawat" id="no_rawat" value="<?php echo $no_rawat ?>" readonly />
                            </td>
                        </tr>

                        <tr>
                            <td width='200'>No Rekamedis <?php echo form_error('no_rekamedis') ?></td>
                            <td>
                                <!-- <input type="text" class="form-control" name="no_rekamedis" id="no_rekamedis" placeholder="Masukkan No Rekamedis" value="<?php echo $no_rekamedis; ?>" onkeyup="autocomplete_norekmedis()" /> -->
                                <?php echo cmb_dinamis('no_rekamedis', 'tbl_pasienumum', 'no_rekamedis', 'no_rekamedis', $no_rekamedis) ?>
                            </td>
                        </tr>

                        <tr>
                            <td width='200'>No KTP <?php echo form_error('no_ktp') ?></td>
                            <td>
                                <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="No KTP" value="<?php echo $no_ktp?>" readonly />
                            </td>
                        </tr>

                        <tr>
                            <td width='200'>Status Pasien <?php echo form_error('status_pasien') ?></td><td>
                            <input type="text" class="form-control" name="status_pasien" id="status_pasien" placeholder="Status Pasien" value="<?php echo $status_pasien?>" readonly/>
                        </tr>

                        <tr>
                            <td width='200'>Nama Pasien <?php echo form_error('nama_pasien') ?></td>
                            <td>
                                <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" placeholder="Nama Pasien" value="<?php echo $nama_pasien?>" readonly/>
                            </td>
                        </tr>

                        <tr>
                            <td width='200'>Poli Tujuan <?php echo form_error('id_poli') ?></td>
                            <td>
                                <input type="text" class="form-control" name="id_poli" id="id_poli" placeholder="id_poli" value="<?php echo $id_poli?>"  readonly />
                            </td>
                        </tr>

                        <tr>
                            <td width='200'>Dokter Penanggung Jawab <?php echo form_error('kode_dokter') ?></td>
                            <td>
                                <!-- <input type="text" class="form-control" onkeyup="auto_nama_dokter()" name="kode_dokter" id="kode_dokter" placeholder="Dokter Penanggung Jawab" value="<?php echo $kode_dokter; ?>"/> -->

                                <?php echo cmb_dinamis('kode_dokter', 'tbl_dokter', 'nama_dokter', 'nama_dokter', $kode_dokter) ?>
                            </td>
                        </tr>

                        <tr>
                            <td width='200'>Diagnosa <?php echo form_error('id_poli') ?></td>
                            <td>
                                <?php // echo cmb_dinamis('kode_diagnosa', 'tbl_diagnosa_penyakit', 'nama_penyakit', 'kode_diagnosa', $kode_diagnosa) ?>
                                <input type="text" class="form-control" name="kode_diagnosa" id="kode_diagnosa" placeholder="Masukkan Diagnosa" value="<?php echo $kode_diagnosa; ?>" onkeyup="autocomplete_diagnosa()" />
                                
                            </td>
                        </tr>

                         <tr>
                            <td width='200'>Keluhan <?php echo form_error('keluhan') ?></td>
                            <td>
                                <input type="text" class="form-control" name="keluhan" id="keluhan" value="<?php echo $keluhan ?>" placeholder="Masukan Keluhan"/>
                            </td>
                        </tr>

                        <tr>
                            <td width='200'>tindakan <?php echo form_error('keluhan') ?></td>
                            <td>
                                <input type="text" class="form-control" name="tindakan" id="tindakan" value="<?php echo $tindakan ?>" placeholder="Masukan tindakan"/>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                
                            <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
                            <a href="<?php echo site_url('pendaftaranumum') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td>
                        </tr>
                     </table>       
        </div>
    </div>




<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>



<script type="text/javascript">
    var norekmed = document.querySelector(`select[name=no_rekamedis`);
    norekmed.addEventListener('change', autofill);
    
    function auto_nama_dokter(){
         //autocomplete
        $("#kode_dokter").autocomplete({
            source: "<?php echo base_url() ?>index.php/pendaftaranumum/autocompleteDokter",
            minLength: 1
        });
    }
    
   
    function autocomplete_norekmedis(){
        //autocomplete
        $("#no_rekamedis").autocomplete({
            source: "<?php echo base_url() ?>index.php/pendaftaranumum/autonorekamedis",
            minLength: 1
        });
        autofill();
    }

    function autocomplete_diagnosa(){
        //autocomplete
        $("#kode_diagnosa").autocomplete({
            source: "<?php echo base_url() ?>index.php/pendaftaranumum/penyakitauto",
            minLength: 1
        });
    }

    function autofill(){

        var no_rekamedis = document.querySelector(`select[name=no_rekamedis`).value;
        $.ajax({
            url: "<?php echo base_url()?>index.php/pendaftaranumum/autofill",
            data : "no_rekamedis="+no_rekamedis,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#nama_pasien').val(obj.nama_pasien);
            $('#status_pasien').val(obj.status_pasien);
            $('#id_poli').val(obj.id_poli);
            $('#no_ktp').val(obj.no_ktp);


        }); 
    }

 
   
</script>

<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA PASIEN UMUM</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" id="form1" name="form1">
            
<table class='table table-bordered'>        

      <tr>
        <td width='200'>No Rekamedis <?php echo form_error('no_rekamedis') ?></td>
        <td>
          <input type="text" class="form-control" name="no_rekamedis" id="no_rekamedis" placeholder="No Rekamedis" value="<?php echo $no_rekamedis; ?>" readonly />
        </td>
      </tr>

      <tr>
          <td width='200'>Status Pasien <?php echo form_error('status_pasien') ?></td>
          <td>
            <input type="text" class="form-control" name="status_pasien" id="status_pasien" placeholder="Status Pasien" value="UMUM" readonly />
          </td>
      </tr>

      <?php 
        // Tentukan Zona lokasi 
        date_default_timezone_set("Asia/Jakarta");

        // Ambil tanggal sekarang
        $today1 = date('Y-m-d');
        $today2 = date('H:i:s');
      ?>

      <tr>
        <td width='200'>Tanggal Pendaftaran <?php echo form_error('tanggal_pendaftaran') ?></td>
        <td style="display:flex; flex-wrap:wrap; vertical-align: text-top;">
          <input type="date" class="form-control" name="tanggal_pendaftaran" id="tanggal_pendaftaran" placeholder="Tanggal Pendaftaran" 
          value="<?= $tanggal_pendaftaran == '' ? $today1 : $tanggal_pendaftaran; ?>" style="width:140px; margin-right:10px;"/>
          <input type="time" class="form-control" name="jam_pendaftaran" id="jam_pendaftaran" placeholder="Jam Pendaftaran" 
          value="<?= $jam_pendaftaran == '' ? $today2 : $jam_pendaftaran; ?>" style="width:140px;"/>
        </td>
      </tr>
        
        
      

	    <tr><td width='200'>No Ktp <?php echo form_error('no_ktp') ?></td><td><input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="No Ktp" value="<?php echo $no_ktp; ?>" onkeyup="autocomplete_noktp();" /></td></tr>
	    
	    <tr>
        <td width='200'>Nama Pasien <?php echo form_error('nama_pasien') ?></td>
        <td>
          <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" placeholder="Nama Pasien" value="<?php echo $nama_pasien; ?>" />
        </td>
      </tr>

      <tr>
        <td width='200'>Bin Binti <?php echo form_error('bin_binti') ?></td>
        <td>
          <input type="text" class="form-control" name="bin_binti" id="bin_binti" placeholder="Nama Bin / Binti" value="<?php echo $bin_binti; ?>" />
        </td>
      </tr>

      <tr>
        <td width='200'>Keterangan Pasien <?php echo form_error('ketpasien') ?></td>
        <td>
          <input type="radio" id="rd1" class="form-check-input" name="ketpasien" id="ketpasien" value="LAMA" <?php if ($ketpasien == 'LAMA') {echo "checked";}?>/> 
          <label for="rd1" style="font-weight: unset;">LAMA</label> <br>
          <input type="radio" id="rd2" class="form-check-input" name="ketpasien" id="ketpasien" value="BARU" <?php if ($ketpasien == 'BARU') {echo "checked";}?>/> 
          <label for="rd2" style="font-weight: unset;">BARU</label>
        </td>
      </tr>


	    <tr><td width='200'>Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></td><td>
		<?php echo form_dropdown('jenis_kelamin', array('L' => 'Laki-Laki', 'P' => 'Perempuan'), $jenis_kelamin, array('class' => 'form-control')); ?>
	    </td></tr>
	    <tr>
        <td width='200'>Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></td>
        <td>
          <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" style="width:140px;"/>
        </td>
      </tr>

      <tr>
          <td width='200'>Desa<?php echo form_error('alamat') ?></td><td>
            <select name="alamat" class="form-control">
              <option value="" disabled="disabled" selected/>Pilih</option>
              <option value="BALINGBING" <?php if ($alamat == 'BALINGBING') {echo "selected";}?> >BALINGBING</option>
              <option value="BENDUNGAN" <?php if ($alamat == 'BENDUNGAN') {echo "selected";}?>>BENDUNGAN</option>
              <option value="CIDADAP" <?php if ($alamat == 'CIDADAP') {echo "selected";}?>>CIDADAP</option>
              <option value="CIDAHU" <?php if ($alamat == 'CIDAHU') {echo "selected";}?>>CIDAHU</option>
              <option value="MARGAHAYU" <?php if ($alamat == 'MARGAHAYU') {echo "selected";}?>>MARGAHAYU</option>
              <option value="MEKARWANGI" <?php if ($alamat == 'MEKARWANGI') {echo "selected";}?>>MEKARWANGI</option>
              <option value="MUNJUL" <?php if ($alamat == 'MUNJUL') {echo "selected";}?>>MUNJUL</option>
              <option value="PANGSOR" <?php if ($alamat == 'PANGSOR') {echo "selected";}?>>PANGSOR</option>
              <option value="SUMURGINTUNG" <?php if ($alamat == 'SUMURGINTUNG') {echo "selected";}?>>SUMURGINTUNG</option>
              <option value="LUAR" <?php if ($alamat == 'LUAR') {echo "selected";}?>>LUAR</option>
            </select>
      </tr>

      <tr>
        <td width='200'>RT/RW<?php echo form_error('rt_rw_lengkap') ?></td>
        <td>
          <input type="text" class="form-control rt_rw_lengkap" name="rt_rw_lengkap" cols="50" rows="3" value="<?php echo $rt_rw_lengkap; ?>">
        </td>
      </tr>

      <tr>
        <td width='200'>Poli Tujuan <?php echo form_error('id_poli') ?></td>
        <td>
          <?php echo cmb_dinamis('id_poli', 'tbl_poli', 'nama_poli', 'nama_poli', $id_poli) ?>    
        </td>
      </tr>



    





	    <tr>
        <td></td>
        <td> 
  	     <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
  	     <a href="<?php echo site_url('pasienumum') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
        </td>
      </tr>


      

	</table></form>        </div>
</div>
</div>

<script>
    var noktp = document.querySelector(`input[name=no_ktp]`);
    noktp.addEventListener('input', hapus);

    function hapus() {
      if(no_ktp.value == '') {
            $('#nama_pasien').val('');
            $('#id_poli').val('');
            $('#no_ktp').val('');
            $('#bin_binti').val('');
            $('#tanggal_lahir').val('');
            $('[name="jenis_kelamin"]').val('');
            $('[name="alamat"]').val('');
            $('[name="id_poli"]').val('');
            $('[name="rt_rw_lengkap"]').val('');
            $("[name=ketpasien][value=" + "LAMA" + "]").prop('checked', true);
      }
    }


    function autofill(){
          var no_ktp = document.querySelector(`input[name=no_ktp`).value;
          $.ajax({
              url: "<?php echo base_url()?>index.php/pasienumum/autofill",
              data : "no_ktp="+no_ktp,
          }).success(function (data) {
              var json = data,
              obj = JSON.parse(json);
              $('#nama_pasien').val(obj.nama_pasien);
              $('#status_pasien').val(obj.status_pasien);
              $('#id_poli').val(obj.id_poli);
              $('#no_ktp').val(obj.no_ktp);
              $('#bin_binti').val(obj.bin_binti);
              $('#tanggal_lahir').val(obj.tanggal_lahir);
              $('[name="jenis_kelamin"]').val(String(obj.jenis_kelamin));
              $('[name="alamat"]').val(String(obj.alamat));
              $('[name="rt_rw_lengkap"]').val(obj.rt_rw_lengkap);
              $('[name="id_poli"]').val(String(obj.id_poli));
               // $("[name=ketpasien][value=" + obj.ketpasien + "]").prop('checked', true);
              // Pasien Yang sudah terdaftar otomatis menjadi pasien lama
              $("[name=ketpasien][value=" + "LAMA" + "]").prop('checked', true);
          }); 
      }

      function autocomplete_noktp(){
          //autocomplete
          $("#no_ktp").autocomplete({
              source: "<?php echo base_url() ?>index.php/pasienumum/ktpauto",
              minLength: 1
          });

          autofill();
      }
</script>
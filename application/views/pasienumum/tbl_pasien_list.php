<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php echo $this->session->userdata('message') ?>

                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA PASIEN</h3>
                        <span style="font-size: 18px; font-weight: bold">UMUM</span>
                    </div>
        
        <div class="box-body">
            <div class='row'>
                <div class='col-md-12'>
                    <div style="padding-bottom: 10px;">
                        <?php echo anchor(site_url('pasienumum/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                        <?php echo anchor(site_url('pasienumum/cetak'), '<i class="fa fa-print" aria-hidden="true"></i> Cetak PDF', 'class="btn btn-success btn-sm"'); ?>
                        <?php echo anchor(site_url('pasienumum/excel'), '<i class="fa fa-print" aria-hidden="true"></i> Cetak Excel', 'class="btn btn-warning btn-sm"'); ?>
                        <?php echo anchor(site_url('pasienumum/hapudata'), '<i class="fa fa-print" aria-hidden="true"></i> Hapus Semua Data', 'class="btn btn-secondary btn-sm"'); ?>
                    </div>
                </div>   
                
                <!-- Searching Data By Date -->
                <div class='col-md-12' style="padding-bottom: 10px;">
                    <form action="<?php echo site_url('pasienumum/index'); ?>" class="form-inline" method="get">

                        <div class="input-group">
                            <input type="text" class="form-control caridatanama" name="q" value="<?php echo $q; ?>" placeholder="No KTP">
                            <span class="input-group-btn">
                                <?php 
                                    if ($q <> '')
                                    {
                                        ?>
                                        <a href="<?php echo site_url('pasienumum'); ?>" class="btn btn-default">Reset</a>
                                        <?php
                                    }
                                ?>            
                            </span>
                        </div>

                        <div class="input-group">
                            <input type="date" class="form-control caridataawal" name="awal" value="<?php echo $awal; ?>" placeholder="Cari Data">
                            <span class="input-group-btn">
                                <?php 
                                    if ($awal <> '')
                                    {
                                        ?>
                                        <a href="<?php echo site_url('pasienumum'); ?>" class="btn btn-default">Reset</a>
                                        <?php
                                    }
                                ?>          
                            </span>
                        </div>

                        <div class="input-group">
                            <input type="date" class="form-control caridataakhir" name="akhir" value="<?php echo $akhir; ?>" placeholder="Cari Data">
                            <span class="input-group-btn">
                                <?php 
                                    if ($akhir <> '')
                                    {
                                        ?>
                                        <a href="<?php echo site_url('pasienumum'); ?>" class="btn btn-default">Reset</a>
                                        <?php
                                    }
                                ?>
                                <button class="btn btn-primary" type="submit">Cari Pasien</button> 
                            </span>
                        </div>
                                
                        <!-- Jika datannya ada. maka tampilkan tombol button berikut -->
                        <?php if(($q <> '') && ($awal == '') && ($akhir == '')) { ?>
                            <div class="input-group">
                                <a href="<?php echo site_url('pasienumum/excel/' . $q)?>" class="btn btn-success">CETAK FILTER EXCEL</a>
                            </div>

                            <div class="input-group">
                                <a href="<?php echo site_url('pasienumum/cetak/' . $q)?>" class="btn btn-danger">CETAK FILTER PDF</a>
                            </div>
                        <?php } else if(($q == '') && ($awal <> '') && ($akhir <> '')) { ?>
                            <div class="input-group">
                            <a href="<?php echo site_url('pasienumum/excel/' . $awal . '/' . $akhir)?>" class="btn btn-success">CETAK FILTER EXCEL</a>
                            </div>
                                
                            <div class="input-group">
                                <a href="<?php echo site_url('pasienumum/cetak/' . $awal . '/' . $akhir)?>" class="btn btn-danger">CETAK FILTER PDF</a>
                            </div>
                        <?php } ?>
                    </form>
                </div>  <!-- END OF SEARCHING DATA -->
                
            </div>

        
   
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4 text-center">
                    <div style="margin-top: 8px" id="message">
                        
                    </div>
                </div>
                <div class="col-md-1 text-right"></div>
                <div class="col-md-3 text-right">     </div>
            </div>
        <table class="table table-bordered tbr" style="margin-bottom: 10px">
        <tr>
            <th>Norekmed</th>                
            <th>Tgl Daftar</th>
            <th>Jam Daftar</th>
            <th>Status</th>
            <th>Pasien</th>
    		<th>NoKTP</th>
            <th>Nama Pasien</th>
    		<th>Bin/Binti</th>
    		<th>Gender</th>
    		<th>TTL</th>
    		<th>Desa</th>
    		<th>RT/RW</th>
            <th>Id Poli</th>
            
    		<th>Action</th>
        </tr><?php
            foreach ($pasien_data as $pasien)
            {
                error_reporting(E_ERROR | E_PARSE);
                $umur  = $pasien->tanggal_lahir;                
                $tahun = substr($umur, 0, 4);
                $bulan = substr($umur, 5, 2);
                $tgl   = substr($umur, 8, 2);
                $birth = "$bulan/$tgl/$tahun";
                //explode the date to get month, day and year
                $birthDate = explode("/", $birth);
                  //get age from date or birthdate
                $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                    ? ((date("Y") - $birthDate[2]) - 1)
                    : (date("Y") - $birthDate[2]));


                ?>
                <tr>
            <td class="nodata" width="10px"><?php echo $pasien->no_rekamedis ?></td>
            <td><?php echo $pasien->tanggal_pendaftaran ?></td>
            <td><?php echo $pasien->jam_pendaftaran ?></td>
            <td><?php echo $pasien->status_pasien ?></td>
            <td><?php echo $pasien->ketpasien ?></td>
			<td><?php echo $pasien->no_ktp ?></td>
            <td><?php echo $pasien->nama_pasien ?></td>
			<td><?php echo $pasien->bin_binti ?></td>
			<td><?php echo $pasien->jenis_kelamin ?></td>
			<td><?php echo $age ?></td>
			<td><?php echo $pasien->alamat ?></td>
			<td><?php echo $pasien->rt_rw_lengkap ?></td>
            <td><?php echo $pasien->id_poli ?></td> 
            
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pasienumum/update/'.$pasien->no_rekamedis),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
                echo anchor(site_url('pasienumum/cetakkartu/').$pasien->no_rekamedis,'<i class="fa fa-print" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
                echo '  '; 
				echo anchor(site_url('pasienumum/delete/'.$pasien->no_rekamedis),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>

        <!-- Tanggal 
        <div class="row">
        
                        <div class='col-md-12'>
                            <form action="<?php echo site_url('pasienumum/getbetween'); ?>" class="form-inline" method="post">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="input-group">
                                                <input type="date" class="form-control" name="tgl_awal" value="<?php echo $tgl_awal; ?>" placeholder="Cari Data">
                                            </div>

                                        </div>

                                        <div class="col-md-2">
                                            <div class="input-group">
                                                <input type="date" class="form-control" name="tgl_akhir" value="<?php echo $tgl_akhir; ?>" placeholder="Cari Data">
                                            </div>
                                            
                                        </div>

                                        <div class="col-md-2">
                                            <button class="btn btn-primary" type="submit">Tanggal</button>
                                        </div>
                                    </div>                                    
                            </form>
                    </div> 
        </div> -->


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

        
            
            <div class="row" >
                <!-- Col -->
            <div class="col-xs-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">TOTAL DATA PASIEN</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered zebra tbr">
                        <tr>
                            <th>TOTAL UMUM</th>
                            <th>Lama</th>
                            <th>Baru</th>
                            <th>Laki</th>
                            <th>Perempuan</th>
                            <th>Balingbing</th>
                            <th>Bendungan</th>
                            <th>Cidadap</th>
                            <th>Cidahu</th>
                            <th>Margahayu</th>
                            <th>Mekarwangi</th>
                            <th>Munjul</th>
                            <th>Pangsor</th>
                            <th>Sumurgintung</th>
                            <th>Luar</th>
                            <th>Poli UMUM</th>
                            <th>Poli GIGI</th>
                            <th>Poli MTBS</th>
                            <th>Poli KB/KIA</th>
                            
                        </tr>
                        <tr style="color:black; font-weight: none; text-align:center;">
                            <td style="font-size: 25px; width: 30px; height: 30px;"><?php echo $total_dataumum ?></td>
                            <td style="font-size: 25px; width: 30px; height: 30px;"><?php echo $total_pasienlama ?></td>
                            <td style="font-size: 25px; width: 30px; height: 30px;"><?php echo $total_pasienbaru ?></td>
                            <td style="font-size: 25px; width: 30px; height: 30px;"><?php echo $total_pasienlaki ?></td>
                            <td style="font-size: 25px; width: 30px; height: 30px;"><?php echo $total_pasienperempuan ?></td>
                            <td style="font-size: 25px; width: 30px; height: 30px;"><?php echo $total_balingbing ?></td>
                            <td style="font-size: 25px; width: 30px; height: 30px;"><?php echo $total_bendungan ?></td>
                            <td style="font-size: 25px; width: 30px; height: 30px;"><?php echo $total_cidadap ?></td>
                            <td style="font-size: 25px; width: 30px; height: 30px;"><?php echo $total_cidahu ?></td>
                            <td style="font-size: 25px; width: 30px; height: 30px;"><?php echo $total_margahayu ?></td>
                            <td style="font-size: 25px; width: 30px; height: 30px;"><?php echo $total_mekarwangi ?></td>
                            <td style="font-size: 25px; width: 30px; height: 30px;"><?php echo $total_munjul ?></td>
                            <td style="font-size: 25px; width: 30px; height: 30px;"><?php echo $total_pangsor ?></td>
                            <td style="font-size: 25px; width: 30px; height: 30px;"><?php echo $total_sumurgintung ?></td>
                            <td style="font-size: 25px; width: 30px; height: 30px;"><?php echo $total_luar ?></td>
                            <td style="font-size: 25px; width: 30px; height: 30px;"><?php echo $total_umum ?></td>
                            <td style="font-size: 25px; width: 30px; height: 30px;"><?php echo $total_gigi ?></td>
                            <td style="font-size: 25px; width: 30px; height: 30px;"><?php echo $total_mtbs ?></td>
                            <td style="font-size: 25px; width: 30px; height: 30px;"><?php echo $total_kia ?></td>
                        </tr>
                    </table>
                    
                    </div>
                </div>
            </div>
            </div>
    </section>

    

</div>
<div class="main-content">
    <section class="section">
          <div class="section-header">
            <h1>Form Input Sewa Alat Dan Tempat</h1>
          </div>
          <div class="card">
              <div class="card-body">
              <form action="<?php echo base_url('transaksi/aksi_tambah_transaksi') ?>" method="post">		     
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Alat</label>
                            <select name="kode_alat"  class="form-control" required>
                            <option value="">-- Pilih --</option>
                                <?php foreach($alat as $t) : ?>
                                    <?php
                                        if($t["status"] == "1"){
                                            echo '<option value="'.$t["kode"].'">'.$t["nama_alat"].'</option>';
                                        }else{
                                            
                                        }
                                    ?>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('kode_alat','<div class="text-small text-danger">','</div>') ?>
                        </div>
                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <select name="kode_pelanggan" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach($penyewa as $p) : ?>
                                <?php echo '<option value="'.$p["kode_pelanggan"].'">'.$p["nama"].'</option>'; ?>
                                
                            <?php endforeach; ?>
                            </select>  
                            <?php echo form_error('kode_pelanggan','<div class="text-small text-danger">','</div>') ?>
                        </div>
                        <div class="form-group">
                            <label>Nama Tempat</label>
                            <select name="kode_tempat" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <option value="1">Ekonomi </option>
                            <option value="2">VIP </option> 
                            <option value="3">VVIP </option> 
                            </select>
                            <?php echo form_error('kode_tempat','<div class="text-small text-danger">','</div>') ?>
                        </div>
                        <div class="form-group">
                            <label>Jam Pinjam Alat</label> 
                            <input type="time" name="jam_pinjam" class="form-control" required >
                        </div>
                    </div>
                    <div class="col-md-6"> 
                        <div class="form-group">
                            <label>Jam Kembali Alat</label>  
                            <input type="time" name="jam_kembali" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Jam Sewa Tempat</label> 
                            <input type="time" name="jam_sewa" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Jam Kembali Tempat</label>  
                            <input type="time" name="jam_kembali_tempat" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Input</button>
                        <button type="reset" class="btn btn-danger mt-4">Reset</button>
                    </div>
                  </div>
                  </form>
              </div>
          </div>
    </section>
</div>
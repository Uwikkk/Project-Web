<div class="main-content">
    <section class="section">
          <div class="section-header">
            <h1>Form Update Data Penyewa</h1>
          </div>
          <div class="card">
              <div class="card-body">
                <?php foreach($datapenyewa as $dp) : ?>
                  <form action="<?php echo base_url('penyewa/update_data_penyewa') ?>" method="POST">
                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Nama Pelanggan</label>
                          <input type="hidden" name="kode_pelanggan" value="<?php echo $dp["kode_pelanggan"] ?>">
                          <input type="text" name="nama" class="form-control" value="<?php echo $dp["nama"] ?>">   
                          <?php echo form_error('nama','<div class="text-small text-danger">','</div>') ?>
                      </div>
                      <div class="form-group">
                          <label>NIK</label>
                          <input type="text" name="nik" class="form-control" value="<?php echo $dp["nik"] ?>">   
                          <?php echo form_error('jenis','<div class="text-small text-danger">','</div>') ?>
                      </div>
                      <div class="form-group">
                          <label>Agama</label>
                          <input type="text" name="agama" class="form-control" value="<?php echo $dp["agama"] ?>">   
                          <?php echo form_error('agama','<div class="text-small text-danger">','</div>') ?>
                      </div>
                  </div>
                  <div class="col-md-6">
                      
                      <div class="form-group">
                          <label>No HP</label>
                          <input type="text" name="no_hp" class="form-control" value="<?php echo $dp["no_hp"] ?>">   
                          <?php echo form_error('no_hp','<div class="text-small text-danger">','</div>') ?>
                      </div>
                      <div class="form-group">
                          <label>Alamat</label>
                          <input type="text" name="alamat" class="form-control" value="<?php echo $dp["alamat"] ?>">   
                          <?php echo form_error('alamat','<div class="text-small text-danger">','</div>') ?>
                      </div>                      

                      <button type="submit" class="btn btn-primary mt-4">Update</button>
                      <button type="reset" class="btn btn-danger mt-4">Reset</button>
                  </div>
                  </div>
                  </form>
                <?php endforeach; ?>
              </div>
          </div>
    </section>
</div>
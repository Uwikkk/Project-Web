<div class="main-content">
    <section class="section">
          <div class="section-header">
            <h1>Form Update Transaksi</h1>
          </div>
          <div class="card">
              <div class="card-body">
                <?php foreach($transaksi as $da) : ?>
                  <form action="<?php echo base_url('transaksi/update_data_transaksi') ?>" method="POST" enctype="multipart/form-data">
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                        <div class="form-group">
                            <label>Jam Pengembalian Alat</label>  
                            <input type="hidden" name="kode_pemancingan" value="<?= $da["kode_pemancingan"] ?>" >
                            <input type="time" name="jam_pengembalian" class="form-control" required value="<?= $da["jam_pengembalian"] ?>">
                        </div> 
                        <div class="form-group">
                            <label>Jam Pengembalian Tempat</label>  
                            <input type="time" name="jam_cek" class="form-control" required value="<?= $da["jam_cek"] ?>">
                        </div>
                      <button type="submit" class="btn btn-primary mt-4">Update</button>
                      <button type="reset" class="btn btn-danger mt-4">Reset</button>
                  </div>
                  </div>
                  </form>
                  <?php endforeach;?>
              </div>
          </div>
    </section>
</div>
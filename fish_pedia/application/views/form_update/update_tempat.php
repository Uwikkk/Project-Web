<div class="main-content">
    <section class="section">
          <div class="section-header">
            <h1>Form Update Data Tempat</h1>
          </div>
          <div class="card">
              <div class="card-body">
              <?php foreach($datatempat as $dt) : ?>
                  <form action="<?php echo base_url('tempat/update_data_tempat') ?>" method="POST" enctype="multipart/form-data">
                  <div class="row">
                  <div class="col-md-8">
                      <div class="form-group">
                          <label>Kode Tempat</label>
                          <input type="text" name="kode_tempat" class="form-control" value="<?php echo $dt["kode_tempat"] ?>">   
                          <?php echo form_error('kode_tempat','<div class="text-small text-danger">','</div>') ?>
                      </div>
                      <div class="form-group">
                          <label>Harga</label>
                          <input type="text" name="harga" class="form-control" value="<?php echo $dt["harga"] ?>">   
                          <?php echo form_error('harga','<div class="text-small text-danger">','</div>') ?>
                      </div>
                      <div class="form-group">
                          <label>Jenis Tempat</label>
                          <input type="text" name="nama_tempat" class="form-control" value="<?php echo $dt["nama_tempat"] ?>">   
                          <?php echo form_error('denda','<div class="text-small text-danger">','</div>') ?>
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


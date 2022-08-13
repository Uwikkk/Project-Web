<div class="main-content">
    <section class="section">
          <div class="section-header">
            <h1>Form Input Data Alat</h1>
          </div>
          <div class="card">
              <div class="card-body">
                  <form action="<?php echo base_url('alat/input_alat') ?>" method="POST" enctype="multipart/form-data">
                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Kode Alat</label>
                          <input type="text" name="kode" class="form-control">   
                          <?php echo form_error('kode','<div class="text-small text-danger">','</div>') ?>
                      </div>
                      <div class="form-group">
                          <label>Nama Alat</label>
                          <input type="text" name="nama" class="form-control">   
                          <?php echo form_error('nama','<div class="text-small text-danger">','</div>') ?>
                      </div>
                      <div class="form-group">
                          <label>Merk</label>
                          <input type="text" name="merk" class="form-control">   
                          <?php echo form_error('merk','<div class="text-small text-danger">','</div>') ?>
                      </div>
                  </div>
                  <div class="col-md-6"> 
                  <div class="form-group">
                          <label>Status</label>   
                          <select name="status" class="form-control">
                          <option value="">--Pilih Status--</option>
                          <option value="1">Tersedia</option>
                          <option value="0">Tidak Tersedia</option>
                          </select>
                          <?php echo form_error('status','<div class="text-small text-danger">','</div>') ?>
                      </div>
                      <div class="form-group">
                          <label>Harga</label>
                          <input type="text" name="harga" class="form-control">   
                          <?php echo form_error('harga','<div class="text-small text-danger">','</div>') ?>
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
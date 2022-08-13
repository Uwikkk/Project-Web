<div class="main-content">
    <section class="section">
          <div class="section-header">
            <h1>Form Update Data Alat</h1>
          </div>
          <div class="card">
              <div class="card-body">
                <?php foreach($data_alat as $da) : ?>
                  <form action="<?php echo base_url('alat/update_data_alat') ?>" method="POST" enctype="multipart/form-data">
                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Nama Alat</label>
                          <input type="hidden" name="kode" class="form-control" value="<?php echo $da["kode"] ?>">
                          <input type="text" name="nama" class="form-control" value="<?php echo $da["nama_alat"] ?>">   
                          <?php echo form_error('nama','<div class="text-small text-danger">','</div>') ?>
                      </div>
                      <div class="form-group">
                          <label>Merk</label>
                          <input type="text" name="merk" class="form-control" value="<?php echo $da["merk"] ?>">   
                          <?php echo form_error('merk','<div class="text-small text-danger">','</div>') ?>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Status</label>   
                          <select name="status" class="form-control">
                          <option <?php if($da["status"] == "1"){echo "selected='selected'";} 
                            echo $da["status"];?>  value="1">Tersedia </option>
                        <option <?php if($da["status"] == "0"){echo "selected='selected'";} 
                            echo $da["status"];?>  value="0">Tidak Tersedia </option>
                          </select>
                          <?php echo form_error('status','<div class="text-small text-danger">','</div>') ?>
                      </div>
                      <div class="form-group">
                          <label>Harga</label>
                          <input type="text" name="harga" class="form-control" value="<?php echo $da["harga_alat"] ?>">   
                          <?php echo form_error('harga','<div class="text-small text-danger">','</div>') ?>
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
<div class="main-content">
    <section class="section">
          <div class="section-header">
            <h1>Form Input Data Tempat</h1>
          </div>
          <div class="card">
              <div class="card-body">
                  <form action="<?php echo base_url('tempat/input_tempat') ?>" method="POST" enctype="multipart/form-data">
                  <div class="row">
                  <div class="col-md-8">
                      <div class="form-group">
                          <label>Kode Tempat</label>
                          <input type="text" name="kode_tempat" class="form-control" required>   
                      </div>
                      <div class="form-group">
                          <label>Jenis Tempat</label>
                          <input type="text" name="nama_tempat" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label>Harga</label>
                          <input type="text" name="harga" class="form-control" required>   
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
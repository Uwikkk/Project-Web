<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Tempat</h1>
          </div>
          <a href="<?php echo base_url('tempat/read_input_tempat') ?>" class="btn btn-primary mb-3">Tambah Data</a>
          <?php echo $this->session->flashdata('pesan') ?>
          <table class="table table-hover table-striped table-borderd">
              <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Tempat</th>
                    <th>Jenis Tempat</th>
                    <th>Harga / Jam</th>
                    <th>aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php 
                  $no = 1;
                  foreach($tempat as $da) : ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $da["kode_tempat"] ?></td>
                    <td><?php echo  $da["nama_tempat"] ?></td>
                    <td><?php echo  $da["harga"] ?></td>
                    <td>
                        <a href="<?php echo base_url()."tempat/delete_tempat/".$da['kode_tempat'] ?>" class="btn btn-sm btn-danger"><i class=" fas fa-trash"></i></a>
                        <a href="<?php echo base_url()."tempat/update_tempat/".$da['kode_tempat'] ?>" class="btn btn-sm btn-primary"><i class=" fas fa-edit"></i></a>
                    </td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>

          </table>
        </section>
</div>
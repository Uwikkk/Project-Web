<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Penyewa</h1>
          </div>
          <a href="<?php echo base_url('penyewa/read_input_penyewa') ?>" class="btn btn-primary mb-3">Tambah Data</a>
          <?php echo $this->session->flashdata('pesan') ?>
          <table class="table table-hover table-striped table-borderd">
              <thead>
                  <tr>
                    <th width="8px">No</th>
                    <th width="18px">Kode Pelanggan</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th width="15px">Agama</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th width="150px">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no = 1; ?>
                  <?php foreach($penyewa as $da) : ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo  $da["kode_pelanggan"] ?></td>
                        <td><?php echo  $da["nama"] ?></td>
                        <td><?php echo  $da["nik"] ?></td>
                        <td><?php echo  $da["agama"] ?></td>
                        <td><?php echo  $da["no_hp"] ?></td>
                        <td><?php echo  $da["alamat"] ?></td>
                        <td>
                            <a href="<?php echo base_url()."penyewa/delete_penyewa/".$da["kode_pelanggan"]; ?>" class="btn btn-sm btn-danger"><i class=" fas fa-trash"></i></a>
                            <a href="<?php echo base_url()."penyewa/update_penyewa/".$da["kode_pelanggan"]; ?>" class="btn btn-sm btn-primary"><i class=" fas fa-edit"></i></a>
                        </td>
                    </tr>
                  <?php  $no++; ?>
                <?php endforeach; ?>
              </tbody>

          </table>
        </section>
</div>
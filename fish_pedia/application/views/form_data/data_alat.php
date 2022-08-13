<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Alat</h1>
          </div>
          <a href="<?php echo base_url('alat/read_input_alat') ?>" class="btn btn-primary mb-3">Tambah Data</a>
          <?php echo $this->session->flashdata('pesan') ?>
          <table class="table table-hover table-striped table-borderd">
              <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Alat</th>
                    <th>Nama</th>
                    <th>Merk</th>
                    <th>status</th>
                    <th>Harga / Jam</th>
                    <th width="118px">aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php 
                  $no = 1;
                  foreach($alat as $da) : ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $da["kode"] ?></td>
                    <td><?php echo  $da["nama_alat"] ?></td>
                    <td><?php echo  $da["merk"] ?></td>
                    <td><?php 
                        if($da["status"] == "0"){
                            echo "<span class='badge badge-danger'> Tidak Tersedia  </span>";
                        }else{
                            echo "<span class='badge badge-primary'> Tersedia  </span>";
                        }
                    ?></td>
                    <td><?php echo  $da["harga_alat"] ?></td>
                    <td>
                        <a href="<?php echo base_url()."alat/delete_alat/".$da['kode'] ?>" class="btn btn-sm btn-danger"><i class=" fas fa-trash"></i></a>
                        <a href="<?php echo base_url()."alat/update_alat/".$da['kode'] ?>" class="btn btn-sm btn-primary"><i class=" fas fa-edit"></i></a>
                    </td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>

          </table>
        </section>
</div>
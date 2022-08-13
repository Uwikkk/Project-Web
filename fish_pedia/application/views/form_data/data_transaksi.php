<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Transaksi</h1>
          </div>
          <?php echo $this->session->flashdata('pesan') ?>
          <table class="table table-hover table-striped table-borderd">
              <thead>
                  <tr>
                    <th>Nama Pelanggan</th>
                    <th>Nama Alat yg di Pinjam</th>
                    <th width="8px">No Tempat</th>
                    <th width="8px">Jenis Tempat</th>
                    <th>Jam Pinjam Alat</th>
                    <th>Jam Kembali Alat</th>
                    <th>Jam Pinjam Tempat</th>
                    <th>Jam Kembali Tempat</th>
                    <th>Status</th>
                    <th width="228px">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php 
                  foreach($transaksi as $da) : ?>
                  <tr>
                    <td><?php echo $da->nama ?></td>
                    <td><?php echo $da->nama_alat ?></td>
                    <td><?php echo $da->kode_pemancingan ?></td>
                    <td><?php echo $da->nama_tempat ?></td>
                    <td><?php echo  $da->jam_pinjam ?></td>
                    <td><?php echo  $da->jam_kembali ?></td>
                    <td><?php echo  $da->jam_sewa ?></td>
                    <td><?php echo  $da->jam_sampai ?></td>
                    <td><?php echo  $da->status_pengembalian ?></td>
                    <td>
                    <?php
                      if($da->status_pengembalian == "Selesai"){ ?>
                        <button class="btn btn-sm btn-primary">Selesai</button>
                      <?php }else{ ?>
                        <a href="<?php echo base_url()."transaksi/detail/".$da->kode_pemancingan ?>" class="btn btn-sm btn-primary">Detail</a>
                        <a href="<?php echo base_url()."transaksi/update_transaksi/".$da->kode_pemancingan ?>" class="btn btn-sm btn-primary">Atur Jam Pengembalian</a>
                    <?php } ?>
                    </td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>

          </table>
        </section>
</div>
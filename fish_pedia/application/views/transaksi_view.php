<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Pembayaran</h1>
          </div>
          <?php echo $this->session->flashdata('pesan') ?>
          <form action="<?= base_url('transaksi/bayar') ?>" method="post">
          <table class="table table-hover table-striped table-borderd">
            <?php foreach($transaksi as $tr) : ?>
              <tr>
                    <th>Nama Pelanggan</th>
                    <td>:</td>
                    <td>
                      <input type="hidden" name="nama_pelanggan" value="<?= $tr->nama ?>">
                    <?= $tr->nama ?></td>
                </tr>
                <tr>
                    <th>Alat Yang Di Pinjam</th>
                    <td>:</td>
                    <td>
                    <input type="hidden" name="nama_alat" value="<?= $tr->nama_alat ?>">
                    <input type="hidden" name="kode_alat" value="<?= $tr->kode ?>">
                    <?= $tr->nama_alat ?></td>
                </tr>
                <tr>
                    <th>Jenis Tempat</th>
                    <td>:</td>
                    <td><?= $tr->nama_tempat ?></td>
                </tr>
                <tr>
                    <th>No Tempat</th>
                    <td>:</td>
                    <td>
                    <input type="hidden" name="no_tempat" value="<?= $tr->kode_pemancingan ?>">
                    <input type="hidden" name="kode_pemancingan" value="<?= $tr->kode_pemancingan ?>">
                    <?= $tr->kode_pemancingan ?></td>
                </tr>
                <tr>
                    <th>Jam Pinjam Alat</th>
                    <td>:</td>
                    <td><?= $tr->jam_pinjam ?></td>
                </tr>
                <tr>
                    <th>Jam Kembali Alat</th>
                    <td>:</td>
                    <td><?= $tr->jam_kembali ?></td>
                </tr>
                <tr>
                    <th>Jam Pengembalian Alat</th>
                    <td>:</td>
                    <td><?= $tr->jam_pengembalian ?></td>
                </tr>
                <tr>
                    <th>Jam Pinjam Tempat</th>
                    <td>:</td>
                    <td><?= $tr->jam_sewa ?></td>
                </tr>
                <tr>
                    <th>Jam Kembali Tempat</th>
                    <td>:</td>
                    <td><?= $tr->jam_sampai ?></td>
                </tr>
                <tr>
                    <th>Jam Pengembalian Tempat</th>
                    <td>:</td>
                    <td><?= $tr->jam_cek ?></td>
                </tr>
                <tr>
                      <?php 
                        $x = strtotime($tr->jam_pinjam);
                        $y = strtotime($tr->jam_kembali);
                        $difff = $y - $x;
                        $jam = floor($difff/(60*60));
                        $menit = $difff - $jam*(60*60);
                        $as = floor($menit/60);
                      ?>
                    <th>Lama Sewa Alat</th>
                    <td>:</td>
                    <td><?= $jam ?> Jam <?= $as ?> Menit</td>
                </tr>
                <tr>
                  <?php
                  $z = strtotime($tr->jam_pengembalian);
                  $telat = $z - $y;
                  $jam_telat = floor($telat/(60*60));
                  $menit = $telat - $jam_telat*(60*60);
                  $as = floor($menit/60);
                  ?>
                    <th>Lama Telat Alat</th>
                    <td>:</td>
                    <td><?= $jam_telat ?> Jam <?= $as ?> Menit</td>
                </tr>
                <tr>
                      <?php 
                        $a = strtotime($tr->jam_sewa);
                        $b = strtotime($tr->jam_sampai);
                        $div = $b - $a;
                        $jam_tempat = floor($div/(60*60));
                        $menit_tempat = $div - $jam_tempat*(60*60);
                        $qw = floor($menit_tempat/60);
                      ?>
                    <th>Lama Sewa Tempat</th>
                    <td>:</td>
                    <td><?= $jam_tempat ?> Jam <?= $qw ?> Menit</td>
                </tr>
                <tr>
                  <?php
                  $c = strtotime($tr->jam_cek);
                  $telat_tempat = $c - $b;
                  $jam_telat_tempat = floor($telat_tempat/(60*60));
                  $menit_telat_tempat = $telat_tempat - $jam_telat_tempat*(60*60);
                  $qw = floor($menit_telat_tempat/60);
                  ?>
                    <th>Lama Telat Tempat</th>
                    <td>:</td>
                    <td><?= $jam_telat_tempat ?> Jam <?= $qw ?> Menit</td>
                </tr>
                <tr>
                <?php 
                  $total_Alat = $jam * $tr->harga_alat;
                ?>
                    <th>Harga Alat</th>
                    <td>:</td>
                    <td>Rp <?= number_format($total_Alat,0,',','.') ?></td>
                </tr>
                <tr>
                <?php 
                  $total_Tempat = $jam_tempat * $tr->harga;
                ?>
                    <th>Harga Tempat</th>
                    <td>:</td>
                    <td>Rp <?= number_format($total_Tempat,0,',','.') ?></td>
                </tr>
                <tr>
                  <?php 
                    $denda = $tr->harga_alat * (20/100); // denda per jam
                    $denda_jam = $jam_telat * $denda;
                    $denda_menit = $tr->harga_alat * (3/100);
                    $jmlh = $denda_jam+$denda_menit;

                  ?>
                    <th>Denda Alat</th>
                    <td>:</td>
                    <td>Rp 
                        <?= number_format($jmlh,0,',','.') ?>
                    </td>
                </tr>
                <tr>
                  <?php 
                    $denda_tempat = $tr->harga * (20/100); // denda per jam 20%
                    $denda_jam_tempat = $jam_telat_tempat * $denda_tempat;
                    $denda_menit_tempat = $tr->harga * (3/100); // denda permenit 3%
                    $jmlh_1 = $denda_jam_tempat+$denda_menit_tempat;

                  ?>
                    <th>Denda Tempat</th>
                    <td>:</td>
                    <td>Rp 
                        <?= number_format($jmlh_1,0,',','.') ?>
                    </td>
                </tr>
                <tr>
                    <?php $total = 0;
                      $total = $total_Tempat + $total_Alat + $jmlh + $jmlh_1;
                    ?>
                    <th>Total</th>
                    <td>:</td>
                    <td>Rp 
                    <?= number_format($total,0,',','.') ?>
                      <input type="hidden" name="total_bayar" value="<?= $total ?>">
                    </td>
                </tr>
          </table>
          
          <button type="submit" class="btn btn-primary mt-4" style="margin-left: 750px">Bayar</button>
          </form>
          <?php endforeach; ?>
        </section>

</div>
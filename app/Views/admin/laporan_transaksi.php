<?= $this->extend('layout/template'); ?>

<?= $this->section('page-content'); ?>


<div class="container-fluid">
   <div class="row">

      <div class="col-12">
         <div class="d-flex flex-wrap mt-2">
            <div class="col-xl-3 col-md-6">
               <div class="card shadow bg-success text-white mb-4">
                  <div class="card-body">
                     <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                           <div class="text-md font-weight-bold text-light text-uppercase mb-1">
                              Pendapatan Hari ini</div>
                           <div class="h2 mb-0 font-weight-bold text-light">Rp.<?= number_format($harian, 0, ',', '.'); ?></div>
                        </div>

                     </div>
                  </div>
               </div>
            </div>

            <div class="col-xl-3 col-md-6">
               <div class="card shadow bg-secondary text-white mb-4">
                  <div class="card-body">
                     <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                           <div class="text-md font-weight-bold text-light text-uppercase mb-1">
                              Pendapatan bulan Ini</div>
                           <div class="h2 mb-0 font-weight-bold text-light">Rp.<?= number_format($bulanan, 0, ',', '.'); ?></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-xl-3 col-md-6">
               <div class="card shadow bg-info text-white mb-4">
                  <div class="card-body">
                     <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                           <div class="text-md font-weight-bold text-light text-uppercase mb-1">
                              Pendapatan Tahun <?php

                                                use CodeIgniter\HTTP\Request;

                                                echo date('Y'); ?></div>
                           <div class="h2 mb-0 font-weight-bold text-light">Rp.<?= number_format($tahunan, 0, ',', '.'); ?></div>
                        </div>

                     </div>
                  </div>
               </div>
            </div>

            <div class="col-xl-3 col-md-6">
               <div class="card shadow bg-primary text-white mb-4">
                  <div class="card-body">
                     <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                           <div class="text-md font-weight-bold text-light text-uppercase mb-1">
                              Pendapatan Keseluruhan</div>
                           <div class="h2 mb-0 font-weight-bold text-light">Rp.<?= number_format($total, 0, ',', '.'); ?></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="card">


            <div class="card-body">

               <div class="card-body" style="overflow-x: auto;">
                  <div class="col-12 mb-3 d-flex flex-wrap justify-content-between">
                     <div class="d-flex flex-wrap">
                        <h5 class="h5 mr-2 my-2">Filter berdasarkan : </h5>
                        <form action="" method="get" class="d-flex my-2">
                           <label class="h5" for="tahun">Tahun</label>
                           <input type="text" name="tahun" id="tahun" class="form-control ml-2 mr-2" placeholder="Tahun" style="margin-top: -8px; width: 80px;">
                           <label class="h5" for="bulan"> Bulan</label>
                           <Select class="form-control mx-2" name="bulan" id="bulan" style="margin-top: -8px; width: 120px;">

                              <option value="">Bulan</option>
                              <option value="01">Januari</option>
                              <option value="02">Februari</option>
                              <option value="03">Maret</option>
                              <option value="04">April</option>
                              <option value="05">Mei</option>
                              <option value="06">Juni</option>
                              <option value="07">Juli</option>
                              <option value="08">Agustus</option>
                              <option value="09">September</option>
                              <option value="10">Oktober</option>
                              <option value="11">November</option>
                              <option value="12">Desember</option>
                           </Select>
                           <button type="submit" class="btn btn-primary" style="margin-top: -10px;">Filter</button>
                        </form>
                     </div>
                     <div>

                        <h5 class="h5 my-2" style="float: right;">Pendapatan: Rp.<?php
                                                                                 if (!empty($pendapatan)) {
                                                                                    echo number_format($pendapatan, 0, ',', '.');
                                                                                 } else {
                                                                                    echo '0';
                                                                                 }
                                                                                 ?></h5>
                     </div>
                  </div>
                  <table class="table table-striped table-bordered dt-responsive nowrap">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Mobil</th>
                           <th>Penyewa</th>
                           <th>Tanggal Sewa</th>
                           <th>Tanggal Kembali</th>
                           <th>Harga Sewa</th>
                           <th>Hari Sewa</th>
                           <th>Total Biaya Sewa</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $n = 1; ?>
                        <?php $now = date('Y-m-d'); ?>
                        <?php if (!empty($selesai) && is_array($selesai)): ?>
                           <?php foreach ($selesai as $t) : ?>
                              <tr>
                                 <td><?= $n++; ?></td>
                                 <td><?= $t->merek; ?></td>
                                 <td><?= $t->nama; ?></td>
                                 <td><?= $t->sewa; ?></td>
                                 <td><?= $t->kembali; ?></td>
                                 <td>Rp.<?= number_format($t->biaya_sewaMobil, 0, ',', '.'); ?></td>
                                 <td><?= $t->total_hariSewa; ?></td>
                                 <td>Rp.<?= number_format($t->total_biayaSewa, 0, ',', '.'); ?></td>

                              </tr>
                           <?php endforeach; ?>
                        <?php else: ?>
                           <tr>
                              <td colspan="8" class="text-center">Tidak ada data yang tersedia</td>
                           </tr>
                        <?php endif; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<?= $this->endSection(); ?>
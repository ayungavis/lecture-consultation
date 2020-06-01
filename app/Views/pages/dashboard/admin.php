<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="alert alert-soft-info d-flex align-items-center card-margin" role="alert">
  <i class="material-icons mr-3">error_outline</i>
  <div class="text-body">Selamat datang, <strong><?= session()->get('nama'); ?>!</strong></div>
</div>

<div class="row">
  <div class="col-lg-7">
    <div class="card">
      <div class="card-header card-header-large bg-white">
        <h4 class="card-header__title">Perkembangan Mahasiswa</h4>
      </div>
      <div class="card-body">
        <div class="chart">
          <canvas id="consultationChart" class="chart-canvas"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-5">
    <!-- START ACTIVITY -->
    <div class="card">
      <div class="card-header card-header-large bg-white d-flex align-items-center">
        <h4 class="card-header__title flex m-0">Aktivitas Terakhir</h4>
      </div>
      <div class="card-header card-header-tabs-basic nav" role="tablist">
        <a href="#activity_konsultasi" class="active" data-toggle="tab" role="tab" aria-controls="activity_konsultasi"
          aria-selected="true">Konsultasi</a>
        <a href="#activity_mahasiswa" data-toggle="tab" role="tab" aria-controls="activity_mahasiswa"
          aria-selected="false">Mahasiswa</a>
        <a href="#activity_dosen" data-toggle="tab" role="tab" aria-controls="activity_dosen"
          aria-selected="false">Dosen</a>
      </div>
      <div class="list-group tab-content list-group-flush">
        <div class="tab-pane active show fade" id="activity_konsultasi">
          <?php foreach ($konsultasi as $row): ?>
          <a class="list-group-item list-group-item-action d-flex align-items-center ">
            <div class="flex">
              <div class="d-flex align-items-middle">
                <strong class="text-15pt mr-1"><?= $row->mahasiswa ?></strong>
              </div>
              <small><?= $row->dosen ?></small>
            </div>
            <small class="text-muted"><?= date("d F Y", strtotime($row->updated_at)) ?></small>
            <i class="material-icons icon-muted ml-3">arrow_forward</i>
          </a>
          <?php endforeach; ?>
          <div class="card-footer text-center border-0">
            <a class="text-muted" href="<?= base_url('konsultasi') ?>">Lihat Semua</a>
          </div>
        </div>

        <div class="tab-pane" id="activity_mahasiswa">
          <?php foreach ($mahasiswa as $row): ?>
          <div class="list-group-item list-group-item-action d-flex align-items-center ">
            <div class="avatar avatar-xs mr-3">
              <span class="avatar-title rounded-circle bg-primary">
                <i class="material-icons">account_circle</i>
              </span>
            </div>
            <div class="flex">
              <div class="d-flex align-items-middle">
                <strong class="text-15pt mr-1"><?= $row->nama ?></strong>
              </div>
              <small class="text-muted"><?= date("d F Y", strtotime($row->created_at)) ?></small>
            </div>
            <i class="material-icons icon-muted ml-3">arrow_forward</i>
          </div>
          <?php endforeach; ?>
          <div class="card-footer text-center border-0">
            <a class="text-muted" href="<?= base_url('users') ?>">Lihat Semua</a>
          </div>
        </div>

        <div class="tab-pane" id="activity_dosen">
          <?php foreach ($dosen as $row): ?>
          <div class="list-group-item list-group-item-action d-flex align-items-center ">
            <div class="avatar avatar-xs mr-3">
              <span class="avatar-title rounded-circle bg-secondary">
                <i class="material-icons">school</i>
              </span>
            </div>

            <div class="flex">
              <div class="d-flex align-items-middle">
                <strong class="text-15pt mr-1"><?= $row->nama ?></strong>
              </div>
              <small class="text-muted"><?= date("d F Y", strtotime($row->created_at)) ?></small>
            </div>
            <i class="material-icons icon-muted ml-3">arrow_forward</i>
          </div>
          <?php endforeach; ?>
          <div class="card-footer text-center border-0">
            <a class="text-muted" href="<?= base_url('users') ?>">Lihat Semua</a>
          </div>
        </div>
      </div>
    </div>
    <!-- END ACTIVITY -->
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('extra-script') ?>
<!-- Global Settings -->
<script src="<?= base_url() ?>/assets/js/settings.js"></script>

<!-- Chart.js -->
<script src="<?= base_url() ?>/assets/vendor/Chart.min.js"></script>

<!-- UI Charts Page JS -->
<script src="<?= base_url() ?>/assets/js/chartjs-rounded-bar.js"></script>
<script src="<?= base_url() ?>/assets/js/charts.js"></script>

<script>
(function() {
  'use strict';
  
  Charts.init();

  var Consultation = function Consultation(id) {
    var type = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'roundedBar';
    var options = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};
    options = Chart.helpers.merge({
      barRoundness: 1.2,
      scales: {
        yAxes: [{
          ticks: {
            callback: function callback(a) {
              return a;
            }
          }
        }]
      },
      tooltips: {
        callbacks: {
          label: function label(a, e) {
            var t = e.datasets[a.datasetIndex].label || "",
              o = a.yLabel,
              r = "";
            return 1 < e.datasets.length && (r += '<span class="popover-body-label mr-auto">' + t +
              "</span>"), r += '<span class="popover-body-value">' + o + "</span>";
          }
        }
      }
    }, options);
    var data = {
      labels: ['<?php echo $grafik['label'] ?>'],
      datasets: [{
        label: "Jumlah Konsultasi",
        data: [<?php echo $grafik['jumlah'] ?>],
        barPercentage: 1,
        barThickness: 20
      }]
    };
    Charts.create(id, type, options, data);
  };

  Consultation('#consultationChart');
  $('[data-toggle="chart"]:checked').each(function(index, el) {
    Charts.add($(el));
  });
})();
</script>
<?= $this->endSection() ?>
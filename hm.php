<?php
session_start();
include 'db.php';
include 'includes/header.php';
include 'includes/script.php';
?>

<header class="header">
  <h1>Bem vindo!</h1>
  <p> <img src="/Projeto/img/nc.ico" width="25" height="25"> ncosta</p>
</header>
<div class="grid-container">
  <!-- SIDEBAR -->
  <?php
  include 'includes/sidebar.php';
  ?>
  <!-- MID -->
  <div class="col-md-">
    <!-- Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <section>
      <p style="color:#343a40"><strong>Avaliação de Desempenho</strong></p> <br>
      <div>
        <canvas id="grafico"></canvas>
      </div>
    </section>
    <br>
    <section>
      <div class="rowMid">
        <div class="columnMid">
          <p style="color:#343a40"><strong>Apólices</strong></p> <br>
          <canvas id="grafico2"></canvas>
        </div>
        <div class="columnMid">
          <p style="color:#343a40"><strong>Clientes</strong></p><br>
          <canvas id="grafico3"></canvas>
        </div>
      </div>
    </section>
  </div>
  <!-- ASIDE -->
  <div class="col-md">
    <?php
    include 'includes/aside.php';
    ?>
  </div>
</div>
</div>
<?php
include 'includes/footer.php';
?>
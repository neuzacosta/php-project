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
<div>
  <table class="table-cliente">
    <thead>
      <tr>
        <th class="th-cliente">NIF</th>
        <th class="th-cliente">Nome</th>
        <th class="th-cliente">Morada</th>
        <th class="th-cliente">Contacto</th>
        <th class="th-cliente">Estado</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (count($_POST) > 0) {
        $search = $_POST['search'];
        $result = mysqli_query($conn, "SELECT * FROM cliente where nifCliente='$search' ");
      }
      if (mysqli_num_rows($result) > 0) {
        // Trazer os dados da BD      
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td>
              <?php echo $row['nifCliente']; ?>
            </td>
            <td>
              <?php echo $row['nomeCliente']; ?>
            </td>
            <td>
              <?php echo $row['moradaCliente']; ?>
            </td>
            <td>
              <?php echo $row['contactoCliente']; ?>
            </td>
            <td>
              <?php echo $row['estadoCliente']; ?>
            </td>
          </tr>
          <?php
        }
      } else {
        echo '<script language="javascript">';
        echo 'alert("Não existem clientes registados com o NIF indicado.");';
        echo 'window.location.href = "#";';
        echo '</script>';
        exit;
      }
      ?>
    </tbody>
  </table>
</div>
<!-- ASIDE -->
<aside>
  <?php
  include 'includes/aside.php';
  ?>
</aside>
<?php
include 'includes/footer.php';
?>
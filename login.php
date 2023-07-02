<?php
session_start();
include 'db.php';
include 'includes/header.php';
include 'includes/script.php';
?>
<div class="img-container">
    <img src="/Projeto/img/connections.png" width=25%>
</div>
<br>
<div class="login-container">
    <form action="loginProcess.php" method="post" enctype="multipart/form-data">
        <div class="grid-item"><label for="username"><b>Username</b></label> &nbsp;</div>
        <div class="grid-item"><input type="text" placeholder="Introduza o Username" name="username" required></div>
        <div class="grid-item"><label for="psw"><b>Password</b></label> &nbsp;</div>
        <div class="grid-item"><input type="password" value="FakePSW" id="myInput" placeholder="Introduza a Password"
                name="psw" required></div>
        <div class="grid-item"><input type="checkbox" onclick="mostrarPw()"> Mostrar Password</div>
        <br>
        <div class="grid-item"><button type="submit">Login</button>
        </div>
        <div class="grid-item">
            <label>
                <input type="checkbox" checked="checked" name="remember"> Lembrar password?
            </label>
        </div>
        <br>
        <div class="grid-item"><span title="Envie um email com pedido de reset da password."><a
                    href="mailto:n.atsoc@live.com.pt">Esqueceu a password?</a></span>
            <span><a href="registo.php">Criar novo registo?</a></span>

        </div>
    </form>
</div>
<?php
include 'includes/footer.php';
?>
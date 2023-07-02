<?php
session_start();
include 'db.php';
include 'includes/header.php';
include 'includes/script.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $psw = $_POST['psw'];
    // Verifica se email já está registado na BD
    $query = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">';
        echo 'alert("Email já registado.");';
        echo 'window.location.href = "registo.php";';
        echo '</script>';
        exit;
    } else {
        // Inserir utilizadores na BD
        $query = "INSERT INTO user(username, email, psw) VALUES ('$username','$email', '$psw')";
        $result = mysqli_query($conn, $query) or die("Erro.");
        if ($result) {
            /* echo "Utilizador registado com sucesso!!"; */
            header("Location: login.php");
            exit;
        } else {
            header("Location: registo.php");
            exit;
        }
    }
}
?>
<div class="login-container">
    <form method="POST" action="registo.php">
        <h1>Criar nova conta</h1>
        <br>
        <p>Preencha, por favor, o formulário infra:</p>
        <br>
        <div class="grid-item"><label for="username"><b>Username</b></label> &nbsp;</div>
        <div class="grid-item"><input type="text" id="username" placeholder="Introduza o Username" name="username"
                required></div>
        <div class="grid-item"><label for="email"><b>Email</b></label> &nbsp;</div>
        <div class="grid-item"><input type="email" placeholder="Introduza o Email" name="email" required></div>
        <div class="grid-item"><label for="psw"><b>Password</b></label> &nbsp;</div>
        <div class="grid-item"><input type="password" placeholder="Introduza a Password" name="psw" id="psw"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Deve conter pelo menos um número, uma letra maiúscula e minúscula, e pelo menos oito caracteres."
                required></div>
        <div class="clearfix">
            <br>
            <br>
            <button type="submit" class="signupbtn">Criar</button> &nbsp;
            <button type="button" class="cancelbtn" onclick="document.location='login.php'">Cancelar</button>
        </div>
        <div>
            <p>Ao concluír o registo da sua conta, está aceitar a nossa politica de Privacidade & Termos, em
                conformidade com a regulamentação em vigor sobre a<a
                    href="https://eur-lex.europa.eu/legal-content/PT/TXT/HTML/?uri=CELEX%3A32016R0679"
                    target="_blank"><u>Proteção de Dados</u></a></p>
        </div>
    </form>
</div>
<div id="message">
    <h3>Password deve conter o seguinte:</h3>
    <p id="letter" class="invalid">Uma letra minúscula</p>
    <p id="capital" class="invalid">Uma letra maiúscula</p>
    <p id="number" class="invalid">Um número</p>
    <p id="length" class="invalid">No mínimo 8 caracteres</p>
</div>
<script>
    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");
    // Mostrar message box apenas quando o utilizador clicar no campo password
    myInput.onfocus = function () {
        document.getElementById("message").style.display = "block";
    }
    // Esconde a message box quando o utilizador clicar fora do campo password
    myInput.onblur = function () {
        document.getElementById("message").style.display = "none";
    }
    // Quando o utilizador começar a preencher o campo password
    myInput.onkeyup = function () {
        // Validação de letras minusculas
        var lowerCaseLetters = /[a-z]/g;
        if (myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }
        // Validação de letras maiusculas
        var upperCaseLetters = /[A-Z]/g;
        if (myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }
        // Validação de numeros
        var numbers = /[0-9]/g;
        if (myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }
        // Validação do tamanho
        if (myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }
</script>
<?php
include 'includes/footer.php';
?>
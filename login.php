<?php include "includes/header.php"; ?>
 
<?php 

if(isset($_POST['submit'])) {

$username = $_POST['username'];
$password = $_POST['password'];

$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);

$query = "SELECT * FROM user WHERE username = '{$username}' ";
$select_user_query = mysqli_query($connection, $query);

if(!$select_user_query) {
    die("QUERY FAILED" . mysqli_error($connection));
}

$row = mysqli_fetch_array($select_user_query);
  $db_username = $row['USERNAME'];
  $db_user_password = $row['PASSWORD'];

  $password = crypt($password, $db_user_password);

if($username === $db_username && $password === $db_user_password) {
    
    $_SESSION['username'] = $db_username;
    
    header("Location: admin");
    
} else {
    $bad_message = "Usuário e senha incorretos. Tente novamente."; 
} } ?>

  <section id="login">
   <div class="container container-space">
       <div class="row">      
            <div class="col-md-4 login-separator">
            <a href="index.php"><img class="my-logo" src="img/jcb-logo-final-vertical.png" alt=""></a>
            </div>
            <div class="col-md-6">
            <div class="panel panel-default col-login">
              <div class="panel-heading"><h3 class="panel-title"><strong>Acesso Interno</strong></h3></div>
                  <div class="panel-body">
                   <form role="form" method="POST">
                      <div class="form-group">
                        <label for="username">Usuário</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Insira o usuário">
                      </div>
                      <div class="form-group">
                        <label for="password">Senha<a href="/sessions/forgot_password"></a></label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Senha">
                      </div>
                      <button type="submit" name="submit" class="btn btn-sm btn-default">Acessar</button>
                      <a href="index.php">Voltar</a>
                    </form>
                  </div>
                </div>
            </div>
        </div>
        <?php if(isset($bad_message) && !empty($bad_message)) { ?>

        <div class="alert alert-danger alertzone">
          <strong>Erro!</strong> <?php echo " ".$bad_message; ?>
        </div>

        <?php } ?>  
    </div>
</section>
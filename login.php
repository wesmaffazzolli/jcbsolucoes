<?php include "includes/header.php"; ?>
 
<?php //include "includes/navigation.php"; ?>
  <section id="login">
   <div class="container container-space">
       <div class="row">
            <div class="col-md-4 login-separator">
            <img class="my-logo" src="img/nova-logo-jcb-2.png" alt="">
            </div>
            <div class="col-md-6">
            <div class="panel panel-default col-login">
              <div class="panel-heading"><h3 class="panel-title"><strong>Acesso Interno</strong></h3></div>
                  <div class="panel-body">
                   <form role="form">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Usuário</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Insira o usuário">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Senha<a href="/sessions/forgot_password"></a></label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
                      </div>
                      <button type="submit" class="btn btn-sm btn-default">Acessar</button>
                      <a href="index.php">Voltar</a>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>
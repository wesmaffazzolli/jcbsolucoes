<?php include "includes/header.php"; ?>
 
<?php include "includes/navigation.php"; ?>
  
   <div class="container" style="margin-top:150px;">
       <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-default">
              <div class="panel-heading"><h3 class="panel-title"><strong>Acesso Interno</strong></h3></div>
                  <div class="panel-body">
                   <form role="form">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Usuário</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Insira o usuário">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Senha<a href="/sessions/forgot_password">(esqueci minha senha)</a></label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
                      </div>
                      <button type="submit" class="btn btn-sm btn-default">Acessar</button>
                    </form>
                  </div>
                </div>
            </div>
        </div>
</div>
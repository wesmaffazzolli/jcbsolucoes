        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Acesso Interno JCB v1.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <!-- Página Inicial INÍCIO -->
                        <li>
                            <a href=""><i class="fa fa-home fa-fw"></i> Página Inicial<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="imagens_inicio.php?source=listar"> Início</a>
                                </li>
                                <li>
                                    <a href="sobre.php?source=institucional"> Sobre nós</span></a>
                                </li>
                                <li>
                                    <a href="#"> Nossos Números<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="nossos_numeros.php?source=atualizar_numeros">Atualizar Números</a>
                                        </li>
                                        <li>
                                            <a href="nossos_numeros.php?source=listar">Listar Imagens</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#"> Linha do Tempo<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="timeline.php?source=listar">Listar</a>
                                        </li>
                                        <li>
                                            <a href="timeline.php?source=adicionar">Adicionar História</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>

                                <li>
                                    <a href="#"> Clientes<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="clientes.php?source=listar">Listar</a>
                                        </li>
                                        <li>
                                            <a href="clientes.php?source=adicionar">Adicionar Cliente</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!-- Página Inicial FIM -->

                        <!-- Novidades INÍCIO -->
                        <li>
                            <a href=""><i class="fa fa-bar-chart-o fa-fw"></i> Novidades<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="novidades.php?source=listar">Listar</a>
                                </li>
                                <li>
                                    <a href="novidades.php?source=adicionar">Adicionar Novidade</a>
                                </li>
                                <li>
                                    <a href="#"> Categorias<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="categorias.php?source=listar">Listar</a>
                                        </li>
                                        <li>
                                            <a href="categorias.php?source=adicionar">Adicionar Categoria</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!-- Novidades FIM -->

                        <!-- Serviços INÍCIO -->
                        <li>
                            <a href=""><i class="fa fa-wrench fa-fw"></i> Serviços<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="servicos.php?source=listar">Listar</a>
                                </li>
                                <li>
                                    <a href="servicos.php?source=adicionar">Adicionar Serviço</a>
                                </li>
                                <li>
                                    <a href="#"> Imagens<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="imagens_servicos.php?source=listar">Listar</a>
                                        </li>
                                        <li>
                                            <a href="imagens_servicos.php?source=adicionar">Adicionar Imagens</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!-- Serviços FIM -->

                        <!-- Contato INÍCIO -->
                        <li>
                            <a href=""><i class="fa fa-phone fa-fw"></i> Contato<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="contato.php?source=editar">Atualizar</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!-- Contato FIM -->

                        <!-- Usuário INÍCIO -->
                        <li>
                            <a href=""><i class="fa fa-user fa-fw"></i> Usuário<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="usuario.php?source=editar">Atualizar</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!-- Usuário FIM -->

                        <!-- Planos de Fundo INÍCIO -->
                        <li>
                            <a href=""><i class="fa fa-map fa-fw"></i> Planos de Fundo<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="planos_de_fundo.php?source=editar&p_id=n"> Nossos Números</a>
                                </li>
                                <li>
                                    <a href="planos_de_fundo.php?source=editar&p_id=s"> Serviços</a>
                                </li>
                                <li>
                                    <a href="planos_de_fundo.php?source=editar&p_id=i"> Sobre nós</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!-- Planos de Fundo FIM -->

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
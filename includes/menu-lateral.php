<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav sidebar sidebar-dark accordion bg-navbar" id="accordionSidebar">

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="/FluxBox/admin/carrinho.php">
        <i class="fa fa-cart-plus"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-user-circle"></i>
        <span>Usuários</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="cadastrar-usuarios.php">Cadastrar</a>
          <a class="collapse-item" href="listar-usuarios.php">Listar</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCliente" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-user"></i>
        <span>Clientes</span>
      </a>
      <div id="collapseCliente" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="cadastrar-clientes.php">Cadastrar</a>
          <a class="collapse-item" href="listar-clientes.php">Listar</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePost" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-calculator"></i>
        <span>Relatório</span>
      </a>
      <div id="collapsePost" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="listar-vendas.php">Listar</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFuncionario" aria-expanded="true" aria-controls="collapseFuncionario">
        <i class="fas fa-id-card"></i>
        <span>Funcionários</span>
      </a>
      <div id="collapseFuncionario" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="cadastrar-funcionarios.php">Cadastrar</a>
          <a class="collapse-item" href="listar-funcionarios.php">Listar</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProdutos" aria-expanded="true" aria-controls="collapseProdutos">
        <i class="fas fa-archive"></i>
        <span>Produtos</span>
      </a>
      <div id="collapseProdutos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="cadastrar-produtos.php">Cadastrar</a>
          <a class="collapse-item" href="listar-produtos.php">Listar</a>
        </div>
      </div>
    </li>

  </ul>
  <!-- End of Sidebar --
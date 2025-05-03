<!doctype html>
<html lang="pt-BR">
<!--begin::Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Café Divino | Dashboard</title>
  <!--begin::Primary Meta Tags-->
  <link rel="shortcut icon" href="<?php echo BASE_URL ?>assets/img/logo/logo-café-divíno3.svg" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="title" content="Dashboard Metre dos Motores" />
  <meta name="author" content="Alessandro Palmeira" />
  <meta name="description" content="Dashboard Metre dos Motores" />
  <meta name="keywords" content="Dashboard, Metre dos Motores, Motores, serviços, veiculo" />
  <!--end::Primary Meta Tags-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!--begin::Fonts-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />
  <!--end::Fonts-->

  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
    integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />
  <!--end::Third Party Plugin(OverlayScrollbars)-->

  <!--begin::Third Party Plugin(Bootstrap Icons)-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />
  <!--end::Third Party Plugin(Bootstrap Icons)-->

  <!--begin::Required Plugin(AdminLTE)-->
  <link rel="stylesheet" href="<?php echo BASE_URL ?>dash/css/adminlte.css" />
  <!--end::Required Plugin(AdminLTE)-->

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
      font-family: 'poppins', sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Estilizando a barra de rolagem */
    ::-webkit-scrollbar {
      width: 5px;
      /* Largura da barra de rolagem */
    }

    /* Cor da parte de fundo da barra de rolagem */
    ::-webkit-scrollbar-track {
      background-color: #2b1b1b;
      /* Cor de fundo da track da barra de rolagem */
    }

    /* Cor da barra de rolagem em si */
    ::-webkit-scrollbar-thumb {
      background-color: #e69f00;
      /* Cor do thumb (parte que desliza) */
      border-radius: 5px;
      /* Arredondamento */
    }

    /* Cor ao passar o mouse sobre a barra */
    ::-webkit-scrollbar-thumb:hover {
      background-color: #ffb84d;
      /* Um laranja mais claro ao passar o mouse */
    }

    .img-tabela {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 8px;
      cursor: pointer;
    }


    .table>tbody {
      vertical-align: baseline;
    }

    .bg-body-secondary {
      background-color: #2b1b1b !important;
    }

    .welcome-card {
      transition: all 0.3s ease;
    }

    .welcome-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .small-box {
      transition: all 0.3s ease;
      border-left: 4px solid #e69f00;
    }

    .small-box:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .small-box .inner {
      padding: 10px;
    }

    .small-box-icon {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 70px;
      opacity: 0.2;
      z-index: 0;
    }

    .time-badge {
      transition: all 0.3s ease;
    }

    .time-badge:hover {
      transform: scale(1.05);
    }

    .list-group-item {
      transition: all 0.2s ease;
    }

    .list-group-item:hover {
      background-color: rgba(230, 159, 0, 0.05);
    }

    /* Badges de status com cores semânticas */
    .status-badge {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-width: 120px;
      height: 26px;
      padding: 0 10px;
      border-radius: 13px;
      font-size: 12px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      color: white !important;
      transition: all 0.2s ease;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }



    .status-badge:hover {
      transform: translateY(-1px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .status-aguardando {
      background-color: #e69f00;
    }

    .status-respondido {
      background-color: #2b1b1b;
    }

    /* Adicione outras classes conforme necessárias */
    .status-ativo {
      background-color: #28a745;
    }

    .status-inativo {
      background-color: #dc3545;
    }
  </style>


</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
  <!--begin::App Wrapper-->
  <div class="app-wrapper">
    <!--begin::Header-->
    <nav class="app-header navbar navbar-expand bg-body">
      <!--begin::Container-->
      <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
              <i class="bi bi-list"></i>
            </a>
          </li>
          <li class="nav-item d-none d-md-block"><a href="<?php echo BASE_URL ?>home" class="nav-link">Site</a></li>
        </ul>
        <!--end::Start Navbar Links-->
        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">


          <!--begin::Fullscreen Toggle-->
          <li class="nav-item">
            <a class="nav-link" href="#" data-lte-toggle="fullscreen">
              <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
              <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
            </a>
          </li>
          <!--end::Fullscreen Toggle-->
          <!--begin::User Menu Dropdown-->
          <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              <img src="<?php echo BASE_URL ?>dash/assets/img/usuario.png" class="user-image rounded-circle shadow" alt="User Image" />
              <span class="d-none d-md-inline"><?php echo $usuario['nome_funcionario'] ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
              <!--begin::User Image-->
              <li class="user-header text-white" style="background-color: #2b1b1b;">
                <img src="<?php echo BASE_URL ?>dash/assets/img/usuario.png" class="rounded-circle shadow" alt="User Image" />
                <p>
                  <?php echo $usuario['nome_funcionario'] ?> - ADM
                  <small>Membro Desde Nov. 2023</small>
                </p>
              </li>
              <!--end::User Image-->

              <!--begin::Menu Footer-->
              <li class="user-footer">
                <!-- <a href="#" class="btn btn-default btn-flat">Perfil</a> -->
                <a href="<?php echo BASE_URL ?>login/sair" class="btn btn-danger btn-flat float-end">Sair</a>
              </li>
              <!--end::Menu Footer-->
            </ul>
          </li>
          <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
      </div>
      <!--end::Container-->
    </nav>
    <!--end::Header-->

    <!--begin::Sidebar-->
    <aside class="app-sidebar bg-body-secondary shadow">
      <!--begin::Sidebar Brand-->
      <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="<?php echo BASE_URL ?>admin" class="brand-link">
          <!--begin::Brand Image-->
          <img src="<?php echo BASE_URL ?>assets/img/logo/logo-café-divíno3.svg" alt="Café Divíno Logo" class="brand-image opacity-75 shadow" />
          <!--end::Brand Image-->
          <!--begin::Brand Text-->
          <span class="brand-text fw-light" style="color: #fff;">Café Divino</span>
          <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
      </div>
      <!--end::Sidebar Brand-->
      <!--begin::Sidebar Wrapper-->
      <div class="sidebar-wrapper">
        <nav class="mt-2">
          <!--begin::Sidebar Menu-->
          <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="<?php echo BASE_URL ?>admin" class="nav-link" style="color: #fff;">
                <i class="fa-solid fa-house"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li style="color: #fff;" class="nav-header">Gerenciamento de Conteúdo</li>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active" style="color: #fff;">
                <i class="fa-solid fa-mug-saucer"></i>
                <p>
                  Conteúdo Site
                  <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo BASE_URL ?>produtos/listar" class="nav-link active" style="color: #fff;">
                    <p>☕ Produtos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo BASE_URL ?>depoimento/listar" class="nav-link" style="color: #fff;">
                    <p>📰 Depoimentos</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-header" style="color: #fff;">Contatos</li>
            <li class="nav-item">
              <a href="<?php echo BASE_URL ?>contato/listar" class="nav-link" style="color: #fff;">
                <p>📞 Contatos</p>
              </a>
            </li>

            <li class="nav-header" style="color: #fff;">Equipe e Parceiros</li>
            <li class="nav-item">
              <a href="<?php echo BASE_URL ?>funcionario/listar" class="nav-link" style="color: #fff;">
                <p>👨🏽‍💼 Funcionários</p>
              </a>
            </li>
            <!--end::Sidebar Menu-->
        </nav>
      </div>
      <!--end::Sidebar Wrapper-->
    </aside>
    <!--end::Sidebar-->

    <!--begin::App Main-->
    <main class="app-main">
      <!--begin::App Content Header-->
      <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Row-->
          <div class="row">
            <div class="col-sm-6">
              <h3 class="mb-0"></h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>admin" style="color: #e69f00;">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
              </ol>
            </div>
          </div>
          <!--end::Row-->
        </div>
        <!--end::Container-->
      </div>
      <!--end::App Content Header-->

      <!--begin::App Content-->
      <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">

          <!--begin::Row-->
          <div class="row">
            <!--begin::Col-->
            <div class="col-lg-3 col-6">
              <!--begin::Small Box Widget 1-->
              <div class="small-box text-bg-primary">
                <div class="inner" style="background-color: #2b1b1b;">
                  <h3><?php echo $totalProdutos; ?></h3>
                  <p>Produtos</p>
                </div>
                <svg class="small-box-icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style="color: rgba(0, 0, 0, 0.90);">
                  <path d="M96 64c0-17.7 14.3-32 32-32l320 0 64 0c70.7 0 128 57.3 128 128s-57.3 128-128 128l-32 0c0 53-43 96-96 96l-192 0c-53 0-96-43-96-96L96 64zM480 224l32 0c35.3 0 64-28.7 64-64s-28.7-64-64-64l-32 0 0 128zM32 416l512 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 480c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                </svg>


                <a href="<?php echo BASE_URL ?>produtos/listar"
                  class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover" style="background-color: #2b1b1b; border-top: solid 1px #e69f00;">
                  Mais Informações <i class="bi bi-link-45deg"></i>
                </a>
              </div>
              <!--end::Small Box Widget 1-->
            </div>

            <!--end::Col-->
            <div class="col-lg-3 col-6">
              <!--begin::Small Box Widget 2-->
              <div class="small-box text-bg-success">
                <div class="inner" style="background-color: #e69f00;">
                  <h3><?php echo $totalDepoimentos; ?></h3>
                  <p>Depoimentos</p>
                </div>
                <svg class="small-box-icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style="color: rgba(0, 0, 0, 0.50); ">
                  <path d="M208 352c114.9 0 208-78.8 208-176S322.9 0 208 0S0 78.8 0 176c0 38.6 14.7 74.3 39.6 103.4c-3.5 9.4-8.7 17.7-14.2 24.7c-4.8 6.2-9.7 11-13.3 14.3c-1.8 1.6-3.3 2.9-4.3 3.7c-.5 .4-.9 .7-1.1 .8l-.2 .2s0 0 0 0s0 0 0 0C1 327.2-1.4 334.4 .8 340.9S9.1 352 16 352c21.8 0 43.8-5.6 62.1-12.5c9.2-3.5 17.8-7.4 25.2-11.4C134.1 343.3 169.8 352 208 352zM448 176c0 112.3-99.1 196.9-216.5 207C255.8 457.4 336.4 512 432 512c38.2 0 73.9-8.7 104.7-23.9c7.5 4 16 7.9 25.2 11.4c18.3 6.9 40.3 12.5 62.1 12.5c6.9 0 13.1-4.5 15.2-11.1c2.1-6.6-.2-13.8-5.8-17.9c0 0 0 0 0 0s0 0 0 0l-.2-.2c-.2-.2-.6-.4-1.1-.8c-1-.8-2.5-2-4.3-3.7c-3.6-3.3-8.5-8.1-13.3-14.3c-5.5-7-10.7-15.4-14.2-24.7c24.9-29 39.6-64.7 39.6-103.4c0-92.8-84.9-168.9-192.6-175.5c.4 5.1 .6 10.3 .6 15.5z" />
                </svg>

                <a href="<?php echo BASE_URL ?>depoimento/listar"
                  class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover" style="background-color: #e69f00; border-top: solid 1px #2b1b1b;">
                  Mais Informações <i class="bi bi-link-45deg"></i>
                </a>
              </div>
              <!--end::Small Box Widget 2-->
            </div>

            <!--end::Col-->
            <div class="col-lg-3 col-6">
              <!--begin::Small Box Widget 3-->
              <div class="small-box text-bg-warning">
                <div class="inner" style="background-color: #2b1b1b; color: #fff;">
                  <h3><?php echo $totalFuncionarios; ?></h3>
                  <p>Funcionários</p>
                </div>
                <svg class="small-box-icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style="color: rgba(0, 0, 0, 0.90);">
                  <path d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3l0-84.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5l0 21.5c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32l0-26.8C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112l32 0c24 0 46.2 7.5 64.4 20.3zM448 416l0-21.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176l32 0c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2l0 26.8c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7l0 84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3l0-84.7c-10 11.3-16 26.1-16 42.3zm144-42.3l0 84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2l0 42.8c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32l0-42.8c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112l32 0c61.9 0 112 50.1 112 112z" />
                </svg>

                <a href="<?php echo BASE_URL ?>funcionario/listar" class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover" style="background-color: #2b1b1b; border-top: solid 1px #e69f00; color: #fff !important;">
                  Mais Informações <i class="bi bi-link-45deg"></i>
                </a>
              </div>
              <!--end::Small Box Widget 3-->
            </div>

            <!--end::Col-->
            <div class="col-lg-3 col-6">
              <!--begin::Small Box Widget 4-->
              <div class="small-box text-bg-danger">
                <div class="inner" style="background-color: #e69f00;">
                  <h3><?php echo $totalContatos; ?></h3>
                  <p>Contatos</p>
                </div>
                <svg class="small-box-icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="color: rgba(0, 0, 0, 0.50); ">
                  <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                </svg>

                <a href="<?php echo BASE_URL ?>contato/listar"
                  class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover" style="background-color: #e69f00; border-top: solid 1px #2b1b1b;">
                  Mais Informações <i class="bi bi-link-45deg"></i>
                </a>
              </div>
              <!--end::Small Box Widget 4-->
            </div>

            <!--end::Col-->
          </div>
          <!--end::Row-->

          <!--begin::Row-->
          <div class="container-fluid">

            <?php
            if (isset($conteudo)) {
              $this->carregarViews($conteudo, $dados);
            } else {
              // Configura o fuso horário para Brasília
              date_default_timezone_set('America/Sao_Paulo');

              $horaAtual = (int)date('H');
              $saudacao = ($horaAtual < 12) ? 'Bom dia' : (($horaAtual < 18) ? 'Boa tarde' : 'Boa noite');
              $dataCompleta = date('d/m/Y');
              $horaBrasilia = date('H:i');
            ?>

              <!-- Saudação do Dashboard -->
              <div class="card border-0 shadow-sm mb-4 welcome-card" style="background-color: #f8f9fa; border-left: 4px solid #e69f00 !important;">
                <div class="card-body p-4">
                  <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                      <i class="bi bi-cup-hot-fill fs-1" style="color: #e69f00;"></i>
                    </div>
                    <div class="flex-grow-1 ms-4">
                      <div class="d-flex justify-content-between align-items-center mb-2">
                        <h2 class="card-title mb-0" style="color: #2b1b1b;"><?= htmlspecialchars($saudacao) ?>, <span style="color: #e69f00;"><?= htmlspecialchars($usuario['nome_funcionario']) ?></span>!</h2>
                        <div class="badge rounded-pill px-3 py-2 time-badge" style="background-color: #e69f00; color: white;">
                          <i class="bi bi-clock me-2"></i><?= $horaBrasilia ?>
                        </div>
                      </div>
                      <hr style="border-color: rgba(230, 159, 0, 0.2);">
                      <div class="d-flex justify-content-between align-items-center">
                        <p class="card-text mb-0" style="color: #6c757d;">
                          <i class="bi bi-quote" style="color: #e69f00;"></i>
                          Bem-vindo ao Painel Administrativo do Café Divino.
                        </p>
                        <small class="text-muted">
                          <i class="bi bi-calendar-check me-1"></i><?= $dataCompleta ?>
                        </small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Seção de Contatos e Depoimentos Recentes -->
              <div class="row mt-4">
                <!-- Contatos Recentes -->
                <div class="col-md-6">
                  <div class="card shadow-sm" style="border-left: 4px solid #e69f00;">
                    <div class="card-header" style="background-color: #2b1b1b; color: white;">
                      <h5 class="card-title mb-0"><i class="bi bi-envelope me-2"></i>Últimos Contatos</h5>
                    </div>
                    <div class="card-body p-0">
                      <div class="list-group list-group-flush">
                        <?php foreach ($ultimosContatos as $contato): ?>
                          <div class="list-group-item">
                            <div class="d-flex justify-content-between">
                              <div>
                                <strong><?= htmlspecialchars($contato['nome_contato']) ?></strong>
                                <p class="mb-0 text-muted small"><?= htmlspecialchars($contato['assunto_contato']) ?></p>
                              </div>
                              <span class="status-badge <?= $contato['status_contato'] == 'AGUARDANDO' ? 'status-aguardando' : 'status-respondido' ?>">
                                <?= $contato['status_contato'] ?>
                              </span>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Depoimentos Recentes -->
                <div class="col-md-6">
                  <div class="card shadow-sm" style="border-left: 4px solid #e69f00;">
                    <div class="card-header" style="background-color: #2b1b1b; color: white;">
                      <h5 class="card-title mb-0"><i class="bi bi-chat-square-quote me-2"></i>Últimos Depoimentos</h5>
                    </div>
                    <div class="card-body p-0">
                      <div class="list-group list-group-flush">
                        <?php foreach ($ultimosDepoimentos as $depoimento): ?>
                          <div class="list-group-item">
                            <div class="d-flex align-items-start">
                              <img src="<?= BASE_URL ?>uploads/<?= $depoimento['foto_depoimento'] ?: 'semfoto.png' ?>"
                                class="rounded-circle me-3" width="40" height="40" alt="<?= htmlspecialchars($depoimento['nome_depoimento']) ?>">
                              <div>
                                <strong><?= htmlspecialchars($depoimento['nome_depoimento']) ?></strong>
                                <p class="mb-0 text-muted small"><?= substr(htmlspecialchars($depoimento['mens_depoimento']), 0, 50) ?>...</p>
                              </div>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>


            <!-- /.row (main row) -->

          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
    <!--end::App Main-->
    <!--begin::Footer-->
    <footer class="app-footer">
      <!--begin::To the end-->
      <div class="float-end d-none d-sm-inline">SENAC SMP</div>
      <!--end::To the end-->
      <!--begin::Copyright-->
      <strong>
        Copyright &copy; 2025&nbsp;
        <a href="#" class="text-decoration-none" style="color: #e69f00;">TI26</a>.
      </strong>
      Todos os direitos reservados.
      <!--end::Copyright-->
    </footer>
    <!--end::Footer-->
  </div>
  <script type="text/javascript" src="//code.jquery.com/jquery-3.7.1.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-3.5.0.min.js"></script>
  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>
  <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

  <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
  <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->




  <script src="<?php echo BASE_URL ?>dash/js/adminlte.js"></script>

</body>
<!--end::Body-->

</html>
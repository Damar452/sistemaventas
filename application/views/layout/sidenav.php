<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light"  id="sidenav-main" style="background:#f0af85;">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center" style="width: 150px; height: 200px;">
    
          
          <img width="230" src="<?php echo base_url(); ?>/assets/img/rocco1.jpg"  alt="...">
        
      </div>
      <div class="navbar-inner ">
        <!-- Collapse -->
        <div class="collapse navbar-collapse " id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link nav-dashboard" href="<?php echo base_url(); ?>dashboard">
              <i class="fa fa-th-large" aria-hidden="true"></i>
     
              <strong><span class="nav-link-text">Dashboard</span></strong>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-category" href="<?php  echo base_url(); ?>categorias">
              <i class="fa fa-tags" aria-hidden="true"></i>
              <strong><span class="nav-link-text">Categorias</span></strong>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-product" href="<?php  echo base_url(); ?>productos">
              <i class="fa fa-archive" aria-hidden="true"></i>
              <strong> <span class="nav-link-text">Productos</span></strong>
              
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-client" href="<?php  echo base_url(); ?>clientes">
              <i class="fa fa-user" aria-hidden="true"></i>
              <strong> <span class="nav-link-text">Clientes</span></strong>
              </a>
            </li>

           <?php if($this->session->userdata("rol")==1){ ?>
            
            <li class="nav-item">
            <a class="nav-link nav-user" href="<?php  echo base_url(); ?>usuarios">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <strong><span class="nav-link-text">Usuarios</span></strong>
            </a>
          </li>

          <?php   }  ?>

       
            

            <li class="nav-item">
              <a class="nav-link nav-sale" href="<?php  echo base_url(); ?>ventas">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              <strong> <span class="nav-link-text">Ventas</span></strong>
              </a>
            </li>

            <?php if($this->session->userdata("rol")==1){ ?>

            <li class="nav-item">
              <a class="nav-link nav-gasto " href="<?php  echo base_url(); ?>gastos">
              <i class="fa fa-credit-card" aria-hidden="true"></i>
              <strong> <span class="nav-link-text">Gastos</span></strong>
              </a>
            </li>

              <?php   }  ?>

            <li class="nav-item">
              <a class="nav-link nav-balance " href="<?php  echo base_url(); ?>balance">
              <i class="fa fa-balance-scale" aria-hidden="true"></i>
              <strong> <span class="nav-link-text">Balance</span></strong>
              </a>
            </li>


          </ul>

        </div>
      </div>
    </div>
  </nav>
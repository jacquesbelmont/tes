<?php include("include/header.php"); ?>
  <?php include("include/menu.php"); ?>

    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span>EXATAMENTXI </span><strong class="text-primary"> Dashboard</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications dropdown-->
                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i><span class="badge badge-warning">12</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-envelope"></i>You have 6 new messages </div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-upload"></i>Server Rebooted</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                          <div class="notification-time"><small>10 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-bell"></i>view all notifications                                            </strong></a></li>
                  </ul>
                </li>
                <!-- Messages dropdown-->
                <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope"></i><span class="badge badge-info">10</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Jason Doe</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Frank Williams</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Ashley Wood</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-envelope"></i>Read all messages    </strong></a></li>
                  </ul>
                </li>
                <!-- Languages dropdown    -->
                <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
                  <ul aria-labelledby="languages" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/DE.png" alt="English" class="mr-2"><span>German</span></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/FR.png" alt="English" class="mr-2"><span>French                                                         </span></a></li>
                  </ul>
                </li>
                <!-- Log out-->
                <li class="nav-item"><a href="login.html" class="nav-link logout"> <span class="d-none d-sm-inline-block">Sair</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Início</a></li>
            <li class="breadcrumb-item active">Tabelas       </li>
          </ul>
        </div>
      </div>
      <!-- Header Section-->
      
      <!-- Statistics Section-->
      <section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Dados Estatísticos - <?php echo $nomeDaSerie[0]; ?> - <b><?php echo $nomeDaSerie[2]; ?></b></h1>
          </header>
          <div class="row">
             <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4><?php echo $timeA; ?></h4>
                </div>
                <div class="card-body">
                  <div class="table table-striped table-sm">
                    <table class="table">
                      <thead>
                        <tr><!-- INICIO TR -->
                          <th>#</th>
                          <th>Sets</th>
                          <th>%</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>OVER 0,5</td>
                          <td>
<?php
echo 'Total de 0-0: '.$time_A_Under05zeroAzero.'<br>';
                          echo 'Total de Jogos: '.$time_A_totalDeJogosUnder05.'<br>';
                          echo 'Total de Jogos: '.$time_A_totalDeJogos.'<br>'; ?>
                          <?php echo abs( number_format( (($time_A_Under05zeroAzero*100)/$time_A_totalDeJogos)-100, 1) )."%"."<br>"; ?>
                        </td>
                        <tr>
                          <th scope="row">2</th>
                          <td>UNDER 1,5</td>
                          <td><?php echo abs( number_format( (($zeroAum*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">3</th>
                          <td>UNDER 2,5</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">4</th>
                          <td>UNDER 3,5</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                         <tr>
                          <th scope="row">5</th>
                          <td>UNDER 1,5</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">6</th>
                          <td>UNDER 2,5</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">7</th>
                          <td>UNDER 3,5</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                         <tr>
                          <th scope="row">8</th>
                          <td>UNDER 4,5</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">9</th>
                          <td>UNDER 5,5</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">10</th>
                          <td>UNDER 6,5</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                         <tr>
                          <th scope="row">11</th>
                          <td>UNDER 7,5</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">12</th>
                          <td>OVER 0,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">13</th>
                          <td>UNDER 1,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                         <tr>
                          <th scope="row">14</th>
                          <td>UNDER 2,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">15</th>
                          <td>UNDER 3,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">16</th>
                          <td>UNDER 4,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                         <tr>
                          <th scope="row">17</th>
                          <td>UNDER 5,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                         <tr>
                          <th scope="row">18</th>
                          <td>UNDER 6,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                         <tr>
                          <th scope="row">19</th>
                          <td>UNDER 7,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">20</th>
                          <td>NÃO SER GOLEADO TIME B</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">21</th>
                          <td>NÃO SER GOLEADO TIME A</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">22</th>
                          <td>NÃO GOLEAR TIME B</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">23</th>
                          <td>NÃO GOLEAR TIME A</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">24</th>
                          <td>GOL 2º TEMP.</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>

                        </tr> <!-- fim TR -->

                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
             <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4><?php echo $timeB; ?></h4>
                </div>
                <div class="card-body">
                  <div class="table table-striped table-sm">
                    <table class="table">
                      <thead>
                        <tr><!-- INICIO TR -->
                          <th>#</th>
                          <th>Sets</th>
                          <th>%</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>OVER 0,5</td>
                          <td><?php echo abs( number_format( (($totalDeJogosH2hUnder05*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        <tr>
                          <th scope="row">2</th>
                          <td>UNDER 1,5</td>
                          <td><?php echo abs( number_format( (($umAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">3</th>
                          <td>UNDER 2,5</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">4</th>
                          <td>UNDER 3,5</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                         <tr>
                          <th scope="row">5</th>
                          <td>UNDER 1,5</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">6</th>
                          <td>UNDER 2,5</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">7</th>
                          <td>UNDER 3,5</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                         <tr>
                          <th scope="row">8</th>
                          <td>UNDER 4,5</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">9</th>
                          <td>UNDER 5,5</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">10</th>
                          <td>UNDER 6,5</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                         <tr>
                          <th scope="row">11</th>
                          <td>UNDER 7,5</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">12</th>
                          <td>OVER 0,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">13</th>
                          <td>UNDER 1,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                         <tr>
                          <th scope="row">14</th>
                          <td>UNDER 2,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">15</th>
                          <td>UNDER 3,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">16</th>
                          <td>UNDER 4,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                         <tr>
                          <th scope="row">17</th>
                          <td>UNDER 5,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                         <tr>
                          <th scope="row">18</th>
                          <td>UNDER 6,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                         <tr>
                          <th scope="row">19</th>
                          <td>UNDER 7,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">20</th>
                          <td>NÃO SER GOLEADO TIME B</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">21</th>
                          <td>NÃO SER GOLEADO TIME A</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">22</th>
                          <td>NÃO GOLEAR TIME B</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">23</th>
                          <td>NÃO GOLEAR TIME A</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">24</th>
                          <td>GOL 2º TEMP.</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>

                        </tr> <!-- fim TR -->

                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
            <div class="col-lg-12">
              
<div class="card">
                <div class="card-header">
                  <h4>H2H</h4>
                </div>
                <div class="card-body">
                  <div class="table table-striped table-sm">
                    <table class="table">
                      <thead>
                        <tr><!-- INICIO TR -->
                          <th>#</th>
                          <th>Sets</th>
                          <th>%</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>OVER 0,5</td>
                          <td><?php 
                          //echo 'Total de 0-0: '.$H2hUnder05zeroAzero.'<br>';
                          //echo 'Total de Jogos: '.$totalDeJogosH2H.'<br>';
                          //echo 'Total de Jogos: '.$totalDeJogosH2hUnder05.'<br>';
                          echo abs( number_format( (($totalDeJogosH2hUnder05*100)/$totalDeJogosH2H)-100, 1) )."%"."<br>"; 
                          ?></td>
                       <tr>
                          <th scope="row">2</th>
                          <td>UNDER 1,5</td>
                          <td><?php 
                          //echo "totalDeJogosH2hUnder15: ".$totalDeJogosH2hUnder15; 
                          //echo "-totalDeJogosH2H: ".$totalDeJogosH2H; 
                          //echo abs( number_format( (($totalDeJogosH2hUnder15*100)/$totalDeJogosH2H), 1) )."%"."<br>"; 
                          echo abs( number_format( (($totalDeJogosH2hUnder15*100)/$totalDeJogosH2H)-100, 1) )."%"."<br>"; 
                          ?></td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>UNDER 2,5</td>
                          <td><?php echo abs( number_format( (($totalDeJogosH2hUnder25*100)/$totalDeJogosH2H)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">4</th>
                          <td>UNDER 3,5</td>
                          <td><?php echo abs( number_format( (($totalDeJogosH2hUnder35*100)/$totalDeJogosH2H)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                         <tr>
                          <th scope="row">5</th>
                          <td>UNDER 4,5</td>
                          <td><?php echo abs( number_format( (($totalDeJogosH2hUnder45*100)/$totalDeJogosH2H)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">6</th>
                          <td>UNDER 5,5</td>
                          <td><?php echo abs( number_format( (($totalDeJogosH2hUnder55*100)/$totalDeJogosH2H)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">7</th>
                          <td>UNDER 6,5</td>
                          <td><?php echo abs( number_format( (($totalDeJogosH2hUnder65*100)/$totalDeJogosH2H)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                         <tr>
                          <th scope="row">8</th>
                          <td>UNDER 7,5</td>
                          <td><?php echo abs( number_format( (($totalDeJogosH2hUnder75*100)/$totalDeJogosH2H)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">9</th>
                          <td>OVER 0,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">13</th>
                          <td>UNDER 1,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                         <tr>
                          <th scope="row">14</th>
                          <td>UNDER 2,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">15</th>
                          <td>UNDER 3,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                           <tr>
                          <th scope="row">16</th>
                          <td>UNDER 4,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                         <tr>
                          <th scope="row">17</th>
                          <td>UNDER 5,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                         <tr>
                          <th scope="row">18</th>
                          <td>UNDER 6,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                         <tr>
                          <th scope="row">19</th>
                          <td>UNDER 7,5 HT</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">20</th>
                          <td>NÃO SER GOLEADO TIME B</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">21</th>
                          <td>NÃO SER GOLEADO TIME A</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">22</th>
                          <td>NÃO GOLEAR TIME B</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">23</th>
                          <td>NÃO GOLEAR TIME A</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">24</th>
                          <td>GOL 2º TEMP.</td>
                          <td><?php echo abs( number_format( (($zeroAzero*100)/$totalDeJogos)-100, 1) )."%"."<br>"; exit;?></td>
                        </tr>

                        </tr> <!-- fim TR -->

                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
            
          </div>
        </div>
      </section>
     <?php include("include/footer.php"); ?>

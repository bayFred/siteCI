<?php $this->load->view('admin/components/page_head'); ?>
  <body>
    
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="<?php echo site_url('admin/dashboard');?>"><?php echo $meta_title;?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo site_url('admin/dashboard');?>">Главная <span class="sr-only">(current)</span></a>
          </li>          
          <li class="nav-item">
           <a class="nav-link" href="<?php echo site_url('admin/pages');?>">Страницы</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('admin/users');?>">Пользователи</a>
          </li>         
        </ul>
      </div>
    </nav>                                                                                                                                                      
    <div class="container">
        <div class="row">
            <div class="col-9">
                <?php $this->load->view($subview); ?>
            </div>
        


            <div class="col-3">
                <section>
                    <?php echo mailto('joost@codeigniter.tv','<span class="glyphicon glyphicon-user"></span> joost@codeigniter.tv');?> <br>
                    <?php echo anchor('admin/user/logout', '<span class="glyphicon glyphicon-off"></span>Logout');?>
                </section>
            </div>
        </div>
    </div>

    <?php $this->load->view('admin/components/page_tail'); ?>
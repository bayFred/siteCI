<?php $this->load->view('admin/components/page_head'); ?>
<body style="background: #555;">

  <div class="modal-dialog" role="document">
    <div class="modal-content" role="dialog" style="border: 1px solid #fff;">
    
        
        <?php $this->load->view($subview);?><!-- $subview устанавливается в контроллере User -->
        <div class="modal-footer">
        &copy; <?php echo $meta_title; ?>
        </div>
    </div>
</div>


<?php $this->load->view('admin/components/page_tail'); ?>
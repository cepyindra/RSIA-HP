<?php $this->load->view('header');?>
<form action="<?php echo base_url();?>login/login_form" method="post" name="login">
  <div id="form-login">
    <h1 align="center">Administrator Page</h1><br>
      <table align="center" border="0" cellpadding="4">
        <tr>
          <td><label>Username</label></td>
          <td><label></label></td>
          <td><input type="text" size="40" name="username" value="<?php echo set_value('username');?>" class="form-control" placeholder="Username"> <?php echo form_error('username');?></td>
        </tr>
        <tr>
          <td><label>Password</label></td>
          <td><label></label></td>
          <td><input type="password" size="40" name="password" value="<?php echo set_value('password');?>" class="form-control" placeholder="Password"> <?php echo form_error('password');?></td>
        </tr>    
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="login" value="Login" class="btn btn-primary"> 
          <a href="<?php echo base_url(); ?>home/" class="btn btn-primary">Kembali</a></td>
        </tr>
      </table>
</form>
<?php $this->load->view('footer');?>
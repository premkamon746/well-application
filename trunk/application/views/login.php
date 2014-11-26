<?php $this->load->view("header");?>
<div class="container">

      <form class="form-signin" role="form" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="input" name="user" class="form-control" placeholder="Username" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
       
        <div style="color:red;font-weight:bold;"><?=isset($alert_msg)?$alert_msg:""?></div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        
      </form>

    </div> <!-- /container -->
<?php $this->load->view("footer");?>
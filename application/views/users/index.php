<body style="background-color:#1c7e1c">


  <div class="row">
        <div class="col-md-2">
        </div>

        <div class="col-md-3"><h1>USER LOGIN</h1>
         <?php if (validation_errors()){ ?>
                <div class="alert alert-danger">
                    <?= validation_errors() ?>
                </div>
            <?php } ?>
        <form method="POST" action="<?= base_url().'user/userAccess'?>">
            <input type="text" name="name" class="form-control" placeholder="Name"><br>
            <input type="password" name="password" class="form-control" placeholder="Password"><br>
            <input type="submit" value="Submit" class="btn btn-success">
        </form>
        <br>
        <a href="<?= base_url().'user/register'?>" class="btn btn-info">Register</a>
        </div>
        <div class="col-md-7">
          
        </div>

    </div>

  </div>
</div>









   
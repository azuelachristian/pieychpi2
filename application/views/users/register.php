
<body>
<div class="row">
    <div class="col-md-4">
        
     </div>
        <div class="col-md-4">
            <h1>REGISTER</h1>

            <form method="POST" action="<?=base_url().'user/register'?>">
            <?php if (validation_errors()){ ?>
                <div>
                    <?= form_error("user_fname") ?>
                </div>
            <?php } ?>
            <input type="text" name="user_fname" class="form-control" value = "<?=set_value('user_fname')?>" placeholder="First Name"> <br>
            <?php if (validation_errors()){ ?>
                <div>
                    <?= form_error("user_mname") ?>
                </div>
            <?php } ?>
            <input type="text" name="user_mname" class="form-control" value = "<?=set_value('user_mname')?>" placeholder="Middle Name"> <br>
            <?php if (validation_errors()){ ?>
                <div>
                    <?= form_error("user_lname") ?>
                </div>
            <?php } ?>
            <input type="text" name="user_lname" class="form-control" value = "<?=set_value('user_lname')?>" placeholder="Last Name"> <br>
            <?php if (validation_errors()){ ?>
                <div>
                    <?= form_error("user_email") ?>
                </div>
            <?php } ?>
            <input type="text" name="user_email" class="form-control" value = "<?=set_value('user_email')?>"  placeholder="Email"> <br>
            <?php if (validation_errors()){ ?>
                <div>
                    <?= form_error("user_password") ?>
                </div>
            <?php } ?>
            <input type="password" name="user_password" class="form-control" placeholder="Password"> <br>
            <?php if (validation_errors()){ ?>
                <div>
                    <?= form_error("user_repass") ?>
                </div>
            <?php } ?>
            <input type="password" name="user_repass" class="form-control" placeholder="Confirm Password"> <br>                     
            <button class="btn btn-success" type="submit">Submit</button>
            </form>
            <br>
        </div>
    <div class="col-md-3">
        
    </div>
</div>

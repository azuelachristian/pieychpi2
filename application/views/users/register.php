
<body>
<div class="row">
    <div class="col-md-4">
        
     </div>
        <div class="col-md-4">
            <h1>REGISTER</h1>

            <?php if (validation_errors()){ ?>
                <div class="alert alert-danger">
                    <?= validation_errors() ?>
                </div>
            <?php } ?>

            <form method="POST" action="<?=base_url().'user/register'?>">
            <input type="text" name="name" class="form-control" placeholder="Name"> <br>
            <input type="password" name="password" class="form-control" placeholder="Password"> <br>
            <input type="password" name="repass" class="form-control" placeholder="Password"> <br>
            <input type="text" name="email" class="form-control" placeholder="Email"> <br>
            <button class="btn btn-success" type="submit">Submit</button>
            </form>
            <br>
        </div>
    <div class="col-md-3">
        
    </div>
</div>

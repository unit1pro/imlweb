<?php ?>

<section>
    <div class="col-sm-12 mt50">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="form">
                <h1>Indian Music Lab</h1>
                <div id="login">
                    <form action="<?php echo site_url('User/passwordReset'); ?>" method="post">
                        <div class="field-wrap">
                            <input type="password" placeholder="New Password" name="Password" required autocomplete="off"/>
                            <input type="hidden" name="UserName" value="<?php echo $UserName ?>">
                            <input type="hidden" name="UID" value="<?php echo $UID ?>">
                        </div>
                        <button class="button button-block"/>Change</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>


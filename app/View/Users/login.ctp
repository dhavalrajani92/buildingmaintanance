<script>
    ENTER_EMAIL = '<?php echo ENTER_EMAIL; ?>';
    ENTER_VALID_EMAIL = '<?php echo ENTER_VALID_EMAIL; ?>';
    ENTER_PASSWORD = '<?php echo ENTER_PASSWORD; ?>';
    ERROR_MIN_PASSWORD_LENGTH = '<?php echo ERROR_MIN_PASSWORD_LENGTH; ?>';
    ERROR_MAX_PASSWORD_LENGTH = '<?php echo ERROR_MAX_PASSWORD_LENGTH; ?>';
    
$(document).ready(function (){
     $('form:first *:input[type!=hidden]:first').focus();
     $("#add-form").validate({
       onkeyup: false,
       errorClass: 'error-message',
       validClass: 'valid',
       rules: {
            "data[User][email]": { required: true , email : true},
            "data[User][password]": { required: true}
       },
       messages: {
            "data[User][email]": { required: ENTER_EMAIL , email : ENTER_VALID_EMAIL},
            "data[User][password]": { required: ENTER_PASSWORD, minlength: ERROR_MIN_PASSWORD_LENGTH, maxlength: ERROR_MAX_PASSWORD_LENGTH}
        },
        submitHandler: function(form) {
            $("#loading_main").show();
            $('#submit').attr('disabled', true);
            $.ajax({
                url: SITE_URL+"ajaxs/validate_login",
                data: $(form).serialize(),
                type: "POST",
                success:function (response){
                    var response_object = jQuery.parseJSON(response);
                    if(response_object.msg=='success') {
                        window.location.href = DASHBOARD_URL;
                    }
                    else if(response_object.msg=='error') {
                        $(".error_text").html(response_object.error_info);
                        $("#errorMessage").fadeIn();
                        
                   }
                    else if(response_object.msg=='modal_error') {
                            $("#loading_main").hide();
                            $('#submit').attr('disabled', false);
                            var i = 0;
                            $.each(response_object.error_info, function(field , error) {
                                if(field != "null"){
                                    $("#"+field+"_validation").addClass("error-message");
                                    $("#"+field+"_validation").html(error);
                                    $("#"+field+"_validation").show();
                                }
                            });
                    }
                },
                error:function (x, e){
                    if(x.status == "403"){
                        window.location.reload();
                    }
                }
            });
        }
   });
 
});
</script>
<div class="row-fluid">
    <div class="login-box">
        <div class="icons">
            <a href="<?php echo SITE_URL; ?>"><i class="halflings-icon home"></i></a>
        </div>
        <div class="alert alert-error" id="errorMessage" style="display: none;">
            <button class="close" type="button">×</button>
            <span class="error_text"></span>
        </div>
        <h2>Login to your account</h2>
        <!--<form class="form-horizontal" action="index.html" method="post">-->
        <?php echo $this->Form->create("User",array("class"=>"form-horizontal","method"=>"Post","id"=>"add-form")); ?>
            <fieldset>
                <div class="input-prepend" title="Username">
                    <span class="add-on"><i class="halflings-icon user"></i></span>
                    <?php echo $this->Form->input("User.email",array("type"=>"text","id"=>"ëmail","required"=>false,"label"=>false,"div"=>false,"class"=>"input-large span10","placeholder"=>"Email")); ?>
                    <div id="email_validation"></div>
                </div>
                <div class="clearfix"></div>

                <div class="input-prepend" title="Password">
                    <span class="add-on"><i class="halflings-icon lock"></i></span>
                    <?php echo $this->Form->input("User.password",array("type"=>"password","required"=>false,"label"=>false,"div"=>false,"class"=>"input-large span10","placeholder"=>"Password")); ?>
                    <div id="password_validation"></div>
                </div>
                <div class="clearfix"></div>

                <label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>
                <div class="button-login">	
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="clearfix"></div>
            </fieldset>
        <?php echo $this->Form->end(); ?>
        	
    </div><!--/span-->
</div><!--/row-->
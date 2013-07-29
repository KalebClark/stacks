var host = {
  /* Register User
  *  =============
  */
  register_user: function() {
    var user_id = emerge.ajax_post_form('ajax/host_register.php', 'register_host');
    console.log(user_id+' this is userid');
    if(user_id > 0) {
      emerge.ajax_get('ajax/host_create_password_form.php?uid='+user_id, 'main_content');
    } else {
      $('#host_alerts').html('That username is already taken. Please try a different username');
    }
  },

  /* Create Password
  *  =============== */
  create_password: function() {
    var pass00 = $('#password00').val();
    var pass01 = $('#password01').val();
    if(pass00 != pass01) {
      alert('Your passwords do not match. Try again');
      $('#password00').val('');
      $('#password01').val('');
    } else {
      emerge.ajax_post_form('ajax/host_create_password.php', 'create_password');
      emerge.ajax_get('ajax/login.php', 'main_content');
    }
  },

  /* Host Login
  *  ========== */
  login: function() {
    var valid = emerge.ajax_post_form('ajax/validate.php', 'user_login');
//    emerge.ajax_get('ajax/host_page.php', 'main_content');
  },

  /* Host Signup
  *  ========== */
  signup: function() {
    emerge.ajax_get('ajax/host_signup.php', 'main_content');
  },

  /* Validate User
  *  ============= */
  validate_user: function() {
  }
}

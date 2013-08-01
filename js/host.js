var host = {
  /* Register User
  *  =============
  */
  register_user: function() {
    var user_id = emerge.ajax_post_form('ajax/host.register.php', 'register_host');
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
      emerge.ajax_post_form('ajax/host.create_password.php', 'create_password');
      emerge.ajax_get('ajax/auth.form.login.php', 'slider');
    }
  },

  /* Host Login
  *  ========== */
  login: function() {
    var valid = emerge.ajax_post_form('ajax/auth.validate.php', 'user_login');
    emerge.reload_page();
  },

  /* Host Signup
  *  ========== */
  signup: function() {
    emerge.ajax_get('ajax/host.form.register.php', 'slider');
  },

  /* Validate User
  *  ============= */
  validate_user: function() {
  }
}

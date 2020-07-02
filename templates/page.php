<div class="wrap">
  <h1>Hello World Plugin Template By JoineryHosting</h1>
  <form method="post" action="options.php">
    <?php
      settings_fields ( "joineryhosting_hello_world_config" );
      do_settings_sections ( "joineryhosting-hello-world" );
      submit_button ();
    ?>
  </form>
</div>
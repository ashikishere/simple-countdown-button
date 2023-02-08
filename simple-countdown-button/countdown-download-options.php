<div class="wrap">
  <h1>Countdown Download</h1>
  <form method="post" action="options.php">
    <?php
      settings_fields('countdown_download_options');
      do_settings_sections('countdown-download');
    ?>
    <table class="form-table">
      <tr valign="top">
        <th scope="row">Countdown (in seconds)</th>
        <td><input type="number" name="countdown_download_countdown" value="<?php echo esc_attr(get_option('countdown_download_countdown', 10)); ?>" /></td>
      </tr>
    </table>
    <?php submit_button(); ?>
  </form>
  <hr />
  <h2>Usage</h2>
  <p>Use the following shortcode to display the countdown download button in your posts or pages:</p>
  <pre><code>[countdown_download link="https://www.example.com"]</code></pre>
  <p>Replace <code>https://www.example.com</code> with the URL of the file you want to download. The "link" attribute is required.</p>
  <p>For useing custom css use class name <code>.countdown-download-button-style</code></p>
  <hr />
  <h2>Support</h2>
  <p>For support, please contact the plugin author at <a href="mailto:azashikdev@gmail.com">azashikdev@gmail.com</a>.</p>
</div>

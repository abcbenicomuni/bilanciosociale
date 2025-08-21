<form method="post">
  <?php wp_nonce_field('bs_form_action', 'bs_form_nonce'); ?>

  <label for="q1101"><?php _e('Numero totale di posti di lavoro', 'bilanciosociale'); ?></label>
  <input type="number" name="q1101" id="q1101" required>

  <label for="q1203"><?php _e('Entrate totali annue', 'bilanciosociale'); ?></label>
  <input type="number" name="q1203" id="q1203" required>

  <input type="submit" name="bs_submit" value="<?php _e('Invia', 'bilanciosociale'); ?>">
</form>






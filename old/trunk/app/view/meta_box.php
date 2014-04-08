<input type="hidden" name="<?php echo $this->meta_name; ?>" value="0">
<input type="checkbox" name="<?php echo $this->meta_name; ?>" value="1"
       id="<?php echo $this->meta_name; ?>" <?php if ($this->meta_value == 1 || !$this->is_published) {
    echo 'checked';
} ?>>
<label for="<?php echo $this->meta_name; ?>">Enable Factlink for this item</label>
<?php wp_nonce_field($this->meta_name . '_nonce_action', $this->meta_name . '_nonce'); ?>

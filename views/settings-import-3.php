<?php
$transient = get_transient('wpsl_import_file');
?>
<h3 class="wpsl-step-title"><?php _e('Step 3: Import and Geocode', 'wpsimplelocator'); ?></h3>

<div class="error wpsl-import-error" style="display:none;"><p></p></div>

<div class="wpsl-import-indicator-intro">
	<p><strong><?php _e('Total Rows to Import'); ?>: <?php echo $transient['row_count']; ?></strong> <?php _e('from', 'wpsimplelocator'); ?> <?php echo $transient['filename']; ?></p>
	<p><?php _e('Once the import has begun, do not close or refresh the page until complete.', 'wpsimplelocator'); ?></p>
	<p><button class="wpsl-start-import button"><?php _e('Start Import', 'wpsimplelocator'); ?></button></p>
</div>

<div class="wpsl-import-indicator">
	<p><strong><?php _e('Important', 'wpsimplelocator'); ?>:</strong> <?php _e('Import is in progress. Do not close or refresh this page.', 'wpsimplelocator'); ?></p>

	<div class="wpsl-import-progress">
		<span class="progress-bar"></span>
		<span class="progress-bar-bg" data-total="<?php echo $transient['row_count']; ?>"></span>
		<p><span class="progress-count">0</span> <?php _e('of', 'wpsimplelocator'); echo ' ' . $transient['row_count']; ?> <?php _e('Rows Imported', 'wpsimplelocator'); ?> (<span class="error-count">0</span> <?php _e('Errors', 'wpsimplelocator'); ?>)</p>
		<p>
			<button class="button wpsl-pause-import"><?php _e('Pause', 'wpsimplelocator'); ?></button>
		</p>
	</div>
</div>

<div class="wpsl-import-complete updated" style="display:none;">
	<p><?php _e('The import is complete.', 'wpsimplelocator'); ?> <span class="progress-count">0</span> <?php _e('of', 'wpsimplelocator'); echo ' ' . $transient['row_count']; ?> <?php _e('Rows Imported', 'wpsimplelocator'); ?> (<span class="error-count">0</span> <?php _e('Errors', 'wpsimplelocator'); ?>)</p>
</div>
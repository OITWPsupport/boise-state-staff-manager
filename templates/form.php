
<link rel="stylesheet" href="<?= $css; ?>"/>
<!-- CSRF Protection -->
<?php wp_nonce_field( 'save_' . $metabox['id'], $metabox['id'] . '_nonce' ); ?>

<!-- Save registry of metaboxes to be saved, including current metabox ID -->
<input type="hidden" name="meta_box_ids[]" value="<?php echo $metabox['id']; ?>" />


<input type="hidden" name="<?php echo $metabox['id']; ?>_fields[]" value="email" />
<input type="hidden" name="<?php echo $metabox['id']; ?>_fields[]" value="job_title" />
<input type="hidden" name="<?php echo $metabox['id']; ?>_fields[]" value="biography" />
<input type="hidden" name="<?php echo $metabox['id']; ?>_fields[]" value="ask_me_about" />
<input type="hidden" name="<?php echo $metabox['id']; ?>_fields[]" value="certifications" />
<input type="hidden" name="<?php echo $metabox['id']; ?>_fields[]" value="staff_type" />

<table class="form-table">
	<tr>
		<th class="row">

			<label for="email"><?php _e( 'Email', 'boise_state_staff' ); ?></label>
		</th>
		<td>
			<input name="email" type="email" id="email" value="<?php echo get_post_meta($post->ID, 'email', true); ?>" class="regular-text" required>
		</td>
	</tr>
	<tr>
		<th class="row">

			<label for="job_title"><?php _e( 'Job Title', 'boise_state_staff' ); ?></label>
		</th>
		<td>
			<input name="job_title" type="text" id="job_title" value="<?php echo get_post_meta($post->ID, 'job_title', true); ?>" class="regular-text" required>
		</td>
	</tr>
	<tr>
		<th class="row">
			<label for="staff_type"><?php _e( 'Staff Type', 'boise_state_staff' ); ?></label>
		</th>
		<td>
			<?php $staffType = get_post_meta($post->ID, 'staff_type', true); ?>
			<select name="staff_type" id="staff_type" required>
				<option value="">Select a staff type...</option>
				<option value="administration" <?= $staffType == 'administration' ? 'selected="selected"' : ''; ?>>Administration</option>
				<option value="aquatics" <?= $staffType == 'aquatics' ? 'selected="selected"' : ''; ?>>Aquatics</option>
				<option value="fitness" <?= $staffType == 'fitness' ? 'selected="selected"' : ''; ?>>Fitness</option>
				<option value="recreational_sports" <?= $staffType == 'recreational_sports' ? 'selected="selected"' : ''; ?>>Recreational Sports</option>
				<option value="outdoor_program" <?= $staffType == 'outdoor_program' ? 'selected="selected"' : ''; ?>>Outdoor Program</option>
				<option value="cycle_learning_center" <?= $staffType == 'cycle_learning_center' ? 'selected="selected"' : ''; ?>>Cycle Learning Center</option>
				<option value="facilities" <?= $staffType == 'facilities' ? 'selected="selected"' : ''; ?>>Facilities</option>
				<option value="fitness_instructors" <?= $staffType == 'fitness_instructors' ? 'selected="selected"' : ''; ?>>Fitness Instructors</option>
				<option value="outdoor_trip_leaders" <?= $staffType == 'outdoor_trip_leaders' ? 'selected="selected"' : ''; ?>>Outdoor Trip Leaders</option>
				<option value="personal_trainers" <?= $staffType == 'personal_trainers' ? 'selected="selected"' : ''; ?>>Personal Trainers</option>
			</select>
		</td>
	</tr>
	<tr>
		<th class="row">
			<label for="biography"><?php _e( 'Biography', 'boise_state_staff' ); ?></label>
		</th>
		<td>
			<?php wp_editor( get_post_meta($post->ID,'biography', true), 'biography');?>
		</td>
	</tr>
	<tr>
		<th class="row">
			<label for="ask_me_about"><?php _e( 'Ask Me About', 'boise_state_staff' ); ?></label>
		</th>
		<td>
			<?php wp_editor( get_post_meta($post->ID,'ask_me_about', true), 'ask_me_about');?>
		</td>
	</tr>
	<tr>
		<th class="row">
			<label for="certifications"><?php _e( 'Certifications', 'boise_state_staff' ); ?></label>
		</th>
		<td>
			<?php wp_editor( get_post_meta($post->ID,'certifications', true), 'certifications');?>
		</td>
	</tr>	
</table>
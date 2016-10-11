<a class="button" href="<?= $this->pageUrl; ?>&amp;action=staff">Add</a>
<table class="bsuStaffTable">

	<?php
	foreach ( (array) $allStaff as $staff ):
		$inactive = ! $staff->status ? 'bsuStaffInactive' : '';
		?>
		<tr>
			<td class="<?= $inactive; ?>">
				<?= $this->config['name_presenter']($staff); ?>
			</td>
			<td>
				<a class="button" href="<?= $this->pageUrl . '&id=' . $staff->id; ?>&amp;action=staff">Edit</a>
				<a class="button " href="<?= $this->pageUrl . '&id=' . $staff->id; ?>&amp;action=delete">Delete</a>
			</td>
		</tr>
	<?php endforeach; ?>

</table>
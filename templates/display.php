<link rel="stylesheet" href="<?= $css; ?>">
<?php foreach ( $allStaff as $staff ): ?>
	<div class="staffList">
		<div class="bsuStaffToggle">
			<span>
				<div class="bsuStaffImg">
					<?= get_the_post_thumbnail($staff->ID, 'thumbnail', array(
						'alt' => 'Headshot ' . $staff->post_title
					)); ?>
				</div>
				<div class="overlay"></div>
				<div class="tog_img">
	                <p style="font-size:18px; font-weight:200;">+</p>
                </div>
			</span>
            <span class="bsuStaffInfo">
                <h2><?= $staff->post_title; ?></h2>
                <h3 class="bsuStaffPosition" style="margin-top:-2%"><?= $staff->job_title; ?></h3>
                <div class="staffEmail">
	                <a href="mailto:<?= $staff->email; ?>"><?= $staff->email; ?></a>
                </div>
                <h3 class="bsuStaffDetailHeader">Ask Me About</h3>
                <ul>
	                <?php foreach (explode("\n", $staff->ask_me_about) as $topic ): ?>
		                <li><?= $topic; ?></li>
	                <?php endforeach; ?>
                </ul>

            </span>
		</div>

		<div class="bsuStaffDetails" style="margin-left: 3%;">
			<div class="column" style="width:55%">
				<h3 class="bsuStaffDetailHeader">Biography</h3>
				<p><?= $staff->biography; ?></p>
			</div>
			<div class="column" style="width:30%">
				<h3 class="bsuStaffDetailHeader">Certifications</h3>
				<p><?= $staff->certifications; ?></p>
			</div>
		</div>

	</div>
<?php endforeach; ?>

<script src="<?= $script; ?>"></script>
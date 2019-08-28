<div class="container-fluid">
	
	<div class="text-center my-5"><h2><?= $title; ?></h2></div>
	<table class="table table-bordered">
		<?php
		if ($get_jobs->num_rows() > 0) : ?>		
		<tr>
			<thead>
				<th>Job Name</th>
				<th>Job Descrption</th>
				<th>Action</th>
			</thead>
		</tr>
		<?php foreach ($get_jobs->result() as $get_job) : ?>
				<tr>
					<tbody>
						<td><?php echo $get_job->job_name; ?></td>
						<td><?php echo word_limiter($get_job->job_description, 30); ?></td>
						<td>
							<?= anchor('job/update-job/'.$get_job->id, 'Edit', 'class="btn btn-warning"'); ?>
							<?= anchor('job/delete/'.$get_job->id, 'Disable', 'class="btn btn-danger"'); ?>
					</tbody>
				</tr>
		<?php
			endforeach;
		?>
		
		<?php else: ?>
			<tr>
				<td>There are no Records yet.</td>
			</tr>
		<?php endif; ?>
    </table>
</div>
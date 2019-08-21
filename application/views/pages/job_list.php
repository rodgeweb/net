<?php
    if ($this->uri->segment(2) == "inserted") {
        echo "<p>Inserted</p>";
    }
?>
<div class="container">
	
    <div class="header--table-header"><h2>Job List</h2></div>
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
						<td><?php echo $get_job->job_description; ?></td>
						<td>
							<input type="hidden" name="specific_job_id" value="<?php echo $get_job->id; ?>" />
							<a href="<?php base_url(); ?>update_job/<?php echo $get_job->id; ?>"><button class="btn btn-warning">Edit</button></a> 
							<a href="<?php base_url(); ?>update_job_status/<?php echo $get_job->id; ?>"><button class="btn btn-danger">Delete</button></a></td>
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
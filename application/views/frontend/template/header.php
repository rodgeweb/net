<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Job Listing Network</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap/bootstrap.min.css">
</head>
<body>
	<?php if ($this->session->flashdata('add_job_successful')) : ?>
	<div class="alert alert-success">
		<?= $this->session->flashdata('add_job_successful'); ?>
	</div>
	<?php endif; ?>
<div class="container-fluid text-center"><h1>Job Listing Network</h1></div>
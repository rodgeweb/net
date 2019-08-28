<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?= $title; ?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap/bootstrap.min.css">
	<script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap.min.js" ></script>
</head>
<body>
<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a href="<?= base_url().'job'; ?>" class="navbar-brand">Job Listing Networking</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="main-nav">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('job');?>">Dashboard</a>
				</li>
				<!-- <li class="nav-item">
					<a class="nav-link" href="<?= site_url('page/index');?>">Job Categories</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('page/index');?>">Create Category</a>
				</li> -->
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('employer/view');?>">Employer</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('job');?>">Jobs</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('job/add-job');?>">Create Job</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('job_position/view');?>">Job Position</a>
				</li>
			</ul>
		</div>
	</nav>
</header>
	<?php if($this->session->flashdata('message')) : ?>
	<div class="alert alert-<?= $this->session->flashdata('class') ?>">
		<?= $this->session->flashdata('message'); ?>
	</div>
	<?php endif; ?>
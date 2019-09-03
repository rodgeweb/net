<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?= $title; ?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap/bootstrap.min.css">
	<script src="<?php echo base_url() ?>assets/js/jquery.min.js" ></script>
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
			<?php if($this->session->userdata('logged_in')) : ?>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('job');?>">Dashboard</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="company-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Company
					</a>
					<div class="dropdown-menu" aria-labelledby="company-dropdown">
						<a class="dropdown-item" href="<?= site_url('company/view');?>">List of Companies</a>
						<a class="dropdown-item" href="<?= site_url('company/add-company');?>">Add Company</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="company-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Job
					</a>
					<div class="dropdown-menu" aria-labelledby="company-dropdown">
						<a class="dropdown-item" href="<?= site_url('job');?>">Job Post</a>
						<a class="dropdown-item" href="<?= site_url('job/add-job');?>">Add Job</a>
						<a class="dropdown-item" href="<?= site_url('job_position/view');?>">List of Job Positions</a>
						<a class="dropdown-item" href="<?= site_url('job_position/add-job-positions');?>">Add Job Position</a>
					</div>
				</li>
			</ul>
			<?php endif; ?>
			<ul class="navbar-nav ml-auto">
				<?php if(!$this->session->userdata('logged_in')) : ?>
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('users/register');?>">Register</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('users/login');?>">login</a>
				</li>
				<?php else: ?>
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('users/profile');?>"><strong>Welcome: <?= $this->session->userdata('first_name'); ?></strong></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('users/logout');?>">Log out</a>
				</li>
				<?php endif; ?>
			</ul>
		</div>
	</nav>
</header>
	<?php if($this->session->flashdata('message')) : ?>
	<div class="alert alert-<?= $this->session->flashdata('class') ?>">
		<?= $this->session->flashdata('message'); ?>
	</div>
	<?php endif; ?>
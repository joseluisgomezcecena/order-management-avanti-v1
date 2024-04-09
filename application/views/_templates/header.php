<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico">

	<!--icons for apple devices and android devices-->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url() ?>assets/images/apple-touch-icon.png">

	<!-- android-chrome icons -->
	<link rel="icon" type="image/png" sizes="512x512"  href="<?php echo base_url() ?>assets/images/android-chrome-512x512.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url() ?>assets/images/android-chrome-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url() ?>assets/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/images/favicon-16x16.png">

	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


	<!--timepicker-->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    <!-- page css -->
    <link href="<?php echo base_url() ?>assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
	<!-- page css -->
	<link href="<?php echo base_url() ?>assets/vendors/select2/select2.css" rel="stylesheet">
	

    <!-- Core css -->
    <link href="<?php echo base_url() ?>assets/css/app.min.css" rel="stylesheet">



	<link href="<?php echo base_url() ?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">

	<style>
		/* Hide scrollbar for Chrome, Safari and Opera */
		.table-responsive::-webkit-scrollbar {
			display: none;
		}

		/* Hide scrollbar for IE, Edge and Firefox */
		.table-responsive {
			-ms-overflow-style: none;  /* IE and Edge */
			scrollbar-width: none;  /* Firefox */
		}

		.card{
			background-color: #fff;
			border-radius: 12px;
			display: flex;
			flex-direction: column;
			flex-wrap: nowrap;
			overflow: hidden;
			/*box-shadow: 0 0 0.5px 0 rgb(0 0 0 / 14%), 0 1px 1px 0 rgb(0 0 0 / 24%);*//*shadows can be removed for styling.*/
			box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
		}

		.containero {
			display: grid;
		}

		.contento, .overlayo {
			grid-area: 1 / 1;
			background-color: rgba(14, 14, 14, 0.18);
			border-radius: 15px;
		}

		.card-hover:hover{
			transform: scale(1.05);
			box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
			transition-duration: 600ms;
		}


		.form .fa-search{
			position: absolute;
			top:20px;
			left: 20px;
			color: #9ca3af;

		}


		.form .fa-id-card{
			position: absolute;
			top:20px;
			left: 20px;
			color: #9ca3af;

		}

		.form span{

			position: absolute;
			right: 17px;
			top: 13px;
			padding: 2px;
			border-left: 1px solid #d1d5db;

		}

		.left-pan{
			padding-left: 7px;
		}

		.left-pan i{

			padding-left: 10px;
		}

		.form-input{

			height: 55px;
			text-indent: 33px;
			border-radius: 10px;
		}

		.form-input:focus{

			box-shadow: none;
			border:none;
		}

		button.dt-button, div.dt-button, a.dt-button, input.dt-button{
			background-color: #0399f8 !important;
			color: #fff !important;
			box-shadow: 0 4px 6px rgb(50 50 93 / 11%), 0 1px 3px rgb(0 0 0 / 8%) !important;
			display: inline-block;
			font-weight: 400;
			line-height: 1.5;
			color: #313131;
			text-align: center;
			text-decoration: none;
			vertical-align: middle;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-color: transparent;
			border: 1px solid transparent;
			padding: 0.375rem 0.75rem !important;
			margin: 5px !important;
			font-size: 0.875rem;
			border-radius: 2px;
			-webkit-transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
			transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
			-o-transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out;
			transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out;
			transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
		}

	</style>

</head>
<body>
    <div class="app">
        <div class="layout">
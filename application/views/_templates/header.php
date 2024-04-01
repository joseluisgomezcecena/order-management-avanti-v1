<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/logo/favicon.png">

    <!-- page css -->
    <link href="<?php echo base_url() ?>assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
	<!-- page css -->
	<link href="<?php echo base_url() ?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- Core css -->
    <link href="<?php echo base_url() ?>assets/css/app.min.css" rel="stylesheet">

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
			box-shadow: 0 0 0.5px 0 rgb(0 0 0 / 14%), 0 1px 1px 0 rgb(0 0 0 / 24%);/*shadows can be removed for styling.*/
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
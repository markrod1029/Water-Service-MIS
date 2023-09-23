
<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UWSMIS - Dashboard</title>

  <!-- Tailwind is included -->
  <link rel="stylesheet" href="../css1/main.css?v=1628755089081">

  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png"/>
  <link rel="icon" href="logo.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="description" content="Admin One - free Tailwind dashboard">

  <meta property="og:url" content="https://justboil.github.io/admin-one-tailwind/">
  <meta property="og:site_name" content="JustBoil.me">
  <meta property="og:title" content="Admin One HTML">
  <meta property="og:description" content="Admin One - free Tailwind dashboard">
  <meta property="og:image" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1920">
  <meta property="og:image:height" content="960">

  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:title" content="Admin One HTML">
  <meta property="twitter:description" content="Admin One - free Tailwind dashboard">
  <meta property="twitter:image:src" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="twitter:image:width" content="1920">
  <meta property="twitter:image:height" content="960">

  <link rel="stylesheet" href="../css1/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>


    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-130795909-1');
  </script>

</head><style>
/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid lightblue;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 10px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 10px 15px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
    
element.style {
    background: #3E92CC;
    overflow-y: auto;
}

.circle {
  display: inline-table;
  vertical-align: middle;
  width: 20px;
  height: 20px;
  color:#ffff;
  background-color: #DC2626;
  border-radius: 50%;
}

.circle1 {
  display: inline-table;
  vertical-align: middle;
  width: 10px;
  height: 10px;
  color:#ffff;
  background-color: #DC2626;
  border-radius: 50%;
}

.circle__content {
  display: table-cell;
  vertical-align: middle;
  text-align: center;
}
th {
  border-top: 1px solid #dddddd;
  border-bottom: 1px solid #dddddd;
  border-right: 1px solid #dddddd;
}
 
th:first-child {
  border-left: 1px solid #dddddd;
}
<style>
table.dataTable thead th {
    border-bottom: 1px solid #111;
}
 
table.dataTable tfoot th {
    border-top: 1px solid  #111;
}


.circle {
  display: inline-table;
  vertical-align: middle;
  width: 20px;
  height: 20px;
  color:#ffff;
  background-color: #DC2626;
  border-radius: 50%;
}

.circle__content {
  display: table-cell;
  vertical-align: middle;
  text-align: center;
}

        .custom-cls {
            display: inline;
            width: 200px;
            margin-left: 25px;
                border: 1px solid #aaa;
    border-radius: 3px;
    padding: 5px;
    background-color: transparent;
        }
</style>
	

<script>
            $(document).ready(function () {
                $('#dataTable1').DataTable({
                  "bInfo": false,
                  "lengthChange": false
                });

            });
        </script>


<script>
            $(document).ready(function () {
                $('#dataTable3').DataTable({
                  "bInfo": false,
                  "lengthChange": false
                });

            });
        </script>
        
<script>
            $(document).ready(function () {
                $('#dataTable').DataTable({
                  "bInfo": false,
                  "lengthChange": false
                });

            });
        </script>
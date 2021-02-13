<html>

<head>
    <title>CMS</title>
    <link rel="stylesheet" type="text/css" href="scripts/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="scripts/datepicker.css">
</head>

<style>
 .textshadow{
    text-shadow: 1px 1px 2px rgba(0, 0, 6, .5);
  }

  .boxshadow {
  position: relative;
  -moz-box-shadow: 1px 2px 4px rgba(9, 9, 9, .5);
  -webkit-box-shadow: 1px 2px 4px rgba(9, 9, 9, .5);
  box-shadow: 1px 2px 4px rgba(9, 9, 9, .5);
  padding: 25px;
  background: white;
}

.boxshadow::after {
  content: '';
  position: absolute;
  z-index: -1; /* hide shadow behind image */
  -webkit-box-shadow: 0 15px 20px rgba(9, 9, 9, .5);
  -moz-box-shadow: 0 15px 20px rgba(9, 9, 9, .5);
  box-shadow: 0 15px 20px rgba(9, 9, 9, .5);        
  width: 70%; 
  left: 15%; /* one half of the remaining 30% */
  height: 100px;
  bottom: 0;
}

.controlshodow{
  box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
  padding: 0px;
  -moz-box-shadow: 1px 2px 4px rgba(0, 0, 0,0.5);
  -webkit-box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
  padding-left:10px;
  }

  .bgtexture{
    background-image: url("images/bg2.png");
    background-repeat: repeat;
    background-color: #cccccc;
    background-position: fixed;
  }

  .formtexture{
    background-image: url("images/bg.jpg");
    background-repeat: repeat;
    background-color: #cccccc;
    background-position: fixed;
    border-radius: 5px;
  }

  .textbox-transparent{
    background-color:rgba(0,0,0,0.5);
    color:white;
  }

  .form-center{
    margin-top:20px;
  }

  hr.newhr {
  border-top: 2px dotted purple;
  box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
  padding: 0px;
  -moz-box-shadow: 1px 2px 4px rgba(0, 0, 0,0.5);
  -webkit-box-shadow: 1px 2px 4px rgba(0, 0, 0, .5);
}
</style>

<body class="bgtexture">
<div class="container">
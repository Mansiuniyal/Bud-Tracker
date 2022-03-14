
<html>
<head>
<title></title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@100;400&display=swap" rel="stylesheet">
<style>
  *{
    margin:0;
    padding:0;
    box-sizing:border-box;
}
.navbar
{
    width:100%;
    white-space:nowrap;
    background-color: Black;
}
.main_div
{
    width:100%;
    height:100vh;
    background-image:linear-gradient(to right, Black,Black,Black,Black,Black,Black);
    clip-path: polygon(0% 0%,100% 0%,100% 100%,0% 80%);
}
.main_text
{
    color:white;
    margin-top:80px;
    font-family: 'Ink Free', monospace;
}
.big-text
{
   
    margin:20px 0;
    color:white;
    font-family: 'JetBrains Mono', monospace;
}
.contactus{
    width:100%;
    height: 100vh;
    padding: 80px 0;
    position: relative;
}
.contactus:before{
    content:"";
    position: absolute;
    top:0;
    left:0;
    bottom: 0;
    right:0;
    background:linear-gradient(20deg,Blue 55%, Black 0%);
    z-index: -1;
}
.formbutton button{
    border:1px solid Black;
    border-radius:100px;
    margin:0 50px;
    padding: 12px 35px;
    outline:none;
    columns: #50d1c0;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.4;
    text-align: center;
    background:transparent;
    color:#fff;
   
}
form:hover .formbutton button{
background: white;
color:Black; ;
box-shadow: 0 0 20px 0 rgba(0,0,0,0.3);
}
@media(min-width:400px)
{
    .main_div
    {
        max-height:1000px;
    }
}
</style>
</head>

<body>
<div class="main_div">
 
     <div class="navbar navbar-expand-md">
   
      <a href="#" class="navbar-brand font-weight-bold text-white text-center"><h2>Bud Tracker</h2></a>
      <button class="navbar-toggler text-white " type="button" data-toggle="collapse" data-target="#collapsenavbar">
      <span class="navbar-toggler-icon" style="background:white;"></span>
      </button>
     
       <div class="collapse navbar-collapse text-center" id="collapsenavbar">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a href="mywebpage.php" class="nav-link text-white "><span style="margin-left:90px;">MANAGERS</span></a></li>
              <li class="nav-item">
                  <a href="mywebpageintern.php" class="nav-link text-white ">INTERNS</a></li>
               
               </ul>
        </div>
     </div>
     <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="main_text"><i>What gets measured gets managed</i></h1>
            
          </div>
          <div class="col-sm-6">
            
            <img src="img1.jpg" class="img-fluid" width="560" height="345" style="margin-top:20px;">
           
          </div>
       </div>
       
    </div>
</div>
</div>


  
 
</body>
</html>
<!-- <div class="line"></div> -->

<footer id="footer" class="footer-1" style="background-color:#3E92CC; color:white; font-size:12px;">
<div class="main-footer widgets-primary ">
<div class="container">
<div class="row">
  
<div class="col-xs-12 col-sm-6 col-md-5">
<div class="widget subscribe no-box">
  <br>
<h5 class="widget-title"><img src="images/logo.png" alt="" style="width: 3.3em;" /> Urbiztondo Water Service<span></span></h5>
<h6 style="font-size:15px;" class="widget-title">© 2023 Urbiztondo Water Service<span></span></h6>


<p>Urbiztondo Sports Complex, Urbiztondo, Pangasinan, Philippines</p>

<h6 style="font-size:12px;" class="widget-title">
  <b>Contact No:</b> 0954064800<br>
<b>Telefax No.:</b> (075) 632 3153<br>
<b>Email Address:</b> www.urbiztondopang.gov.ph

<span></span></h6>


</div>
</div>

<div class="col-xs-12 col-sm-6 col-md-4">
<div class="widget no-box">
<br>
<h5 class="widget-title" style="font-size:16px; text-decoration: underline;
">Quick Links<span></span></h5><br>
<h6 class="widget-title" style="font-size:14px;"><a href="index.php">Water Service Advisories</a></h6><br>
<h6 class="widget-title" style="font-size:14px;"><a href="register_category.php">Registration</a></h6><br>
<h6 class="widget-title" style="font-size:14px;"><a href="login.php">Log In</a></h6>

</div>
</div>




<div class="col-xs-12 col-sm-6 col-md-3">

<div class="widget no-box">
<br>
<h5 class="widget-title" style="font-size:16px; text-decoration: underline;
">ABOUT<span></span></h5>
<br>
<h6 class="widget-title" style="font-size:14px;"><a href="about_us.php">About Us</a></h6><br>
<h6 class="widget-title" style="font-size:14px;"><a href="contact_us.php">Contact Us</a></h6><br>
<h6 class="widget-title" style="font-size:14px;"><a href="#"  onclick="openPopup()">Terms and Conditions</a></h6>
<script>
function openPopup() {
window.open("example-term-and-condition.php", "TermsPopup", "width=800,height=800");
}
</script>
</div>
</div>

</div>
</div>
</div>
  <br>
<div class="footer-copyright">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<p>Copyright Urbiztondo Water Services © 2023. All rights reserved.</p>
</div>
</div>
</div>
</div>
</footer>



<style>
		.line {
			height: 2px;
			background-color: #3E92CC;
			margin: 10px 0;
			border: none;
		}
    a{
      color:white;
      text-decoration:none !important;
    }
	</style>

  

<script>
    let includes = document.getElementsByTagName('include');
    for (var i = 0; i < includes.length; i++) {
      let include = includes[i];
      load_file(includes[i].attributes.src.value, function (text) {
        include.insertAdjacentHTML('afterend', text);
        include.remove();
      });
    }
    function load_file(filename, callback) {
      fetch(filename).then(response => response.text()).then(text => callback(text));
    }

  </script>
  <!-- Main-->
  <script src="boostrap/js/swiper-bundle.min.js"></script>
  <script src="boostrap/js/main.js"></script>


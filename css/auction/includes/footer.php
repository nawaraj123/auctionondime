<footer>
  <div class="container">
    <div class="col-md-4">Copyright &copy; 2015 by Auction on
      A Dime<br>
      All Rights Reserved.</div>
    <div class="col-md-4 social">Find us on <br>
      <p><a href="#"><i class="fa fa-facebook-square"></i></a> <a href="#"><i class="fa fa-twitter-square"></i></a> <a href="#"><i class="fa fa-google-plus-square"></i></a> <a href="#"><i class="fa fa-linkedin-square"></i></a> <a href="#"><i class="fa fa-youtube-square"></i></a> <a href="#"><i class="fa fa-pinterest-square"></i></a> </p>
    </div>
    <div class="col-md-4">Powered by <br>
      YKM SOLUTION </div>
  </div>
</footer>
<!-- end of footer --> 

<!-- end of products part --> 
<!-- jQuery --> 
<script src="js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="js/bootstrap.min.js"></script> 

<!-- jQuery --> 
<!-- jQuery --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> 
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script> 

<!-- FlexSlider --> 
<script defer src="js/jquery.flexslider.js"></script> 
<script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
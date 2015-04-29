
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
@import url("style.css");
-->
</style>
</head>
<body>
<center>
<i><h2><b>dig trace domain <b><small>lookup</small></h2></i>
<br>

<?php
    if (isset($_POST['sfor'])){$input=$_POST['sfor']; echo "<input type=\"username\" value=\"$input\" class=\"form-control\" name=\"sfor\" id=\"exampleInputEmail2\" placeholder=\"Search for\">";}
    else {echo "<input type=\"username\" class=\"form-control\" name=\"sfor\" id=\"exampleInputEmail2\" placeholder=\"Search for\">";}
?>
  </div>
  <button type="submit" name="submit" class="btn btn-default">Search</button>
</form>

<?php
if (isset($_POST['submit'])) {
        if (isset($_POST['sfor']) && $_POST['sfor']!="") {

                $sfor=$_POST['sfor'];
                $output=`./dig_trace.sh $sfor`;
                echo "<br><div align='center'>";
                echo str_replace("\n","<br>",$output);
                echo "</div>";
                                                                }
        else{ echo "<br><br><div class=\"alert alert-warning\"><b>Warning!  You did not enter a domain.</div>";}
                              }
?>
</center>
</body>
</html>

<script type="text/javascript">
function SetFocus () {
var SearchInput = $('#exampleInputEmail2');
var strLength= SearchInput.val().length;
SearchInput.focus();
SearchInput[0].setSelectionRange(strLength, strLength);
}
SetFocus();
</script>


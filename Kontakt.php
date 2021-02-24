    <?php
require_once 'header.php';
require_once 'create.php';

?>
<h3><b>Kontaktformulär</h3>
<form action="#" class="row" method="post">
<div class="col-md-3 my-2">
    <input type="text" class="form-control" name="Name" placeholder="Namn" required>
</div>
<div class="col-md-3 my-2">
    <input type="email" class="form-control" name="Email" placeholder="Email">
</div>
<div class="col-md-3 my-2">
    <textarea name="Message" cols="30" rows="5" class="form-control" placeholder="Skriv ett meddelande" required></textarea>
</div>
<div class="col-md-3">
    <input type="submit" class="form-control btn btn-success" value="Skicka meddelandet">
</div>
<div style ="text-align:right" class = "col-md-8">
    <a href='admin.php'><button type="button" class="btn btn-primary btn-md">Admin</button></a>
</div>
</form>
<?php
require_once ('database.php');
    try {
        $sth = $db->query('SELECT name FROM NAMES');
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        }
    catch(PDOException $e)
        {
            echo $e->getMessage();
        }
?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<title>Twitter API</title>
</head>
<body>

	<div class="d-flex justify-content-center">
		<form class="form-inline" id="form" method="POST" action="api.php">

			<div class="form-group mb-2">
				<label for="search">Search powerd by Twitter API</label>
			</div>

			<div class="form-group mx-sm-3 mb-2">
				<input type="text" id="name" name="name" placeholder="User_name">
			</div>

			<button type="submit" id="save" class="btn btn-primary mb-2">Apply</button>

			<button type="reset" class="btn btn-danger mb-2">Delete</button>

		</form>
	</div>

	<script type="text/javascript">
		 $(document).ready(function(){
            $('form').submit(function(event){
                event.preventDefault();
                $.ajax({
                    type: $(this).attr('method'),
                    url: 'api.php',
                    data: $('#form').serialize(),
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
            });
        });
	</script>

		<div class="d-flex justify-content-around" id="result"></div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#save').on('click', function() {
                var name = $('#name').val();
                    $.ajax({
                        url: "toBD.php",
                        type: "POST",
                        data: {
                            name: name,
                        },
                        cache: false,
                        success: function(Result){
                            var Result = JSON.parse(Result);
                                $("#save").removeAttr("disabled");
                                $('#form').find('input:text').val('');
                        }
                    });
                });
            });
    </script>


    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                    <? foreach ($rows as $key => $value) {?>
                        <li><? echo  $value['name']; ?></li>
                    <? } ?>
                </ul>
            </div>
        </div>
    </div>

</body>
</html>
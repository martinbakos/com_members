<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <div class="card">
    <br />
    <div id="alert_message"></div>
    <br />
		<span id="result"></span>
		<div id="live_data"></div>
	</div>


<script>

$(document).ready(function(){
    function fetch_data()
    {
        $.ajax({
            url:"components/com_clenovia/select.php",
            method:"POST",
            success:function(data){
				$('#live_data').html(data);
            }
        });
    }
    fetch_data();
    $(document).on('click', '#btn_add', function(){
        var name = $('#name').text();
        var username = $('#username').text();
        var password = $('#password').text();
        var town = $('#town').text();
        var email = $('#email').text();
        var phone = $('#phone').text();
        var funkcia = $('#funkcia').text();
        if(name == '')
        {
            $('#alert_message').html('<div class="alert alert-danger">Vyplňte meno a priezvisko</div>');
            return false;
        }
        setInterval(function(){
        $('#alert_message').html('');
        }, 5000);
        if(username == '')
        {
            $('#alert_message').html('<div class="alert alert-danger">Vyplňte používateľské meno</div>');
            return false;
        }
        setInterval(function(){
        $('#alert_message').html('');
        }, 5000);
        if(password == '')
        {
            $('#alert_message').html('<div class="alert alert-danger">Vyplňte heslo</div>');
            return false;
        }
        setInterval(function(){
        $('#alert_message').html('');
        }, 5000);
        $.ajax({
            url:"components/com_clenovia/insert.php",
            method:"POST",
            data:{name:name, username:username, password:password, town:town, email:email, phone:phone, funkcia:funkcia},
            dataType:"text",
            success:function(data)
            {
                $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
                fetch_data();
            }
        });
        setInterval(function(){
        $('#alert_message').html('');
      }, 10000);
    });

	function edit_data(id, text, column_name)
    {
      if(username == '')
      {
          $('#alert_message').html('<div class="alert alert-danger">Vyplňte používateľské meno</div>');
          return false;
      }
        $.ajax({
            url:"components/com_clenovia/edit.php",
            method:"POST",
            data:{id:id, text:text, column_name:column_name},
            dataType:"text",
            success:function(data)
            {
              $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
              fetch_data();
            }
      });
      setInterval(function(){
      $('#alert_message').html('');
      }, 5000);
    }
    $(document).on('blur', '.name', function(){
        var id = $(this).data("id1");
        var name = $(this).text();
        edit_data(id, name, "name");

    });
    $(document).on('blur', '.password', function(){
        var id = $(this).data("id3");
        var password = $(this).text();
        if(password != '')
        {
          if(confirm("Chcete naozaj zmeniť heslo?"))
          {
          edit_data(id,password, "password");
          }
         }
    });
    $(document).on('blur', '.town', function(){
        var id = $(this).data("id4");
        var town = $(this).text();
        edit_data(id,town, "town");
    });
    $(document).on('blur', '.email', function(){
        var id = $(this).data("id5");
        var email = $(this).text();
        edit_data(id,email, "email");
    });
    $(document).on('blur', '.phone', function(){
        var id = $(this).data("id6");
        var phone = $(this).text();
        edit_data(id,phone, "phone");
    });
    $(document).on('blur', '.funkcia', function(){
        var id = $(this).data("id8");
        var funkcia = $(this).text();
        edit_data(id,funkcia, "funkcia");
    });
    $(document).on('click', '.btn_delete', function(){
        var id=$(this).data("id9");
        if(confirm("Chcete zablokovať toto konto?"))
        {
            $.ajax({
                url:"components/com_clenovia/delete.php",
                method:"POST",
                data:{id:id},
                dataType:"text",
                success:function(data){
                    $('#alert_message').html('<div class="alert alert-danger">'+data+'</div>');
                    fetch_data();
                }
            });
            setInterval(function(){
            $('#alert_message').html('');
            }, 5000);
        }
    });
});
</script>

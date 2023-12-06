<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(document).on('click', '#btn', function(e) {
        e.preventDefault();

        var value = $('#value').val();
        if (value == '' || value == null) {
            alert('please enter a value !!');
        } else {
            $.ajax({
                url: 'task_php.php',
                method: "post",
                dataType: 'json',
                data: {
                    value: value,
                    action: 'sent'
                },
                success: function(data) {
                    console.log(data);
                    if (data.sucess) {
                        $("#result").html(data.msg);
                    } else {
                        $("#result").html(data.msg);
                    }
                }
            });
        }
    });
</script>

<form id=form method="post" action=task_php.php>
    <input type="text" name="value" id="value" placeholder="write a number">
    <button type="submit" name="btn" id="btn"> check </button>
</form>
<div id="result"></div>
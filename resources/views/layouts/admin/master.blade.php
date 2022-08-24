<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="/css/style.css"> --}}
    <link rel="stylesheet" href="/site/css/stylecss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        var survey_options = document.getElementById('survey_options');
        var add_more_fields = document.getElementById('add_more_fields');
        var remove_fields = document.getElementById('remove_fields');
        $(function(){
            $(".delete").click(function(){
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                        $("#delete-form").submit();
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
            });
        });
        $(document).ready(function() {
    var max_fields = 10;
    var wrapper = $(".container1");
    var add_button = $(".add_form_field");
    var x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append('<div><input type="text" name="phonezalo[]"/><a href="#" class="delete">Delete</a></div>'); //add input box
        } else {
            alert('You Reached the limits')
        }
    });
    $(wrapper).on("click", ".delete", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
</script>
</head>

<body>
     @include('partitions.sidebar')
     <script th:src="@{/webjars/jquery/jquery.min.js}"></script>
    <script th:src="@{/webjars/popper.js/umd/popper.min.js}"></script>
    <script th:src="@{/webjars/bootstrap/js/bootstrap.min.js}"></script>
    <script th:src="@{/assets/summernote/summernote-bs4.js}"></script>

    <script>
        tinymce.init({
        selector: 'textarea#default'
    });
    </script>
</body>
</html>

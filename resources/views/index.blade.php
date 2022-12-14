<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cascaded Category</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>


    <header class="text-center p-4 bg-dark text-white" style="font-size: 40px;">paytabs task :: huseein mostafa</header>
    <div class="container mt-4">
        <div class="row">

            <div class="col-md-4">
                <h3>Category<span class="gcolor"></span> </h3>
                <div class="form-s2">
                    <div>
                        <select class="form-control formselect required" placeholder="Select Category"
                            id="main_categories">
                            <option value="0" disabled selected>Select
                                Main Category*</option>
                            @foreach($main_categories as $category)
                            <option  value="{{ $category->id }}">
                                {{ ucfirst($category->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <h3>Sub Category*</h3>
                <select class="form-control formselect required" placeholder="Select Sub Category" id="sub_category"
                    >
                </select>
            </div>
            <div class="col-md-4">
                <h3>Sub sub Category*</h3>
                <select class="form-control formselect required" placeholder="Select Sub sub Category" id="sub_sub_category"
                    >
                </select>
            </div>

        </div>
        <script src="http://code.jquery.com/jquery-3.4.1.js"></script>

    <script>
                $(document).ready(function () {
                $('#main_categories').on('change', function () {

                let id = $(this).val();
                $('#sub_category').empty();
                $('#sub_sub_category').empty();
                $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
                $.ajax({
                type: 'GET',
                url: 'GetSubCat/' + id,
                success: function (response) {
                var response = JSON.parse(response);
                console.log(response);
                $('#sub_category').empty();
                $('#sub_category').append(`<option value="0" disabled selected> Sub Category*</option>`);
                response.forEach(element => {
                    $('#sub_category').append(`<option value="${element['id']}">${element['name']}</option>`);
                    });
                }
            });

        });

        $('#sub_category').on('change', function(){
            $('#sub_sub_category').empty();

            let id = $('#sub_category').val();

            $('#sub_sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
                $.ajax({
                type: 'GET',
                url: 'GetSubCat/' + id,
                success: function (response) {
                var response = JSON.parse(response);
                console.log(response);
                $('#sub_sub_category').empty();
                $('#sub_sub_category').append(`<option value="0" disabled selected> Sub Category*</option>`);
                response.forEach(element => {
                    $('#sub_sub_category').append(`<option value="${element['id']}">${element['name']}</option>`);
                    });
                }
            });



        });
    });
    </script>
</body>

</html>

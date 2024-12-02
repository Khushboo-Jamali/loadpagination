<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <br><br><br><br>
        <h4>Student

        </h4>
        <div class="" id="loadtable">
            <div
                class="table-responsive">
                <table
                    id="table-data"
                    class="table table-secondary">
                    <thead>
                        <tr>
                            <th scope='col'>Column 1</th>
                            <th scope='col'>Column 2</th>
                            <!-- <th scope='col'>Column 3</th> -->
                        </tr>
                    </thead>

                </table>
            </div>
        </div>

    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script src="./jquery-3.7.1.min.js"></script>
    <script>
        // $(document).ready(function(page) {
        //     function loadTable() {
        //         $.ajax({
        //             url: 'backend.php',
        //             type: 'POST',
        //             data: {
        //                 page_no: page
        //             },
        //             success: function(data) {
        //                 $('#table-data').append(data);

        //             }
        //         });
        //     }
        //     loadTable();

        //     $(document).on('click', '#ajaxbtn', function() {
        //         var pid = $(this).data('id');
        //         loadTable(pid);

        //     });
        // });
        $(document).ready(function() {
            var currentPage = 0;

            function loadTable(page) {
                $.ajax({
                    url: 'backend.php',
                    type: 'POST',
                    data: {
                        page_no: page
                    },
                    success: function(data) {
                        if (data != "no data") {
                            $('#pagaination').remove();
                            $('#table-data').append(data);
                            currentPage++;
                        } else {

                            $('#ajaxbtn').prop('disabled', true).text("No More Data");
                        }
                    }
                });
            }

            loadTable(currentPage);

            $(document).on('click', '#ajaxbtn', function() {
                $('#ajaxbtn').html('loading...');

                loadTable(currentPage);
            });
        });
    </script>
</body>

</html>
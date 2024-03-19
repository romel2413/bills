<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Form</title>
    <!-- Include necessary CSS -->
    @include('frontend.css')
    <style>
        /* Basic styling for inputs */
        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="checkbox"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        .selection {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        /* Responsive behavior for smaller screens */
        @media (max-width: 768px) {
            input[type="text"] {
                font-size: 14px;
                /* Adjust font size for smaller screens */
            }
        }

        /* Basic styling for inputs */
        input[type="checkbox"] {
            width: 20px;
            /* Set the width of checkboxes */
            height: 20px;
            /* Set the height of checkboxes */
            margin-right: 10px;
            /* Add some margin for spacing */
            transform: scale(1);
            /* Add some margin for spacing */
        }

        .medical-item {
            display: flex;
            /* Make checkboxes and labels inline */
            align-items: center;
            /* Align items vertically */
        }
    </style>
</head>

<body>
    <!-- container start -->
    <div class="container">
        <!-- sidebar start  -->
        @include('frontend.sidebar')
        <!-- sidebar end  -->
        <!-- main start -->

        <div class="main">
            @include('frontend.main')
            <div class="tables">
                <form action="{{ url('/record_add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="fname">First Name:</label>
                    <input type="text" name="fname" id="fname" required>

                    <label for="lname">Last Name:</label>
                    <input type="text" name="lname" id="lname" required>

                    <fieldset style="display: grid; grid-template-columns: repeat(2, 1fr); grid-gap: 10px;">
                        <legend>Medical</legend>
                        @foreach ($data as $category)
                            <div class="medical-item">
                                <input type="checkbox" name="category[]" class="categoryCheckbox"
                                    id="category{{ $loop->index }}"
                                    value="{{ $category->category_name }}:{{ $category->price }}"
                                    data-price="{{ $category->price }}">
                                <label for="category{{ $loop->index }}">{{ $category->category_name }}</label>
                            </div>
                        @endforeach
                    </fieldset>
                    <label for="balance">Balance:</label>
                    <input class="text_color" type="text" name="balance" id="balance" placeholder="" required
                        readonly>

                    <label for="date">Date:</label>
                    <input type="date" name="date" id="date" required>

                    <label for="">Disount: </label>
                    <select name="id_discount" id="id_discount" class="selection">
                        <option value="" disabled selected>Select discount</option>
                        <option value="none">None</option>
                        <option value="senior">Senior</option>
                    </select>

                    <label for="">Status: </label>
                    <select name="status" id="status" class="selection">
                        <option value="" disabled selected>Select if paid or not
                        </option>
                        <option value="Paid">Paid</option>
                        <option value="Not Paid">Not Paid</option>
                    </select>
                    <input type="submit" value="Add Product" class="btn" required="">

                </form>
            </div>
            <!-- table end -->
        </div>
        <!-- main end-->
    </div>
    <!-- container end -->

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Calculate balance when the document is ready
            calculateBalance();

            // Recalculate balance when a checkbox is changed
            $('.categoryCheckbox').change(function() {
                calculateBalance();
            });

            function calculateBalance() {
                var total = 0;
                $('.categoryCheckbox:checked').each(function() {
                    total += parseFloat($(this).data('price'));
                });
                $('#balance').val(total.toFixed(2)); // You can adjust decimal places as needed
            }
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<style>
    ..container {
    display: flex;
    margin-bottom: 20px;
    flex: 1;
  }

  .input-group {
    margin-bottom: 20px;
    display: flex;
  }

  .form-control {
    width: calc(50% - 5px);
    /* Adjust width as needed */
    padding: 10px 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none; /* Remove default outline */
  }

  .input-group .form-control {
    width: 45%;
    /* Adjust the width as needed */
  }

  .input-group-append {
    display: flex;
    align-items: flex-end;
  }

  /* Add some hover effects and focus styles for better user experience */
  .form-control:hover {
    border-color: #999;
  }

  .form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
  }

  @media (max-width: 768px) {
    .input-group .form-control {
      width: 100%;
      /* Make inputs full width on smaller screens */
    }
  }
</style>
@include('frontend.css')

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
                <!-- last appoinments start  -->
                <div class="last-appoinments">
                    <h2 class="h2_font">Medical List</h2>
                    <form action="{{ url('/add_category') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                          <input
                            class="form-control input_color"
                            type="text"
                            name="name_category"
                            placeholder="Write Category Name"
                            required=""
                          >
                          <input
                            class="form-control input_color"
                            type="number"
                            min="0"
                            name="price"
                            placeholder="Input Price"
                            required=""
                          >
                          <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Add Category</button>
                          </div>
                        </div>
                      </form>


                    <table class="appoinments">
                        <thead>
                            <td>Medical</td>
                            <td>Price</td>
                            <td>Action</td>
                        </thead>
                        <tbody>
                            @foreach ($data as $rec)
                            <tr>
                                <td>{{ $rec->category_name }}</td>
                                <td>{{ $rec->price }}</td>
                                <td><a href=""><i class="far fa-trash-alt"></i></td></a>
                            </tr>
                            @endforeach
  
                        </tbody>
                    </table>
                </div>
                <!-- last Appointments end  -->
                <!-- doctor visit start  -->

                <!-- doctor visit end  -->
            </div>
            <!-- table end -->
        </div>
        <!-- main end-->
    </div>
    <!-- container end -->




</body>

</html>

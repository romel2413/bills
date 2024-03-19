<!DOCTYPE html>
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
                <div class="last-appoinments">
                    <div class="heading">
                        <h2>Invoice</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table class="appoinments">
                        <thead>
                            <td>ID #</td>
                            <td>Full Name</td>
                            <td>Medical</td>
                            <td>Balance</td>
                            <td>Discount</td>
                            <td>Start Date</td>
                            <td>Status</td>
                            <td>Action</td>

                        </thead>
                        <tbody>
                            @foreach ($viewMainRecord as $recordDB)
                                <tr>
                                    <td>{{ $recordDB->id }}</td>
                                    <td>{{ $recordDB->fname }}, {{ $recordDB->lname }}</td>
                                    <td>{{ $recordDB->category }}</td>
                                    <td>{{ $recordDB->balance }}</td>
                                    <td>{{ $recordDB->id_discount }}</td>
                                    <td>{{ $recordDB->record_date }}</td>
                                    <td>
                                        <a href="#" class="clickable-status">{{ $recordDB->status }}</a>
                                    </td>
                                    <td>
                                        <i class="far fa-eye"></i>
                                        <i class="far fa-edit"></i>
                                        <i class="far fa-trash-alt"></i>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- table end -->
        </div>
        <!-- main end-->
    </div>
    <!-- container end -->
</body>

</html>

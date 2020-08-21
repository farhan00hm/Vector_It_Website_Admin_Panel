@extends("maintemplate")

@section("employeesapplication")
    <h2> Career</h2>
    <div class="content">
        <h4> Employees Application</h4>
        <div id="top-div">
            <div class="container">
                <div class="row top-div-row">
                    <div class="col-sm-2">
                        <label for="sort-options">Sorted By:</label>
                    </div>
                    <div class="col-sm-2">
                        <select id="sorted-option" onchange="clickOnSort(this.value)">
                            <option value="">Choose an option</option>
                            <option value="Earlier Application">Earlier Application</option>
                            <option value="Latest Application">Lattest Application</option>

                        </select>
                    </div>
                </div>

                <div class="row top-div-row">
                    <div class="col-sm-2">
                        <label for="sort-options">Search:</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" id="search-field">
                        <button id="search-button"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div id="application-lists" class="application-div">
            @include('applicationsdiv')
        </div>


        <!-- The Modal -->
        <div id="career-modal" class="modal career-modal">

            <!-- Modal content -->
            <div class="modal-content career-modal-content">
                <span class="career-modal-close">&times;</span>
                <p id="modal-id"></p>
                <p id="modal-name"></p>
                <p id="modal-email"></p>
                <p id="modal-jobSection"></p>
                <p id="modal-date"></p>
                <a class="btn btn-large pull-right download-button" id="modal-link"><i class="icon-download-alt"> </i>
                    Download CV </a>
            </div>

        </div>

        <script type="text/javascript">
            // Get the modal
            var modal = document.getElementById("career-modal");
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("career-modal-close")[0];

            function onEdit(applicants) {



                let formattedDate =  applicants["created_at"].split("T")[0];
                console.log(formattedDate);
                document.getElementById("modal-id").innerText = "Id: "+applicants["id"];
                document.getElementById("modal-name").innerText ="Name: "+applicants["name"];
                document.getElementById("modal-email").innerText ="Email: "+ applicants["email"];
                document.getElementById("modal-jobSection").innerText ="Job Description: "+applicants["jobSection"];
                document.getElementById("modal-date").innerText ="Apply Date: "+formattedDate;
                document.getElementById("modal-link").href = /download-cv/ + applicants["cvName"];
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            };

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            };


            function clickOnSort(x) {
                console.log(x);
                $.ajax({
                    type: "GET",
                    data: {sortBy: x, _token: '{{csrf_token()}}'},
                    url: "/sortdata/",
                    success: function (response) {
                        $('.collapse').collapse('show');
                        $('#application-lists').html(response);
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        console.log("Status: " + textStatus + "Error: " + errorThrown);
                    }
                });
            }

            //for live serach code


            function fetch_customer_data(x) {
                $.ajax({
                    type: "GET",
                    data: {query: x,_token: '{{csrf_token()}}'},
                    url: "/livesearch/",
                    // dataType:'json',
                    success: function (data) {
                        // $('.collapse').collapse('show');
                        $('#application-lists').html(data);
                        // $('tbody').html(data.table_data);
                        // $('#total_records').text(data.total_data);
                    }
                })
            }

            $(document).on('keyup', '#search-field', function () {
                var query = $(this).val();
                fetch_customer_data(query);
            });


        </script>


    </div>
@endsection

@extends('admin.dashboard')
@section('specializations')

    {{--        Our Specialiazation start--}}

    <div class="content">
        <h3 style="text-align: center">Our Specializations</h3>

        {{--            plus button icon--}}
        <i class="fa fa-plus" data-toggle="modal" data-target="#exampleModalScrollable"
           style="font-size:48px;color:red;float:right"></i>


        {{--            table start from here --}}
        <div class="container-fluid">
            <table id="productSizes" class="table">
                <thead>
                <tr class="d-flex">
                    <th class="col-1">Title</th>
                    <th class="col-3">Short Description</th>
                    <th class="col-5">Full Description</th>
                    <th class="col-3">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($specializations ?? '' as $specialization)

                    <tr class="d-flex">
                        <td id="specializations-value" hidden>{{ $specialization->id }}</td>
                        <td class="col-1">
                            <span class="active-dot active-dot-{{ $specialization->display }}"></span>
                            {{ $specialization->title }}
                        </td>
                        <td class="col-3">{{ $specialization->short_description }}</td>
                        <td class="col-5">{{ $specialization->description }}</td>
                        <td class="col-3">
                            <div id="update-delete-button">
                                <a href="{{URL::to('/deletespecialization/'.$specialization->id) }}">
                                    <button><i class="fa fa-trash-o" style="font-size:20px;color:red"></i></button>
                                </a>
                                <button class="fa fa-edit" onClick="onEdit(this)" style="font-size:20px;color:red;"
                                        data-toggle="modal" data-target="#exampleModalScrollable"></button>
                                {{--                                <button><i class="fa fa-refresh" style="font-size:20px;color:red"></i></button>--}}
                            </div>
                        </td>
                    </tr>
                @endforeach
                <tr class="d-flex">
                    <td class="col-1">8</td>
                    <td class="col-3">84 - 86</td>
                    <td class="col-3">66 - 68</td>
                    <td class="col-5">94 - 96</td>
                </tr>
                </tbody>

            </table>


        </div>
        {{--            table end here--}}
        {{--            Our Specialization end--}}

    </div>



    {{--Modal form start here --}}
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
        Launch demo modal
    </button>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Add a Specilization</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    {{--                Modal form start  --}}

                    <img src="../assets/img/service3.jpg" width="100%" height="200px" alt="service image">

                    <form id="modal-form-1" method="POST" action="/store">
                        <div id="modal-form">
                            <label for="title">Title<sub style="color : red;"> *</sub></label>
                            <input type="text" name="title" id="modal-title" class="modal-form-input" value=""
                                   placeholder="Title..." required><br>
                            <label for="short-description">Short Description<sub style="color : red;"> *</sub></label>
                            {{--                        <input type="text" name="shortDescription" id="modal-shorDescription" class="modal-form-input"--}}
                            {{--                               placeholder="Short Description..."><br>--}}
                            <textarea name="shortDescription" id="modal-shorDescription" class="modal-form-input"
                                      placeholder="Short Description..."></textarea><br>
                            <label for="description">Description<sub style="color : red;" required> *</sub></label>
                            <textarea id="modal-form-textarea-input" name="description" placeholder="Description..."
                                      required></textarea><br><br>
                            <label>Do you want to upload it ?</label>

                            <div id="modal-form-radio-button">
                                <input type="radio" id="yes" name="display" value="1">
                                <label for="yes">Yes</label>
                                <input type="radio" id="no" name="display" value="0">
                                <label for="No">No</label><br>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="modal-button">Save</button>
                            {{ csrf_field() }}
                            {{--                        <button type="submit" class="btn btn-primary">Save changes</button>--}}
                        </div>
                    </form>
                    {{--                Modal form end--}}

                </div>
            </div>
        </div>
    </div>
    {{--Modal End --}}

    {{--parsing data to modal start--}}
    <script>
        function onEdit(td) {
            selectedRow = td.parentElement.parentElement.parentElement;

            document.getElementById('modal-title').value = selectedRow.cells[1].innerText;
            document.getElementById('modal-shorDescription').value = selectedRow.cells[2].innerText;
            document.getElementById('modal-form-textarea-input').value = selectedRow.cells[3].innerText;
            document.querySelector('#modal-button').textContent = 'Update';
            document.getElementById('modal-form-1').action = "/edit-specilization/" + selectedRow.cells[0].innerText
        }
    </script>

    {{--parsing data to modal start--}}



@endsection

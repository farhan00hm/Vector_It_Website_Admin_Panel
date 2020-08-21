@extends('maintemplate')
@section('clients-feedback')
    <h3>Clients' Feedback</h3>

    <div class="content">

        {{--            plus button icon--}}
        <i class="fa fa-plus" data-toggle="modal" data-target="#feedbackModal"
           style="font-size:48px;color:red;float:right"></i>

        {{--        table start--}}
        <br>
        <div class="container-fluid">
            <table class="table">
                <thead>
                <tr class="d-flex">
                    <th class="col-1">Name</th>
                    <th class="col-2">Profession</th>
                    <th class="col-5">Feedback</th>
                    <th class="col-2">Image</th>
                    <th class="col-2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($feedbacks as $feed_back)

                <tr class="d-flex">
                    <td id="feedbacks-no" hidden>{{ $feed_back->id }}</td>
                    <td class="col-1">
                        <span class="active-dot active-dot-{{ $feed_back->display }}"></span>
                        {{ $feed_back->name }}
                    </td>
                    <td class="col-2">{{ $feed_back->profession }}</td>
                    <td class="col-5">{{ $feed_back->feedback }}</td>
                    <td class="col-2">{{ $feed_back->imagePath }}</td>
                    <td class="col-2">
                        <div id="update-delete-button">
                            <a href="{{URL::to('/delete-feedback/'.$feed_back->id) }}">
                                <button><i class="fa fa-trash-o" style="font-size:20px;color:red"></i></button>
                            </a>
                            <button class="fa fa-edit" onClick="onFeedbackEdit(this)" style="font-size:20px;color:red;"
                                    data-toggle="modal" data-target="#feedbackModal"></button>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{--        table end--}}
    </div>


{{--    --}}{{--Feedback Modal start--}}
{{--    <!-- Modal -->--}}
    <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog"
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

{{--                                    Modal form start  --}}

                    <img src="../assets/img/service3.jpg" width="100%" height="200px" alt="service image">

                    <form id="feedback-modal-form" method="POST" action="/store-clientfeedback" enctype="multipart/form-data">
                        <div id="modal-form">
                            <label for="name">Name<sub style="color : red;"> *</sub></label>
                            <input type="text" name="name" id="feedbackModalName" class="modal-form-input" value=""
                                   placeholder="Name..." required><br>
                            <label for="profession">Profession<sub style="color : red;"> *</sub></label>
                            <input type="text" name="profession" id="feedbackModalProfession" class="modal-form-input" value=""
                                   placeholder="Profession..." required><br>
                            <label for="feedback">Feedback<sub style="color : red;"> *</sub></label>
                            <textarea id="feedbackModalFeedback" name="feedback" placeholder="Feedback..."
                                      required></textarea><br><br>


                            <input type="file" id="feedbackModalImage" name="image" placeholder="Image"/>
                            <br><br>
                            <label>Do you want to upload it ?</label>

                            <div id="modal-form-radio-button">
                                <input type="radio" id="feedback-upload-yes" name="display" value="1">
                                <label for="yes">Yes</label>
                                <input type="radio" id="feedback-upload-no" name="display" value="0">
                                <label for="No">No</label><br>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="feedback-modal-button">Save</button>
                            {{ csrf_field() }}
{{--                                                    <button type="submit" class="btn btn-primary">Save changes</button>--}}
                        </div>
                    </form>
{{--                                    Modal form end--}}

                </div>
            </div>
        </div>
    </div>
{{--    --}}{{--Feedback Modal end--}}


{{--    javascript code for editing feedback start--}}
    <script>
        function onFeedbackEdit(td) {
            selectedRow = td.parentElement.parentElement.parentElement;

            document.getElementById('feedbackModalName').value = selectedRow.cells[1].innerText;
            document.getElementById('feedbackModalProfession').value = selectedRow.cells[2].innerText;
            document.getElementById('feedbackModalFeedback').value = selectedRow.cells[3].innerText;


            document.querySelector('#feedback-modal-button').textContent = 'Update';
            if(selectedRow.cells[0].innerText === '1'){
                document.getElementById('feedback-upload-yes').checked = true
            }
            if(selectedRow.cells[0].innerText === '2'){
                document.getElementById('feedback-upload-no').checked = true
            }
            // updated modal link for updat the feedback
            document.getElementById('feedback-modal-form').action = "/edit-feedback/" + selectedRow.cells[0].innerText
        }
    </script>

    {{--    javascript code for editing feedback end--}}
@endsection


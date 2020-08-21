@foreach($applications as $application)
    <div class="application"  onclick="onEdit({{ $application }})">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p id="application-id">Id: {{ $application->id }}</p>
                    <p id="applicants-name">Name: {{ $application->name }}</p>
                    <p id="application-date">Apply Date: {{ $application->created_at->format('d M Y') }}</p>
                </div>
                <div class="col-sm-6">
                    <p id="applicants-email">Email: {{ $application->email }}</p>
                    <p id="applicants-jobDescription">Job Description: {{ $application->jobSection }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach

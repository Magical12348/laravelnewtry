<div class="col-md-12 service_item" id="jobplacement">
    <h2><b>Job Placement Assistance</b></h2>
    <div class="space-20"></div>
    <div class="space-20"></div>
    <div class="space-20"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="company-grid">
                @foreach ($companies as $company)
                    <a href="{{ $company['link'] }}" class="company-card" target="_blank">
                        <img src="{{ $company['image'] }}" alt="{{ $company['name'] }}" />
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@extends('layouts.base')

@section('title')
    Services
@endsection

@section('content')
    <section class="container-fluid " id="hero">
        <div class="row max_width">
            <div class="col-md-6 heading_text">
                <h1>Services</h1>
            </div>
            <div class="col-md-6 service-form">
                <form action="{{ route('service.form.store') }}" method="POST">
                    @csrf
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="name" class="form-label">Name :</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name"
                            value="{{ old('name') }}" required />
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Adress :</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email"
                            value="{{ old('email') }}" required />
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number :</label>
                        <input type="number" class="form-control" id="phone_number" name="phone_number"
                            value="{{ old('phone_number') }}" placeholder="Enter Your Number" required />
                        @error('phone_number')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">What services do you required ?</label>
                        <textarea class="form-control" name="description" rows="2">{{ old('description') }}</textarea>
                    </div>
                    <button class="btn-form">Submit</button>
                </form>
            </div>
        </div>
    </section>
    <div class="space-20"></div>
    <div class="space-20"></div>
    <section class="container-fluid max_width" id="services">
        <div class="row">
            <div class="col-md-12 service_item" style="text-align: justify" id="internship">
                <h2><b>Internship</b></h2>
                <p>The Magical Umbrella Internship and training Programme offers
                    Candidate the opportunity to gain direct practical experience with Live Project
                    work. Internship opportunities are available worldwide. </p>
                <p>When a Magical Umbrella office identifies the need for an intern
                    to support their team, they publish the opportunity, and all candidates can
                    submit their application through our website or can visit to our office
                    address. You can find current opportunities&nbsp;on our home page.</p>
                <p>Company seeks an intern with interest in software design, coding
                    and debugging. The intern will gain exciting real-world software engineering
                    experience at a thriving company.</p>
                <p>We frequently work in small teams to solve problems, explore new
                    technologies, and learn from one another. The ideal intern for this environment
                    will be enthusiastic and collaborative.</p>
                <p>Engineering company known for innovative technology seeks a
                    self-directed IT intern with a passion for technology, collaboration, and
                    creative problem-solving. The intern will actively contribute to meaningful
                    projects and work closely with a mentor and with senior leadership.</p>
                <p>Interns assist the
                    company with tasks set out by various teams, such as research, data capturing
                    and working closely with different team members to learn more about the company
                    culture.</p>
                <p><span style="font-weight: bold; font-size: 25px;" class="contrast">&nbsp;Responsibilities</span>
                </p>
                <ul>
                    <li style="margin-left: 18.85pt; line-height: normal;">Document and test new software applications.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Assess new application ideas.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Research competitor offerings.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Develop applications (coding, programming).</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Support the IT team in maintaining hardware,
                        software, and other
                        systems.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Assist with troubleshooting issues and provide
                        technical support.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Organize and maintain IT resources.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Lend IT support in areas such as cybersecurity,
                        programming,
                        analytics, and data centre management.</li>
                </ul>
                <p><span style="font-weight: bold; font-size: 25px;" class="contrast">&nbsp;Requirements</span></p>
                <ul>
                    <li style="margin-left: 18.85pt; line-height: normal;">Any Graduate interested in IT Sector.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Analytical and Mathematics skills.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Ability to work in teams.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Interested in learning Computer Programming.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Familiar with Fundamental of computer &amp;
                        Microsoft Office
                        Suite.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Verbal and Written communication.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Strong work ethic and attention to detail.</li>
                </ul>
                <p><span style="font-weight: bold; font-size: 25px;" class="contrast">&nbsp;Benefits</span></p>
                <ul>
                    <li style="margin-left: 18.85pt; line-height: normal;">Practical experience with a wide variety of
                        software engineering
                        tasks.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Collaborating hand-in-hand with skilled teams of
                        software
                        engineers.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Shadowing, mentoring, and training opportunities
                        with seasoned professionals.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Opportunity to participate in networking events
                        and company
                        meetings.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Flexible schedule for students.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Gain hands-on experience in an IT position.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Work on Live Project Work.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Course Certificate.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Job Placement Assistance.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Notes.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Doubt Solving Session.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Mock Interviews.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Mock Test..</li>
                </ul>

            </div>
            <div class="col-md-12 service_item" id="jobplacement">
                <div class="row">
                    <x-companies />
                </div>
            </div>
            {{-- <div class="col-md-12 service_item" id="notes">
                    <h2><b>Notes</b></h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus earum vitae, eum voluptatem odio
                        quo dignissimos quos delectus nemo, qui culpa corrupti possimus aliquid, quia nobis velit eaque nihil.
                        Amet, architecto ipsa voluptatum odio quod nihil sapiente veritatis? Esse pariatur in iure optio veniam
                        libero. Nemo laborum illo voluptatibus et, vitae excepturi! Commodi nemo esse ut laboriosam, blanditiis
                        cum asperiores nobis aspernatur voluptatem pariatur vitae, porro veritatis enim officia nostrum sint
                        mollitia consequatur, accusamus quasi ex velit iste quam nam beatae! Praesentium, ipsam vel illum
                        temporibus pariatur facilis nulla vero tempore cupiditate, suscipit sint modi illo nihil maiores in et
                        placeat ratione voluptates saepe! Sit quae accusamus commodi obcaecati atque facere assumenda maxime,
                        corrupti, libero nobis pariatur perferendis sapiente magni minima eligendi optio placeat soluta? Tenetur
                        non voluptate dolore harum nobis consectetur laborum animi sunt facere debitis odio repudiandae voluptas
                        doloremque nesciunt ipsam suscipit ipsa saepe laboriosam, est vitae nam numquam quos fugit magni?
                        Dolorem culpa veritatis vitae cum est nulla voluptate voluptatem dolores, minima sequi modi repellendus
                        reprehenderit molestias inventore minus iusto facilis quaerat impedit recusandae distinctio repudiandae
                        ipsum? Ipsum perferendis odio dignissimos impedit ut unde quidem iste, nesciunt dolore id quisquam
                        excepturi, adipisci voluptatem autem nulla at deserunt!
                    </p>
                </div> --}}
        </div>
    </section>
@endsection

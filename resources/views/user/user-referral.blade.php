@extends('layouts.base')

@section('title')
    Services
@endsection

@section('content')
    <section class="container-fluid " id="hero">
        <div class="row max_width">
            @if ($userReferrals->referral_code)
            <div class="row m-0">
                <div class="course_title pt-3">
                    <h2>My Reference Code :- {{$userReferrals->referral_code}}</h2>
                </div>

            </div>
            @else


            <div class="row m-0">
                <div class="course_title pt-3">
                    <form action="{{route('user.createReferral')}}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary">Create Referral</button>
            </form>
                </div>

            </div>

            @endif
        </div>
    </section>
    <div class="space-20"></div>
    <div class="space-20"></div>
    <section class="container-fluid max_width" id="services">
        <div class="row">
            <div class="col-md-12 service_item" style="text-align: justify" id="internship">
                <h2><b>Refers & Earn</b></h2>
                <p>Magical umbrella offers you opportunity to work from home part time / full time and earn good
                    handsome amount. </p>
                <p>Opportunity to earn 3 Lakhs per month and even more, depends upon your skills like
                    communication, soft skills, marketing, sales and hard working from your location itself.</p>

                <p><span style="font-weight: bold; font-size: 25px;" class="contrast">&nbsp;Steps</span>
                </p>
                <ul>
                    <li style="margin-left: 18.85pt; line-height: normal;">Sign up on www.magicalumbrella.com</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">as soon as you sign up on website, your reference code will be generated and can be seen
                        at right corner of website in My Referral Code section. (6 digit reference code)</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Send your reference code to as many candidates as possible.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">If any interested candidate enroll to our course by using your reference code, candidate
                        will get 5 % discount on course.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">And also you will get 5% referral amount of the course prize.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">The reference amount will be released to you within 15 days as soon as account clearance
                        process is done.</li>

                </ul>
                <p><span style="font-weight: bold; font-size: 25px;" class="contrast">&nbsp;Note</span></p>
                <ul>
                    <li style="margin-left: 18.85pt; line-height: normal;">If you make a sales of Rs. 1 Lakhs or above by using reference code, surprise gift will be
                        awarded.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">Start working now and earn daily rewards.</li>
                    <li style="margin-left: 18.85pt; line-height: normal;">You can refer our website www.magicalumbrella.com for all the details related to Course and
                        user can enroll to our course from website itself. If any doubts occurs, please feel free to contact
                        us at 7410132639</li>

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

@props(['courses'])

<section class="container-fluid max_width" id="courses">
    <div class="row m-0 mb-3 ">
        <h2>Our Courses</h2>
    </div>
    <div class="row m-0">
        @php
            $links = [['type' => null, 'name' => 'Online Courses'], ['type' => 'summercamp', 'name' => 'Offline Courses'], ['type' => 'combo-pack', 'name' => 'Combo pack']];
        @endphp
        <div class="indi-course-card">
            @foreach ($links as $link)
                <a href="{{ route('welcome') }}?type={{ $link['type'] }}"
                    class="{{ request()->type == $link['type'] ? 'active' : '' }}">{{ $link['name'] }}</a>
            @endforeach
            {{-- <a href="{{ route('welcome') }}" class="{{ request()->type == null ? 'active' : '' }}">Our Courses</a>
            <a href="{{ route('welcome') }}?type=summercamp"
                class="{{ request()->type == 'summercamp' ? 'active' : '' }}">Coding Courses for Kids</a>
            <a href="{{ route('welcome') }}?type=combo-pack"
                class="{{ request()->type == 'combo-pack' ? 'active' : '' }}">Combo pack</a> --}}
        </div>
        <div class="indi-course-card-mobile" x-data="{ courseMenu: false }">
            <div class="menu-btn">
                <img @click="courseMenu = !courseMenu" class="course_menu_btn"
                    src="https://img.icons8.com/ios-filled/100/000000/menu--v1.png" alt="hamburger menu" />
            </div>
            <div x-show="courseMenu" style="display: none" x-transition.duration.500ms>
                @foreach ($links as $link)
                    <a href="{{ route('welcome') }}?type={{ $link['type'] }}"
                        class="{{ request()->type == $link['type'] ? 'active' : '' }}">{{ $link['name'] }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row m-0">
        @foreach ($courses as $course)
            <div class="col-md-3 col-sm-4 mb-4">
                <div class="card card-manage">
                    <a href="{{ route('course.details', $course->slug) }}">
                        <img src="{{ asset($course->thumbnail()) }}" class="card-img-top"
                            alt="Course : {{ $course->title }}" style="height: 200px">
                    </a>
                    <div class="card-body">
                        <a href="{{ route('course.details', $course->slug) }}">
                            <h5 class="card-title">{{ $course->title }}</h5>
                        </a>
                        <p class="card-text" style="text-align: justify">{{ $course->excerpt() }}</p>
                        <h6>
                            ₹{{ number_format($course->price()) }}
                            @if ($course->discountPrice() !== 0)
                                <span>(₹{{ number_format($course->discountPrice()) }})</span>
                            @endif

                            @if ($course->discountPrice() == 0)
                                <span>(₹{{ number_format(140000) }})</span>
                            @endif
                        </h6>
                    </div>
                    <a href="{{ route('course.details', $course->slug) }}" class="inner-card">
                        <p class="card-text" style="text-align: justify">{{ $course->description(350) }}</p>

                        <div class="btn-wrapper">
                            <button class="course-btn">view details</button>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>

<footer class="container-fluid">
    <div class="row ">
        <div class="col-md-2">
            <div class="website-name">
                magical umbrella
            </div>
            <div class="website-desc">
                Magical Umbrella is an Ed-tech company. We provide Courses, training, Internship and Placement
                assistance at top IT companies like Accenture, TCS, Wipro and many more. Courses offered by us are
                full Stack Development, Manual & Automation Testing, Python, Amazon Web Services, Front-End designing
                and many more courses.
            </div>
        </div>
        <div class="col-md-2 offset-md-1 terms">
            @foreach (config('setting.nav_links') as $link)
                <a href="{{ route($link['route']) }}"
                    class="term_link {{ request()->routeIs($link['route']) ? 'active' : '' }}">{{ $link['name'] }}</a>
            @endforeach
            <a href="{{ route('faqs') }}" class="term_link {{ request()->routeIs('faqs') ? 'active' : '' }}">FAQs</a>
            <a href="{{ route('about') }}" class="term_link {{ request()->routeIs('about') ? 'active' : '' }}">About
                Us</a>
        </div>
        <div class="col-md-2 terms">
            <a href="{{ route('terms') }}" class="term_link">
                Terms & Condition
            </a>
            <a href="{{ route('terms') }}" class="term_link">
                Privacy Policy
            </a>
            <a href="{{ route('terms') }}" class="term_link">
                Refund Policy
            </a>
        </div>
        <div class="col-md-4 offset-md-2 links">
            <a href="{{ config('setting.links.facebook') }}" class="link">
                <svg viewBox="0 0 172 172">
                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                        stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                        font-family="none" font-weight="none" font-size="none" text-anchor="none"
                        style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none"></path>
                        <g class="facebook">
                            <path
                                d="M110.08,37.84h17.2c1.89888,0 3.44,-1.54112 3.44,-3.44v-23.17528c0,-1.80256 -1.38632,-3.3024 -3.182,-3.42968c-5.47304,-0.38872 -16.16456,-0.91504 -23.85296,-0.91504c-21.12504,0 -34.88504,12.6592 -34.88504,35.66592v22.81408h-24.08c-1.89888,0 -3.44,1.54112 -3.44,3.44v24.08c0,1.89888 1.54112,3.44 3.44,3.44h24.08v65.36c0,1.89888 1.54112,3.44 3.44,3.44h24.08c1.89888,0 3.44,-1.54112 3.44,-3.44v-65.36h24.84368c1.7544,0 3.22672,-1.31752 3.41936,-3.0616l2.67632,-24.08c0.22704,-2.03648 -1.36912,-3.8184 -3.41936,-3.8184h-27.52v-17.2c0,-5.70008 4.61992,-10.32 10.32,-10.32z">
                            </path>
                        </g>
                    </g>
                </svg>
            </a>
            <a href="{{ config('setting.links.instagram') }}" class="link">
                <svg viewBox="0 0 172 172">
                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                        stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                        font-family="none" font-weight="none" font-size="none" text-anchor="none"
                        style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none"></path>
                        <g class="instagram">
                            <path
                                d="M55.04,10.32c-24.6648,0 -44.72,20.0552 -44.72,44.72v61.92c0,24.6648 20.0552,44.72 44.72,44.72h61.92c24.6648,0 44.72,-20.0552 44.72,-44.72v-61.92c0,-24.6648 -20.0552,-44.72 -44.72,-44.72zM127.28,37.84c3.784,0 6.88,3.096 6.88,6.88c0,3.784 -3.096,6.88 -6.88,6.88c-3.784,0 -6.88,-3.096 -6.88,-6.88c0,-3.784 3.096,-6.88 6.88,-6.88zM86,48.16c20.8808,0 37.84,16.9592 37.84,37.84c0,20.8808 -16.9592,37.84 -37.84,37.84c-20.8808,0 -37.84,-16.9592 -37.84,-37.84c0,-20.8808 16.9592,-37.84 37.84,-37.84zM86,55.04c-17.0624,0 -30.96,13.8976 -30.96,30.96c0,17.0624 13.8976,30.96 30.96,30.96c17.0624,0 30.96,-13.8976 30.96,-30.96c0,-17.0624 -13.8976,-30.96 -30.96,-30.96z">
                            </path>
                        </g>
                    </g>
                </svg>
            </a>
            <a href="{{ config('setting.links.youtube') }}" class="link">
                <svg viewBox="0 0 172 172">
                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                        stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                        font-family="none" font-weight="none" font-size="none" text-anchor="none"
                        style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none"></path>
                        <g class="youtube">
                            <path
                                d="M168.1945,42.49117l0.215,1.40467c-2.07833,-7.3745 -7.68983,-13.06483 -14.82067,-15.136l-0.1505,-0.03583c-13.40883,-3.64067 -67.36667,-3.64067 -67.36667,-3.64067c0,0 -53.82167,-0.07167 -67.36667,3.64067c-7.267,2.107 -12.88567,7.79733 -14.92817,15.02133l-0.03583,0.1505c-5.0095,26.1655 -5.04533,57.60567 0.22217,85.62017l-0.22217,-1.419c2.07833,7.3745 7.68983,13.06483 14.82067,15.136l0.1505,0.03583c13.3945,3.64783 67.36667,3.64783 67.36667,3.64783c0,0 53.8145,0 67.36667,-3.64783c7.27417,-2.107 12.89283,-7.79733 14.93533,-15.02133l0.03583,-0.1505c2.279,-12.169 3.58333,-26.17267 3.58333,-40.47733c0,-0.52317 0,-1.0535 -0.00717,-1.58383c0.00717,-0.48733 0.00717,-1.06783 0.00717,-1.64833c0,-14.31183 -1.30433,-28.3155 -3.8055,-41.89633zM68.85733,112.1655v-52.2665l44.90633,26.17267z">
                            </path>
                        </g>
                    </g>
                </svg>
            </a>
            <a href="{{ config('setting.links.twitter') }}" class="link">
                <svg viewBox="0 0 172 172">
                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                        stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                        font-family="none" font-weight="none" font-size="none" text-anchor="none"
                        style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none"></path>
                        <g class="twitter">
                            <path
                                d="M172.215,35.905c-6.35594,2.82188 -13.16875,4.71656 -20.33094,5.57656c7.31,-4.38063 12.92687,-11.31438 15.56062,-19.565c-6.82625,4.04469 -14.41844,6.9875 -22.4675,8.57312c-6.45,-6.88 -15.64125,-11.16656 -25.81344,-11.16656c-19.53812,0 -35.38094,15.82937 -35.38094,35.3675c0,2.76812 0.3225,5.46906 0.92719,8.0625c-29.40125,-1.47813 -55.45656,-15.56063 -72.91187,-36.96656c-3.05031,5.24062 -4.78375,11.31437 -4.78375,17.79125c0,12.26844 6.235,23.09906 15.73531,29.455c-5.805,-0.18813 -11.26062,-1.78719 -16.03094,-4.43438c0,0.14781 0,0.29563 0,0.44344c0,17.14625 12.20125,31.43031 28.36656,34.69562c-2.95625,0.80625 -6.08719,1.23625 -9.31219,1.23625c-2.28438,0 -4.50156,-0.215 -6.665,-0.645c4.515,14.04219 17.57625,24.295 33.04281,24.57719c-12.09375,9.48688 -27.34531,15.13063 -43.92719,15.13063c-2.86219,0 -5.67062,-0.16125 -8.42531,-0.49719c15.64125,10.05125 34.23875,15.89656 54.22031,15.89656c65.06438,0 100.64688,-53.89781 100.64688,-100.63344c0,-1.53187 -0.04031,-3.07719 -0.09406,-4.58219c6.90687,-4.98531 12.9,-11.22031 17.64344,-18.31531z">
                            </path>
                        </g>
                    </g>
                </svg>
            </a>
            <a href="{{ config('setting.links.telegram') }}" class="link">
                <svg viewBox="0 0 172 172">
                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                        stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                        font-family="none" font-weight="none" font-size="none" text-anchor="none"
                        style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none"></path>
                        <g class="telegram">
                            <path
                                d="M158.71128,22.53888c-2.58,-2.18784 -6.63232,-2.50088 -10.82224,-0.81872h-0.00688c-4.40664,1.76816 -124.73784,53.38192 -129.6364,55.49064c-0.89096,0.3096 -8.67224,3.21296 -7.87072,9.68016c0.71552,5.8308 6.96944,8.24568 7.73312,8.52432l30.59192,10.4748c2.0296,6.75616 9.5116,31.6824 11.16624,37.00752c1.032,3.3196 2.71416,7.68152 5.66224,8.57936c2.58688,0.9976 5.16,0.086 6.82496,-1.2212l18.70328,-17.34792l30.19288,23.5468l0.71896,0.43c2.05024,0.90816 4.01448,1.36224 5.88928,1.36224c1.44824,0 2.838,-0.27176 4.16584,-0.81528c4.5236,-1.8576 6.33304,-6.16792 6.52224,-6.6564l22.55264,-117.22488c1.376,-6.2608 -0.53664,-9.44624 -2.38736,-11.01144zM75.68,110.08l-10.32,27.52l-10.32,-34.4l79.12,-58.48z">
                            </path>
                        </g>
                    </g>
                </svg>
            </a>
        </div>
    </div>
    <div class="col-md-12 py-2" style="display: flex;justify-content: center">
        <p>&copy; Copyright <span id="year"></span> Reserved Magical Umbrella Pvt. Ltd</p>
    </div>
</footer>

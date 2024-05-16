@extends('admin.layouts.app', [
    'namePage' => 'private.sidbar.Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'Dashboard',
])
@section('content')

    <div class="wrapper change-view d-grid gap-20">

        <div class="welcome bg-primary rad-10 txt-c-mobile box-shadow overflow-hidden">
            <div class="intro d-flex space-between p-20 bg-secondary">
                <div>
                    <h2 class="m-0">Welcome</h2>
                    <p class="c-grey mt-5">Mohamed</p>
                </div>
                <img src="{{ asset('dechbord/imgs/welcome.png') }}" alt="" class="hide-mobile w-200" />
            </div>
            <img src="{{ asset('dechbord/imgs/avatar.png') }}" alt="" class="avatar w-64 p-2 h-64 ml-20 mr-20 rad-half mr-20 bs-5-ddd" />
            <div class="body txt-c d-flex p-20 mt-20 mb-20 block-mobile bt-eee bb-eee">
                <div class="flex-1">
                    Mohamed Alfeky<span class="d-block c-grey fs-14 mt-10">Developer</span>
                </div>
                <div class="flex-1">
                    80 <span class="d-block c-grey fs-14 mt-10">Projects</span>
                </div>
                <div class="flex-1">
                    $8500 <span class="d-block c-grey fs-14 mt-10">Earned</span>
                </div>
            </div>
            <a href="profile.html" class="visit d-block fs-14 rad-6 bg-blue c-white w-fit btn-shape">Profile</a>
        </div>
        <!-- Start Quick Draft Widget -->
        <div class="quick-draft p-20 bg-primary rad-10 box-shadow">
            <h2 class="mt-0 mb-10">Quick Draft</h2>
            <p class="mt-0 mb-20 c-grey fs-15">Write A Draft For Your Ideas</p>
            <form>
                <input class="d-block mb-20 w-full p-10 b-none rad-6 bg-eee" type="text" placeholder="Title" />
                <textarea class="d-block mb-20 w-full p-10 b-none rad-6 resize-none h-180 bg-eee" placeholder="Your Thought"></textarea>
                <input class="save d-block fs-14 bg-blue c-white b-none w-fit btn-shape ml-auto mr-auto cursor-pointer"
                    type="submit" value="Save" />
            </form>
        </div>
        <!-- End Quick Draft Widget -->
        <!-- Start Last Project Progress Widget -->
        <div class="last-project p-20 bg-primary rad-10 p-relative box-shadow" dir="ltr">
            <h2 class="mt-0 mb-20">Last Project Progress</h2>
            <ul class="m-0 p-relative">
                <li class="mt-25 d-flex align-center done">Got The Project</li>
                <li class="mt-25 d-flex align-center done">
                    Started The Project
                </li>
                <li class="mt-25 d-flex align-center done">Manage The Project</li>
                <li class="mt-25 d-flex align-center done">
                    The Project About To Finish
                </li>
                <li class="mt-25 d-flex align-center current">
                    Test The Project
                </li>
                <li class="mt-25 d-flex align-center">
                    Finish The Project & Get Money
                </li>
            </ul>
            <img class="launch-icon hide-mobile p-absolute w-160 right-0 bottom-10 opacity-0_1" src="{{ asset('dechbord/imgs/project.png') }}"
                alt="" />
        </div>
        <!-- End Last Project Progress Widget -->

        <!-- Start Ticket Widget -->
        <!-- there is a test here is num -->
        <div class="tickets p-20 bg-primary rad-10 box-shadow">
            <h2 class="mt-0 mb-10">Tickets Statistics</h2>
            <p class="mt-0 mb-20 c-grey fs-15">
                Everything About Support Tickets
            </p>
            <div class="d-flex txt-c gap-20 f-wrap">
                <div class="box p-20 rad-10 fs-13 c-grey border-ccc">
                    <i class="fa-regular fa-rectangle-list fa-2x mb-10 c-orange"></i>
                    <span class="num c-black d-block fw-bold fs-25 mb-5" data-goal="600">0</span>
                    Total
                </div>
                <div class="box p-20 rad-10 fs-13 c-grey border-ccc">
                    <i class="fa-solid fa-spinner fa-2x mb-10 c-blue"></i>
                    <span class="num c-black d-block fw-bold fs-25 mb-5" data-goal="300">0</span>
                    Pending
                </div>
                <div class="box p-20 rad-10 fs-13 c-grey border-ccc">
                    <i class="fa-regular fa-circle-check fa-2x mb-10 c-green"></i>
                    <span class="num c-black d-block fw-bold fs-25 mb-5" data-goal="400">0</span>
                    Closed
                </div>
                <div class="box p-20 rad-10 fs-13 c-grey border-ccc">
                    <i class="fa-regular fa-rectangle-xmark fa-2x mb-10 c-red"></i>
                    <span class="num c-black d-block fw-bold fs-25 mb-5" data-goal="100">0</span>
                    Deleted
                </div>
            </div>
        </div>
        <!-- End Ticket Widget -->
        <!-- Start Latest News -->
        <div class="latest-news bg-primary rad-10 p-20 txt-c-mobile box-shadow">
            <div class="news-head d-flex space-between mb-10">
                <h2 class="mt-0 mb-20">Latest News</h2>
            </div>
            <div class="news-row d-flex align-center pb-20 mb-20">
                <img src="{{ asset('dechbord/imgs/news-01.png') }}" alt="" class="rad-6 w-100 mr-10 ml-10" />
                <div class="info flex-1">
                    <h3 class="mt-0 mr-0 mb-5">Created SASS Section</h3>
                    <p class="m-0 fs-14 c-grey">New SASS Examples & Tutorials</p>
                </div>
                <div class="btn-shape bg-secondary fs-13 label">3 Days Ago</div>
            </div>
            <div class="news-row d-flex align-center pb-20 mb-20">
                <img src="{{ asset('dechbord/imgs/news-02.png') }}" alt="" class="rad-6 w-100 mr-10 ml-10" />
                <div class="info flex-1">
                    <h3 class="mt-0 mr-0 mb-5">Changed The Design</h3>
                    <p class="m-0 fs-14 c-grey">A Brand New Website Design</p>
                </div>
                <div class="btn-shape bg-secondary fs-13 label">5 Days Ago</div>
            </div>
            <div class="news-row d-flex align-center pb-20 mb-20">
                <img src="{{ asset('dechbord/imgs/news-03.png') }}" alt="" class="rad-6 w-100 mr-10 ml-10" />
                <div class="info flex-1">
                    <h3 class="mt-0 mr-0 mb-5">Team Increased</h3>
                    <p class="m-0 fs-14 c-grey">3 Developers Joined The Team</p>
                </div>
                <div class="btn-shape bg-secondary fs-13 label">7 Days Ago</div>
            </div>
            <div class="news-row d-flex align-center">
                <img src="{{ asset('dechbord/imgs/news-04.png') }}" alt="" class="rad-6 w-100 mr-10 ml-10" />
                <div class="info flex-1">
                    <h3 class="mt-0 mr-0 mb-5">Added Payment Gateway</h3>
                    <p class="m-0 fs-14 c-grey">Many New Payment Gateways Added</p>
                </div>
                <div class="btn-shape bg-secondary fs-13 label">9 Days Ago</div>
            </div>
        </div>
        <!-- End Latest News -->
        <!-- Start Tasks -->
        <div class="tasks p-20 bg-primary rad-10 box-shadow">
            <h2 class="m-0 mb-20">Latest Tasks</h2>
            <div class="tasks-row between-flex pb-15 mb-15 bb-eee">
                <div class="info flex-1">
                    <h3 class="mt-0 mb-5 fs-15">Record One New Video</h3>
                    <p class="m-0 c-grey">Record Python Create Exe Project</p>
                </div>
                <div class="trash-icon p-relative w-32 h-32 rad-half cursor-pointer">
                    <i class="fa-regular fa-trash-can p-absolute transform-c delete"></i>
                </div>
            </div>
            <div class="tasks-row between-flex pb-15 mb-15 bb-eee">
                <div class="info flex-1">
                    <h3 class="mt-0 mb-5 fs-15">Record One New Video</h3>
                    <p class="m-0 c-grey">Record Python Create Exe Project</p>
                </div>
                <div class="trash-icon p-relative w-32 h-32 rad-half cursor-pointer">
                    <i class="fa-regular fa-trash-can p-absolute transform-c delete"></i>
                </div>
            </div>
            <div class="tasks-row between-flex pb-15 mb-15 bb-eee">
                <div class="info flex-1">
                    <h3 class="mt-0 mb-5 fs-15">Record One New Video</h3>
                    <p class="m-0 c-grey">Record Python Create Exe Project</p>
                </div>
                <div class="trash-icon p-relative w-32 h-32 rad-half cursor-pointer">
                    <i class="fa-regular fa-trash-can p-absolute transform-c delete"></i>
                </div>
            </div>
            <div class="tasks-row between-flex pb-15 mb-15 bb-eee opacity-0_3 td-line">
                <div class="info flex-1">
                    <h3 class="mt-0 mb-5 fs-15 txtd-line">Record One New Video</h3>
                    <p class="m-0 c-grey txtd-line">
                        Record Python Create Exe Project
                    </p>
                </div>
                <div class="trash-icon p-relative w-32 h-32 rad-half cursor-pointer">
                    <i class="fa-regular fa-trash-can p-absolute transform-c delete"></i>
                </div>
            </div>
            <div class="tasks-row between-flex">
                <div class="info flex-1">
                    <h3 class="mt-0 mb-5 fs-15">Record One New Video</h3>
                    <p class="m-0 c-grey">Record Python Create Exe Project</p>
                </div>
                <div class="trash-icon p-relative w-32 h-32 rad-half cursor-pointer">
                    <i class="fa-regular fa-trash-can p-absolute transform-c delete"></i>
                </div>
            </div>
        </div>
        <!-- End Tasks -->
        <!-- Start top Search Word Widget -->
        <div class="search-item p-20 bg-primary rad-10 box-shadow">
            <h2 class="mt-0 mb-20">Top Search Items</h2>
            <div class="items-head d-flex space-between c-grey mb-10">
                <span>Keyword</span>
                <span>Search Count</span>
            </div>
            <div class="items d-flex space-between pt-15 pb-15">
                <span>Programming</span>
                <span class="bg-secondary fs-13 btn-shape">220</span>
            </div>
            <div class="items d-flex space-between pt-15 pb-15">
                <span>JavaScript</span>
                <span class="bg-secondary btn-shape fs-13">180</span>
            </div>
            <div class="items d-flex space-between pt-15 pb-15">
                <span>PHP</span>
                <span class="bg-secondary btn-shape fs-13">160</span>
            </div>
            <div class="items d-flex space-between pt-15 pb-15">
                <span>Code</span>
                <span class="bg-secondary btn-shape fs-13">145</span>
            </div>
            <div class="items d-flex space-between pt-15 pb-15">
                <span>Design</span>
                <span class="bg-secondary btn-shape fs-13">110</span>
            </div>
            <div class="items d-flex space-between pt-15 pb-15">
                <span>Logic</span>
                <span class="bg-secondary btn-shape fs-13">95</span>
            </div>
        </div>
        <!-- End top Search Word Widget -->
        <!-- Start Latest Uploads -->
        <div class="latest-uploads p-20 bg-primary rad-10 box-shadow">
            <h2 class="mt-0 mb-20">Latest Uploads</h2>
            <ul class="m-0">
                <li class="between-flex pb-10 mb-10 bb-eee">
                    <div class="d-flex align-center">
                        <img class="mr-10 ml-10 w-40 h-40" src="{{ asset('dechbord/imgs/pdf.svg') }}" alt="" />
                        <div>
                            <span class="d-block">my-file.pdf</span>
                            <span class="fs-15 c-grey">Elzero</span>
                        </div>
                    </div>
                    <div class="bg-secondary btn-shape fs-13">2.9mb</div>
                </li>
                <li class="between-flex pb-10 mb-10 bb-eee">
                    <div class="d-flex align-center">
                        <img class="mr-10 ml-10 w-40 h-40" src="{{ asset('dechbord/imgs/avi.svg') }}" alt="" />
                        <div>
                            <span class="d-block">My-Video-File.avi</span>
                            <span class="fs-15 c-grey">Admin</span>
                        </div>
                    </div>
                    <div class="bg-secondary btn-shape fs-13">4.9mb</div>
                </li>
                <li class="between-flex pb-10 mb-10 bb-eee">
                    <div class="d-flex align-center">
                        <img class="mr-10 ml-10 w-40 h-40" src="{{ asset('dechbord/imgs/psd.svg') }}" alt="" />
                        <div>
                            <span class="d-block">My-Psd-File.pdf</span>
                            <span class="fs-15 c-grey">Osama</span>
                        </div>
                    </div>
                    <div class="bg-secondary btn-shape fs-13">4.5mb</div>
                </li>
                <li class="between-flex pb-10 mb-10 bb-eee">
                    <div class="d-flex align-center">
                        <img class="mr-10 ml-10 w-40 h-40" src="{{ asset('dechbord/imgs/zip.svg') }}" alt="" />
                        <div>
                            <span class="d-block">My-Zip-File.pdf</span>
                            <span class="fs-15 c-grey">User</span>
                        </div>
                    </div>
                    <div class="bg-secondary btn-shape fs-13">8.9mb</div>
                </li>
                <li class="between-flex pb-10 mb-10 bb-eee">
                    <div class="d-flex align-center">
                        <img class="mr-10 ml-10 w-40 h-40" src="{{ asset('dechbord/imgs/dll.svg') }}" alt="" />
                        <div>
                            <span class="d-block">My-DLL-File.pdf</span>
                            <span class="fs-15 c-grey">Admin</span>
                        </div>
                    </div>
                    <div class="bg-secondary btn-shape fs-13">4.9mb</div>
                </li>
                <li class="between-flex">
                    <div class="d-flex align-center">
                        <img class="mr-10 ml-10 w-40 h-40" src="{{ asset('dechbord/imgs/eps.svg') }}" alt="" />
                        <div>
                            <span class="d-block">My-Eps-File.pdf</span>
                            <span class="fs-15 c-grey">Designer</span>
                        </div>
                    </div>
                    <div class="bg-secondary btn-shape fs-13">8.9mb</div>
                </li>
            </ul>
        </div>
        <!-- End Latest Uploads -->
        <!-- Start target -->
        <div class="targets p-20 bg-primary rad-10 box-shadow" >
            <h2 class="mt-0 mb-10">Yearly Targets</h2>
            <p class="mt-0 mb-20 c-grey fs-15">Targets Of The Year</p>
            <!-- First -->
            <div class="target-row mb-25 d-flex align-center blue">
                <div class="icon d-flex center-flex w-80 h-80 mr-15 ml-15">
                    <i class="fa-solid fa-dollar-sign fa-lg c-blue"></i>
                </div>
                <div class="details flex-1">
                    <span class="c-grey fs-14">Money</span>
                    <span class="d-block mt-5 mb-10 fw-bold">$20.000</span>
                    <div class="progress p-relative h-4">
                        <span class="progress-bar bg-blue c-white blue p-absolute top-0 left-0 h-full td-0_6 rad-10"
                            style="width: 0" data-progress="80%">
                            <span class="bg-blue p-absolute rad-6 fs-13">80%</span>
                        </span>
                    </div>
                </div>
            </div>
            <!-- Second -->
            <div class="target-row mb-25 d-flex align-center orange">
                <div class="icon d-flex center-flex w-80 h-80 mr-15 ml-15">
                    <i class="fa-solid fa-code fa-lg c-orange"></i>
                </div>
                <div class="details flex-1">
                    <span class="c-grey fs-14">Projects</span>
                    <span class="d-block mt-5 mb-10 fw-bold">21</span>
                    <div class="progress p-relative h-4">
                        <span class="progress-bar bg-orange c-white orange p-absolute top-0 left-0 h-full td-0_6 rad-10"
                            style="width: 0" data-progress="55%">
                            <span class="bg-orange p-absolute rad-6 fs-13">55%</span>
                        </span>
                    </div>
                </div>
            </div>
            <!-- Third -->
            <div class="target-row mb-25 d-flex align-center green">
                <div class="icon d-flex center-flex w-80 h-80 mr-15 ml-15">
                    <i class="fa-solid fa-user fa-lg c-green"></i>
                </div>
                <div class="details flex-1">
                    <span class="c-grey fs-14">Team</span>
                    <span class="d-block mt-5 mb-10 fw-bold">12</span>
                    <div class="progress p-relative h-4">
                        <span class="progress-bar bg-green c-white green p-absolute top-0 left-0 h-full td-0_6 rad-10"
                            style="width: 0" data-progress="75%">
                            <span class="bg-green p-absolute rad-6 fs-13">75%</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End target -->
        <!-- Start Reminders Widget -->
        <div class="reminders p-20 bg-primary rad-10 box-shadow"  dir="ltr">
            <h2 class="mt-0 mb-25">Reminders</h2>
            <ul class="m-0">
                <li class="d-flex align-center mt-15">
                    <span class="key bg-blue mr-15 ml-15 d-block rad-half w-15 h-15 p-relative blue-glow"></span>
                    <div class="pl-15 pr-15 blue">
                        <p class="fs-14 fw-bold mt-0 d-block mb-5">
                            Check My Tasks List
                        </p>
                        <span class="c-grey fs-13">20/5/2023 - 7:00am</span>
                    </div>
                </li>
                <li class="d-flex align-center mt-15">
                    <span class="key bg-green mr-15 ml-15 d-block rad-half w-15 h-15 p-relative green-glow"></span>
                    <div class="pl-15 pr-15 green">
                        <p class="fs-14 fw-bold mt-0 mb-5">Check My Projects</p>
                        <span class="fs-13 c-grey">12/5/2023 - 2:00pm</span>
                    </div>
                </li>
                <li class="d-flex align-center mt-15">
                    <span class="key bg-orange mr-15 ml-15 d-block rad-half w-15 h-15 p-relative orange-glow"></span>
                    <div class="pl-15 pr-15 orange">
                        <p class="fs-14 fw-bold mt-0 mb-5">Call All My Clients</p>
                        <span class="fs-13 c-grey">05/4/2023 - 12:00am</span>
                    </div>
                </li>
                <li class="d-flex align-center mt-15">
                    <span class="key bg-red mr-15 ml-15 d-block rad-half w-15 h-15 p-relative red-glow"></span>
                    <div class="pl-15  red">
                        <p class="fs-14 fw-bold mt-0 mb-5">
                            Finish The Development Workshop
                        </p>
                        <span class="fs-13 c-grey">20/3/2023 - 10:00am</span>
                    </div>
                </li>
                <li class="d-flex align-center mt-15">
                    <span class="key bg-green mr-15 ml-15 d-block rad-half w-15 h-15 p-relative green-glow"></span>
                    <div class="pl-15 pr-15 green">
                        <p class="fs-14 fw-bold mt-0 mb-5">Check My Old Projects</p>
                        <span class="fs-13 c-grey">4/11/2022 - 2:00pm</span>
                    </div>
                </li>
            </ul>
        </div>
        <!-- End Reminders Widget -->
        <!-- Start Latest Post Widget -->
        <div class="latest-post p-20 bg-primary rad-10 box-shadow">
            <h2 class="mt-0 mb-20">last Post</h2>
            <div class="top d-flex align-center">
                <img class="avatar mr-15 w-48 h-48" src="{{ asset('dechbord/imgs/avatar.png') }}" alt="" />
                <div class="info">
                    <span class="d-block mb-5 fw-bold">Mohamed Alaa</span>
                    <span class="c-grey">About 3 Hours Ago</span>
                </div>
            </div>
            <div class="post-content pt-20 pb-20 mt-20 mb-20 tt-cap lh-1_8 bt-eee bb-eee">
                <p>
                    "Two roads diverged in a wood, and I, I took the one less
                    travelled by, and that has made all the difference..."
                </p>

                <span class="c-grey italic fs-14">Robert Frost</span>
            </div>
            <div class="posts-state between-flex c-grey">
                <div class="post-likes cursor-pointer select-none">
                    <i class="fa-regular fa-heart heart not-liked"></i>
                    <span class="likes-count">800</span>
                </div>
                <div>
                    <i class="fa-regular fa-comments"></i>
                    <span>200</span>
                </div>
            </div>
        </div>
        <!-- End Latest Post Widget -->
        <!-- Start Social Media Stats -->
        <div class="social-media p-20 bg-primary rad-10 box-shadow">
            <h2 class="mt-0 mb-20">Social Media Stats</h2>
            <div class="box twitter mb-20 d-flex">
                <div class="icon w-52 c-white tl-rad-7 bl-rad-7">
                    <i class="fa-brands fa-twitter fa-2x h-full center-flex"></i>
                </div>
                <div class="info d-flex between-flex flex-1 bg-secondary p-15 tr-rad-7 br-rad-7">
                    <span>90K Followers</span>
                    <a href="#" class="btn-shape bg-blue c-white fs-14">Follow</a>
                </div>
            </div>
            <div class="box facebook mb-20 d-flex">
                <div class="icon w-52 c-white tl-rad-7 bl-rad-7">
                    <i class="fa-brands fa-facebook-f fa-2x h-full center-flex"></i>
                </div>
                <div class="info d-flex between-flex flex-1 bg-secondary p-15 tr-rad-7 br-rad-7">
                    <span>2M Like</span>
                    <a href="#" class="btn-shape bg-blue c-white fs-14">Like</a>
                </div>
            </div>
            <div class="box youtube mb-20 d-flex">
                <div class="icon w-52 c-white tl-rad-7 bl-rad-7">
                    <i class="fa-brands fa-youtube fa-2x h-full center-flex"></i>
                </div>
                <div class="info d-flex between-flex flex-1 bg-secondary p-15 tr-rad-7 br-rad-7">
                    <span>1M Subs</span>
                    <a href="#" class="btn-shape bg-blue c-white fs-14">Subscribe</a>
                </div>
            </div>
            <div class="box linkedin mb-20 d-flex">
                <div class="icon w-52 c-white tl-rad-7 bl-rad-7">
                    <i class="fa-brands fa-linkedin fa-2x h-full center-flex"></i>
                </div>
                <div class="info d-flex between-flex flex-1 bg-secondary p-15 tr-rad-7 br-rad-7">
                    <span>70K Followers</span>
                    <a href="#" class="btn-shape bg-blue c-white fs-14">Follow</a>
                </div>
            </div>
        </div>
        <!-- End Social Media Stats -->
    </div>
@endsection



@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
@endpush

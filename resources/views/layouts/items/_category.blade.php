<div class="col-lg-3 col-md-4 col-sm-6 mb-3">
    <a class="text-decoration-none" href="{{ route('category', ['id' => $Category->id]) }}">
        <div class="cat-item d-flex align-items-center ">
            <div class="overflow-hidden" style="width: 100px; height: fit-content;">
                <img class="img-fluid" src='{{ asset("$Category->image") }}' alt="">
            </div>
            <div class="flex-fill pl-3">
                <h6>
                    @if (Config::get('languages')[App::getLocale()]['display'] == 'عربي')
                        {{ $Category->name_ar }} @else{{ $Category->name }}
                    @endif
                </h6>
            </div>
        </div>
    </a>
</div>

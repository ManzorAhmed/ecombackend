<style>
    .grid-unit img{width: auto; max-width: 100%; height: auto; margin: 0 auto 0.10em; border-radius: 15px 15px 0 0;}
    .grid-unit {position: relative;margin-left: 0;width: 100%;height: 350px;float: left;display: inline; margin-bottom: 2em;border-radius: 0 0 15px 15px;box-shadow: 0 4px 8px 0 rgba(9,32,76,.035);}
    .grid:after {content:"";display: table;clear: both;}
    .grid-unit p{
        text-align: left;
        width: 90%;
        margin-left: 10px;
    }
    .grid-unit .button{position:absolute;bottom:25px;left:25px;padding:15px 15px;line-height:10px;background:#ff5722;color:#fff;text-decoration:none;outline:none;overflow:hidden;border-radius:4px;box-shadow:0 4px 4px 0 rgba(9,32,76,.035);z-index:1}
    *, *:after, *:before {-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}
    @media screen and (min-width: 700px) {
        .col-3 .grid-unit {
            width: 30%;
        }

        .grid-unit{
            margin: auto 23px auto;
        }

    }
    .col-3 .grid-unit:last-child{
        margin-right: 0;
    }

</style>
@php
    $blogs = \App\Models\Blog::all(); // Retrieve all blogs
@endphp
<div class="grid-row col-3">
    <div>
        <h2 class="font_2" style="font-size:65px; line-height:1.2em; text-align:center;">
            <span style="font-size:65px;">
                <span style="color:#701915;">
                    <span style="text-decoration:underline;">
                        <span style="font-family:adobe-caslon-w01-smbd,serif;">Articles</span>
                    </span>
                </span>
            </span>
        </h2>
    </div>
    <div class="grid-row col-3">
        @foreach($blogs as $blog)
            <div class="grid-unit">
                <img src="{{asset('asset/upload/blog/blank-papers-isolated-grey-surface.png')}}" class="q-mark" alt="quotation-mark">
{{--                <img src="{{ asset('assets/uploads/blog/' . $blog->images->first()->path) }}" alt="Blog Image">--}}
                <h3>{{ $blog->title }}</h3>
                <p>{{ \Illuminate\Support\Str::limit(strip_tags($blog->paragraphs->first()->content), 100) }}</p>
                <a class='button' href='#'>Read More</a>
            </div>
        @endforeach
    </div>



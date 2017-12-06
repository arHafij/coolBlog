@extends('user.layouts.app')
@section('bg-img', asset('user/img/post-bg.jpg'))
@section('heading',$post->title)
@section('sub-heading',$post->subtitle)
@section('main-content')

{{-- Facebook Comment Code --}}
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=197991380771451';
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <small>Created at {{ $post->created_at->diffForHumans() }}</small>
            <small class="pull-right">Category {{ $post->category->name }}</small>
            
            {!! htmlspecialchars_decode($post->body) !!}
            
            {{--  Tags cloud  --}}
            <div class="container">
                <h4>Tag Clouds</h4>
                <p>
                    @foreach($post->tags as $tag)
                    <a class="badge badge-warning" style="text-decoration: none;" href="">{{ $tag->name }}</a>
                    @endforeach
                </p>
            </div>
            {{-- Facebook Coments Box --}}
            <div class="row">
                <div class="fb-comments" data-href="http://localhost:8000/post/{{ $post->slug }}" data-numposts="5"></div>
            </div>
        </div>
    </div>
    
</div>
@endsection
@extends('layouts.main')

@section('content')
	<div class="list">
		<div class="courses">
			@foreach($conferences as $item)
				<div class="course">
					<div class="course-date">{{ $item->date }}</div>
					<div class="course-title"><img src="/uploads/9.png"><span>{{ $item->project_name }}</span></div>
					@if (strpos($item->project_name, 'LRK') > 0)
						<div class="course-desc">Livredningskurs hvor du lærer livredning i vann, samt hjerte-lungeredning med fokus på barn og voksne.</div>
					@elseif (strpos($item->project_name, 'FHK BV') > 0)
						<div class="course-desc">Førstehjelpskurs som gir deg grunnleggende kunnskaper og ferdigheter for å håndtere livstruende nødsituasjoner med barn og voksne.</div>
					@else
						<div class="course-desc"></div>
					@endif
					<div class="course-views">253 views</div>
					<div class="course-comments">2 comments</div>
					<a class="course-view" href="/courses/{{ $item->project_id }}">VIEW COURSE</a>
					<div class="clear"></div>
				</div>
			@endforeach
			<div class="pages">
				@if ($prev_page)
					<a class="pages-el" href="/courses/?page={{ $prev_page }}">{{ $prev_page }}</a>
				@endif
				<a class="pages-el -active" href="/courses/?page={{ $page }}">{{ $page }}</a>
				@if ($next_page)
					<a class="pages-el" href="/courses/?page={{ $next_page }}">{{ $next_page }}</a>
				@endif
			</div>
		</div>
		<div class="blocks">
			<div class="blocks-block">
				<div class="blocks-block-title">Latest news</div>
				<div class="blocks-block-image"><img src="/uploads/15.jpg"></div>
				<div class="blocks-block-name">Thomas Smith</div>
				<div class="blocks-block-desc">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque lau dantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi.</div>
				<a class="blocks-block-contact" href="#">CONTACT ME</a>
				<div class="blocks-block-div"></div>
			</div>
			<div class="blocks-block">
				<div class="blocks-block-title">Popular posts</div>
				<a href="#" class="blocks-block-element">
					<img src="/uploads/16.jpg">
					<p>The best quotes of the 2017</p>
					<span>72 comments</span>
					<div class="clear"></div>
				</a>
				<a href="#" class="blocks-block-element">
					<img src="/uploads/17.jpg">
					<p>Beautiful Pictures of medical</p>
					<span>46 comments</span>
					<div class="clear"></div>
				</a>
				<a href="#" class="blocks-block-element -last">
					<img src="/uploads/18.jpg">
					<p>The latest meds 2017</p>
					<span>36 comments</span>
					<div class="clear"></div>
				</a>
				<div class="blocks-block-div"></div>
			</div>
			<div class="blocks-block">
				<div class="blocks-block-title">Instagram</div>
				<a class="blocks-block-instagram" href="#"><img src="/uploads/19.jpg"></a>
				<a class="blocks-block-instagram" href="#"><img src="/uploads/20.jpg"></a>
				<a class="blocks-block-instagram" href="#"><img src="/uploads/21.jpg"></a>
				<a class="blocks-block-instagram" href="#"><img src="/uploads/22.jpg"></a>
				<a class="blocks-block-instagram" href="#"><img src="/uploads/23.jpg"></a>
				<a class="blocks-block-instagram" href="#"><img src="/uploads/24.jpg"></a>
				<a class="blocks-block-instagram" href="#"><img src="/uploads/25.jpg"></a>
				<a class="blocks-block-instagram" href="#"><img src="/uploads/26.jpg"></a>
				<a class="blocks-block-instagram" href="#"><img src="/uploads/27.jpg"></a>
				<div class="clear"></div>
				<a class="blocks-block-follow" href="#">FOLLOW US</a>
				<div class="blocks-block-div"></div>
			</div>
			<div class="blocks-block">
				<div class="blocks-block-title">Facebook</div>
				<a class="blocks-block-facebook" href="#"><img src="/uploads/28.jpg"></a>
				<a class="blocks-block-like" href="#">LIKE US</a>
				<div class="blocks-block-div"></div>
			</div>
			<div class="blocks-block">
				<div class="blocks-block-title">Subscribe to our newsletter!</div>
				<input class="blocks-block-subscribe" type="text" value="" placeholder="Your email address">
				<a class="blocks-block-subscribe-button" href="#"></a>
			</div>
		</div>
		<div class="clear"></div>
	</div>
@endsection

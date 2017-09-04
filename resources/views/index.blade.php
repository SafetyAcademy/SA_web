@extends('layouts.main')

@section('wrapper_class')
	wrapper_base
@endsection

@section('content')
	<div class="head-text">Title<br />medical<br />conference</div>
	<div class="clear"></div>

	<div class="conferences">
		<a class="conferences-el" style="background: url('../uploads/1.jpg') no-repeat scroll 0 0;" href="/courses/{{ $conference_slice[0]->project_id }}">{{ $conference_slice[0]->project_name }}<br />{{ $conference_slice[0]->date }}</a>
		<a class="conferences-el -bold"  style="background: url('../uploads/2.jpg') no-repeat scroll 0 0;" href="/courses/{{ $conference_slice[1]->project_id }}">{{ $conference_slice[1]->project_name }}<br />{{ $conference_slice[1]->date }}</a>
		<a class="conferences-el" style="background: url('../uploads/1.jpg') no-repeat scroll 0 0;" href="/courses/{{ $conference_slice[2]->project_id }}">{{ $conference_slice[2]->project_name }}<br />{{ $conference_slice[2]->date }}</a>
		<div class="clear"></div>
		<div class="conferences-el-all">
			<a class="conferences-el-all-link" href="/courses/">All courses</a>
		</div>
	</div>

	<div class="register">
		<div class="register-title">Register for the conference</div>
		<input class="register-field" type="text" placeholder="E-mail address" value="">
		<a class="register-join" href="#">Join now</a>
		<div class="clear"></div>
	</div>

	<div class="professionals">
		<div class="professionals-title">Our medical professionals</div>
		<div class="professionals-icons">
			<a class="professionals-icons-icon -active" data="0" href="#"><img src="/uploads/3.png"><span>Mable Allison</span></a>
			<a class="professionals-icons-icon" data="1" href="#"><img src="/uploads/4.png"><span>Birdie Ellis</span></a>
			<a class="professionals-icons-icon" data="2" href="#"><img src="/uploads/5.png"><span>Minerva Moss</span></a>
			<a class="professionals-icons-icon" data="3" href="#"><img src="/uploads/6.png"><span>Irene Anderson</span></a>
			<a class="professionals-icons-icon" data="4" href="#"><img src="/uploads/7.png"><span>Virgie Benson</span></a>
			<div class="clear"></div>
		</div>
		<div class="professionals-text">
			<div class="professionals-text-element -active">
				<div class="professionals-text-element-title">Cutting Prescription Drug Costs1</div>
				<p>On behalf of the hospital staff, I welcome You on pages of our site where You have the opportunity to meet with the team and capabilities of our institutions in the provision of various types of medical care.</p>
				<span>— Mable Allison, Safety Academy</span>
			</div>
			<div class="professionals-text-element">
				<div class="professionals-text-element-title">Cutting Prescription Drug Costs2</div>
				<p>On behalf of the hospital staff, I welcome You on pages of our site where You have the opportunity to meet with the team and capabilities of our institutions in the provision of various types of medical care.</p>
				<span>— Birdie Ellis, Safety Academy</span>
			</div>
			<div class="professionals-text-element">
				<div class="professionals-text-element-title">Cutting Prescription Drug Costs3</div>
				<p>On behalf of the hospital staff, I welcome You on pages of our site where You have the opportunity to meet with the team and capabilities of our institutions in the provision of various types of medical care.</p>
				<span>— Minerva Moss, Safety Academy</span>
			</div>
			<div class="professionals-text-element">
				<div class="professionals-text-element-title">Cutting Prescription Drug Costs4</div>
				<p>On behalf of the hospital staff, I welcome You on pages of our site where You have the opportunity to meet with the team and capabilities of our institutions in the provision of various types of medical care.</p>
				<span>— Irene Anderson, Safety Academy</span>
			</div>
			<div class="professionals-text-element">
				<div class="professionals-text-element-title">Cutting Prescription Drug Costs5</div>
				<p>On behalf of the hospital staff, I welcome You on pages of our site where You have the opportunity to meet with the team and capabilities of our institutions in the provision of various types of medical care.</p>
				<span>— Virgie Benson, Safety Academy</span>
			</div>
		</div>
	</div>

	<div class="list">
		<div class="feed">
			<div class="feed-article">
				<div class="feed-article-image"><img src="/uploads/8.jpg"></div>
				<div class="feed-article-date">01 April 2017</div>
				<a href="#" class="feed-article-title"><img src="/uploads/9.png"><span>24×7 Medications Online Service</span></a>
				<div class="feed-article-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi.</div>
				<div class="feed-article-views">253 views</div>
				<div class="feed-article-comments">2 comments</div>
				<div class="clear"></div>
			</div>
			<div class="feed-article -small">
				<div class="feed-article-image"><img src="/uploads/10.jpg"></div>
				<a href="#" class="feed-article-title"><span>Therapy And Treatment No Longer Tabu</span></a>
				<div class="feed-article-description">I no longer miss work to go to the doctor. I no longer wait hours sitting in a doctors</div>
			</div>
			<div class="feed-article -small" style="margin-right: 0;">
				<div class="feed-article-image"><img src="/uploads/11.jpg"></div>
				<a href="#" class="feed-article-title"><span>Therapy And Treatment No Longer Tabu</span></a>
				<div class="feed-article-description">I no longer miss work to go to the doctor. I no longer wait hours sitting in a doctors</div>
			</div>
			<div class="feed-feedbacks" style="clear: both;">
				<div data="3" class="feed-feedbacks-title">
					<a class="feed-feedbacks-title-arrow -left" href="#">&larr;</a>
					<a class="feed-feedbacks-title-arrow" href="#">&rarr;</a>
				</div>
				<div data="0" class="feed-feedbacks-title-words -active">
					<p>1This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet</p>
					<span>Gato Verde Adventure Sailing</span>
				</div>
				<div data="1" class="feed-feedbacks-title-words">
					<p>2This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet</p>
					<span>Gato Verde Adventure Sailing</span>
				</div>
				<div data="2" class="feed-feedbacks-title-words">
					<p>3This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet</p>
					<span>Gato Verde Adventure Sailing</span>
				</div>
				<div data="3" class="feed-feedbacks-title-words">
					<p>4This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet</p>
					<span>Gato Verde Adventure Sailing</span>
				</div>
			</div>
			<div class="feed-article" style="clear: both;">
				<div class="feed-article-image"><img src="/uploads/12.jpg"></div>
				<div class="feed-article-date">01 April 2017</div>
				<a href="#" class="feed-article-title"><img src="/uploads/9.png"><span>Points To Remember About A Spastic Colon</span></a>
				<div class="feed-article-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi.</div>
				<div class="feed-article-views">253 views</div>
				<div class="feed-article-comments">2 comments</div>
				<div class="clear"></div>
			</div>
			<div class="feed-article -small">
				<div class="feed-article-image"><img src="/uploads/13.jpg"></div>
				<a href="#" class="feed-article-title"><span>Therapy And Treatment No Longer Tabu</span></a>
				<div class="feed-article-description">I no longer miss work to go to the doctor. I no longer wait hours sitting in a doctors</div>
			</div>
			<div class="feed-article -small" style="margin-right: 0;">
				<div class="feed-article-image"><img src="/uploads/14.jpg"></div>
				<a href="#" class="feed-article-title"><span>Therapy And Treatment No Longer Tabu</span></a>
				<div class="feed-article-description">I no longer miss work to go to the doctor. I no longer wait hours sitting in a doctors</div>
			</div>
			<div class="clear"></div>
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

@section('js')
	<script src="/js/index.js?{{ time() }}"></script>
@endsection

@extends('layouts.main')

@section('content')
	<div class="list">
		<div class="conference">
			<input id="link" type="text" value="{{ env('SITE_URL') }}/courses/{{ $conference->project_id }}/" style="display: none;">
			<a class="conference-link" data-clipboard-action="copy" data-clipboard-target="#link">Copy link to this course</a>
			<div class="clear"></div>
			<div class="conference-title"><img src="/uploads/9.png"><span>{{ $conference->project_name }}</span></div>
			<div class="conference-date">{{ $conference->date }}</div>
			<div class="clear"></div>
			@if (strpos($conference->project_name, 'LRK') > 0)
				<p>
					Fullt kurs: 4 - 5 timer, inkludert pauser.<br />
					Oppfriskningskurs: 2 timer.<br />
					<br />
					Når barnehager, skoler og aktivitetsskoler er ansvarlig for svømming eller bading, eller har med seg barn/ungdom i nærheten av vann, skal det være voksne med godkjent livredningskurs tilstede. Gruppene med barn skal aldri være større enn maks 15 pr. tilsynsperson, som må være flink til å svømme og dykke, og må kunne livredning.<br />
					Kilde: Forskrift til opplæringslova § 12-1<br />
					OVERSIKT OVER VÅRE ÅPNE LIVREDNINGSKURS;<br />
					OSLO / BERGEN / TRONDHEIM.<br />
					<br />
					eller kontakt oss på epost for ett uforpliktende tilbud!<br />
					HVILKET KURS SKAL DU TA?<br />
					<br />
					Fullt kurs: Du må ta fullt kurs hvis du skal ta livredningskurset for første gang, eller hvis kompetansebeviset har gått ut på dato.<br />
					Oppfriskningskurs: Du kan ta oppfriskningskurs hvis du har et kompetansebevis som ikke er eldre enn 1 år gammelt.<br />
					KURSET PASSER BLANT ANNET FOR:<br />
					<br />
					Lærere og andre ansatte ved barnehager, skoler og aktivitetsskoler<br />
					Ledere og veiledere i friluftsliv og vannaktiviteter<br />
					Bedrifter som er pålagt livredningskurs<br />
					KURSINNHOLD FULLT KURS<br />
					<br />
					Alarmplan<br />
					Varslingsrutiner<br />
					Sikkerhet på ulykkessted<br />
					Forebygging av ulykker<br />
					Menneskets respirasjonssystem<br />
					Stille drukning og sendrukning<br />
					Farer og teknikker ved redning av panisk person<br />
					Hjerte-lungeredning (HLR/CPR) på druknet barn<br />
					Hjerte-lungeredning (HLR/CPR) på druknet voksen<br />
					Bruk av forlenget arm<br />
					Selvberging/flyting<br />
					Dykketeknikker<br />
					Ilandføringsteknikker<br />
					Gjennomføring av livredningsprøven<br />
					KURSINNHOLD OPPFRISKNINGSKURS<br />
					<br />
					Hjerte-lungeredning (HLR/CPR) på druknet barn<br />
					Hjerte-lungeredning (HLR/CPR) på druknet voksen<br />
					Dykketeknikker<br />
					Ilandføringsteknikker<br />
					Gjennomføring av livredningsprøven<br />
					KURSINNHOLD LIVREDNINGSPRØVE<br />
					<br />
					Ihopp fra bassengkant/brygge<br />
					Svømming<br />
					Dykking og ta med synkedukke til overflaten<br />
					Sleping/ilandføring av en person i overflaten<br />
					Hjerte-lungeredning (HLR/CPR) på en treningsdukke<br />
					VIKTIG INFORMASJON <br />
					<br />
					Livredningskurs og livredningsprøve kan gjennomføres i basseng eller sjø.<br />
					I basseng kreves badetøy, mens det i sjø kreves skjorte og bukse eller fullt undertøy.<br />
					Alle deltakerne må kunne svømme 200 meter.<br />
					De som eventuelt vegrer seg for å dykke ned til den dypeste delen av bassenget kan gjennomføre dykkingen på grunnere vann, og bli sertifisert etter dette nivået.<br />
					Emergency First Response<br />
					<br />
					PEDAGOGISKE KURSOPPLEGG<br />
					<br />
					Vi benytter pedagogiske kursopplegg utviklet i samarbeid med Emergency First Response (EFR) og Professional Association of Diving Instructors (PADI). De pedagogiske kursoppleggene fra EFR og PADI er i bruk over hele verden, og følger både norske og internasjonale retningslinjer for opplæring av førstehjelpere og livreddere.<br />
					<br />
					På kursene stiller vi med mange førstehjelpsdukker, slik at deltakerne får god trening i hjerte-lungeredning (HLR/CPR). Deltakerne lærer å følge de samme prioriteringene som ambulansepersonell og leger benytter, for å gi pasienten størst mulig sjanse til å overleve. Kursene legger opp til mye praksis pakket inn med teori, slik at læringsutbyttet blir størst mulig. Ingen lærer førstehjelp og livredning bare ved å se og lytte; man må fysisk få prøve ferdigheter i praksis.<br />
				</p>
			@elseif (strpos($conference->project_name, 'FHK BV') > 0)
				<p>
					Kursvarighet: 3-4 timer, inkludert pauser.<br />
					<br />
					Les om våre betingelser her!<br />
					<br />
					KURSETS INNHOLD:<br />
					<br />
					Varslingsrutiner<br />
					Vurdering av et skadested<br />
					Bruk av beskyttelse<br />
					Pasientundersøkelse<br />
					Stabilt sideleie<br />
					Hjerte-lungeredning barn<br />
					Hjerte-lungeredning voksen<br />
					Kvelning/blokkerte luftveier<br />
					Stanse alvorlige blødninger<br />
					Behandle for sjokk<br />
					Nakke- og ryggskader<br />
					Brannskader<br />
					Vi kan tilpasse kursets innhold etter krav og ønsker fra bedrifter.<br />
					<br />
					<br />
					KURSET PASSER BLANT ANNET FOR:<br />
					<br />
					Foreldre<br />
					Barnevakter<br />
					Lærere og andre ansatte ved barnehager, skoler og aktivitetsskoler<br />
					Bedrifter med ansvar for barn<br />
					Emergency First Response<br />
					<br />
					PEDAGOGISKE KURSOPPLEGG<br />
					<br />
					Vi benytter pedagogiske kursopplegg utviklet i samarbeid med Emergency First Response (EFR) og Professional Association of Diving Instructors (PADI). De pedagogiske kursoppleggene fra EFR og PADI er i bruk over hele verden, og følger både norske og internasjonale retningslinjer for opplæring av førstehjelpere og livreddere.<br />
					<br />
					På kursene stiller vi med mange førstehjelpsdukker, slik at deltakerne får god trening i hjerte-lungeredning (HLR/CPR). Deltakerne lærer å følge de samme prioriteringene som ambulansepersonell og leger benytter, for å gi pasienten størst mulig sjanse til å overleve. Kursene legger opp til mye praksis pakket inn med teori, slik at læringsutbyttet blir størst mulig. Ingen lærer førstehjelp og livredning bare ved å se og lytte; man må fysisk få prøve ferdigheter i praksis.
				</p>
			@else
				<p></p>
			@endif
			<!--<div class="conference-image"><img src="/uploads/29.jpg"></div>-->
			<div class="conference-button" id="conference-button">
				@if (isset($access) && $access)
					<div style="text-align: center;">You successfuly added to this seminar</div>
				@elseif (!$user)
					<div style="text-align: center;">To register for the course you need to <a style="color: #FE3824;" href="/sign_in/">enter the portal</a></div>
				@else
					<a class="conference-button-link" href="/courses/accept/{{ $project_id }}/#conference-button">Registration for the course</a>
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

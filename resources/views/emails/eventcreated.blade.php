<!--[if !mso]--><!-- --><!-- <![endif]-->
<p>{{Setting(&#39;openmeet.title&#39;)}} - Nouvel &eacute;v&eacute;nement de {{(new \App\Group)-&gt;getOne($event-&gt;id_group)-&gt;name}}<!-- [if gte mso 9]>
    <style type=”text/css”>
        body {
            font-family: arial, sans-serif !important;
        }
    </style>
    <![endif]--><!-- pre-header --></p>

<table>
	<tbody>
		<tr>
			<td>
			<p>{{Setting(&#39;openmeet.title&#39;)}} - Nouvel &eacute;v&eacute;nement de {{(new \App\Group)-&gt;getOne($event-&gt;id_group)-&gt;name}}</p>
			</td>
		</tr>
	</tbody>
</table>
<!-- pre-header end --><!-- header -->

<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
	<tbody>
		<tr>
			<td>
			<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:590px">
				<tbody>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>
						<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:590px">
							<tbody>
								<tr>
									<td style="height:70px"><a href=""><img alt="" src="https://floriaaan.alwaysdata.net/docs/fmm.svg" style="width:100px" /></a></td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>
<!-- end header --><!-- big image section -->

<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
	<tbody>
		<tr>
			<td>
			<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:590px">
				<tbody>
					<tr>
						<td>
						<p>Un nouvel &eacute;v&eacute;nement a &eacute;t&eacute; cr&eacute;&eacute;</p>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>
						<p>aura lieu le <cite>{{strftime(&quot;%A %d %b %Y&quot;,strtotime($event-&gt;datefrom))}} &agrave; {{strftime(&quot;%R&quot;,strtotime($event-&gt;datefrom))}}</cite> @if($event-&gt;dateto != null)<br />
						jusqu&#39;au <cite>{{strftime(&quot;%A %d %b %Y&quot;,strtotime($event-&gt;dateto))}} &agrave; {{strftime(&quot;%R&quot;,strtotime($event-&gt;dateto))}}</cite> @endif</p>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>
						<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:40px">
							<tbody>
								<tr>
									<td>&nbsp;</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>
						<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:160px">
							<tbody>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>
									<p><a href="{{url('/events/show'.$event-&gt;id)}}">Voir l&#39;&eacute;v&eacute;nement</a></p>
									</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>
<!-- end section --><!-- contact section -->

<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
	<tbody>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td style="border-top:1px solid #e0e0e0">&nbsp;</td>
		</tr>
		<tr>
			<td>
			<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:590px">
				<tbody>
					<tr>
						<td>
						<table align="left" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; width:300px">
							<tbody>
								<tr><!-- logo -->
									<td><a href=""><img alt="" src="https://floriaaan.alwaysdata.net/docs/fmm.svg" style="width:40px" /></a></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>
									<p>Contact:<br />
									<a href="mailto:{{Setting('openmeet.admin.email', 'contact@openmeet.fr')}}">{{strtolower(Setting(&#39;openmeet.title&#39;))}}</a></p>
									</td>
								</tr>
							</tbody>
						</table>

						<table align="left" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; width:2px">
							<tbody>
								<tr>
									<td>&nbsp;</td>
								</tr>
							</tbody>
						</table>

						<table align="right" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; width:200px">
							<tbody>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>
									<table align="right" border="0" cellpadding="0" cellspacing="0">
										<tbody>
											<tr>
												<td><a href="https://www.facebook.com/"><img alt="" src="http://i.imgur.com/Qc3zTxn.png" style="width:24px" /></a></td>
												<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
												<td><a href="https://twitter.com/"><img alt="" src="http://i.imgur.com/RBRORq1.png" style="width:24px" /></a></td>
												<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
												<td><a href="https://plus.google.com/"><img alt="" src="http://i.imgur.com/Wji3af6.png" style="width:24px" /></a></td>
											</tr>
										</tbody>
									</table>
									</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>
<!-- end section --><!-- footer ====== -->

<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
	<tbody>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>
			<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:590px">
				<tbody>
					<tr>
						<td>
						<table align="left" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse">
							<tbody>
								<tr>
									<td>
									<p>OpenMeet - 2020</p>
									</td>
								</tr>
							</tbody>
						</table>

						<table align="left" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; width:5px">
							<tbody>
								<tr>
									<td>&nbsp;</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>
<!-- end footer ====== -->
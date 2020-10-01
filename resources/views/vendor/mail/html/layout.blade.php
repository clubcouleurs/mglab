<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
	<style>
		@media only screen and (max-width: 600px) {
			.inner-body {
				width: 100% !important;
			}

			.footer {
				width: 100% !important;
			}
		}

		@media only screen and (max-width: 500px) {
			.button {
				width: 100% !important;
			}
		}
	</style>

	<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
		<tr>
			<td align="center">
				<table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
					{{ $header ?? '' }}

					<!-- Email Body -->
					<tr>
						<td class="body" width="100%" cellpadding="0" cellspacing="0">
							<table border="0" class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
								<!-- Body content -->

								<tr>
									<td background="http://mglab.test/img/mail_bg_header.jpg" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; background-repeat: no-repeat; padding: 36px 48px; display: block;">
										<h1 style="box-sizing: border-box; position: relative; margin-top: 0; font-family: 'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif; font-size: 30px; font-weight: 900; line-height: 150%; margin: 0; text-align: left; color: #ffffff;">

											{{ $sujet }}

										</h1>
									</td>
								</tr>




								<tr>
									<td class="content-cell">
										{{ Illuminate\Mail\Markdown::parse($slot) }}

										{{ $subcopy ?? '' }}
									</td>
								</tr>

								<tr align="center">
									<td align="center" style="padding: 0px 32px 16px 32px;">
										<hr>
										<span style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
										Merci d’utiliser <a href="https://www.mongraphisme.com">www.mongraphisme.com</a> !
										</span>
									</td>
								</tr>
</table>
<table align="center" width="570" cellpadding="10" cellspacing="0" style="table-layout: fixed; text-align: center;">

<tr>
<td width="25%" height="100px">
	<img src="{{ asset('img/graphic_design.png') }}" height="55%"></td>
	<td width="25%">
		<img src="{{ asset('img/budget.png') }}" height="65%" ></td>
	<td width="25%">
		<img src="{{ asset('img/execution.png') }}" height="65%" ></td>
	<td width="25%">
		<img src="{{ asset('img/communication.png') }}" height="65%" ></td>
	</tr>
<tr>
<td style="font-size: 12px;">Création <strong><br>100% personnalisé</strong>
</td>
	<td style="font-size: 12px;">Budget <strong><br>maîtrisé</strong>
</td>
	<td style="font-size: 12px;">Exécution <strong><br>rapide</strong>
</td>
	<td style="font-size: 12px;">Communication <strong><br>réactive</strong>
</td>
	</tr>
</table>

							<table  class="inner-body"  border="0" align="center" width="570" cellpadding="0" cellspacing="0" style="table-layout: fixed; text-align: center;">


								<tr align="center">
									<td style="padding: 20px" 
									>
									<img src="http://mglab.test/img/footer-email.jpg" width="350">
										
									</td>
								</tr>
							</table>

							<table  class="inner-body"  border="0" align="center" width="570" cellpadding="0" cellspacing="0" style="margin-top:10px ; table-layout: fixed; text-align: center;">


								<tr align="center">
									<td style="padding: 10px" 
									>
									<img src="http://mglab.test/img/instagram.jpg" width="40">
										
									</td>
								</tr>

							</table>



							</table>
						</td>
					</tr>

					{{ $footer ?? '' }}

				</table>
			</td>
		</tr>
	</table>
</body>
</html>



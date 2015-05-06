## Installing HR WEB

1. Pull / Clone this package
2. Running composer update
3. Running php artisan optimize
4. Running composer dump-autoload -o
5. Cek database configuration
6. Enable service provider in config/app.php line 153 - 161
7. Running migrate : php artisan hr:migrate MigrateHR
8. Running seed : php artisan hr:seed SeedHR
9. Login Using email : hr@thunderid.com, password : admin

## What's New?
1. Our timeline this week (until the end of the week), Please check folder Archive
2. Updating routes for calendar, schedule, workleave, Please check routes.php line 282 - 357
3. Updating API For Tracker 
4. Running HR WEB in 2 port, first port (primary port), second port (8400 for api)
5. Please check app/Http/routes.api.php for test api, for test api running in primary port

## 	API For Tracker
### Absensi (Sidik Jari)
1. Route : 
			URL 			=> (base_url)/api/presence/
			Method			=> POST
			Format 			=> Json
			Variable Input 	=> 
								[
									'application'	=> ['api' => ['client' => '', 'secret' => '']],
								]
			Return Format 	=> JSON
			Variable Return	=> message
			Status Return 	=> 200 (ok) or 500 (error)

### Log Activity (PC)
1. Route : 
			URL 			=> (base_url)/api/activity/logs/
			Method			=> POST
			Format 			=> Json
			Variable Input 	=> 
								[
									'application'	=> ['api' => ['client' => '', 'secret' => '']],
									'log' 			=> json in format ['event' | 'on' | 'pc' ],
								]
			Return Format 	=> JSON
			Variable Return	=> message
			Status Return 	=> 200 (ok) or 500 (error)

### Notes
--> Default API : Client : 123456789, Secret : 123456789

### Update Data Sidik Jari (...Working...)

## OLD Doc
1. Changing database structure (documentation on issue #3)
2. Packaging composer.json (for person, doclate, organisation) using new versioning (1.2.0)
3. Changing database structure (documentation on going) on person, work and contact
4. API moved to APIConnector/INENGINE (For internal developing), changes to external developing by change aliases on config/app.php line 212 to OUTENGINE (for details look app/APIConnector)



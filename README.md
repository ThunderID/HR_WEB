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
1. Working on issue #67. There may disfunctional thing. run composer update, remigrate and reseed. available for UI to work in : report and organisation (calendar, etc)
2. There is new function to generate client and secret. Please run composer update
3. Cause of restructure table, please report if there are issue or malfunction. Also use import database in archive so should not wait to longer for seed.
4. Add new controller for authentication setting
5. Updating table structure, see archives/erd ii, changing version of package work and chauth to 1.2.2
6. Running HR WEB in 2 port, first port (primary port), second port (8400 for api)
7. Please check app/Http/routes.api.php for test api, for test api running in primary port

## 	API For Foreign Ware
### Random for fp
1. Route : 
			URL 			=> (base_url)/api/fp/random/finger/
			Method			=> POST
			Format 			=> Json
			Variable Input 	=> 
								[
									'application'	=> ['api' => ['client' => '123456789', 'secret' => '123456789']
								]
			Return Format 	=> JSON
			Variable Return	=> message
			Status Return 	=> 200 (ok) or 500 (error), 404 (not found)

### Enroll for fp
1. Route : 
			URL 			=> (base_url)/api/fp/new/finger/
			Method			=> POST
			Format 			=> Json
			Variable Input 	=> 
								[
									'application'	=> ['api' => ['client' => '123456789', 'secret' => '123456789'],
									'template'		=> ['email', 'left_thumb', ...(8 fingers)..., 'right_little_finger']
								]
			Return Format 	=> JSON
			Variable Return	=> message
			Status Return 	=> 200 (ok) or 500 (error), 404 (not found)

### Sync for fp
1. Route : 
			URL 			=> (base_url)/api/fp/sync/finger/
			Method			=> POST
			Format 			=> Json
			Variable Input 	=> 
								[
									'application'	=> ['api' => ['client' => '123456789', 'secret' => '123456789'],
									'update'		=> date or datetime on gmt
								]
			Return Format 	=> JSON (sane as template of fp enroll)
			Variable Return	=> message
			Status Return 	=> 200 (ok) or 500 (error), 404 (not found)

			Test Route 		=> (base_url)/test/sync

### Setting for tracker
1. Route : 
			URL 			=> (base_url)/api/tracker/setting
			Method			=> POST
			Format 			=> Json
			Variable Input 	=> 
								[
									'application'	=> ['api' => ['client' => '123456789', 'secret' => '123456789'],
								]
			Return Format 	=> JSON
			Variable Return	=> message
			Status Return 	=> 200 (ok) or 500 (error), 404 (not found)

### Setting for fp
1. Route : 
			URL 			=> (base_url)/api/fp/setting
			Method			=> POST
			Format 			=> Json
			Variable Input 	=> 
								[
									'application'	=> ['api' => ['client' => '123456789', 'secret' => '123456789'],
								]
			Return Format 	=> JSON
			Variable Return	=> message
			Status Return 	=> 200 (ok) or 500 (error), 404 (not found)

### Absensi (Sidik Jari)
1. Route : 
			URL 			=> (base_url)/api/presence/
			Method			=> POST
			Format 			=> Json
			Variable Input 	=> 
								[
									'application'	=> ['api' => ['client' => '123456789', 'secret' => '123456789'],
									'log' 			=> json in format ['event' | 'on' | 'pc' ],
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
									'application'	=> ['api' => ['client' => '123456789', 'secret' => '123456789'],
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


